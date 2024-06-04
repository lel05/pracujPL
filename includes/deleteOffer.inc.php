<?php

$offerId = $_GET['offerId'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

deleteOffer($conn, $offerId);