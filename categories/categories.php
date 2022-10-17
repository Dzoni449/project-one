<?php

require_once "../connect/connection.php";

require_once "../admin/admin_header.php";


if(!empty($_GET['deleteCategory'])){
    $deleteCategory=$_GET['deleteCategory'];

    $sql="DELETE FROM `categories` WHERE `category_id`='$deleteCategory';";
    $result=$conn->query($sql);
    $mess="Deleted category!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<h1>Categories</h1>

<a href="add_category.php" class="btn1">Add Category</a>


    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
        
        <?php

        $q="SELECT * FROM `categories`;";
        $result=$conn->query($q);

        foreach($result as $row){

        ?>
        <tr>
            <td><?php echo $row['category_id']?></td>
            <td><?php echo $row['name']?>  <a href="categories.php?deleteCategory=<?php echo $row['category_id'];?>"> <i class="fa fa-trash" id="can"></i></a> <a href="update_category.php?update=<?php echo $row['category_id'];?>"><i class="fa fa-pencil" id="pen"></i></td></a>
        <?php
             }
    
        ?>
        </tr>
    </table>

    
</body>
</html>