<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - rejestracja</title>
  <?php
  include_once '../includes.php';
  ?>
</head>

<body>
  <a href="../main/index.php" style="width: 20%; height: 100px;" class="position-absolute top-0 start-50 translate-middle-x rounded-3 overflow-hidden d-flex align-items-center justify-content-center mt-5">
    <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
  </a>

  <img src="../Images/logos/character.png" alt="character">

  <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center w-25">
    <div class="login-user w-100 bg-light bg-opacity-75 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">rejestracja dla użytkowników</p>
      <form action="../includes/register.inc.php" method="post">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Imie</label>
          <input type="text" class="form-control" name="name" id="exampleInputName1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nazwisko</label>
          <input type="text" class="form-control" name="surname" id="exampleInputSurame1">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adres e-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nigdy nie udostępnimy Twojego adresu e-mail.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Hasło</label>
          <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zarejestruj się</button>
      </form>
      <?php

      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Wypełnij wszystkie pola!</p>";
        } else if ($_GET['error'] == "invalidnames") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Twoje imie lub nazwisko są niepoprawne!</p>";
        } else if ($_GET['error'] == "invalidemail") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Niepoprawny adres e-mail!</p>";
        } else if ($_GET['error'] == "userexists") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Podany adres e-mail jest już w użyciu!</p>";
        } else if ($_GET['error'] == "stmtfailed") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Coś poszło nie tak, spróbuj ponownie.</p>";
        } else if ($_GET['error'] == "none") {
          echo "<p class='text-center fw-medium text-success pt-2'>Rejestracja powiodła się! Możesz się teraz zalogować.</p>";
        }
      }
      ?>
    </div>
  </div>
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          Aby wrócić do strony głównej, naciśnij na nasze logo.
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>

    <script>
      var myToast = new bootstrap.Toast(document.getElementById('liveToast'), {
        autohide: false
      });
      myToast.show();
    </script>
</body>
</html>