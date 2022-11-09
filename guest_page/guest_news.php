<?php 

require_once "guest_header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest News</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="products">

<h1 class="heading">News</h1>

    <div class="box-container">

    <?php
        $get_id=$_GET['View'];
        $selectNews="SELECT * FROM `news` WHERE `news_id` = '$get_id';";
        $result=$conn->query($selectNews);

        foreach($result as $row) {
    ?>
        <form action="" method="post" class="box">
            <p class="big"><?php echo $row['title'];?></p>            
        <?php

        $car=$row['category_id'];
        $selectCategories="SELECT * FROM `categories` WHERE `category_id` = $car;";
        $result3=$conn->query($selectCategories);

        foreach($result3 as $car) {


        ?>
        <p id="left">Category:<?php echo $car['name'];?></p>
        <?php
         }
        ?>
        <div class="center"><?php echo $row['news_text'];?></div>
        <p class="left1">Tags:</p>
         <?php 
         $notags="";
         $get_id=$_GET['View'];
         $SelectNewsTags="SELECT * FROM `news_tags` WHERE `news_id` = '$get_id';";
         $result4=$conn->query($SelectNewsTags);
        
        foreach($result4 as $r) {
            if($r){
            $id=$r['tag_id'];
            $SelectTagsid="SELECT * FROM `tags` WHERE `tag_id` ='$id'";
            $result5=$conn->query($SelectTagsid);
             
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
        
        </form>
        
        <?php
          }

        ?>

</div>

</section>
</body>
</html>