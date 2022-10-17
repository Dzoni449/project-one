<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";

$val=true;
$nameErr="";
$message="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];

    if(empty($name)){
        $val=false;
        $nameErr="Enter Tag name!";
    }

    if($val){
        $q="SELECT * FROM `tags` WHERE `name` =  '$name'";
        $res=$conn->query($q);
        if($res->num_rows){
            $message="That tag already exists";
        }else{
        $q="INSERT INTO `tags`(`name`) 
        VALUES ('$name');";
        $result=$conn->query($q);
        $message="Succesfully added category!";
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    

<div class="section">

        <div class="form-container">
            <form action="" method="POST">
                <p>Tag Name:</p>
                <input type="text" name="name" placeholder="Enter Tag Name:"><br>
                <span><?php echo $nameErr;?></span>
                <input type="submit" value="add Tag" class="btn">
                <p><?php echo $message;?></p>
            </form>
        </div>
</div>
</body>
</html>