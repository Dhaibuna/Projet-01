<<<<<<< HEAD
<?php require('db.php');

// On sélectionne tout dans notre base de données.
$sql = 'SELECT FROM users';
$statement = $connection->prepare($sql);

// Maintenant on précise par quelle variable de PhP le :email va être remplacée
$data $statement->execute([":email" => $email]);
=======
<?php
require_once "db.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = strip_tags($_GET['id']); // récuperartion de l'id dans l'url
  $sql = 'SELECT * FROM article WHERE `id`=:id';
  $statement = $connection->prepare($sql);
  $statement->execute([':id' => $id]);
  $article = $statement->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>L'article <?= $article['ArticleName']; ?> de <?= $article['Author']; ?></title>
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header>
    <a href="index.php">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <a class="navLink" href="create.php">Publier un nouveau article</a>
  </header>

  <main>
    <h1>
      Lecture de l'article <?= $article['ArticleName']; ?> de <?= $article['Author']; ?>
    </h1>

    <h2 class="articleName">
      <?= $article['ArticleName']; ?>
    </h2>
    <div class="author">
      Par <?= $article['Author']; ?>
    </div>
    <div class="image">
      <embed src="data:<?= $article['ImageType'] ?>;base64,<?= base64_encode($article['ArticleImage']) ?>"
        width="200px" />
    </div>

    <div class="articleText">
      <?= $article['ArticleText']; ?>
    </div>
    <p>
      L'article a été publié le <?= $article['DatePublication']; ?>
    </p>
    <div class="actions">
      <a class="update" href="update.php?id=<?= $article['Id'] ?>">Modifier</a>
      <a class="delete" href="delete.php?id=<?= $article['Id'] ?>"
        onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $article['ArticleName']; ?> ?')">
        Supprimer
      </a>
    </div>
  </main>

</body>

</html>
>>>>>>> CRUD_Article
