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
        $nameErr="Enter Category name!";
    }

    if($val){
        $q="SELECT * FROM `categories` WHERE `name` =  '$name'";
        $res=$conn->query($q);
        if($res->num_rows){
            $message="That category already exists";
        }else{   
       $q="INSERT INTO `categories`(`name`) 
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
    <title>Add</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
<div class="section">

        <div class="form-container">
            <form action="" method="POST">
                <p>Category Name:</p>
                <input type="text" name="name" placeholder="Enter Category Name:"><br>
                <span><?php echo $nameErr;?></span>
                <input type="submit" value="add category" class="btn">
                <p><?php echo $message;?></p>
            </form>
        </div>
</div>

</body>
</html>