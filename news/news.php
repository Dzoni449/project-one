<?php

require_once "../connect/connection.php";

require_once "../admin/admin_header.php";


if(!empty($_GET['deleteNews'])){
    $delete_id=$_GET['deleteNews'];

    $sql="DELETE FROM `news_tags` WHERE `news_id` = $delete_id;";
    

    
    $result=$conn->query($sql);

    $sql1="DELETE FROM `news` WHERE `news_id` = $delete_id;";
    $result1=$conn->query($sql1);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<h1>News</h1>

<a href="add_news.php" class="btn1">Add News</a>


    <table class="news">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>News Text</th>
            <th>Category id</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
            <th></th>
        </tr>
        
        <?php

        $q="SELECT * FROM `news`;";
        $result=$conn->query($q);

        foreach($result as $row){

        ?>
        <tr>
            <td><?php echo $row['news_id'];?></td>
            <td><?php echo $row['title'];?>  </td>
            <td><?php echo $row['news_text'];?></td>
            <td><?php echo $row['category_id'];?></td>
            <td><?php echo $row['created_at'];?></td>
            <td><?php echo $row['updated_at']?> </td>
            <td> <a href="update_news.php?update=<?php echo $row['news_id'];?>"><i class="fa fa-pencil" id="pen"></i></a></td>
            <td><a href="news.php?deleteNews=<?php echo $row['news_id'];?>"> <i class="fa fa-trash" id="can"></i></a></td>
       <?php
             }
    
        ?>
        </tr>
    </table>

    
</body>
</html>