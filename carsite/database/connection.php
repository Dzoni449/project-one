<?php

$servername="localhost";
$username="root";
$password="";
$db="euro-018";


$con = new mysqli($servername, $username, $password, $db);


if($con->connect_error)
    {
        die("Neuspesna konekcija: " . $con->connect_error);
    }
    $con->set_charset('utf8');