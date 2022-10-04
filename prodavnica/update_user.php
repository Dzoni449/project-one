<?php
require_once "connection.php";

require_once "validation.php";

require_once "user_header.php";
 $user_id=$_SESSION['id'];



$successfulMsg = $newErr = $oldErr = $retypeErr = "";
$successful = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $old = $_POST['oldPassword'];
    $new = $_POST['newPassword'];
    $retype = $_POST['retypePassword'];

    
    $q = "SELECT * from `users` where `id` = $user_id";
    $res = $conn->query($q);
    $row = $res->fetch_assoc();
    if ($row['password'] != md5($old)) {
        $oldErr = "Old password does not match";
        $successful = false;
    }
    if (passValidation($new)) {
        $newErr = passValidation($new);
        $successful = false;
    }
    if ($new != $retype) {
        $retypeErr = "Passwords doesn't match";
        $successful = false;
    } else {
        $new = md5($new);
    }

    if ($successful) {
        $q = "UPDATE users
              SET password='$new'
              WHERE id=$user_id";
        $conn->query($q);
        $successfulMsg = "<p class='error'>U successfully changed your password</p>";
    }

       
}


?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
    <link rel="stylesheet" href="acss.css">
</head>
<body>
    


<section class="form-container">

    <form action="" method="POST">

        <h3>Update profile</h3>
        <p>Old password
        <input type="password" name="oldPassword" id=""  class="box">
        <span class="error">* <?php echo $oldErr; ?></span>
    </p>
    <p>Enter new password
        <input type="password" name="newPassword" id="" class="box">
        <span class="error">* <?php echo $newErr; ?></span>
    </p>
    <p>Retype password
        <input type="password" name="retypePassword" id="" class="box">
        <span class="error">* <?php echo $retypeErr; ?></span>
    </p>
    <br>
    <input type="submit" value="Change" class="btn">
    <p class="successful"><?php echo $successfulMsg; ?></p>
    </form>
</section>



















<script src="admin_script.js"></script>
</body>
</html>