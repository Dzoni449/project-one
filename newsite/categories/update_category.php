<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";

$val=true;
$nameERR="";
$success="";

if($_SERVER['REQUEST_METHOD']=="POST") {
        $name=$_POST['name'];
        $category_id=$_POST['category'];
   
    if(empty($name)) {
        $val=false;
        $nameERR="Enter new name!";
    }

    if($val) {
        $UpdateCategories="UPDATE `categories` 
        SET `name`='$name' WHERE `category_id` = '$category_id';" ;
        $result=$conn->query($UpdateCategories);

        $success="Succesfully changed name!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   


<div class="section">
        <div class="form-container">
            <form action="" METHOD="POST">
            <h1>Update Category </h1>
                

                <?php
                    $update_category=$_GET['update'];
                    $SelectCategories="SELECT * FROM `categories` WHERE `category_id` = '$update_category';";
                    $result=$conn->query($SelectCategories);
             
                    foreach($result as $row) {
             
                ?>
                <input type="hidden" name="category" value="<?php echo $row['category_id'];?>">
                
                <input type="text" name="name" placeholder="Enter New Name"> <br>
                <p id="small"><?php echo $nameERR;?></p>
                <br>
                <input type="submit" value="  Update Category  " class="btn">

                <p><?php echo $success;?></p>
               
            </form>
            <?php
             }
    
        ?>
        </div>
    </div>
</body>
</html>