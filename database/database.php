<?php

require_once "../connect/connection.php";



$sql="CREATE TABLE IF NOT EXISTS tags(
    tag_id INT AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    PRIMARY KEY(tag_id)
)ENGINE=InnoDB;";

$sql.="CREATE TABLE IF NOT EXISTS news_tags(
    id INT AUTO_INCREMENT,
    news_id INT,
    tag_id INT,
    PRIMARY KEY(id),
    FOREIGN KEY (news_id) REFERENCES news(news_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id),
    ON DELETE CASCADE
)ENGINE=InnoDB;";


$sql.="CREATE TABLE IF NOT EXISTS news(
    news_id INT AUTO_INCREMENT,
    title VARCHAR(256) NOT NULL,
    news_text TEXT,
    category_id INT,
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY(news_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
)ENGINE=InnoDB;";

$sql.="CREATE TABLE IF NOT EXISTS categories(
    category_id INT AUTO_INCREMENT,
    name VARCHAR(256),
    PRIMARY KEY(category_id)
)ENGINE=InnoDB;";

$sql.="CREATE TABLE IF NOT EXISTS users_subscribed_categories(
   id INT AUTO_INCREMENT,
   user_id INT,
   category_id INT,
   PRIMARY KEY(id),
   FOREIGN KEY(user_id) REFERENCES users(user_id),
   FOREIGN KEY(category_id) REFERENCES categories(category_id),
   ON DELETE CASCADE
)ENGINE=Innodb;";


$sql.="CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT,
    email VARCHAR(256),
    password VARCHAR(1024),
    first_name VARCHAR(256),
    last_name VARCHAR(256),
    role INT NOT NULL,
    PRIMARY KEY(user_id)
)ENGINE=InnoDB;";

$result=$conn->multi_query($sql);

?>