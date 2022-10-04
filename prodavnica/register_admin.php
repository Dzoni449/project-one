<?php
require_once "connection.php";
require_once "admin_header.php";

require_once "validation.php";
 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}
    $usernameError=$passError="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retypepassword = $_POST['retypepassword'];
    
    $val = true;

   



        if(textValidation($username)) {
            $val = false;
            $usernameError = textValidation($username);
        }
        if(passwordValidation($password)) {
            $val = false;
            $passError = passwordValidation($password);
        }elseif($password!=$retypepassword){
            $passError="Passwords dont match";
            $val=false;
        }else{
            $password=md5($password);
        }


        if($val){
            $sql = "SELECT * FROM `admins` WHERE `name`= '$username';";
            $result = $conn->query($sql);
            if($result->num_rows) {
                $usernameError = "This username already exists!";
            }
            else {
               $q="INSERT INTO `admins`(`name`, `password`) 
               VALUES ('$username','$password')";

                $passError="New admin registered";
               $conn->query($q);
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
    <title>Register</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
    <link rel="stylesheet" href="acss.css">
</head>
<body>
    

<section class="form-container">

    <form action="" method="POST">

        <h3>Register now</h3>
        
        <input type="text" name="username" required placeholder="enter your username" class="box"><span>*<?php echo $usernameError?></span>
        <input type="password" name="password" required placeholder="enter your password" class="box"><span>*<?php echo $passError?>
        <input type="password" name="retypepassword" required placeholder="confirm your password" class="box"><span>*<?php echo $passError?>
        <input type="submit"  value="Register Now" name="submit" class="btn">
    </form>
</section>

<script src="admin_script.js"></script>
</body>
</html>