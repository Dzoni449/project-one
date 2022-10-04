<?php

require_once "connection.php";

$sql="CREATE TABLE IF NOT EXISTS admins(
        id INT AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        password VARCHAR(50) NOT NULL,
        PRIMARY KEY(id)

) ENGINE=InnoDB;";

$sql .="CREATE TABLE IF NOT EXISTS produkti(
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    detalji VARCHAR(500) NOT NULL,
    cena INT(10) NOT NULL,
    i_01 VARCHAR(100) NOT NULL,
    i_02 VARCHAR(100) NOT NULL,
    i_03 VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB;";


$sql .="CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB;";

$sql .="CREATE TABLE IF NOT EXISTS korpa(
        id INT AUTO_INCREMENT,
        user_id INT NOT NULL,
        product_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        cena INT(10) NOT NULL,
        kolicina INT(10) NOT NULL,
        slika VARCHAR(100) NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users(id),
        FOREIGN KEY(product_id) REFERENCES produkti(id)
) ENGINE=InnoDB;";


$sql .="CREATE TABLE IF NOT EXISTS mail(
         id INT AUTO_INCREMENT,
        user_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        broj VARCHAR(12) NOT NULL,
        poruka VARCHAR(500) NOT NULL,

        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB;";

$sql .="CREATE TABLE IF NOT EXISTS porudzbine(
        id INT AUTO_INCREMENT,
        user_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        broj VARCHAR(12) NOT NULL,
        email VARCHAR(100) NOT NULL,
        slanje VARCHAR(50) NOT NULL,
        adresa VARCHAR(500) NOT NULL,
        kolicina_produkta VARCHAR(1000) NOT NULL,
        ukupna_cena INT(100) NOT NULL,
        datum DATE,
        status_kupovine VARCHAR(20) NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=Innodb;";



$sql .="CREATE TABLE IF NOT EXISTS wishlist(
          id INT AUTO_INCREMENT,
          user_id INT NOT NULL,
          product_id INT NOT NULL,
          name VARCHAR(100) NOT NULL,
          cena INT(100) NOT NULL,
          slika VARCHAR(100) NOT NULL,

          PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES users(id),
        FOREIGN KEY(product_id) REFERENCES produkti(id)
)ENGINE=InnoDB;";


$sql.="CREATE TABLE IF NOT EXISTS moderators(
    id INT AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)

) ENGINE=InnoDB;";

if($conn->multi_query($sql)) {
    echo "<p>Uspešno izvršeni upiti</p>";
}
else {
    echo "<p>Greška: $conn->error </p>";
}