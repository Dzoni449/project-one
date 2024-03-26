<?php 

require_once "guest_header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="products">

        <h1 class="heading">News</h1>

            <div class="box-container">

            <?php
                $selectNews="SELECT * FROM `news`";
                $result=$conn->query($selectNews);

                foreach($result as $row) {
            ?>
                <form action="" method="post" class="box">
                    <p class="big"><?php echo $row['title'];?></p>
                    <div class="center"><?php echo $row['news_text'];?></div>
                <?php
                $car=$row['category_id'];
                $selectCategories="SELECT * FROM `categories` WHERE `category_id` = $car;";
                $result3=$conn->query($selectCategories);
                foreach($result3 as $car) {


                ?>
                <p id="left">Category:<?php echo $car['name'];?></p>
                <?php
                 }
                ?>
                    <a href="guest_news.php?View=<?php echo $row['news_id'];?>" class="ctg">Read more >></a>
                </form>
                
                <?php
                  }

                ?>

            </div>

</section>
</body>
</html>