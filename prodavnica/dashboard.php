<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
    <link rel="stylesheet" href="acss.css">
</head>
<body>
    
<section class="dashboard">

    <h1 class="heading">Dashboard </h1>

    <div class="box-container">
    <div class="box">
       <h3>Dobrodosli!</h3>
       <p>Admin</p>
       <a href="update_profile.php" class="btn">Update Profile</a>

    </div>

    <div class="box">
        <?php
            $Ukupno=0;
            $q="SELECT * FROM `porudzbine` WHERE `status_kupovine` LIKE 'pending';";
            
            $result=$conn->query($q);
            $ROW=$result->fetch_assoc();
            if($result->num_rows){
                foreach($result as $r){
                    $Ukupno+=$ROW['ukupna_cena'];
                }
             } else{
                $Ukupno=0;
             }
          
        ?>
        <h3>€<span><?php echo $Ukupno ?></span><?php ?><span></span></h3>
        <p>Pending</p>
        <a href="placed_orders.php" class="btn"> Na cekanju</a>

        </div>
        <div class="box">
            <?php
                 $Ukupno1=0;
                 $q="SELECT * FROM `porudzbine` WHERE `status_kupovine` LIKE 'completed';";
                 
                 $result=$conn->query($q);
                 $ROW=$result->fetch_assoc();
                 
                 if($result->num_rows){
                    foreach($result as $r){
                        $Ukupno1+=$ROW['ukupna_cena'];
                    }
                 } else{
                    $Ukupno1=0;
                 }
                
            ?>

            <h3>
            €<?php echo $Ukupno1;?>
                <p>Completed</p>
                <a href="placed_orders.php" class="btn">Pogledaj</a>
            </h3>
        </div>

      

        
        <div class="box">
            <?php
                
                $sql = "SELECT * FROM `produkti`";
    
    if ($result = mysqli_query($conn, $sql)) {
    
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
        
     }
               
            ?>

            <h3>
                <?php echo $rowcount;?>
                <p>Dodati Proiz.</p>
                <a href="products.php" class="btn">Pogledaj proiz.</a>
            </h3>
        </div>
        
        <div class="box">
            <?php
                
                $sql = "SELECT * FROM `users`";
    
    if ($result = mysqli_query($conn, $sql)) {
    
        // Return the number of rows in result set
        $rowcount1 = mysqli_num_rows( $result );
        
        
     }
               
            ?>

            <h3>
                <?php echo $rowcount1;?>
                <p>Ukupno usera</p>
                <a href="users_accounts.php" class="btn">Pogledaj usere</a>
            </h3>
        </div>
        <div class="box">
            <?php
                
                $sql = "SELECT * FROM `admins`";
    
    if ($result = mysqli_query($conn, $sql)) {
    
        // Return the number of rows in result set
        $rowcount3 = mysqli_num_rows( $result );
        
        
     }
            ?>

            <h3>
                <?php echo $rowcount3;?>
                <p>Ukupno admina</p>
                <a href="admin_accounts.php" class="btn">Pogledaj admine</a>
            </h3>
        </div>

        <div class="box">
            <?php
                
                $sql = "SELECT * FROM `mail`";
    
    if ($result = mysqli_query($conn, $sql)) {
    
        // Return the number of rows in result set
        $rowcount4 = mysqli_num_rows( $result );
        
        
     }
              
            ?>

            <h3>
                <?php echo $rowcount4;?>
                <p>Ukupno poruka</p>
                <a href="admin_accounts.php" class="btn">Pogledaj poruke</a>
            </h3>
        </div>
    </div>
    

</section>

























<script src="admin_script.js"></script>
</body>
</html>