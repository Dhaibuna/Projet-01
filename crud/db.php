<?php

// Connection to the database
$dsn = 'mysql:host=localhost; dbname=mediacolabo';
$username = 'root';
$password = '';

// Errors gestion when try to connect to the db

try {

  $connection = new PDO($dsn, $username, $password);

  // On crée la table et ses colonnes

  $sql = "CREATE TABLE users(
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(30) NOT NULL,
    UserMail VARCHAR(30) NOT NULL,
    UserPass VARCHAR(30) NOT NULL,";

  $connection->exec($sql);
} catch (PDOException $e) {
}