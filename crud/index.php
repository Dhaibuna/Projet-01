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
</head>

<body>
  <a href="create.php">Publier un nouveau article</a>
  <h1>
    Le flux des articles
  </h1>
  <div>
    <table>
      <tr>
        <th>
          ID
        </th>
        <th>
          Auteur
        </th>
        <th>
          Nom de l'article
        </th>
        <th>
          Image
        </th>
        <th>
          Texte de l'article
        </th>
        <th>
          Actions
        </th>
      </tr>
      <?php foreach ($article as $value) : ?>
      <tr>
        <td><?= $value['Id'] ?></td>
        <td><?= $value['Author'] ?></td>
        <td><?= $value['ArticleName'] ?></td>
        <td>
          <embed src="data:<?= $value['ImageType'] ?>;base64,<?= base64_encode($value['ArticleImage']) ?>"
            width="100px" />
        </td>
        <td><?= $value['ArticleText'] ?></td>
        <td>
          <a href="read.php?id=<?= $value['Id'] ?>">Lire l'article</a>
          <a href="update.php?id=<?= $value['Id'] ?>">Modifier</a>
          <a href="delete.php?id=<?= $value['Id'] ?>"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article <?= $value['ArticleName'] ?>')">
            Supprimer
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>