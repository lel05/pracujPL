<?php

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $offerId = $_POST['offer_id'];
  $user_id = $_POST['user_id'];

  addAplicationToOffer($conn, $offerId);
  addApplicationToDatabase($conn, $user_id, $offerId);
