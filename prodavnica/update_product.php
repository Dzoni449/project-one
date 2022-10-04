<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image_01=$_FILES['image_01'];
    $image_02=$_FILES['image_02'];
    $image_03=$_FILES['image_03'];
    $details=$_POST['details'];
    $pid=$_POST['pid'];


    $sql="UPDATE `produkti` SET `name`='$name',`detalji`='$details',`cena`='$price' WHERE `id` = $pid";

     $result=$conn->query($sql);

     $message[]='product updated';

     $stara_slika_01=$_POST['stara_slika_01'];
    $image_01=$_FILES['image_01']['name'];
    $image_01_size=$_FILES['image_01']['size'];
    $image_01_tmp_name=$_FILES['image_01']['tmp_name'];
    $image_01_folder='uploaded_img/'.$image_01;

    
           
        
    


    $stara_slika_02=$_POST['stara_slika_02'];
    $image_02=$_FILES['image_02']['name'];
    $image_02_size=$_FILES['image_02']['size'];
    $image_02_tmp_name=$_FILES['image_02']['tmp_name'];
    $image_02_folder='uploaded_img/'.$image_02;

    $stara_slika_03=$_POST['stara_slika_03'];
    $image_03=$_FILES['image_03']['name'];
    $image_03_size=$_FILES['image_03']['size'];
    $image_03_tmp_name=$_FILES['image_03']['tmp_name'];
    $image_03_folder='uploaded_img/'.$image_03;
    
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
    
    <section class="update-product">

    <h1 class="heading">Updatuj produkt</h1>
    <?php
    $update_id=$_GET['update'];
    $sql = "SELECT * FROM `produkti` WHERE `id` = $update_id;";
    $result = $conn->query($sql);
    
    $row=$result->fetch_assoc();
    if($result->num_rows==1){
        
    ?>

        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?php echo $row['id']?>">
        <input type="hidden" name="stara_slika_01" value ="<?php echo $row['i_01']?>">
        <input type="hidden" name="stara_slika_02" value ="<?php echo $row['i_02']?>">
        <input type="hidden" name="stara_slika_03" value ="<?php echo $row['i_03']?>">
            <div class="image-container">
                <div class="main-image">
                    <img src="uploaded_img/<?php echo $row['i_01']?>" alt="">
                </div>
                <div class="sub-image">
                    <img src="uploaded_img/<?php echo $row['i_01']?>" alt="">
                    <img src="uploaded_img/<?php echo $row['i_02']?>" alt="">
                    <img src="uploaded_img/<?php echo $row['i_03']?>" alt="">
                </div>
            </div>
        <span>Updatuj ime</span>
            <input type="text"  placeholder="enter product name" name="name"  class="box" value="<?php echo $row['name']?>">
            <span>Updatuj cenu</span>
            <input type="number" min="0" max="999999"  placeholder="enter product price" name="price"  class="box" value="<?php echo $row['cena']?>">
            <span>Update details</span>
            <textarea name="details" class="box" cols="30" rows="10" placeholder="Enter product details"  maxlength="500" value="<?php echo $row['detalji']?>"></textarea>
        
            
            <div class="flex-btn">
                <input type="submit" value="update" class="btn" name="update">
                <a href="products.php" class="option-btn">Idi nazad</a>
            </div>
        
        </form>

    <?php   
        
    }else{
        echo '  <p class="empty">no products added yet</p>';
    }
    ?>
    </section>

</div>
</section>






