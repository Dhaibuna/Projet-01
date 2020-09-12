<?php
require_once "db.php";

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
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/margin.css">
</head>

<body>
  <header>
    <a href="index.php">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <a class="navLink" href="create.php">Publier un nouveau article</a>
    <a href="../crudUser/profile.php">Votre profile</a>
    <?php echo '<a class="navLink" id="logout" href="../crudUser/landing.php">Se déconnecter</a>'; ?>
  </header>
  <main>
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
      <embed src="data:<?= $article['ImageType'] ?>;base64,<?= base64_encode($article['ArticleImage']) ?>"
        width="200px" />
      <input type="file" name="articleImage" id="articleImage"> <br>
      <button type="submit">
        Modifier
      </button>
    </form>
    <div class="actions">
      <a class="read" href="read.php?id=<?= $_GET['id'] ?>">Lire l'article publié</a>
      <a class="delete" href="delete.php?id=<?= $_GET['id'] ?>"
        onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $article['ArticleName']; ?> ?')">
        Supprimer
      </a>
    </div>
  </main>
  <?php
  if (isset($_POST['author']) && isset($_POST['articleName']) && isset($_POST['articleText'])) { // [ name de input ]
    $author = $_POST['author'];
    $articleName = $_POST['articleName'];
    $articleText = $_POST['articleText'];
    if ($_FILES["articleImage"]["size"] != 0) {
      $articleImage = file_get_contents($_FILES['articleImage']['tmp_name']);
      $imageType = $_FILES["articleImage"]["type"];
      $sql = 'UPDATE article SET author=:author, articleName=:articleName, articleText=:articleText,articleImage = :articleImage, imageType=:imageType WHERE id=:id';
      $statement = $connection->prepare($sql);
      $resultatRequet = $statement->execute([':author' => $author, ':articleName' => $articleName, ':articleText' => $articleText, ':id' => $id, ':articleImage' => "$articleImage", ":imageType" => $imageType]);
    } else {
      $sql = 'UPDATE article SET author=:author, articleName=:articleName, articleText=:articleText WHERE id=:id';
      $statement = $connection->prepare($sql);
      $resultatRequet = $statement->execute([':author' => $author, ':articleName' => $articleName, ':articleText' => $articleText, ':id' => $id]);
    }
    if ($resultatRequet == 1) {
      // echo "L'article a bien été modifié !";
      // header("Location: /crud/read.php?id=" . $article['Id']);
      echo "<script type='text/javascript'>window.top.location='/crud/read.php?id=" . $article['Id'] . "';</script>";
    }
  }
  ?>
</body>

</html>