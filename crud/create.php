<?php require("db.php"); // Appel à la base de données

// When click on ' Join us ' button

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) // Noms des Input ... PAS CEUX De la base de données !!
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password =  $_POST['password'];
}

// La requête sql fonctionne avec des ordres de style INSERT TO, c'est du language mysql qui est détecté par PhP. Pour vérifier si ma requête est fonctionnelle je copie le bout de code, j'enlève la syntaxe PhP et puis je vais dans ma base de données pour copier le bout de code dans l'onglet mysql.

$sql = 'INSERT INTO users(userName, userMail, userPass) VALUES( :name, :email, :password)';
$statement = $connection->prepare($sql);



if ($statement->execute([':name' => $name, ':email' => $email, ':password' => $password])) {
  echo 'data inserted successfully';

  // Redirection to profile page

  header("Location: profile.php ");
}