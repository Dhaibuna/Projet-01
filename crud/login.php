<?php require("db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
</head>

<body>
  <!-- Création d'un formulaire d'enregistrement en HTML -->
  <form action="create.php" method="POST" class="form-example">
    <div class="form-example">
      <label for="username"> Username </label>
      <input type="text" name="name" id="username" required>
    </div>
    <div class="form-example">
      <label for=" password"> Password </label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="form-example">
      <button type="submit" name="login" class="btn"> Sign in </button>
    </div>
    <p>
      Not yet within us ? <a href="register.php"> Sign up </a>
    </p>

  </form>
</body>

</html