<?php
require_once "connection.php";


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

    <a href="homeg.php" class="logo">P<span>rodigy</span></a>

        <nav class="navbar">
            <a href="homeg.php">
                Home
            </a>
            <a href="aboutg.php">
                About
            </a>
            
            <a href="shopg.php">
                Shop
            </a>
       
        </nav>

        <div class="icons">

           


            <div id="meni-btn" ><i class="fas fa-bars"></i></div>
           
            
            <a href="wishlist.php" class="fas fa-heart"><span>(0)</span></a>
            <a href="cart.php" class="fas fa-shopping-cart"><span>(0)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
        
           <p>Guest</p>
           
           <div class="flex-btn">
                <a href="user_login.php" class="option-btn">login</a>
                <a href="user_register.php" class="option-btn">register</a>
           </div>

           <
           
        </div>
    </section>

</header>


<script src="admin_script.js"></script>