<?php require_once "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publier un article</title>
</head>

<body>
  <h1>
    Publiez un article
  </h1>
  <form method="POST" enctype="multipart/form-data">
    <label for="author">Votre nom&nbsp;:</label>
    <input type="text" name="author" id="author"><br>
    <label for="articleName">Le nom de l'article&nbsp;:</label>
    <input type="text" name="articleName" id="articleName"><br>
    <label for="articleText">Le texte de l'article&nbsp;:</label>
    <textarea name="articleText" id="articleText" cols="30" rows="10"></textarea> <br>
    <button type="submit">
      Publier
    </button>
  </form>
  <a href="read.php">Lire l'article publié</a> <br>
  <a href="index.php">Parcourir tous les articles</a>

  <?php
  if (isset($_POST['author']) && isset($_POST['articleName']) && isset($_POST['articleText'])) { // [ name de input ]
    $author = $_POST['author'];
    $articleName = $_POST['articleName'];
    $articleText = $_POST['articleText'];
    $sql = 'INSERT INTO article(author, articleName, articleText) VALUES(:author, :articleName, :articleText)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':author' => $author, ':articleName' => $articleName, ':articleText' => $articleText])) {
      echo '<br>' . "L'article a bien été publié !";
    }
  }
  ?>
</body>

</html>