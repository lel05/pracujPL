<?php

if(isset($_POST["submit"])) {

session_start();

$updatedUserId = $_POST["userId"];
$updatedUserEmail = $_POST["updatedUserEmail"];
$updatedUserEmailNew = str_replace('%40', '@', $updatedUserEmail);

$firstname = $_POST["imie"];
$surname = $_POST["nazwisko"];
$experience = $_POST["experience"];
$education = $_POST["education"];
$skills = $_POST["skills"];
$courses = $_POST["courses"];
$links = $_POST["links"];
$email = $_POST["email"];
$numertelefonu = $_POST["numertelefonu"];
$dataurodzenia = $_POST["dataurodzenia"];

$profilePicture = $_FILES["file"]["name"];
$profilePictureTmpName = $_FILES["file"]["tmp_name"];
$profilePictureSize = $_FILES["file"]["size"];
$profilePictureError = $_FILES["file"]["error"];

$email = str_replace('%40', '@', $email);

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

adminUpdateUserInfo($conn, $updatedUserId, $firstname, $surname, $updatedUserEmailNew, $experience, $education, $skills, $courses, $links, $email, $numertelefonu, $dataurodzenia, $profilePicture, $profilePictureTmpName, $profilePictureSize, $profilePictureError);

}