<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Well of Knowledge</title>

  <link rel="stylesheet" href="../styles/margin.css">
  <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header>
    <a href="#">
      <img src="../images/logo.png" alt="logo de Well of Knowledge" width="50px">
    </a>
    <h2>
      Se connecter
    </h2>
    <form method="POST" action="login.php" id="loginForm">
      <label for="userMail">E-mail&nbsp;:</label>
      <input type="text" name="userMail" id="userMail" />
      <br>
      <label for="userPass">Password&nbsp;:</label>
      <input type="password" name="userPass" id="userPass" /> <br>
      <input type="submit" name="login" id="login" value="Se connecter" class="read" />
    </form>
  </header>
  <main>
    <h1 style="color: #FF3796; text-align: center;">
      Well of Knowledge
    </h1>
    <p style="text-align: center;">
      Partagez avec nous votre passion, vos connaissances ou, pourquoi pas, votre humour&nbsp;? <br>
      Quoi qu'il en soit, ça nous va, tant que vous venez <span style="color: #FF3796;">comme vous êtes</span>&nbsp;!
    </p>
    <h2>
      Inscrivez-vous&nbsp;!
    </h2>
    <form action="register.php" method="POST" id="registerForm">
      <label for="userName">
        Nom&nbsp;:
      </label>
      <input type="text" name="userName" id="userName">
      <label for="userMail">
        E-mail&nbsp;:
      </label>
      <input type="text" name="userMail" id="userMail">
      <label for="userPass">
        Mot de passe&nbsp;:
      </label>
      <input type="password" name="userPass" id="userPass"> <br>
      <input type="submit" name="register" id="register" value="S'inscrire" class="read">
    </form>
  </main>
</body>

</html>