<?php
require_once "../connect/connection.php";

require_once "../admin/admin_header.php";

require '../sendgrid/vendor/autoload.php'; 

require_once "../sendgrid/config.php";

$val=true;
$tError="";


$message='';




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $tags=$_POST['tag'];
    $title=$_POST['title'];
    $text=$_POST['textarea'];
    $cat_id=$_POST['category'];
    

    if($val){

        $sql="SELECT * FROM `news` WHERE `title` = '$title'";
        $result1=$conn->query($sql);
        if($result1->num_rows){
            $tError="That title already exists!";
        }else{
            $q="INSERT INTO `news`( `title`, `news_text`, `category_id`, `created_at`,`updated_at`) 
            VALUES ('$title','$text','$cat_id',NOW(),NOW());";
    
            $result=$conn->query($q);

            
    
            $message="Succesfully added news!";


          

            

                     }
        
        if(isset($_POST['submit'])){
            if(!empty($_POST['tag'])){
                foreach($_POST['tag'] as $language){
                    $sql="SELECT * FROM `news` WHERE `title` = '$title';";
                    $result1=$conn->query($sql);
                    $row=$result1->fetch_assoc();
                    $id=$row['news_id'];

                    $sql2="INSERT INTO `news_tags`( `news_id`, `tag_id`) 
                    VALUES ('$id','$language'); ";
                    $result3=$conn->query($sql2);

                }
            }else{
                //
            }

            
            
        }

        if(isset($_POST['submit'])){
            $cat_id=$_POST['category'];
            $sql="SELECT `name` FROM `categories` WHERE `category_id` = '$cat_id'; ";
            $result1=$conn->query($sql);

           
            
            foreach($result1 as $row){
                $catname= $row['name'];

                $sql1="SELECT `user_id` FROM `users_subscribed_categories` WHERE `category_id` = '$cat_id';";
                $result2=$conn->query($sql1);
                $row=$result2->fetch_assoc();
                foreach($result2 as $row1){
                    $id= $row1['user_id'];

                $sql2="SELECT `email` FROM `users` WHERE `user_id` = '$id';";
                $result3=$conn->query($sql2);
                $row1=$result3->fetch_assoc();
                foreach($result3 as $r){
                    $email1= $row1['email'];

                    $api="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";
                    $email = new \SendGrid\Mail\Mail(); 
                    $email->setFrom("nikolastevanovic449@gmail.com", "Nikola");
                    $email->setSubject("News");
                    $email->addTo($email1,"Nikola");
                    $email->addContent("text/plain", "Poštovani,
    
                    Objavili smo vest kategorije `$catname` kojoj ste se pretplatili.
    
                    Vest mozete pročitati na sledećem linku  http://localhost/news/user_index.php
    
                    S poštovanjem,
    
                    Redakcija");
    
                    $sendgrid = new \SendGrid($api);
                    try {
                     $response = $sendgrid->send($email);
                     //print $response->statusCode() . "\n";
                    //print_r($response->headers());
                    //print $response->body() . "\n";
                    } catch (Exception $e) {
                     //echo 'Caught exception: '. $e->getMessage() ."\n";
                    }   
                }
    
                        
                    
                    
                }
                
                
                

               

                
            

           
           
           
           


            }    
           
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
    <title>Add news</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tiny.cloud/1/bguc0eejsrl28a9v81aq7id9cymo5u46ynqusm9miq2niy9i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


</head>
<body>
    
<div class="section">
        
        <div class="form-container1">
            <form action="" method="POST">
                <h2>Add News</h2>
                <input type="text" name="title" placeholder="Enter news title">
                <textarea name="textarea" id="mytextarea" ></textarea>

                <h2>Categories</h2>: 
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
                <h2>Select Tags</h2>
                <?php
                    $q="SELECT * FROM `tags`;";
                    $result=$conn->query($q);
                    foreach($result as $row){
                ?>
                
                <label class="checkbox" >

                <input type="checkbox" name="tag[]" multiple value="<?php echo $row['tag_id'];?>"><?php echo $row['name'];?>
                </label>
                <?php
                    }
                ?>
                
                <input type="submit" name="submit" value="Add News" class="btn">
                
                <p><?php echo $message;?></p>
                <p><?php echo $tError;?></p>
            </form>
        </div>
</div>

</body>
</html>