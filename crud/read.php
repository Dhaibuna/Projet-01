<?php require('db.php');

// On sélectionne tout dans notre base de données.
$sql = 'SELECT FROM users';
$statement = $connection->prepare($sql);

// Maintenant on précise par quelle variable de PhP le :email va être remplacée
$data $statement->execute([":email" => $email]);