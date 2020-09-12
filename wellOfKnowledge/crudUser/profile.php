<?php
require_once "db_user.php";
if (isset($_GET['UserId']) && !empty($_GET['UserId'])) {
  $id = strip_tags($_GET['UserId']); // récuperartion de l'id dans l'url
  $sql = 'SELECT * FROM users WHERE `UserId`=:UserId';
  $statement = $connection->prepare($sql);
  $statement->execute([':UserId' => $UserId]);
  $users = $statement->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le profile de <?= $users['UserName']; ?></title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header>
    <a href="../crudArticle/index.php">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <a class="navLink" href="../crudArticle/create.php">Publier un nouveau article</a>
    <a href="#">Votre profile</a>
    <?php echo '<a class="navLink" id="logout" href="landing.php">Se déconnecter</a>'; ?>
  </header>

  <main>
    <h1>
      Profile de <?= $users['UserName']; ?>
    </h1>
    <a href="settings.php">Modifier le profile</a>
  </main>

</body>

</html>