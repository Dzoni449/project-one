<?php

require_once "connect/connection.php";



session_start();

$val=true;
$error=$error2="";

if($_SERVER['REQUEST_METHOD']=="POST"){

  



    $username=$_POST['username'];
    $password=$_POST['password'];

    if(empty($username)){
        $val=false;
    }
    if(empty($password)){
        $val=false;
    }
    if($val){
        $q="SELECT * FROM `users` WHERE `email` = '$username' AND  `role` = 1";
        $result=$conn->query($q);
        $row1=$result->fetch_assoc();

        $sql="SELECT * FROM `users` WHERE `email` = '$username' AND  `role` = 0";
        $result1=$conn->query($sql);
        $row2=$result1->fetch_assoc();

        if($result->num_rows>0){
            if($password!=$row1['password']){
                $error2="Passwords dont match";
            }else{
                header('Location:admin/admin_dashboard.php');
            }
            
        }elseif($result1->num_rows>0){
            if(md5($password)!=$row2['password']){
                $error2="Passwords dont match";
            }else{
                $_SESSION['user_id'] = $row2['user_id'];
                header('Location:user_index.php');
               
            }
            
        }else{
            $error="User Does not exist";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="section">
        <div class="form-container">
            <form action="" METHOD="POST">
                <h3>
                    Login
                </h3>
                
                <input type="text" name="username" placeholder="Enter Email" id="back">
                <br>
                <input type="password" name="password" placeholder="Enter password">
                <input type="hidden" value="news_page.php?user_id=<?php echo $row2['user_id'];?>">
                <span><?php echo $error;?></span>
                <span><?php echo $error2;?></span>
                <br>
                <input type="hidden" value="news_page.php?user=<?php echo $user_id;?>">
                <input type="submit" value="  Login  " class="btn">
                <p>
            Dont have an account? <a href="user_register.php" class="option-btn">Register!</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>