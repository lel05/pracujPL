<?php

if(isset($_POST["submit"])) {

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $offerId = $_POST['offerId'];
  $company_id = $_POST['company_id'];
  $profession_name = $_POST['profession_name'];
  $type_of_contract = $_POST['type_of_contract'];
  $type_of_job = $_POST['type_of_job'];
  $salary = $_POST['salary'];
  $days = $_POST['days'];
  $hours = $_POST['hours'];
  $expired = $_POST['expired'];
  $category_id = $_POST['category_id'];
  $duties = $_POST['duties'];
  $requirements = $_POST['requirements'];

  EditOffer($conn, $offerId, $company_id, $profession_name, $type_of_contract, $type_of_job, $salary, $days, $hours, $expired, $category_id, $duties, $requirements);

}