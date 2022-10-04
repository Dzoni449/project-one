<?php

$servername="localhost";
$username="root";
$password="";
$db="radnja_db";


$conn = new mysqli($servername, $username, $password, $db);


if($conn->connect_error)
    {
        die("Neuspesna konekcija: " . $conn->connect_error);
    }
    $conn->set_charset('utf8');