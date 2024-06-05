<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Dodaj ofertę</title>
  <?php
  include_once '../includes.php';
  //error_reporting(0);
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">
  <link rel="stylesheet" href="../styles/user-page/styles.css">

  <style>
    .profile-card {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
    }

    .profile-card h2 {
      font-size: 24px;
      text-align: left;
    }

    .profile-card ul {
      list-style-type: none;
      padding: 0;
      text-align: left;
    }

    .profile-card a {
      font-size: 18px;
    }

    .profile-picture-label {
      display: block;
      margin-bottom: 10px;
    }

    .profile-avatar {
      height: 100px;
    }

    label {
      font-weight: bold;
    }

    .overflow-v-scroll {
      overflow-x: hidden;
      overflow-y: auto;
      width: 550px;
      padding: 10px;
      word-wrap: break-word;
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
    <div class="container">
      <div class="profile-card p-4">
        <?php
        if (isset($_SESSION["userId"])) {
          require_once '../includes/dbh.inc.php';
          require_once '../includes/functions.inc.php';
          $userExists = userExists($conn, $_SESSION['userEmail']);
          if ($userExists['role'] != "admin") {
            header("Location: ../main/index.php");
          }
        } else {
          header("Location: ../main/index.php");
        }

        $companies = getCompanies($conn);
        $categories = getCategories($conn);

        ?>

        <form action="../includes/addOffer.inc.php" method="post" enctype="multipart/form-data">
          <div class="mb-3 shadow position-relative contact-info-section">
            <h2 class="p-1">Podaj dane do nowej oferty:</h2>
            <ul class="p-1">
              <li class="mt-2">
                <label for="companySelect">Wybierz firmę:</label>
                <select id="companySelect" name="company_id">
                  <?php if (!empty($companies)) : ?>
                    <?php foreach ($companies as $data) : ?>
                      <option value="<?php echo htmlspecialchars($data['company_id']); ?>"><?php echo htmlspecialchars($data['name']); ?></option>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <option value="">No companies found</option>
                  <?php endif; ?>
                </select>
              </li>
              <li class="mt-2">
                <label for="profession_name">Nazwa zawodu:</label>
                <input type="text" id="profession_name" name="profession_name" class="form-control contact-input p-1" value="" placeholder="np. Programista">
              </li>
              <li class="mt-2">
                <select id="contractType" name="type_of_contract">
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
              </li>
              <li class="mt-2">
                <label for="type_of_job">Typ pracy:</label>
                <input type="text" id="type_of_job" name="type_of_job" class="form-control contact-input p-1" value="" placeholder="np. Programista PHP, SQL, HTML, CSS">
              </li>
              <li>
                <label for="salary">Wynagrodzenie:</label>
                <input type="text" id="salary" name="salary" class="form-control contact-input p-1" value="" placeholder="np. 7000zł">
              </li>
              <li class="mt-2">
                <label for="days">Dni robocze:</label>
                <input type="text" id="days" name="days" class="form-control contact-input p-1" value="" placeholder="np. pon-pt">
              </li>
              <li class="mt-2">
                <label for="hours">Godziny pracy:</label>
                <input type="text" id="hours" name="hours" class="form-control contact-input p-1" value="" placeholder="np. 9:00-17:00">
              </li>
              <li class="mt-2">
                <label for="expired">Wygaśnięcie oferty:</label>
                <input type="date" id="expired" name="expired" class="form-control contact-input p-1">
              </li>
              <li class="mt-2">
                <label for="categorySelect">Wybierz kategorię:</label>
                <select id="categorySelect" name="category_id">
                  <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $data) : ?>
                      <option value="<?php echo htmlspecialchars($data['category_id']); ?>"><?php echo htmlspecialchars($data['name']); ?></option>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <option value="">No categories found</option>
                  <?php endif; ?>
                </select>
              </li>
              <li class="mt-2">
                <label for="duties">Obowiązki:</label>
                <textarea rows="4" cols="50" name="duties" id="duties" class="form-control courses-input p-1"></textarea>
              </li>
              <li class="mt-2">
                <label for="requirements">Wymagania:</label>
                <textarea rows="4" cols="50" name="requirements" id="requirements" class="form-control courses-input p-1"></textarea>
              </li>


            </ul>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary btn-sm save-button">Dodaj</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>