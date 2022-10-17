<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";

$val=true;
$nameERR=$success="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
   $tag_id=$_POST['tag'];
   
    if(empty($name)){
        $val=false;
        $nameERR="Enter new name!";
    }

    if($val){
       

      
            $q="UPDATE `tags` 
            SET `name`='$name' WHERE `tag_id` = '$tag_id';" ;
            $result=$conn->query($q);

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
    <title>Update Tags</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   


<div class="section">
        <div class="form-container">
            <form action="" METHOD="POST">
            <h1>Update Tag </h1>
                

                <?php
                    $update_tags=$_GET['update'];
                     $q="SELECT * FROM `tags` WHERE `tag_id` = '$update_tags';";
                     $result=$conn->query($q);
             
                     foreach($result as $row){
             
                ?>
                <input type="hidden" name="tag" value="<?php echo $row['tag_id'];?>">
                
                <input type="text" name="name" placeholder="Enter New Name"> <br>
                <p id="small"><?php echo $nameERR;?></p>
                <br>
                <input type="submit" value="  Update Tag  " class="btn">

                <p><?php echo $success;?></p>
               
            </form>
            <?php
             }
    
        ?>
        </div>
    </div>
</body>
</html>