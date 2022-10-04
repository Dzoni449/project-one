<?php

require_once "connection.php";

require_once "guest_header.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $pid=$_POST['pid'];
    $name=$_POST['name'];
    $cena=$_POST['cena'];
    $image=$_POST['image'];
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
    
    <title>Home

    </title>
</head>
<body>
    
    
<div class="home-bg">
    <section class="home">
        <div class="w">

        <div class="slide">

            <div class="image">
                <img src="uploaded_img/pc1.png" alt="#" >
            </div>
            <div class="contect">
                <span>upto 50% off</span>
                <h3>Pc Number 1</h3>
                <a href="shop.php" class="btn" >shop now</a>
            </div>
        </div>

        <div class="slide">

            <div class="image">
                <img src="uploaded_img/pc2.png" alt="#">
            </div>
            <div class="contect">
                <span>upto 50% off</span>
                <h3>Pc Number 2</h3>
                <a href="shop.php" class="btn">shop now</a>
            </div>
        </div>

        <div class="slide">

            <div class="image">
                <img src="uploaded_img/pc3.png" alt="#">
            </div>
            <div class="contect">
                <span>upto 50% off</span>
                <h3>Pc Number 3</h3>
                <a href="shop.php" class="btn">shop now</a>
            </div>
            </div>
            <div class="slide">

            <div class="image">
                <img src="uploaded_img/pc4.png" alt="#">
            </div>
            <div class="contect">
                <span>upto 50% off</span>
                <h3>Pc Number 4</h3>
                <a href="shop.php" class="btn">shop now</a>
            </div>
        </div>

        </div>


        </div>
    </section>
</div>

<section class="home-products">
    <h1 class="heading">Poslednje dodato</h1>
    <div class="products-slider">
        <div class="w">
<?php
 $q="SELECT * FROM `produkti`";
 $result=$conn->query($q);
 
 if($result->num_rows > 0){
     
 foreach ($result as $row){
?>

<form action="" method="POST" class="slide">
    <input type="hidden" name="pid" value="<?php echo $row['id'];?>">
    <input type="hidden" name="name" value="<?php echo $row['name'];?>">
    <input type="hidden" name="cena" value="<?php echo $row['cena'];?>">
    <input type="hidden" name="image" value="<?php echo $row['i_01'];?>">
    
   
    <img src="uploaded_img/<?php echo $row['i_01'];?>" alt="" class="image">
    <div class="name"><?php echo $row['name']?></div>
    <div class="flex">
        <div class="price">€<span><?php echo $row['cena']?></span></div>
        <input type="number" name="qty" class="qty" min="1" max="99" value="1">
    </div>
    <a href="user_login.php"><input type="submit" value="dodaj u wishlist" name="add_to_cart" class="btn"></a>

    

</form>


<?php
        }
    }else{
        echo '<p class="empty">no products added yet!</p>';
     }
    
    ?>
        </div>
    </div>
</section>



<?php require_once "footer.php";?>
</body>
</html>