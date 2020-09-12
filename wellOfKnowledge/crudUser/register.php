<?php
require_once "db_user.php";

$userName = filter_var(trim($_POST['userName']), FILTER_SANITIZE_STRING);
$userMail = filter_var(trim($_POST['userMail']), FILTER_SANITIZE_STRING);
$userPass = filter_var(trim($_POST['userPass']), FILTER_SANITIZE_STRING);

if (mb_strlen($userName) < 3 || mb_strlen($userName) > 90) {
  echo "La longueur incorrecte de nom";
  exit();
} else if (mb_strlen($userMail) < 5 || mb_strlen($userMail) > 90) {
  echo "La longueur incorrecte d'e-mail";
  exit();
} else if (mb_strlen($userPass) < 2 || mb_strlen($userPass) > 90) {
  echo "La longueur incorrecte de mot de passe";
  exit();
}

// $userPass = md5($userPass . "wxcvbn123");

$sqlArticle = 'INSERT INTO users(UserName, UserMail, UserPass) VALUES( :userName, :userMail, :userPass)';
$statement = $connect->prepare($sqlArticle);
if ($statement->execute([':userName' => $userName, ':userMail' => $userMail, ':userPass' => $userPass])) {
  header("Location: ../crudArticle/index.php");
}