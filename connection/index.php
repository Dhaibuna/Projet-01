<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "mediacolabo";
$message = "";
try {
  $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST["login"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
      $message = '<label>all field is required</labele>';
    } else {
      $_query = "SELECT * FROM users WHERE UserName=:username  AND UserPass=:password ";
      $statement = $connect->prepare($_query);
      $statement->execute(
        array(
          'username' => $_POST["username"],
          'password' => $_POST["password"]
        )
      );
      $count = $statement->rowCount();
      if ($count > 0) {
        $_SESSION["username"] = $_POST["username"];
        header("location:login_succes.php");
      } else {
        $message = '<label>username or password is wrong</labele>';
      }
    }
  }
} catch (PDOException $error) {
  $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <h1>login</h1>
  <?php
  if (isset($message)) {
    echo '<label class="text-ganger">' . $message . '</label>';
  }
  ?>
  <form method="POST" action="">
    <label>Username</label>
    <input type="text" name="username" />
    <br>
    <label>Password</label>
    <input type="text" name="password" />
    <input type="submit" name="login" value="Login" />
  </form>

</body>

</html>