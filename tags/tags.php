<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";


if(!empty($_GET['deleteTags'])){
    $tag_Id=$_GET['deleteTags'];

    $q="DELETE FROM `tags` WHERE `tag_id` = '$tag_Id';";
    $result=$conn->query($q);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<h1>Tags</h1>

<a href="add_tags.php" class="btn1">Add Tags</a>


    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
        
        <?php

        $q="SELECT * FROM `tags`;";
        $result=$conn->query($q);

        foreach($result as $row){

        ?>
        <tr>
            <td><?php echo $row['tag_id']?></td>
            <td><?php echo $row['name']?>  <a href="tags.php?deleteTags=<?php echo $row['tag_id'];?>"> <i class="fa fa-trash" id="can"></i></a> <a href="update_tags.php?update=<?php echo $row['tag_id'];?>"><i class="fa fa-pencil" id="pen"></i></td></a>
        <?php
             }
    
        ?>
        </tr>
    </table>

    
</body>
</html>