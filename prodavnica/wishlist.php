<?php

require_once "connection.php";
include "user_header.php";




$user_id=$_SESSION['id'];

if(!isset($user_id)){
    header('Location:user_login.php');
}


if(isset($_POST['delete'])){
    
    $delete_cart_item = "DELETE FROM `wishlist` WHERE user_id = $user_id";
    $result=$conn->query($delete_cart_item);
 }
 




if(isset($_POST['submit'])){
    $pid=$_POST['pid'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $qty=$_POST['qty'];
    

    $sql="SELECT * FROM `korpa` WHERE `product_id`=$pid AND `user_id` = $user_id;";
            $result = $conn->query($sql);

            if($result->num_rows!=0){
            $greska="Vec dodato";
            }else{
            $q="INSERT INTO `korpa`( `user_id`, `product_id`, `name`, `cena`, `kolicina`, `slika`) 
            VALUES ('$user_id','$pid','$name','$price','$qty','$image')";
            $result = $conn->query($q);
            $greska = "added";}
 }
if(isset($_GET['delete'])){

    $delete_id=$_GET['delete'];
    $wishlist_id = $_POST['wishlist_id'];
    $delete_wishlist_item ="DELETE FROM `wishlist` WHERE user_id = $user_id";
    $result=$conn->query($delete_wishlist_item);

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Wishlist

    </title>
</head>
<body>
    
<section class="products">
    <h1 class="heading">Your wishlist</h1>

    <div class="box-container">
        <?php
        
            $aq="SELECT * FROM `wishlist` WHERE `user_id` =$user_id";
            $result=$conn->query($aq);

            $row=$result->fetch_assoc();
    if($result->num_rows){
        foreach($result as $r){
        ?>
           <form action="" method="POST" class="box">
           <input type="hidden" name="pid" value="<?php echo $r['product_id'];?>">
      <input type="hidden" name="wishlist_id" value="<?php echo $r['id'];?>">
      <input type="hidden" name="name" value="<?php echo $r['name'];?>">
      <input type="hidden" name="price" value="<?php echo $r['cena'];?>">
      <input type="hidden" name="image" value="<?php echo $r['slika'];?>">
        
            <img src="uploaded_img/<?php echo $r['slika'];?>" alt="dada" class="image">
                <div class="name"><?php echo $r['name'];?></div>
                <div class="flex">
                <div class="price"><span><?php echo $r['cena'];?></span></div>
                <input type="number" class="qty" name="qty">
                </div>
                <input type="submit" name="submit" value="add to cart" class="btn">
                <input type="submit" name="delete" value="delete" class="delete-btn">
           </form>
<?php   
        }
    }else{
        echo '  <p class="empty">no wishlist items added yet</p>';
    }
    ?>
    </div>
</section>

<?php require_once "footer.php";?>
</body>
</html>