<?php

require_once "connection.php";
require_once "guest_header.php";

$greska="";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $pid=$_POST['pid'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $qty=$_POST['qty'];
    $val = true;

    $add_to_cart=$_POST['add_to_cart'];

    if($add_to_cart){
      header('Location: user_login.php');
    }

        
    
    }
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="user.css">
    <title>Shop

    </title>
</head>
<body>
    

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
     $sql = "SELECT * FROM `produkti`;";
     $result = $conn->query($sql);
     
     $row=$result->fetch_assoc();
     if($result->num_rows){
         foreach($result as $r){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?php echo $r['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $r['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $r['cena']; ?>">
      <input type="hidden" class="img" name="image" value="<?php echo $r['i_01']; ?>">
      <button  type="submit" name="add_to_wishlist"></button>
      
      <div class="car"><img src="uploaded_img/<?php echo $r['i_01']; ?>" alt="" class="img"></div>
      <div class="name"><?php echo $r['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?php echo $r['cena']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart"> <span><?php echo $greska;?></span>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>



<?php require_once "footer.php";?>
</body>
</html>