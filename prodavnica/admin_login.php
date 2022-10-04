<?php

require_once "connection.php";


session_start();

$usernameError=$passError="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    
    $val = true;





        if(empty($username)) {
            $val = false;
            $usernameError = "Username cannot be left blank!";
        }
        if(empty($password)) {
            $val = false;
            $passError = "Password cannot be left blank!";
        }else{
            $pass=md5($password);
        }
        if($val){
            $sql = "SELECT * FROM `admins` WHERE `name`= '$username';";
            $result = $conn->query($sql);
            if($result->num_rows == 0) {
                $usernameError = "This username doesn't exist!";
            }
            else {
                // Postoji korisnicko ime, treba proveriti sifre
                $row = $result->fetch_assoc();
                $dbPass = $row['password'];
                if($dbPass != md5($password)) {
                    $passError = "Incorrect password!";
                }
                else {
                    // ovde vrsimo logovanje
                    
                    $_SESSION['id'] = $row['id']; 
                    
                    header('Location: dashboard.php');
                }
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

        <h3>Login now</h3>
        
        <input type="text" name="username" required placeholder="enter your username" class="box"><span>*<?php echo $usernameError?></span>
        <input type="password" name="password" required placeholder="enter your password" class="box"><span>*<?php echo $passError?>
        <input type="submit"  value="login" name="submit" class="btn">
    </form>
</section>

</body>
</html>