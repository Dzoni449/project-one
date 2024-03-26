<?php

require_once "admin_header.php";

session_start();


if(!isset($_SESSION['id'])) {
   header('Location:../login.php');
}
$admin_id=$_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    

</body>
</html>