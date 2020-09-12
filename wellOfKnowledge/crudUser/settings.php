<?php
require_once "db_user.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $sql = 'SELECT * FROM users WHERE `id`=:id';
  $statement = $connection->prepare($sql);
  $statement->execute([':id' => $id]);
  $users = $statement->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier le profile</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/margin.css">
</head>

<body>
  <header>
    <a href="../crudArticle/index.php">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <a class="navLink" href="create.php">Publier un nouveau article</a>
    <a href="profile.php">Votre profile</a>
    <?php echo '<a class="navLink" id="logout" href="landing.php">Se déconnecter</a>'; ?>
  </header>
  <main>
    <h1>
      Modifiez votre profile
    </h1>

    <form method="POST" enctype="multipart/form-data">
      <label for="userName">Votre nom&nbsp;:</label>
      <input value="<?= $users['UserName']; ?>" type="text" name="userName" id="userName"><br>
      <label for="userMail">Votre e-mail&nbsp;:</label>
      <input value="<?= $users['UserMail']; ?>" type="text" name="userMail" id="userMail"><br>
      <label for="userPass">Votre mot de passe&nbsp;:</label>
      <input value="<?= $users['UserPass']; ?>" type="password" name="userPass" id="userPass">
      </input>
      <button type="submit">
        Modifier
      </button>
    </form>
    <div class="actions">
      <a class="delete" href="../crudArticle/delete.php?id=<?= $_GET['id'] ?>"
        onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre profile ?')">
        Supprimer le profile
      </a>
    </div>
  </main>
  <?php
  if (isset($_POST['userName']) && isset($_POST['userMail']) && isset($_POST['userPass'])) { // [ name de input ]
    $userName = $_POST['userName'];
    $userMail = $_POST['userMail'];
    $userPass = $_POST['userPass'];

    $sql = 'UPDATE article SET userName=:userName, userMail=:userMail, userPass=:userPass WHERE id=:id';
    $statement = $connection->prepare($sql);
    $resultatRequet = $statement->execute([':userName' => $userName, ':userMail' => $userMail, ':userPass' => $userPass, ':id' => $id]);
  }
  if ($resultatRequet == 1) {
    // echo "L'article a bien été modifié !";
    // header("Location: /crud/read.php?id=" . $article['Id']);
    echo "<script type='text/javascript'>window.top.location='../crudArticle/index.php';</script>";
  }
  ?>
</body>

</html>