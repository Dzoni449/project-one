<?php 

require_once "user_header.php";
require_once "connect/connection.php";
  
$val=true;
$id = $_SESSION['user_id'];
$sub="";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriptions</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="products">
    <div class="box-container">

    <?php
        $selectSubscribed="SELECT * FROM `users_subscribed_categories` WHERE `user_id` = '$id';";
        $result=$conn->query($SelectSubscribed);
       
        foreach($result as $row) {
        $cat_id=$row['category_id'];      
        ?>
        <form action="" method="POST" class="box">
    <?php
        $selectCategory="SELECT * FROM `categories` WHERE `category_id`= '$cat_id';";
        $result=$conn->query($selectCategory);
        foreach($result as $row2) {
    ?>
            <p class="big"><?php echo $row2['name'];?></p>        
            <input type="submit" name="submit" value="<?php echo "Subscribed to this category!"?>" class="btn2">       
    <?php
     }    
      
    ?>   
        </form>
    <?php
     }    
      
    ?>       
        </form>
</div>
</section>
</body>
</html>