<?php
require_once "connect/connection.php";
require_once "validation/validation.php";

$val=true;
$emailErr="*";
$passERR="*";
$first_nameERR="*";
$last_nameERR="*";
$retypepasswordERR="*";
$existsError="*";

if($_SERVER['REQUEST_METHOD']=="POST") {

    $email=$_POST['email'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    
   if(emailValidation($email,$conn)) {
    $emailErr=emailValidation($email,$conn);
    $val=false;
   }

   if(passwordValidation($password)) {
    $passERR=passwordValidation($password);
    $val=false;
   } else {
    $password=sha1($password);
   }
   
   if(textValidation($last_name)) {
    $last_nameERR=textValidation($last_name);
    $val=false;
   }
   
   if(textValidation($first_name)) {
    $first_nameERR=textValidation($first_name);
    $val=false;
   }

   if($val) {
        $selectUserEmail="SELECT * FROM `users` WHERE `email` = '$email'";
        $result=$conn->query($selectUserEmail);
        $row=$result->fetch_assoc();
        if($result->num_rows>0) {
            $existsError="Email is already registered!";
        } else {
            $insertUser="INSERT INTO `users`( `email`, `password`, `first_name`, `last_name`, `role`) 
            VALUES ('$email','$password','$first_name','$last_name','user') ;";
            $res=$conn->query($insertUser);
            $existsError="Successfull!";
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="section">
        <div class="form-container">
            <form action="" METHOD="POST">
                <h3>
                    Register
                </h3>
                <input type="email" name="email" placeholder="Enter Email"> <span><?php echo $emailErr;?></span>    <br>
                <input type="password" name="password" placeholder="Enter password"><span><?php echo $passERR;?></span> <br>
               
                <input type="text" name="first_name" placeholder="Enter First Name"><span><?php echo $first_nameERR;?></span> <br>
                <input type="text" name="last_name" placeholder="Enter Last Name"><span><?php echo $last_nameERR;?></span> 

                
                <br>
                <input type="submit" value="  Register  " class="btn">
                <p><?php echo $existsError;?></p>
                <p>
            Already have an account? <a href="login.php" class="option-btn">Login!</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>