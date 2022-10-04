<?php

require_once "connection.php";
 include 'user_header.php'; 


$user_id=$_SESSION['id'];

if(!isset($user_id)){
    header('Location:user_login.php');
}


if(isset($_POST['delete'])){
    $cart_id = $_POST['cart_id'];
    $delete_cart_item = "DELETE FROM `korpa` WHERE user_id = $user_id AND `id` = $cart_id";
    $result=$conn->query($delete_cart_item);
 }
 
 if(isset($_GET['delete_all'])){
    
   $delete_cart_item = "DELETE FROM `korpa` WHERE user_id = $user_id";
   $result=$conn->query($delete_cart_item);
   header('location:cart.php');
}



if(isset($_POST['update_qty'])){
    $cart_id = $_POST['cart_id'];
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);
    $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
    $update_qty->execute([$qty, $cart_id]);
    $message[] = 'cart quantity updated';
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="user.css">

</head>
<body>
   


<section class="products shopping-cart">

   <h3 class="heading">shopping cart</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart="SELECT * FROM `korpa` WHERE user_id = $user_id";
      $result=$conn->query($select_cart);
      $row=$result->fetch_assoc();
      if($result->num_rows){
        foreach($result as $r){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="cart_id" value="<?php echo $r['id']; ?>">
     
      <img src="uploaded_img/<?php echo $r['slika']; ?>" alt="">
      <div class="name"><?php echo $r['name']; ?></div>
      <div class="flex">
         <div class="price">$<?php echo $r['cena']; ?>/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?php echo $r['kolicina']; ?>">
         <button type="submit" class="fas fa-edit" name="update_qty"></button>
      </div>
      <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ( $r['cena'] * $r['kolicina']); ?>/-</span> </div>
      <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p class="Povecaj">grand total : <span class="Povecaj">$<?php echo $grand_total; ?>/-</span></p>
      <a href="shop.php" class="option-btn">continue shopping</a>
      <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>













<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>