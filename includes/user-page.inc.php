<?php

if(isset($_POST["submit"])) {

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$pass = $_POST["pass"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
}