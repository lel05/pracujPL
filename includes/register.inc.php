<?php

if(isset($_POST["submit"])) {

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if(emptyInputRegister($name, $surname, $email, $pass) !== false) {
    header("location: ../register-form/index.php?error=emptyinput");
    exit();
  }
  if(invalidNames($name, $surname) !== false) {
    header("location: ../register-form/index.php?error=invalidnames");
    exit();
  }
  if(invalidEmail($email) !== false) {
    header("location: ../register-form/index.php?error=invalidemail");
    exit();
  }
  if(userExists($conn, $email) !== false) {
    header("location: ../register-form/index.php?error=userexists");
    exit();
  }

  createUser($conn, $name, $surname, $email, $pass, 'user');

} else {
  header("location: ../register-form/index.php");
  exit();
}