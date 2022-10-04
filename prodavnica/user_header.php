<?php
require_once "connection.php";
require_once "log/index.php";
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="acss.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Header</title>
</head>
<body>
    
<header class="header">

    <section class="flex">

    <a href="home.php" class="logo">P<span>rodigy</span></a>

        <nav class="navbar" >
            <a href="home.php">
                Home
            </a>
            <a href="about.php">
                About
            </a>
            <a href="orders.php">
                Orders
            </a>
            <a href="shop.php">
                Shop
            </a>
       
        </nav>

        <div class="icons">

            <?php
            
            $sql = "SELECT * from `wishlist` WHERE `user_id` = $user_id;";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    
 }
            

            
            ?>

<?php
            
            $sql1 = "SELECT * from `korpa` WHERE `user_id` = $user_id;";

if ($result1 = mysqli_query($conn, $sql1)) {

    // Return the number of rows in result set
    $rowcount1 = mysqli_num_rows( $result1 );
    
    
 }
            
            ?>

            <div id="meni-btn" ><i class="fas fa-bars"></i></div>
           
            
            <a href="wishlist.php" class="fas fa-heart"><span>(<?php echo $rowcount;?>)</span></a>
            <a href="cart.php" class="fas fa-shopping-cart"><span>(<?php echo $rowcount1;?>)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
        <?php
                
                $sql = "SELECT * FROM `users` WHERE `id`=  $user_id;";
                $result = $conn->query($sql);
            $row = $result->fetch_assoc();
           ?>
           <p><?php echo $row['name'];?></p>
           <a href="update_user.php" class="btn">Update profile</a>
           <div class="flex-btn">
                <a href="user_login.php" class="option-btn">login</a>
                <a href="user_register.php" class="option-btn">register</a>
           </div>

           <a href="user_logout.php" onlick="return confirm('logout from this website?');" class="delete-btn">logout</a>
           
        </div>
    </section>

</header>


<script src="admin_script.js"></script>