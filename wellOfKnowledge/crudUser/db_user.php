<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "mediacolabo";
$message = "";
try {
  $connect = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlArticle = "CREATE TABLE users(
    UserId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(30) NOT NULL,
    UserMail VARCHAR(50) NOT NULL,
    UserPass VARCHAR(1250) NOT NULL";

  $connect->exec($sqlArticle);
  // echo 'Table bien créée !';
} catch (PDOException $error) {
  $message = $error->getMessage();
}