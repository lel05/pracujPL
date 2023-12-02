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

<body>
  <a href="../main/index.php" style="width: 20%; height: 100px;" class="position-absolute top-0 start-50 translate-middle-x rounded-3 overflow-hidden d-flex align-items-center justify-content-center mt-5">
    <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
  </a>

  <div class="container position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center w-50">
    <div class="login-user me-5 w-100 bg-secondary bg-opacity-10 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">Logowanie dla użytkowników</p>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adres e-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nigdy nie udostępnimy Twojego adresu e-mail.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Hasło</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
        </div>
        <button type="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zaloguj jako użytkownik</button>
      </form>
    </div>
    <div class="login-company ms-5 w-100 bg-secondary bg-opacity-10 p-4 rounded-4 border border-warning">
      <p class="text-center text-uppercase fs-5 fw-medium">Logowanie dla firm</p>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nazwa firmy</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Hasło</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
        </div>
        <button type="submit" class="position-relative bottom-0 start-50 translate-middle-x btn btn-warning mx-auto">Zaloguj jako firma</button>
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

    <script>
      var myToast = new bootstrap.Toast(document.getElementById('liveToast'), {
        autohide: false
      });
      myToast.show();
    </script>

</body>

</html>