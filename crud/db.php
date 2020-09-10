<?php

// Connection to the database
$dsn = 'mysql:host=localhost; dbname=mediacolabo';
$username = 'root';
$password = '';

// Errors gestion when try to connect to the db

try {

  $connection = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
}