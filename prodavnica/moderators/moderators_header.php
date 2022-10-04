<?php
require_once "../connection.php";
require_once "../log/index.php";
session_start();

 $moderator_id=$_SESSION['id'];

if(!isset($moderator_id)){
    header('Location:moderator_login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../acss.css">
    <title>Header</title>
</head>
<body>
    
<header class="header">

    <section class="flex">

    <a href="mdashboard.php" class="logo">Moderator <span>Panel</span></a>

        <nav class="navbar">
            <a href="mdashboard.php">
                Home
            </a>
            <a href="mproducts.php">
                Proizvodi
            </a>
            
            <a href="muser.php">
                User
            </a>
          
            <a href="mmail.php">
                Poruke
            </a>
            
        </nav>

        
    </section>
    <a href="mlogout.php" onlick="return confirm('logout from this website?');" class="delete-btn1">logout</a>
</header>


<script src="admin_script.js"></script>