<?php

require_once "connect/connection.php";

session_start();

$val=true;
$user_Error="";
$password_Error="";

if($_SERVER['REQUEST_METHOD']=="POST") {
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty($username)) {
        $val=false;
    }
    
    if(empty($password)) {
        $val=false;
    }

    if($val) {
        
        $SelectUser="SELECT * FROM `users` WHERE `email` = '$email'";
        $result=$conn->query($SelectUser);
        $row=$result->fetch_assoc();

        if($result->num_rows==0) {
            $user_Error="User dont exist!";
        } else {
            $db_Password=$row['password'];               
            if(sha1($password) == $db_Password) {

                if($row['role'] == 'admin') {     
                    $_SESSION['id'] = $row['user_id'];                                        
                    header('Location: admin/admin_dashboard.php');               
                } elseif ($row['role'] == 'user') {
                    $_SESSION['id'] = $row['user_id'];
                    header('Location:user_index.php');
                }
                else {
                    header('Location:login.php');
                }
                
            } else {
                $password_Error="Passwords dont match!";
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="section">
        <div class="form-container">
            <form action="" METHOD="POST">
                <h3>
                    Login
                </h3>
                
                <input type="text" name="email" placeholder="Enter Email" id="back">
                <span><?php echo $user_Error;?></span>
                <br>
                <input type="password" name="password" placeholder="Enter password">
                <input type="hidden" value="news_page.php?user_id=<?php echo $row2['user_id'];?>">
                
                <span><?php echo $password_Error;?></span>
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