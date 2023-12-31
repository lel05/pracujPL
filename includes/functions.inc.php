<?php

function emptyInputRegister($name, $surname, $email, $pass)
{
  $result;
  if (empty($name) || empty($surname) || empty($email) || empty($pass)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidNames($name, $surname)
{
  $result;
  if (!preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/", $name) || !preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/", $surname)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function userExists($conn, $email)
{
  $sql = "SELECT * FROM user WHERE email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register-form/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $email, $pass)
{
  $sql = "INSERT INTO user (firstname, surname, email, password) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register-form/index.php?error=stmtfailed");
    exit();
  }

  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $email, $hashedPass);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../register-form/index.php?error=none");
  exit();
}

function emptyInputLogin($email, $pass)
{
  $result;
  if (empty($email) || empty($pass)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $email, $pass)
{
  $userExists = userExists($conn, $email);

  if ($userExists === false) {
    header("location: ../login-form/index.php?error=wronglogin");
    exit();
  }

  $passHashed = $userExists["password"];
  $checkPass = password_verify($pass, $passHashed);

  if($checkPass === false) {
    header("location: ../login-form/index.php?error=wronglogin");
    exit();
  } else if ($checkPass === true) {
    session_start();
    $_SESSION["userEmail"] = $userExists["email"];
    $_SESSION["userId"] = $userExists["user_id"];
    header("location: ../main/index.php");
    exit();
  }

}
