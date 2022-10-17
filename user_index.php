<?php 

require_once "user_header.php";



$id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    


        
       
      
        

   

   

  





    <section class="products">

        <h1 class="heading">News</h1>

            <div class="box-container">

            <?php
                $q="SELECT * FROM `news`";
                $result=$conn->query($q);

                foreach($result as $row){
   
   

            ?>
                <form action="" method="post" class="box">
                    <p class="big"><?php echo $row['title'];?></p>
                    <div class="center"><?php echo $row['news_text'];?></div>
                <?php
                $car=$row['category_id'];
                $sql="SELECT * FROM `categories` WHERE `category_id` = $car;";
                $result3=$conn->query($sql);
                foreach($result3 as $car){


                ?>
                <p id="left">Category:<?php echo $car['name'];?></p>
                <?php
                 }
                ?>
                    <a href="news_page.php?View=<?php echo $row['news_id'];?>" class="ctg">Read more >></a>
                </form>
                
                <?php
                  }

                ?>

</div>

</section>
                </body>
</html>