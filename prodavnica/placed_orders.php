<?php
require_once "connection.php";
require_once "admin_header.php";



 $admin_id=$_SESSION['id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $order_id=$_POST['order_id'];
    $update_payment=$_POST['update_payment'];
    $payment_status=$_POST['payment_status'];

    $sql="UPDATE `porudzbine` SET `status_kupovine`='$payment_status' WHERE `id` = $order_id; ";
    $result=$conn->query($sql);
     
}

if(isset($_GET['delete'])){
 
    $delete_id=$_GET['delete'];
    $dp=("DELETE FROM `porudzbine` WHERE `id`= $delete_id");
   $result1=$conn->query($dp);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PProducts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="acss.css">
    
</head>
<body>
    


<section class="placed-orders">

    <h1 class="heading">placed orders</h1>


    <div class="box-container">

    

    <?php
    
        $q="SELECT * FROM `porudzbine`";
        $result=$conn->query($q);
        
        if($result->num_rows > 0){
            
        foreach ($result as $row){
    ?>
<div class="box">
<p> User Id <span><?php echo $row['user_id'];?></span></p>
    <p> Placed on <span><?php echo $row['datum']?></span></p>
    <p> Name <span><?php echo $row['name']?></span></p>
    <p> Email <span><?php echo $row['email']?></span></p>
    <p> Number <span><?php echo $row['broj']?></span></p>
    <p> Adress <span><?php echo $row['adresa']?></span></p>
   
    <p> Ukupno proizvoda <span><?php echo $row['kolicina_produkta']?></span></p>
    <p> Ukupna cena <span>€<?php echo $row['ukupna_cena']?>/-</span></p>
    <p> Metoda placanja <span><?php echo $row['slanje']?></span></p>
    <form action="#" method="post">
        <input type="hidden" name="order_id" value="<?php echo $row['id']?>">
        <select name="payment_status" class="drop-down">
            <option value="" selected disabled><?php echo $row['status_kupovine'] ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
        </select>
        <div class="flex-btn">
            <input type="submit" value="update" class="btn" name="update_payment">
            <a href="placed_orders.php?delete=<?= $row['id']; ?>" class="delete-btn">Delete</a>
        </div>
    </form>
</div>
    <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
     }
    
    ?>
</div>
</section>

    </body>
    </html> 


