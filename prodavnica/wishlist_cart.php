<?php

if(isset($_POST['add_to_wishlist'])){

        if($user_id==''){
            header('Location:user_login.php');
        }else{
            $pid=$_POST['pid'];
            $name=$_POST['name'];
            $price=$_POST['cena'];
            $image=$_POST['image'];

            $sql="SELECT * FROM `wishlist` WHERE `name` = $name AND `user_id` =$user_id;";
            $result=$conn->query($sql);

            $sql1="SELECT * FROM `korpa` WHERE `name` = $name AND `user_id` =$user_id;";
            $result1=$conn->query($sql1);

            if($result->num_rows > 0){
                $message[]='already added to wishlist!';
            } elseif($result1->num_rows > 0){
                $message[]='already added to cart!';
            }else{
                $sq="INSERT INTO `wishlist`(`user_id`, `product_id`, `name`, `cena`, `slika`)
                 VALUES ('$user_id','$pid','$name','$price','$image')";
                 $result=$conn->query($sq);
                 $message[]='added to wishlist!';
            }

        }
}

if(isset($_POST['add_to_cart'])){

    if($user_id==''){
        header('Location:user_login.php');
    }else{
        $pid=$_POST['pid'];
        $name=$_POST['name'];
        $price=$_POST['cena'];
        $image=$_POST['image'];
        $qty=$_POST['qty'];
     

      

        $sql1="SELECT * FROM `korpa` WHERE `name` = $name AND `user_id` =$user_id;";
        $result1=$conn->query($sql1);

       if($result1->num_rows > 0){
            $message[]='already added to cart!';
        }else{

            $sql="SELECT * FROM `wishlist` WHERE `name` = $name AND `user_id` =$user_id;";
            $result=$conn->query($sql);

            if($result->num_rows > 0){
                $dw="DELETE FROM `wishlist` WHERE `name` = $name AND `user_id` =$user_id;";
                $result2=$conn->query($dw);
            }
            $korpa="INSERT INTO `korpa`(`user_id`, `product_id`, `name`, `cena`,`kolicina`, `slika`)
             VALUES ('$user_id','$pid','$name','$price','$qty','$image')";
             $result=$conn->query($korpa);
             $message[]='added to korpa!';
        }

    }
}
?>