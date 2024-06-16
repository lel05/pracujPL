<?php

function emptyInputRegister($name, $surname, $email, $pass)
{
  $result = false;
  if (empty($name) || empty($surname) || empty($email) || empty($pass)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidNames($name, $surname)
{
  $result = false;
  if (!preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/", $name) || !preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/", $surname)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  $result = false;
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

function createUser($conn, $name, $surname, $email, $pass, $role)
{
  $sql = "INSERT INTO user (firstname, surname, email, password, role) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register-form/index.php?error=stmtfailed");
    exit();
  }

  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $email, $hashedPass, $role);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../register-form/index.php?error=none");
  exit();
}

function emptyInputLogin($email, $pass)
{
  $result = false;
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

  if ($checkPass === false) {
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

function updateUserInfo($conn, $experience, $education, $skills, $courses, $links, $email, $numertelefonu, $dataurodzenia, $profilePicture, $profilePictureTmpName, $profilePictureSize, $profilePictureError)
{

  $fileExt = explode('.', $profilePicture);
  $fileActualExt = strtolower(end($fileExt));
  $userExists = userExists($conn, $_SESSION['userEmail']);

  if ($profilePictureError === 0) {
    if ($profilePictureSize < 1000000) {
      $ppNameNew = uniqid('', true) . "." . $fileActualExt;
      if ($userExists['avatar'] != "") {
        unlink("../Images/ProfilePictures/" . $userExists['avatar']);
      }
      $fileDestination = '../Images/ProfilePictures/' . $ppNameNew;
      move_uploaded_file($profilePictureTmpName, $fileDestination);
    } else {
      header("Location: ../user-page/index.php?error=profilepicturesizeerror");
      exit;
    }
  } else {
    $ppNameNew = $userExists['avatar'];
  }

  $sql = "UPDATE `user` SET `birth_date`=?, `email`=?, `phone_number`=?, `avatar`=?, `job_experience`=?, `education`=?, `skills`=?, `courses`=?, `links`=? WHERE `user_id`=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../user-page/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssssssi", $dataurodzenia, $email, $numertelefonu, $ppNameNew, $experience, $education, $skills, $courses, $links, $_SESSION["userId"]);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../user-page/index.php?error=none");
  exit();
}

function postCounter($conn)
{
  $sql = "SELECT COUNT(offer_id) FROM offer;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../main/index.php?error=stmtfailed");
    exit();
  }

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

function adminUpdateUserInfo($conn, $updatedUserId, $firstname, $surname, $updatedUserEmailNew, $experience, $education, $skills, $courses, $links, $email, $numertelefonu, $dataurodzenia, $profilePicture, $profilePictureTmpName, $profilePictureSize, $profilePictureError)
{

  $fileExt = explode('.', $profilePicture);
  $fileActualExt = strtolower(end($fileExt));
  $userExists = userExists($conn, $updatedUserEmailNew);

  if ($profilePictureError === 0) {
    if ($profilePictureSize < 1000000) {
      $ppNameNew = uniqid('', true) . "." . $fileActualExt;
      if ($userExists['avatar'] != "") {
        unlink("../Images/ProfilePictures/" . $userExists['avatar']);
      }
      $fileDestination = '../Images/ProfilePictures/' . $ppNameNew;
      move_uploaded_file($profilePictureTmpName, $fileDestination);
    } else {
      header("Location: ../admin/index.php?error=profilepicturesizeerror");
      exit;
    }
  } else {
    $ppNameNew = $userExists['avatar'];
  }

  $sql = "UPDATE `user` SET `firstname`=?,`surname`=?,`birth_date`=?, `email`=?, `phone_number`=?, `avatar`=?, `job_experience`=?, `education`=?, `skills`=?, `courses`=?, `links`=? WHERE `user_id`=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssssssssi", $firstname, $surname, $dataurodzenia, $email, $numertelefonu, $ppNameNew, $experience, $education, $skills, $courses, $links, $updatedUserId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../admin/index.php?error=none");
  exit();
}

function deleteUser($conn, $id)
{
  $sql = "DELETE FROM `user` WHERE user_id=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../admin/index.php?error=none");
  exit();
}

function deleteOffer($conn, $id)
{
  $sql = "DELETE FROM `offer` WHERE offer_id=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../admin/index.php?error=none");
  exit();
}

