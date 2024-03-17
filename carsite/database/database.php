<?php

require_once "connection.php";

$sql ="CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone INT(10),
    password VARCHAR(50) NOT NULL,
    role_as TINYINT NOT NULL DEFAULT '0', 
    PRIMARY KEY(id)
)ENGINE=InnoDB;";

$sql .="CREATE TABLE IF NOT EXISTS categories(
    category_id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    PRIMARY KEY(category_id)
)ENGINE=InnoDB;";


$sql .= "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id INT,
    sifra INT(30) NOT NULL,
    image_path VARCHAR(255),
    description TEXT,  -- Dodata nova kolona za opis
    cena INT(100) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
) ENGINE=InnoDB;";

$sql .= "CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT
);";


if($con->multi_query($sql)) {
    do {
        // hvatanje svake pojedinačne izlazne poruke
        if ($result = $con->store_result()) {
            $result->free();
        }
        if ($con->more_results()) {
            echo "Uspešno izvršeni upiti<br>";
        }
    } while ($con->next_result());
} else{
    echo "Greška prilikom izvršenja upita: " . $con->error;
}
?>
