<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
  include_once '../includes.php';
  //error_reporting(0);
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">
  <link rel="stylesheet" href="../styles/user-page/styles.css">

  <style>
    /* Personalizacja stylów */
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
        } else {
          header("Location: ../main/index.php");
        }
        $name = $userExists['firstname'];
        $surname = $userExists['surname'];
        $user_name = $name . " " . $surname;

        $user_contact = array(
          'Email' => $userExists['email'],
          'Numer telefonu' => $userExists['phone_number'],
          'Data urodzenia' => $userExists['birth_date']
        );
        $user_experience = $userExists['job_experience'];
        $user_education = $userExists['education'];
        $user_skills = $userExists['skills'];
        $user_courses = $userExists['courses'];
        $links_list = $userExists["links"];
        ?>

        <form action="../includes/user-page.inc.php" method="post">

          <div class="mb-3 shadow position-relative">
            <div style="height: 100px;">
              <img src="../Images/logos/logo.ico" alt="" class="float-start profile-avatar me-1">
              <p><?php echo $user_name; ?></p>
            </div>
          </div>

          <div class="mb-3 shadow position-relative contact-info-section">
            <h2 class="p-1">Dane kontaktowe:</h2>
            <ul class="p-1">
              <?php foreach ($user_contact as $key => $value) : ?>
                <li>
                  <label for="<?php echo str_replace(' ', '-', $key); ?>"><?php echo "$key:" ?></label>
                  <p class="contact-info" id="<?php echo str_replace(' ', '-', $key); ?>"><?php echo "$value"; ?></p>
                  <input type="text" class="form-control contact-input d-none p-1" value="<?php echo $value; ?>">
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Doświadczenie zawodowe:</h2>
            <p class="p-1 experience-info"><?php echo $user_experience; ?></p>
            <input type="text" class="form-control experience-input d-none p-1" id="" value="<?php echo $user_experience; ?>">
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Wykształcenie:</h2>
            <p class="p-1 education-info"><?php echo $user_education; ?></p>
            <input type="text" class="form-control education-input d-none p-1" value="<?php echo $user_education; ?>">
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Umiejętności:</h2>
            <p class="p-1 skills-info"><?php echo $user_skills; ?></p>
            <input type="text" class="form-control skills-input d-none p-1" value="<?php echo $user_skills; ?>">
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Kursy:</h2>
            <p class="shadow p-1 courses-info"><?php echo $user_courses; ?></p>
            <input type="text" class="form-control courses-input d-none p-1" value="<?php echo $user_courses; ?>">
          </div>
          <div class="mb-3 position-relative">
            <h2 class="p-1">Linki:</h2>
              <p class="shadow p-1 links-info"><?php
                echo "$links_list";
              ?>
              </p>
              <input type="text" class="form-control links-input d-none p-1" value="<?php echo $links_list; ?>">
          </div>
          <button type="submit" class="btn btn-primary float-end btn-sm bottom-0 end-0 mt-1 me-1 save-button d-none">Zapisz</button>
        </form>
        <button class="btn btn-primary btn-sm bottom-0 end-0 mt-1 me-1 edit-button">Edytuj</button>
      </div>
    </div>
  </section>

  <script>
    const editButton = document.querySelector('.edit-button');
    const saveButton = document.querySelector('.save-button');

    editButton.addEventListener('click', () => {
      const allInfos = document.querySelectorAll('.contact-info, .experience-info, .education-info, .skills-info, .courses-info, .links-info');
      const allInputs = document.querySelectorAll('.contact-input, .experience-input, .education-input, .skills-input, .courses-input, .links-input');
      const isEditing = editButton.textContent === 'Edytuj';

      if (isEditing) {
        allInfos.forEach(info => {
          info.classList.add('d-none');
        });
        allInputs.forEach(input => {
          input.classList.remove('d-none');
        });
        editButton.textContent = 'Anuluj';
        saveButton.classList.remove('d-none');
      } else {
        allInfos.forEach(info => {
          info.classList.remove('d-none');
        });
        allInputs.forEach(input => {
          input.classList.add('d-none');
        });
        editButton.textContent = 'Edytuj';
        saveButton.classList.add('d-none');
      }
    });

    /*saveButton.addEventListener('click', () => {
      const allInfos = document.querySelectorAll('.contact-info, .experience-info, .education-info, .skills-info, .courses-info');
      const allInputs = document.querySelectorAll('.contact-input, .experience-input, .education-input, .skills-input, .courses-input');
      const newData = [];

      allInputs.forEach((input, index) => {
        newData.push(input.value);
        allInfos[index].textContent = input.value;
      });

      allInfos.forEach(info => {
        info.classList.remove('d-none');
      });
      allInputs.forEach(input => {
        input.classList.add('d-none');
      });
      editButton.textContent = 'Edytuj';
      saveButton.classList.add('d-none');

      // Tutaj dodaj kod AJAX do wysłania danych na serwer i zapisania ich w bazie danych
    });*/
  </script>
</body>

</html>