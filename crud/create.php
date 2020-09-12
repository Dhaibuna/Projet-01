<<<<<<< HEAD
<?php require("db.php"); // Appel à la base de données

// When click on ' Join us ' button

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) // Noms des Input ... PAS CEUX De la base de données !!
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password =  $_POST['password'];
}

// La requête sql fonctionne avec des ordres de style INSERT TO, c'est du language mysql qui est détecté par PhP. Pour vérifier si ma requête est fonctionnelle je copie le bout de code, j'enlève la syntaxe PhP et puis je vais dans ma base de données pour copier le bout de code dans l'onglet mysql.

$sql = 'INSERT INTO users(userName, userMail, userPass) VALUES( :name, :email, :password)';
$statement = $connection->prepare($sql);



if ($statement->execute([':name' => $name, ':email' => $email, ':password' => $password])) {
  echo 'data inserted successfully';

  // Redirection to profile page

  header("Location: profile.php ");
}
=======
<?php require_once "db.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publier un article</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/margin.css">
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
  </main>

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
>>>>>>> CRUD_Article
