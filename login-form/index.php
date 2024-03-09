<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - logowanie</title>
  <?php
  include_once '../includes.php';
  ?>
  <link rel="stylesheet" href="../styles/login-form/styles.css">
</head>

<body onload="loadRememberedEmail()">
  <a href="../main/index.php" style="width: 20%; height: 100px;" class="position-absolute top-0 start-50 translate-middle-x rounded-3 overflow-hidden d-flex align-items-center justify-content-center mt-5">
    <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
  </a>

  <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center w-25">
    <div class="login-user w-100 bg-secondary bg-opacity-10 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">Logowanie dla użytkowników</p>
      <form action="../includes/login.inc.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adres e-mail</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nigdy nie udostępnimy Twojego adresu e-mail.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Hasło</label>
          <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme" value="true" onchange="rememberMe()">
          <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
        </div>
        <p class="fs-6">Nie posiadasz jeszcze konta? <a href="../register-form/index.php" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Zarejestruj</a> się za darmo!</p>
        <button type="submit" name="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zaloguj</button>
      </form>
      <?php

      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Wypełnij wszystkie pola!</p>";
        } else if ($_GET['error'] == "wronglogin") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Logowanie nie powiodło się.</p>";
        } else if ($_GET['error'] == "invalidemail") {
          echo "<p class='text-center fw-medium text-danger pt-2'>Niepoprawny adres e-mail!</p>";
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

      function rememberMe() {
        var checkbox = document.getElementById("exampleCheck1");
        var emailInput = document.getElementById("exampleInputEmail1");

        if (checkbox.checked) {
          localStorage.setItem("email", emailInput.value);
        } else {
          localStorage.removeItem("email");
        }
      }

      function loadRememberedEmail() {
        var email = localStorage.getItem("email");
        if (email) {
          document.getElementById("exampleInputEmail1").value = email;
          document.getElementById("exampleCheck1").checked = true;
        }
      }
    </script>

</body>

</html>