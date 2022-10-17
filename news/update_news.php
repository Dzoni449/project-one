<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";

$val=true;

$val=true;
$tError="";


$message=$message1='';




if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $title=$_POST['title'];
    $text=$_POST['textarea'];
    $category=$_POST['category'];
    $news_id=$_POST['news_id'];
    
    if($val){

        $sql="SELECT * FROM `news` WHERE `title` = '$title'";
        $result1=$conn->query($sql);
        if($result1->num_rows){
            $tError="You Must change to a different title!";
        }else{
            $q="UPDATE `news` SET `title`='$title',`news_text`='$text',`category_id`='$category',`updated_at`=NOW() 
            WHERE `news_id` = '$news_id';";
    
            $result=$conn->query($q);

            
    
            $message="Succesfully updated news!";
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
    <title>update news</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tiny.cloud/1/bguc0eejsrl28a9v81aq7id9cymo5u46ynqusm9miq2niy9i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
</head>
<body>
<div class="section">

        <div class="form-container1">
            <form action="" METHOD="POST">
            
                

                <?php
                    $update_news=$_GET['update'];
                     $q="SELECT * FROM `news` WHERE `news_id` = '$update_news';";
                     $result=$conn->query($q);
             
                     foreach($result as $row){
             
                ?>
                <input type="hidden" name="news_id" value="<?php echo $row['news_id'];?>">
                <?php
             }
    
        ?>
               
                <input type="text" name="title" placeholder="Enter new title"><span><?php echo $tError;?></span>
                <textarea name="textarea" id="mytextarea" ></textarea>

                <h2> Change Category</h2>

                <select name="category" id="subject">
                    <?php 
                        $q="SELECT * FROM `categories`;";
                        $result=$conn->query($q);
                        foreach($result as $row){
                    ?>
                <option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option>
                
                
                <?php
                        }
                ?>
                </select>

                
                
                <br>

 
                <input type="submit" value="  Update News  " class="btn">

                <p><?php echo $message;?></p>
                <p><?php echo $message1;?></p>
               
            </form>
            
            
        </div>
    </div>
</body>
</html>