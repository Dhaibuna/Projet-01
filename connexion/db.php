<?php

$servername = "localhost";
$user = "root";
$password = "";
$db_name = "connexion";
// $connection = mysqli_connect($host, $user, $password, $db_name);
// $conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);

// mysqli_query($connection, "SET NAMES utf8");

try {
  $connection = new PDO("mysql:host=$servername;dbname=$db_name", $user, $password);
  // On définit le mode d'erreur de PDO sur Exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Connexion réussie';


  $sql = "CREATE TABLE connexion
    User_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_mail VARCHAR(25) NOT NULL,
    User_login VARCHAR(10) NOT NULL,
    User_password TEXT NOT NULL,