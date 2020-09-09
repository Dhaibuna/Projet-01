<?php require_once "db.php"; ?>

<!DOCTYPE html>
<html lang="fr">

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
    <input type="text" name="author" id="author" required placeholder="Anonyme"><br>
    <label for="articleName">Le nom de l'article&nbsp;:</label>
    <input type="text" name="articleName" id="articleName" required placeholder="Un nom d'article"><br>
    <label for="articleText">Le texte de l'article&nbsp;:</label>
    <textarea name="articleText" id="articleText" cols="30" rows="10" required
      placeholder="Le texte de l'article"></textarea> <br>
    <label for="articleImage">Choisissez une image pour votre article&nbsp;:</label>
    <input type="file" name="articleImage" id="articleImage"> <br>
    <button type="submit">
      Publier
    </button>
  </form>
  <a href="index.php">Parcourir tous les articles</a>

  <?php
  if (isset($_POST['author']) && isset($_POST['articleName']) && isset($_POST['articleText']) && isset($_FILES['articleImage'])) { // [ name de input ]
    $author = $_POST['author'];
    $articleName = $_POST['articleName'];
    $articleText = $_POST['articleText'];

    // $target = "images/" . basename($_FILES['articleImage']['name']);
    $imageType = $_FILES["articleImage"]["type"];
    $articleImage = file_get_contents($_FILES['articleImage']['tmp_name']);

    $sql = 'INSERT INTO article(author, articleName, articleText, articleImage, imageType) VALUES(:author, :articleName, :articleText, :articleImage, :imageType)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':author' => $author, ':articleName' => $articleName, ':articleText' => $articleText, ':articleImage' => $articleImage, ':imageType' => $imageType])) {
      echo '<br>' . "L'article a bien été publié !";
    }
  }
  ?>

</body>

</html>