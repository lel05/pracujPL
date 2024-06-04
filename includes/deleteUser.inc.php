<?php

$userId = $_GET['userId'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

deleteUser($conn, $userId);