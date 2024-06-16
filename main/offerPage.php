<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - znajdź swoją wymarzoną prace!</title>
  <?php
  include_once '../includes.php';
  include_once '../includes/dbh.inc.php';
  include_once '../includes/functions.inc.php';

  error_reporting(0);

  session_start();

  $offerId = $_GET['offerId'];
  $result = getOffer($conn, $offerId);
  $user_id = 0;

  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

    .centered-section {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 200px;
    }
  </style>

</head>

<body>

  <header>
    <?php
    include_once '../header/index.php';
    ?>
  </header>

  <section>
    <div class="d-flex justify-content-center">
      <img src="../Images/CompanyLogo/<?php echo $result['logo'] ?>" alt="Logo firmy" class="img-fluid m-1" style="width: 300px;">
    </div>
  </section>

  <section class="position-absolute top-50 start-50 translate-middle w-50 d-block justify-content-center">
    <div>
      <p>
        <span class="fs-4 fw-bold"><?php echo $result['profession_name'] ?> - <?php echo $result['type_of_job'] ?></span><br>
        <span class="text-secondary"><?php echo $result['name'] ?></span>
      </p><br><br>
      <p class="float-start">
        <span class="fw-bold">Typ umowy: </span><span class="fst-italic"><?php echo $result['type_of_contract'] ?></span><br>
        <span class="fw-bold">Wynagrodzenie: </span><span class="fst-italic"><?php echo $result['salary'] ?></span><br>
        <span class="fw-bold">Dni pracy: </span><span class="fst-italic"><?php echo $result['days'] ?></span><br>
        <span class="fw-bold">Godziny pracy: </span><span class="fst-italic"><?php echo $result['hours'] ?></span><br>
        <span class="fw-bold">Wymagania: </span><span class="fst-italic"><?php echo $result['requirements'] ?></span><br>
        <span class="fw-bold">Zadania: </span><span class="fst-italic"><?php echo $result['duties'] ?></span><br>
      </p>
      <form action="../includes/aplication.inc.php" method="post" class="float-end">
        <input type="text" name="offer_id" value="<?php echo $offerId ?>" hidden>
        <input type="text" name="user_id" value="<?php echo $userExists['user_id'] ?>" hidden>
        <?php if(checkIfUserHasApplicatedToOffer($conn, $user_id, $offerId)): ?>
          <input type="submit" value="zaaplikowano" name="submit" class="btn btn-warning" disabled>
        <?php elseif(!isset($_SESSION["userId"])): ?>
          <input type="submit" value="Zaloguj się aby aplikować" name="submit" class="btn btn-warning" disabled>
        <?php else: ?>
          <input type="submit" value="Aplikuj" name="submit" class="btn btn-warning">
        <?php endif; ?>
      </form>


    </div>
  </section>

</body>

</html>