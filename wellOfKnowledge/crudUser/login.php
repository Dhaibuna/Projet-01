<?php
require_once "db_user.php";

if (isset($_POST["login"])) {
  if (empty($_POST["userMail"]) || empty($_POST["userPass"])) {
    echo '<p>Tous les champs ont besoin d\être remplis</p>';
  } else {
    $_query = "SELECT * FROM users WHERE userMail=:userMail  AND userPass=:userPass ";
    $statement = $connect->prepare($_query);
    $statement->execute(
      array(
        'userMail' => $_POST["userMail"],
        'userPass' => $_POST["userPass"]
      )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
      $_SESSION["userMail"] = $_POST["userPass"];
      header("location:../crudArticle/index.php");
    } else {
      echo '<p>L\'e-mail ou le mot de passe est incorrect</p>';
      echo '<a href="landing.php">Retour</a>';
    }
  }
}