function AddOffer($conn, $company_id, $profession_name, $type_of_contract, $type_of_job, $salary, $days, $hours, $expired, $category_id, $duties, $requirements)
{
  $sql = "INSERT INTO offer (company_id, profession_name, type_of_contract, type_of_job, salary, days, hours, expired, category_id, duties, requirements) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/addOffer.php?error=stmtfailed");
    exit();
  }

  $expired = date('Y-m-d', strtotime($expired));

  mysqli_stmt_bind_param($stmt, "isssssssiss", $company_id, $profession_name, $type_of_contract, $type_of_job, $salary, $days, $hours, $expired, $category_id, $duties, $requirements);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../admin/index.php?error=none");
  exit();
}

function getCompanies($conn)
{
  $sql = "SELECT company_id, name FROM company;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/addOffer.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  $companies = array();
  while ($row = mysqli_fetch_assoc($resultData)) {
    $companies[] = $row;
  }

  mysqli_stmt_close($stmt);

  return $companies;
}

function getCategories($conn)
{
  $sql = "SELECT category_id, name FROM category;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/addOffer.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  $cateogies = array();
  while ($row = mysqli_fetch_assoc($resultData)) {
    $cateogies[] = $row;
  }

  mysqli_stmt_close($stmt);

  return $cateogies;
}

function EditOffer($conn, $offer_id, $company_id, $profession_name, $type_of_contract, $type_of_job, $salary, $days, $hours, $expired, $category_id, $duties, $requirements)
{
  $sql = "UPDATE `offer` SET `company_id`=?,`profession_name`=?,`type_of_contract`=?,`type_of_job`=?,`salary`=?,`days`=?,`hours`=?,`expired`=?,`category_id`=?,`duties`=?,`requirements`=? WHERE offer_id=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/addOffer.php?error=stmtfailed");
    exit();
  }

  $expired = date('Y-m-d', strtotime($expired));

  mysqli_stmt_bind_param($stmt, "isssssssissi", $company_id, $profession_name, $type_of_contract, $type_of_job, $salary, $days, $hours, $expired, $category_id, $duties, $requirements, $offer_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../admin/index.php?error=none");
  exit();
}

function getOffer($conn, $offerId)
{
  $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE offer_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "i", $offerId);
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

function getSearchData($conn, $category_id, $profession_name, $type_of_contract)
{
  if ($category_id != null && $profession_name == null && $type_of_contract == null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE category_id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $category_id);
  }
  if ($category_id == null && $profession_name != null && $type_of_contract == null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE profession_name LIKE '%?%';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $profession_name);
  }
  if ($category_id == null && $profession_name == null && $type_of_contract != null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE type_of_contract=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $type_of_contract);
  }
  if ($category_id != null && $profession_name != null && $type_of_contract == null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE profession_name LIKE '%?%' AND category_id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $profession_name, $category_id);
  }
  if ($category_id == null && $profession_name != null && $type_of_contract != null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE profession_name LIKE '%?%' AND type_of_contract=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $profession_name, $type_of_contract);
  }
  if ($category_id != null && $profession_name == null && $type_of_contract != null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE category_id=? AND type_of_contract=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $category_id, $type_of_contract);
  }
  if ($category_id != null && $profession_name != null && $type_of_contract != null) {
    $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id WHERE category_id=? AND type_of_contract=? AND profession_name LIKE '%?%';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../main/index.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $category_id, $type_of_contract, $profession_name);
  }

  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  $offers = array();
  while ($row = mysqli_fetch_assoc($resultData)) {
    $offers[] = $row;
  }

  mysqli_stmt_close($stmt);

  return $offers;
}

function getOffersData($conn)
{
  $sql = "SELECT * FROM offer JOIN company ON offer.company_id=company.company_id;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../main/index.php.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  $offers = array();
  while ($row = mysqli_fetch_assoc($resultData)) {
    $offers[] = $row;
  }

  mysqli_stmt_close($stmt);

  return $offers;
}

function addAplicationToOffer($conn, $offer_id)
{
  $sql = "UPDATE `offer` SET `application_count`=`application_count`+1 WHERE offer_id=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../main/index.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "i", $offer_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../main/index.php?applicationDone=");
  exit();
}