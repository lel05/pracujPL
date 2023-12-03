<?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid  mx-custom">
    <a href="index.php" style="width: 20%; height: 56px;" class="rounded-5 navbar-brand overflow-hidden d-flex align-items-center justify-content-center">
      <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <p class="nav-link fw-medium">Ile posiadamy ogłoszeń: </p>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php
        if (isset($_SESSION["userId"])) {

          require_once '../includes/dbh.inc.php';
          require_once '../includes/functions.inc.php';
          $userExists = userExists($conn, $_SESSION['userEmail']);

          $name = $userExists['firstname'];
          $surname = $userExists['surname'];
          $surnameFirstletter = substr($surname, 0, 1);

          echo '<li class="nav-item dropdown bg-warning rounded-5">';
            echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
            echo '<img src="../Images/logos/logo.ico" alt="profile picture" class="rounded-5 me-2" style="width: 40px; heigth: 40px; margin: -8px;">';
            echo  $name . " " . $surnameFirstletter.".";
            echo '</a>';
            echo '<ul class="dropdown-menu w-100 p-3 rounded mt-2">';
              echo '<li><a class="dropdown-item border border-warning rounded-5 my-2 text-center text-warning" href="../login-form/index.php">Mój profil</a></li>';
              echo '<li><a class="dropdown-item rounded-5 my-2 text-center border border-warning text-warning" href="../register-form/index.php">Ustawienia</a></li>';
              echo '<li><a class="dropdown-item rounded-5 my-2 text-center bg-warning" href="../includes/logout.inc.php">Wyloguj</a></li>';
            echo '</ul>';
          echo '</li>';
        } else {
          echo '<li class="nav-item dropdown bg-warning rounded-5">';
            echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
            echo 'Moje konto';
            echo '</a>';
            echo '<ul class="dropdown-menu w-100 p-3 rounded mt-2">';
              echo '<li><a class="dropdown-item bg-warning rounded-5 my-2 text-center" href="../login-form/index.php">Zaloguj się</a></li>';
              echo '<li><a class="dropdown-item rounded-5 my-2 text-center border border-warning text-warning" href="../register-form/index.php">Zarejestruj się</a></li>';
            echo '</ul>';
          echo '</li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>