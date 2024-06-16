<?php

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $offerId = $_POST['offer_id'];

  addAplicationToOffer($conn, $offerId);
