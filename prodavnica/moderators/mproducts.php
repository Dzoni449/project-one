<?php
require_once "../connection.php";
require_once "moderators_header.php";



 $moderator_id=$_SESSION['id'];

if(!isset($moderator_id)){
    header('Location:moderator_login.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image_01=$_FILES['image_01'];
    $image_02=$_FILES['image_02'];
    $image_03=$_FILES['image_03'];
    $details=$_POST['details'];

    $image_01=$_FILES['image_01']['name'];
    $image_01_size=$_FILES['image_01']['size'];
    $image_01_tmp_name=$_FILES['image_01']['tmp_name'];
    $image_01_folder='uploaded_img/'.$image_01;

    $image_02=$_FILES['image_02']['name'];
    $image_02_size=$_FILES['image_02']['size'];
    $image_02_tmp_name=$_FILES['image_02']['tmp_name'];
    $image_02_folder='uploaded_img/'.$image_02;

    $image_03=$_FILES['image_03']['name'];
    $image_03_size=$_FILES['image_03']['size'];
    $image_03_tmp_name=$_FILES['image_03']['tmp_name'];
    $image_03_folder='uploaded_img/'.$image_03;


    $sql = "SELECT * FROM `produkti` WHERE `name`= '$name';";
            $result = $conn->query($sql);
    
    
    if($result->num_rows==1){
        $message[]='product name already exists';
    }else{
        if($image_01_size > 200000 OR $image_02_size >200000 OR $image_03_size > 200000){
            $message[]='image size is to large';
        }else{

            move_uploaded_file($image_01_tmp_name, $image_01_folder);
            move_uploaded_file($image_02_tmp_name, $image_02_folder);
            move_uploaded_file($image_03_tmp_name, $image_03_folder);

        $q="INSERT INTO `produkti`( `name`, `detalji`, `cena`, `i_01`, `i_02`, `i_03`) 
        VALUES ('$name','$details','$price','$image_01','$image_02','$image_03')";

        $conn->query($q);

            $message[]='new product added!';
        }
       
    }
}

if(isset($_GET['delete'])){

    $delete_id=$_GET['delete'];
   $dpi=("SELECT * FROM `produkti` WHERE `id`=$delete_id");
   $result=$conn->query($dpi);
    $row=$result->fetch_assoc();

  

   $dp=("DELETE FROM `produkti` WHERE `id`= $delete_id");
   $result1=$conn->query($dp);

   $dc=("DELETE FROM `korpa` WHERE `product_id`= $delete_id");
   $result2=$conn->query($dp);

   $dw=("DELETE FROM `wishlist` WHERE `product_id`= $delete_id");
   $result3=$conn->query($dp);

   header('Location:products.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PProducts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
    
</head>
<body>
    

<section class="add-products">

    <form action="" method="POST" enctype="multipart/form-data">

    <div class="flex">
    <div class="inputbox">
            <span>product name (required)</span>
            <input type="text"  required placeholder="enter product name" name="name"  class="box">
        </div>
        <div class="inputbox">
            <span>product price (required)</span>
            <input type="number" min="0" max="999999" required placeholder="enter product price" name="price"  class="box">
        </div>
        <div class="inputbox">
            <span>
                image 01(required)
            </span>
            <input type="file" name="image_01" id="" class="box" accept="image/jpg,image/jpeg,image/png,image/webp" required>
        </div>

        <div class="inputbox">
            <span>
                image 02(required)
            </span>
            <input type="file" name="image_02" id="" class="box" accept="image/jpg,image/jpeg,image/png,image/webp" required>
        </div>

        <div class="inputbox">
            <span>
                image 03(required)
            </span>
            <input type="file" name="image_03" id="" class="box" accept="image/jpg,image/jpeg,image/png,image/webp" required>
        </div>

        <div class="inputbox">

            <span>Product details</span>
            <textarea name="details" class="box" cols="30" rows="10" placeholder="Enter product details" required maxlength="500"></textarea>
        </div>
        <input type="submit" value="add product" class="btn">
    </div>


    </form>
</section>


<section class="show-products">

<div class="box-container">
  
    <?php
    
    $sql = "SELECT * FROM `produkti`;";
    $result = $conn->query($sql);
    
    $row=$result->fetch_assoc();
    if($result->num_rows){
        foreach($result as $r){
    ?>
        
            <div class="box">
                <img src="../uploaded_img/<?php echo $r['i_01'];?>" alt="">
                <div class="name"><?php echo $r['name'];?></div>
                <div class="cena">€<?php echo $r['cena'];?>/-</div>
                <div class="detalji"><?php echo $r['detalji'];?></div>
                <div class="flex-btn">
                    <a href="update_product.php?update=<?= $r['id']; ?>" class="option-btn">Update</a>
                    <a href="products.php?delete=<?= $r['id']; ?>" class="delete-btn">Delete</a>
                </div>
            </div>

     <?php   
        }
    }else{
        echo '  <p class="empty">no products added yet</p>';
    }
    ?>
</div>
</section>






