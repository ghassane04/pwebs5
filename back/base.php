<?php

// Include the connection file
include('connection.php');

// Create an instance of Connection class
$connection = new Connection();

// Call the createDatabase method to create database "Projet"
$connection->createDatabase('Projet');

$query0 = "
CREATE TABLE Courses (
    id_C INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(100) NOT NULL,
    categorie VARCHAR(20)
)
";

$query = "
CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Number_C INT,
    id_C INT,
    FOREIGN KEY (id_C) REFERENCES Courses(id_C),
    FOREIGN KEY (Number_C) REFERENCES Cards(Number_C),
)
";

$query1 = "
CREATE TABLE Cards (
    Number_C INT PRIMARY KEY,
    cvv INT,
    date_exp DATE
)
";

// Call the selectDatabase method to select the "Projet" database
$connection->selectDatabase('Projet');

// Call the createTable method to create tables with the provided queries
$connection->createTable($query0);
$connection->createTable($query);
$connection->createTable($query1);

?>
