<?php
session_start();
if (isset($_SESSION["username"])) {
  echo 'login success,welcome-';
  echo '<br><a href="index.php">logout<a>';
} else {
  header("location:index.php");
}