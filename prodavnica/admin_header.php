<?php
require_once "connection.php";
require_once "log/index.php";
session_start();

 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
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
    <title>Header</title>
</head>
<body>
    
<header class="header">

    <section class="flex">

    <a href="dashboard.php" class="logo">Admin <span>Panel</span></a>

        <nav class="navbar">
            <a href="dashboard.php">
                Home
            </a>
            <a href="products.php">
                Proizvodi
            </a>
            <a href="placed_orders.php">
                Korpa
            </a>
            <a href="users_accounts.php">
                User
            </a>
            <a href="admin_accounts.php">
                Admin
            </a>
            <a href="messages.php">
                Poruke
            </a>
        </nav>

        <div class="icons">
            <div id="meni-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            <?php
                
                $sql = "SELECT * FROM `admins` WHERE `id`=  $admin_id;";
                $result = $conn->query($sql);
            $row = $result->fetch_assoc();
           ?>
           <p><?php echo $row['name'];?></p>
           <a href="update_profile.php" class="btn">Update profile</a>
           <div class="flex-btn">
                <a href="admin_login.php" class="option-btn">login</a>
                <a href="register_admin.php" class="option-btn">register</a>
           </div>

           <a href="admin_logout.php" onlick="return confirm('logout from this website?');" class="delete-btn">logout</a>
        </div>
    </section>

</header>


<script src="admin_script.js"></script>