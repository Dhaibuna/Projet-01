<?php
$id = "";
$usermail = "";
$password = "";
$errors = array();

// Connexion to the db
$db = mysqli_connect('localhost', 'root', "", 'registration');

// if there is a click on the register button

if (isset($_POST['register'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $usermail = mysqli_real_escape_string($db, $_POST['usermail']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
}

// ensure that form fields are ...filled

if (empty($id)) {
  array_push($errors, "Username is required"); // add error to errors array
}

if (empty($usermail)) {
  array_push($errors, "Email is required"); // add error to errors array
}

if (empty($password)) {
  array_push($errors, "Password is required"); // add error to errors array
}

// if there are no errors, save user to database
if (count($errors) == 0) {
  $password = md5($password);
  $sql = "INSERT INTO users (username, usermail, password)
  VALUES ('$id', '$usermail', '$password')";
  mysqli_query($db, $sql);
}
