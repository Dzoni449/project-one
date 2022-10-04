<?php




require_once "connection.php";

function textValidation($text) {
    if(empty($text)) {
        return "Enter value";
    }
    
    elseif(strlen($text) > 50) {
        return "Field must be less than 50 characters";
    }
    else {
        return false;
    }
}



function usernameValidation($username, $conn) {
    $q = "SELECT `username`
          FROM `users`
          WHERE `username` LIKE '$username'";

    $result = $conn->query($q);

    if(empty($username)) {
        return "Enter value";
    }
    elseif(preg_match("/\s/",$username)) {
        return "Username can't contains spaces";
    }
    elseif(strlen($username)<5 || strlen($username)>50) {
        return "Username must be between 5 and 50 characters";
    }
    elseif($result->num_rows) {
        return "The username you entered already exists";
    }
    else {
        return false;
    }
}

function passwordValidation($pass) {
    if(empty($pass)) {
        return "Enter value";
    }
    elseif(preg_match("/\s/",$pass)) {
        return "Password can't contains spaces";
    }
    elseif(strlen($pass)<5 || strlen($pass)>25) {
        return "Password must be between 5 and 25 characters";
    }
    else {
        return false;
    }
}

