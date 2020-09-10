$sql = "SELECT * FROM users WHERE email=:email";
$statement = $connection->prepare($sql);
// Maintenant on précise par quelle variable de PhP le :email va être remplacée
$data $statement->execute([":email" => $email]);