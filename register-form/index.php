<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - rejestracja</title>
  <?php
  include_once '../includes.php';
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.3/jquery.inputmask.bundle.min.js"></script>
</head>

<body>
  <a href="../main/index.php" style="width: 20%; height: 100px;" class="position-absolute top-0 start-50 translate-middle-x rounded-3 overflow-hidden d-flex align-items-center justify-content-center mt-5">
    <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
  </a>

  <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center w-50">
    <div class="login-user me-5 w-100 bg-secondary bg-opacity-10 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">rejestracja dla użytkowników</p>
      <form>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Imie</label>
          <input type="text" class="form-control" id="exampleInputName1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nazwisko</label>
          <input type="text" class="form-control" id="exampleInputSurame1">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adres e-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nigdy nie udostępnimy Twojego adresu e-mail.</div>
        </div>
        <button type="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zarejestruj się</button>
      </form>
    </div>
    <div class="login-company ms-5 w-100 bg-secondary bg-opacity-10 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">rejestracja dla firm</p>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nazwa firmy</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Hasło</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zarejestruj firme</button>
      </form>
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

    <script src="../node_modules/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
      var myToast = new bootstrap.Toast(document.getElementById('liveToast'), {
        autohide: false
      });
      myToast.show();

      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>

</body>

</html>