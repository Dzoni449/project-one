<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}

if(isset($_GET['delete'])){
 
    $delete_id=$_GET['delete'];
    $dp=("DELETE FROM `mail` WHERE `id`= $delete_id");
   $result1=$conn->query($dp);
   header('Location:messages.php');
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
    
<section class="messages">

    <h1 class="heading">New Massages</h1>
    <div class="box-container">

    <?php

    $spl="SELECT * FROM `mail`";
    $result=$conn->query($spl);
    if($result->num_rows>0){

        foreach ($result as $row){
?>
        <div class="box">
            <p>user id: <span><?php echo $row['id']?></span></p>
            <p>user name: <span><?php echo $row['name']?></span></p>
            <p>user number: <span><?php echo $row['broj']?></span></p>
            <p>user email: <span><?php echo $row['email']?></span></p>
            <p>user mail: <span><?php echo $row['poruka']?></span></p>
            <a href="messages.php?delete=<?= $row['id']; ?>" class="delete-btn">Delete</a>
       
        </div>

    <?php
        }
    }else{
        echo "<p class='empty'>No messages</p>";
    }
    
    ?>
    </div>
</section>

    </body>
    </html> 


