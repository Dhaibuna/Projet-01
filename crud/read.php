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
</head>

<body>
  <a href="index.php">Parcourir tous les articles</a> <br>
  <a href="create.php">Publier un nouveau article</a>
  <h1>
    Lecture de l'article <?= $article['ArticleName']; ?> de <?= $article['Author']; ?>
  </h1>
  <p>
    Cet article est écrit par <?= $article['Author']; ?>
  </p>
  <p>
    <?= $article['ArticleName']; ?>
  </p>
  <p>
    L'article a été publié le <?= $article['DatePublication']; ?>
  </p>
  <embed src="data:<?= $article['ImageType'] ?>;base64,<?= base64_encode($article['ArticleImage']) ?>" width="100px" />
  <p>
    <?= $article['ArticleText']; ?>
  </p>
  <a href="update.php?id=<?= $article['Id'] ?>">Modifier</a> <br>
  <a href="delete.php?id=<?= $article['Id'] ?>"
    onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $article['ArticleName']; ?> ?')">
    Supprimer
  </a>
</body>

</html>