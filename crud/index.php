<?php
require_once "db.php";
$sql = 'SELECT * FROM article';
$statement = $connection->prepare($sql);
$statement->execute();
$article = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le flux des articles</title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header>
    <a href="#">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <a class="navLink" href="create.php">Publier un nouveau article</a>
  </header>

  <main>
    <h1>
      Bienvenue sur le flux des articles
    </h1>
    <?php foreach ($article as $value) : ?>
    <div class="article">

      <!-- <td><?= $value['Id'] ?></td> -->
      <h2 class="articleName"><?= $value['ArticleName'] ?></h2>
      <div class="author">par <?= $value['Author'] ?></div>
      <div class="image">
        <embed src="data:<?= $value['ImageType'] ?>;base64,<?= base64_encode($value['ArticleImage']) ?>"
          width="200px" />
      </div>
      <div class="articleText"><?= $value['ArticleText'] ?></div>
      <div class="actions">
        <a class="read" href="read.php?id=<?= $value['Id'] ?>">Lire l'article</a>
        <a class="update" href="update.php?id=<?= $value['Id'] ?>">Modifier</a>
        <a class="delete" href="delete.php?id=<?= $value['Id'] ?>"
          onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $value['ArticleName'] ?>')">
          Supprimer
        </a>
      </div>

    </div>
    <?php endforeach; ?>
  </main>
</body>

</html>