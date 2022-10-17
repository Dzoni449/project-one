<?php



require_once "./connect/connection.php";





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



function emailValidation($email, $conn) {
    $q = "SELECT *
          FROM `users`
          WHERE `email` LIKE '$email'";

    $result = $conn->query($q);

    if(empty($email)) {
        return "Enter value";
    }
    elseif(preg_match("/\s/",$email)) {
        return "Username can't contains spaces";
    }
    elseif($result->num_rows) {
        return "The email you entered already exists";
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

