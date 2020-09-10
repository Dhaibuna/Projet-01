<?php include("server.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <!-- Création d'un formulaire d'enregistrement en HTML -->
  <form action="" method="POST" class="form-example">
    <div class="form-example">
      <label for="username"> Username </label>
      <input type="text" name="name" id="username" required>
    </div>
    <div class="form-example">
      <label for="email"> E-mail </label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-example">
      <label for="password"> Password </label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="form-example">
      <button type="submit" name="register" class="btn"> Join us </button>
    </div>
    <p>
      Already within us ? <a href="login.php"> Sign in </a>
    </p>

  </form>
</body>

</html>