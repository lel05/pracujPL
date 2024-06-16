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

  $categories = getCategories($conn);
  $contracts = array(
    "Wybierz typ kontraktu",
    "Umowa o pracę na czas określony",
    "Umowa o pracę na czas nieokreślony",
    "Umowa o dzieło",
    "Umowa zlecenie",
    "Umowa agencyjna",
    "Umowa o pracę sezonową",
    "Umowa o pracę na część etatu",
    "Umowa o pracę tymczasową",
    "Umowa o pracę na zastępstwo",
    "Umowa o pracę zdalną"
  );

  if (isset($_POST['SearchBtnClicked'])) {
    $category_id = $_POST['category_id'];
    $type_of_contract = $_POST['type_of_contract'];
    $profession_name = $_POST['prosfession_name'];

    $resultWithSearch = getSearchData($conn, $category_id, $profession_name, $type_of_contract);
  }

  $resultNoSearch = getOffersData($conn);

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

    div p {
      font-family: "Rubik", sans-serif;
      font-optical-sizing: auto;
      font-weight: 300;
      font-style: normal;
    }

    div img {
      width: auto;
      height: 50px;
    }

    a {
      text-decoration: none;
      color: black;
    }
  </style>

</head>

<body>

  <header>
    <?php
    include_once '../header/index.php';
    ?>
  </header>

  <div class="container mt-5">
    <form id="jobSearchForm" class="row gy-2 gx-3 align-items-center justify-content-center" action="../main/index.php" method="post">
      <div class="col-auto">
        <label for="jobTitle" class="visually-hidden">Stanowisko</label>
        <input type="text" class="form-control" id="jobTitle" placeholder="Wprowadź stanowisko" name="prosfession_name">
      </div>
      <div class="col-auto">
        <label for="category" class="visually-hidden">Kategoria</label>
        <select class="form-control" id="category" name="category_id">
          <option value="">Wybierz kategorię</option>
          <?php foreach ($categories as $data) : ?>
            <?php if ($data['category_id'] == $category_id) : ?>
              <option value="<?php echo htmlspecialchars($data['category_id']); ?>" selected><?php echo htmlspecialchars($data['name']); ?></option>
            <?php else : ?>
              <option value="<?php echo htmlspecialchars($data['category_id']); ?>"><?php echo htmlspecialchars($data['name']); ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-auto">
        <label for="contractType" class="visually-hidden">Rodzaj Kontraktu</label>
        <select class="form-control" id="contractType" name="type_of_contract">
          <?php foreach ($contracts as $data) : ?>
            <?php if ($data == $type_of_contract) : ?>
              <option value="<?php echo $data; ?>" selected><?php echo $data; ?></option>
            <?php else : ?>
              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-warning" name="SearchBtnClicked">Szukaj</button>
      </div>
    </form>
  </div>

  <section class="position-absolute top-50 start-50 translate-middle w-75 d-block justify-content-center">
    <?php if (isset($_POST['SearchBtnClicked'])) : ?>
      <?php foreach ($resultWithSearch as $data) : ?>
        <a href="offerPage.php?offerId=<?php echo $data['offer_id'] ?>">
          <div>
            <p class="">
              <?php $data['profession_name'] ?>
              <?php $data['salary'] ?>
            </p>
            <img src="../Images/CompanyLogo/<?php $data['logo'] ?>" alt="Logo firmy">
            <p class="">
              <?php echo $data['name'] ?><br>
              <?php echo $data['localization'] ?>
            </p>
          </div>
        </a>
      <?php endforeach; ?>
    <?php else : ?>
      <?php foreach ($resultNoSearch as $data) : ?>
        <a href="offerPage.php?offerId=<?php echo $data['offer_id'] ?>">
          <div class="float-start m-4">
            <p>
              <span class="fs-5 fw-bold text-secondary"><?php echo $data['profession_name'] ?></span><br>
              <?php echo $data['salary'] ?>/mies
            </p>
            <img src="../Images/CompanyLogo/<?php echo $data['logo'] ?>" alt="Logo firmy">
            <p class="float-end ms-4">
              <span class="fs-5"><?php echo $data['name'] ?></span><br>
              <span class="text-secondary"><?php echo $data['localization'] ?></span>
            </p>
          </div>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>

  </section>

</body>

</html>