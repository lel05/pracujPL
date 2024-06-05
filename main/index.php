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
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">

  <style>
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

  <div class="container mt-5">
    <form id="jobSearchForm" class="row gy-2 gx-3 align-items-center justify-content-center">
      <div class="col-auto">
        <label for="jobTitle" class="visually-hidden">Stanowisko</label>
        <input type="text" class="form-control" id="jobTitle" placeholder="Wprowadź stanowisko">
      </div>
      <div class="col-auto">
        <label for="category" class="visually-hidden">Kategoria</label>
        <select class="form-control" id="category">
          <option value="">Wybierz kategorię</option>
          <?php foreach ($categories as $data) : ?>
            <option value="<?php echo htmlspecialchars($data['category_id']); ?>"><?php echo htmlspecialchars($data['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-auto">
        <label for="contractType" class="visually-hidden">Rodzaj Kontraktu</label>
        <select class="form-control" id="contractType">
          <option value="">Wybierz rodzaj kontraktu</option>
          <option value="Umowa na czas określony">Umowa o pracę na czas określony</option>
          <option value="Umowa na czas nieokreślony">Umowa o pracę na czas nieokreślony</option>
          <option value="Umowa o dzieło">Umowa o dzieło</option>
          <option value="Umowa zlecenie">Umowa zlecenie</option>
          <option value="Umowa agencyjna">Umowa agencyjna</option>
          <option value="Umowa o pracę sezonową">Umowa o pracę sezonową</option>
          <option value="Umowa o pracę na część etatu">Umowa o pracę na część etatu</option>
          <option value="Umowa o pracę tymczasową">Umowa o pracę tymczasową</option>
          <option value="Umowa o pracę na zastępstwo">Umowa o pracę na zastępstwo</option>
          <option value="Umowa o pracę zdalną">Umowa o pracę zdalną</option>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-warning">Szukaj</button>
      </div>
    </form>
  </div>

  <section class="position-absolute top-50 start-50 translate-middle">

  </section>

</body>

</html>