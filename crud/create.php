<?php require("db.php");

$message = '';
// When click on ' Join us ' button

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) // Noms des Input ... PAS CEUX De la base de données !!
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password =  $_POST['password'];
}

$sql = 'INSERT INTO users(userName, userMail, userPass) VALUES( :name, :email, :password)';
$statement = $connection->prepare($sql);

// Ne fonctionne pas, PQ ?

if ($statement->execute([':name' => $name, ':email' => $email, ':password' => $password])) {
  $message = 'data inserted successfully';
};