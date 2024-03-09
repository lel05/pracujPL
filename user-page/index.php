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
        } else {
          header("Location: ../main/index.php");
        }
        $name = $userExists['firstname'];
        $surname = $userExists['surname'];
        $user_name = $name . " " . $surname;

        $user_contact = array(
          'Email' => $userExists['email'],
          'Numer telefonu' => $userExists['phone_number'],
        );
        $birthDate = $userExists['birth_date'];
        $user_experience = $userExists['job_experience'];
        $user_education = $userExists['education'];
        $user_skills = $userExists['skills'];
        $user_courses = $userExists['courses'];
        $links = $userExists["links"];

        if (strpos($links, "\n") !== false) {
          $linksArray = explode("\n", $userExists["links"]);
        } elseif (strpos($links, " ") !== false) {
          $linksArray = explode(" ", $userExists["links"]);
        }

        ?>

        <form action="../includes/user-page.inc.php" method="post" enctype="multipart/form-data">

          <div class="mb-3 shadow position-relative">
            <div style="height: 100px;">
              <div id="image-container">
                <?php
                if ($userExists['avatar'] != "") {
                  echo '<img src="../Images/ProfilePictures/' . $userExists['avatar'] . '" alt="" class="float-start profile-avatar me-1">';
                } else {
                  echo '<img src="../Images/logos/logo.ico" alt="" class="float-start profile-avatar me-1">';
                }

                ?>
                <p><?php echo $user_name; ?></p>
              </div>
              <div id="file-upload-container" class="d-none">
                <input type="file" name="file" id="file-input" class="float-start">
                <p><?php echo $user_name; ?></p>
              </div>
            </div>
          </div>

          <div class="mb-3 shadow position-relative contact-info-section">
            <h2 class="p-1">Dane kontaktowe:</h2>
            <ul class="p-1">
              <?php foreach ($user_contact as $key => $value) : ?>
                <li>
                  <label for="<?php echo str_replace(' ', '-', $key); ?>"><?php echo "$key:" ?></label>
                  <p class="contact-info" id="<?php echo str_replace(' ', '-', $key); ?>"><?php echo "$value"; ?></p>
                  <input type="text" name="<?php echo str_replace(' ', '', strtolower(trim($key))) ?>" class="form-control contact-input d-none p-1" value="<?php echo $value; ?>">
                </li>
              <?php endforeach; ?>
              <li>
                <label for="birthdate">Data urodzenia:</label>
                <p class="contact-info" id="birthdate"><?php echo $birthDate ?></p>
                <input type="text" name="dataurodzenia" class="form-control contact-input d-none p-1" value="rrrr-mm-dd">
              </li>
            </ul>
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Doświadczenie zawodowe:</h2>
            <div class="p-1 experience-info overflow-v-scroll"><?php echo $user_experience; ?></div>
            <textarea rows="4" cols="50" name="experience" class="form-control experience-input d-none p-1" id=""><?php echo $user_experience; ?></textarea>
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Wykształcenie:</h2>
            <div class="p-1 education-info overflow-v-scroll"><?php echo $user_education; ?></div>
            <textarea rows="4" cols="50" name="education" class="form-control education-input d-none p-1"><?php echo $user_education; ?></textarea>
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Umiejętności:</h2>
            <div class="p-1 skills-info overflow-v-scroll"><?php echo $user_skills; ?></div>
            <textarea rows="4" cols="50" name="skills" class="form-control skills-input d-none p-1"><?php echo $user_skills; ?></textarea>
          </div>
          <div class="mb-3 shadow position-relative">
            <h2 class="p-1">Kursy:</h2>
            <div class="shadow p-1 courses-info overflow-v-scroll"><?php echo $user_courses; ?></div>
            <textarea rows="4" cols="50" name="courses" class="form-control courses-input d-none p-1"><?php echo $user_courses; ?></textarea>
          </div>
          <div class="mb-3 position-relative">
            <h2 class="p-1">Linki:</h2>
            <div class="shadow p-1 links-info overflow-v-scroll">
              <?php
              foreach ($linksArray as $link) {
                $hostName = parse_url($link);
                echo "<a href='$link'>" . $hostName['host'] . "</a><br>";
              }
              ?>
            </div>
            <textarea rows="4" cols="50" name="links" class="form-control links-input d-none p-1"><?php echo $links; ?></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary float-end btn-sm bottom-0 end-0 mt-1 me-1 save-button d-none">Zapisz</button>
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
      const allTextareas = document.querySelectorAll('.contact-input, .experience-input, .education-input, .skills-input, .courses-input, .links-input');
      const imageContainer = document.getElementById('image-container');
      const fileUploadContainer = document.getElementById('file-upload-container');
      const isEditing = editButton.textContent === 'Edytuj';

      if (isEditing) {
        allInfos.forEach(info => {
          info.classList.add('d-none');
        });
        allTextareas.forEach(input => {
          input.classList.remove('d-none');
        });
        imageContainer.classList.add('d-none');
        fileUploadContainer.classList.remove('d-none');
        editButton.textContent = 'Anuluj';
        saveButton.classList.remove('d-none');
      } else {
        allInfos.forEach(info => {
          info.classList.remove('d-none');
        });
        allTextareas.forEach(input => {
          input.classList.add('d-none');
        });
        imageContainer.classList.remove('d-none');
        fileUploadContainer.classList.add('d-none');
        editButton.textContent = 'Edytuj';
        saveButton.classList.add('d-none');
      }
    });
  </script>
</body>

</html>