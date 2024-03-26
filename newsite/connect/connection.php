<?php


$servername="localhost";
$username="root";
$password="";
$db="news_db";


$conn=new mysqli($servername,$username,$password,$db);



if($conn->error) {
    die("Error while connecting to db!");
} else{
   
}