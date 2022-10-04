<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}

if(isset($_GET['delete'])){

    $delete_id=$_GET['delete'];
    $dp=("DELETE FROM `users` WHERE `id`= $delete_id");
   $result1=$conn->query($dp);
   header('Location:users_accounts.php');
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
    
<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}

if(isset($_GET['delete'])){

    $delete_id=$_GET['delete'];
    $dp="DELETE FROM `admins` WHERE `id`= $delete_id";
    $dp.="DELETE FROM `porudzbine` WHERE `id`= $delete_id";
    $dp.="DELETE FROM `korpa` WHERE `id`= $delete_id";
    $dp.="DELETE FROM `wishlist` WHERE `id`= $delete_id";
    $dp.="DELETE FROM `mail` WHERE `id`= $delete_id";
   $result=$conn->multi_query($dp);
   
  header('Location:users_accounts.php');
   
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
    

<section class="accounts">

<h1 class="heading">
    user accounts
</h1>

    <div class="box-container">
        
   
        <?php
            $sqp="SELECT * FROM `users`";
            $result=$conn->query($sqp);
        
            if($result->num_rows>0){

                foreach ($result as $row){
        ?>
    <div class="box">
        <p>user id: <?php echo $row['id'];?></p>
        <p>user username: <?php echo $row['name'];?></p>
        
            
        <a href="users_accounts.php?delete=<?= $row['id']; ?>" class="delete-btn">Delete</a>
       
        
       
    </div>

        <?php
                }
        }else{
            echo '<p class="empty">no accounts</p>';
        }
        ?>
    </div>
</section>


    </body>
    </html> 





    </body>
    </html> 


