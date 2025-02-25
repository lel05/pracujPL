<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "karieraPlus";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");