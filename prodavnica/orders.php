<?php

include 'connection.php';

include 'user_header.php';

$user_id=$_SESSION['id'];


if(!isset($user_id)){
    header('Location:user_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="user.css">

</head>
<body>
   


<section class="orders">

   <h1 class="heading">placed orders</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = "SELECT * FROM `porudzbine` WHERE user_id = $user_id";
         $result=$conn->query($select_orders);
         
         $row=$result->fetch_assoc();
         if($result->num_rows){
            foreach($result as $r){
   ?>
   <div class="box">
      <p>placed on : <span><?php echo $r['datum']; ?></span></p>
      <p>name : <span><?php echo $r['name']; ?></span></p>
      <p>email : <span><?php echo $r['email']; ?></span></p>
      <p>number : <span><?php echo $r['broj']; ?></span></p>
      <p>address : <span><?php echo $r['adresa']; ?></span></p>
      <p>payment method : <span><?php echo $r['slanje']; ?></span></p>
      <p>your orders : <span><?php echo $r['kolicina_produkta']; ?></span></p>
      <p>total price : <span>$<?php echo $r['ukupna_cena']; ?>/-</span></p>
      <p> payment status : <span style="color:<?php if($r['status_kupovine'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $r['status_kupovine']; ?></span> </p>
   </div>
   <?php
   
      }
      
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      }
   ?>

   </div>

</section>













<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>