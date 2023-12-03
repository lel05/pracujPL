<?php

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $checkbox = $_POST['rememberme'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($email, $pass) !== false) {
    header("location: ../login-form/index.php?error=emptyinput");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../login-form/index.php?error=invalidemail");
    exit();
  }

  loginUser($conn, $email, $pass);

} else {
  header("location: ../login-form/index.php");
  exit();
}
