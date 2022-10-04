<?php

require_once "connection.php";


require_once "validation.php";


$nameERR=$passError=$emailERR="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypepassword = $_POST['retypepassword'];
    
    $val = true;

   



        if(textValidation($username)) {
            $val = false;
            $usernameError =textValidation($username);
        }
        if(empty($email)) {
            $val = false;
            $emailERR = "Email cannot be left blank!";
        }
        if(passwordValidation($password)) {
            $val = false;
            $passError = "Password cannot be left blank!";
        }elseif($password!=$retypepassword){
            $passError="Passwords dont match";
            $val=false;
        }else{
            $password=md5($password);
        }


        if($val){
            $sql = "SELECT * FROM `users` WHERE `name`= '$name';";
            $result = $conn->query($sql);
            if($result->num_rows) {
                $nameERR = "This username already exists!";
            }
            else {
               $q="INSERT INTO `users`(`name`,`email`, `password`) 
               VALUES ('$name','$email','$password')";

                $passError="New user registered";
               $conn->query($q);
               header('Location:user_login.php');
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
</head>
<body>
    
<section class="form-container">

    <form action="" method="POST">

        <h3>Register now</h3>
        
        <input type="text" name="name" required placeholder="enter your name" class="box"><span>*<?php echo $nameERR?></span>
        <input type="email" name="email" required placeholder="enter your email" class="box"><span>*<?php echo $emailERR?></span>
        <input type="password" name="password" required placeholder="enter your password" class="box"><span>*<?php echo $passError?>
        <input type="password" name="retypepassword" required placeholder="retype your password" class="box"><span>*<?php echo $passError?>
        <p>already have an acc?</p>
        <a href="user_login.php" class="option-btn">Login now</a>
        <input type="submit"  value="Register Now" name="submit" class="btn">
    </form>
</section>

</body>
</html>