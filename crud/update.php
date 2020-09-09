<?php
require_once "db.php";
/* $id = $_GET['id'];
$sql = 'SELECT * FROM article WHERE `id`=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$article = $statement->fetch(PDO::FETCH_OBJ); */

/* $id = $_GET['id'];
$sql = 'SELECT * FROM article WHERE `id`=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$article = $statement->fetch(); */

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $sql = 'SELECT * FROM article WHERE `id`=:id';
  $statement = $connection->prepare($sql);
  $statement->execute([':id' => $id]);
  $article = $statement->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier l'article <?= $article['ArticleName']; ?> de <?= $article['Author']; ?></title>
</head>

<body>
  <h1>
    Modifiez l'article <?= $article['ArticleName']; ?>
  </h1>
  <form method="POST" enctype="multipart/form-data">
    <label for="author">Votre nom&nbsp;:</label>
    <input value="<?= $article['Author']; ?>" type="text" name="author" id="author"><br>
    <label for="articleName">Le nom de l'article&nbsp;:</label>
    <input value="<?= $article['ArticleName']; ?>" type="text" name="articleName" id="articleName"><br>
    <label for="articleText">Le texte de l'article&nbsp;:</label>
    <textarea name="articleText" id="articleText" cols="30" rows="10">
<?= $article['ArticleText']; ?>
</textarea>
    <br>
    <button type="submit">
      Modifier
    </button>
  </form>
  <a href="read.php?id=<?= $_GET['id'] ?>">Lire l'article publié</a> <br>
  <a href="index.php">Parcourir tous les articles</a> <br>
  <a href="create.php">Publier un nouveau article</a> <br>
  <a href="delete.php?id=<?= $_GET['id'] ?>"
    onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $article['ArticleName']; ?> ?')">
    Supprimer
  </a>

  <?php
  if (isset($_POST['author']) && isset($_POST['articleName']) && isset($_POST['articleText'])) { // [ name de input ]
    $author = $_POST['author'];
    $articleName = $_POST['articleName'];
    $articleText = $_POST['articleText'];
    $sql = 'UPDATE article SET author=:author, articleName=:articleName, articleText=:articleText WHERE id=:id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':author' => $author, ':articleName' => $articleName, ':articleText' => $articleText, ':id' => $id])) {
      header("Location: /crud/read.php?id=" . $article['Id']);
    }
  }
  ?>
</body>

</html>