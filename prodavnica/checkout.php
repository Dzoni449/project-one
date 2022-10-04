<?php

include 'connection.php';
 
include 'user_header.php';

$user_id=$_SESSION['id'];

$message="";
if(!isset($user_id)){
    header('Location:user_login.php');
}

if(isset($_POST['order'])){

   $name = $_POST['name'];
  
   $number = $_POST['number'];

   $email = $_POST['email'];
   
   $method = $_POST['method'];

   $address = 'flat no. '. $_POST['flat'] .', '. $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
  
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = "SELECT * FROM `korpa` WHERE user_id = $user_id";
   $result=$conn->query($check_cart);

   if($result->num_rows){

      $insert_order = "INSERT INTO `porudzbine`( `user_id`, `name`, `broj`, `email`, `slanje`, `adresa`, `kolicina_produkta`, `ukupna_cena`) 
      VALUES ($user_id,'$name','$number','$email','$method','$address','$total_products','$total_price');";
      $result=$conn->query($insert_order);
      $delete_cart ="DELETE FROM `korpa` WHERE user_id = $user_id";
      $result1=$conn->query($insert_order);

      $message = 'order placed successfully!';
   }else{
      $message = 'your cart is empty';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="user.css">

</head>
<body>
   


<section class="checkout-orders">

   <form action="" method="POST">

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = "SELECT * FROM `korpa` WHERE user_id = $user_id";
         $result=$conn->query($select_cart);
         $row=$result->fetch_assoc();
         if($result->num_rows){
            foreach($result as $r){
      ?>
         <p> <?php echo $r['name']; ?> <span>(<?= '$'.$r['cena'].'/- x '. $r['kolicina']; ?>)</span> </p>
      <?php
      $total_products=$r['kolicina'];
      $sub_total = ( $r['cena'] * $r['kolicina']);
      $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?php echo  $total_products; ?>">
         <input type="hidden" name="total_price" value="<?php echo $grand_total; ?>" value="">
         <div class="grand-total">grand total : <span>$<?php echo $grand_total; ?>/-</span></div>
      </div>

      <h3>place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paytm">paytm</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>address line 02 :</span>
            <input type="text" name="street" placeholder="e.g. street name" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" placeholder="e.g. mumbai" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" placeholder="e.g. maharashtra" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" placeholder="e.g. India" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order"><span><?php echo $message;?></span>

   </form>

</section>













<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>