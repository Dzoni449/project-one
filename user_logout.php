<?php

require_once "connect/connection.php";


session_start();
session_unset();
session_destroy();


header('Location: login.php');
?>