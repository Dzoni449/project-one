<?php 

require_once "user_header.php";

require_once "connect/connection.php";

$val=true;
$id = $_SESSION['user_id'];
$sub="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
        $cat_id=$_POST['input'];

        $q="SELECT * FROM `users_subscribed_categories` WHERE `user_id` = '$id' AND `category_id` = '$cat_id';";
        $result=$conn->query($q);
        $row=$result->fetch_assoc();

        if($result->num_rows){
            if($id=$row['user_id']){
                
                $sub="Subscribe";
              
            } if($sub=="Subscribe"){
                $sql="DELETE FROM `users_subscribed_categories` WHERE `user_id`='$id' AND `category_id` = '$cat_id';";
                $conn->query($sql);
                
               }
        }else{
            $sub="Subscribed";
            $q="INSERT INTO `users_subscribed_categories`(`user_id`,`category_id`) 
            VALUES ('$id','$cat_id') ;";
            $conn->query($q);
        }

}
  
        
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="products">

<h1 class="heading">News</h1>

    <div class="box-container">

    <?php
        $get_id=$_GET['View'];
        $q="SELECT * FROM `news` WHERE `news_id` = '$get_id';";
        $result=$conn->query($q);

        foreach($result as $row){



    ?>
        <form action="" method="post" class="box">
            <p class="big"><?php echo $row['title'];?></p>
            <div class="center"><?php echo $row['news_text'];?></div>
            <input type="hidden" name="cat_id" value="<?php echo $row['category_id']?>">
        
        <p class="left1">Tags:</p>
         <?php 
         $notags="";
         $get_id=$_GET['View'];
         $sql2="SELECT * FROM `news_tags` WHERE `news_id` = '$get_id';";
         $result4=$conn->query($sql2);
        
        
           foreach($result4 as $r){
            if($r){
                $id=$r['tag_id'];
                $sql5="SELECT * FROM `tags` WHERE `tag_id` ='$id'";
                $result5=$conn->query($sql5);
                
                foreach($result5 as $red){
                    
                    
                    
         ?>
         
        <p id="left1">#<?php echo $red['name'];?>,</p>    

        <?php
                }
        ?>
        
        <?php
            }else{
                $tags="No tags";
                
            }
           }
        ?>

<?php
        $car=$row['category_id'];
        $sql="SELECT * FROM `categories` WHERE `category_id` = $car;";
        $result3=$conn->query($sql);
        foreach($result3 as $car){


        ?>
        <input type="hidden" name="cat" value="news_page.php?cat_id=<?php echo $car['category_id'];?>">
        <p id="left">Category:<?php echo $car['name'];?></p>
        <?php
         }
        ?>
       
        <p class="sub">Subscribe to this category?</p>
        <?php
             $car=$row['category_id'];
             $sql="SELECT * FROM `categories` WHERE `category_id` = $car;";
             $result3=$conn->query($sql);
             $row=$result3->fetch_assoc();
             $category_id=$row['category_id'];

             
        ?>
        <input type="hidden" name="input" value="<?php echo $category_id;?>">
         <input type="submit" name="submit" value="<?php echo $sub;?>" class="btn2">
         
         
        
        </form>
        
        <?php
          }

        ?>

</div>

</section>
</body>
</html>