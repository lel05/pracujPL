<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
  include_once '../includes.php';
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">
  <link rel="stylesheet" href="../styles/user-page/styles.css">
</head>

<body>

  <header>
    <?php
    include_once '../header/index.php';
    ?>
  </header>

  <section>
  <div class="container mt-5 profile-container">
  <div class="row">
    <div class="col-md-4">
      <img src="placeholder.jpg" alt="Profile" class="profile-image img-fluid">
      <div class="mt-3">
        <div><strong>Imię Nazwisko</strong></div>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <input type="text" class="form-control" placeholder="Imię">
          <input type="text" class="form-control mt-2" placeholder="Nazwisko">
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="mt-3">
        <h4>Dane kontaktowe</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <div>Email: example@email.com</div>
          <div>Numer telefonu: 123-456-789</div>
          <div>Data urodzenia: 01-01-1990</div>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
      <div class="mt-3">
        <h4>Doświadczenie zawodowe</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <textarea class="form-control" rows="3" placeholder="Opis doświadczenia zawodowego"></textarea>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
      <div class="mt-3">
        <h4>Wykształcenie</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <div>Nazwa szkoły: Nazwa szkoły</div>
          <div>Wszystkie języki obce: Języki</div>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
      <div class="mt-3">
        <h4>Umiejętności</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <div>Umiejętność 1</div>
          <div>Umiejętność 2</div>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
      <div class="mt-3">
        <h4>Kursy</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <div>Kurs 1</div>
          <div>Kurs 2</div>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
      <div class="mt-3">
        <h4>Linki</h4>
        <button class="btn btn-link edit-btn">Edytuj</button>
        <div class="editable active">
          <div>Link 1</div>
          <div>Link 2</div>
          <button class="btn btn-primary mt-2">Zapisz</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-e2cCEz9GGSKpGx6Xp5s5SPrOG8OHX5/Y9hA7TWqqfnJ5tkI5ehVg1u07TB5b9xIM" crossorigin="anonymous"></script>
</body>
</html>
  </section>

</body>

</html>