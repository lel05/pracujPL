<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - Polityka Prywatności</title>
  <?php
  include_once '../includes.php';
  ?>
</head>

<body>
  <a href="../main/index.php" style="width: 20%; height: 100px;" class="position-absolute top-0 start-50 translate-middle-x rounded-3 overflow-hidden d-flex align-items-center justify-content-center mt-5">
    <img src="../Images/logos/logoWithName.png" alt="logo" class="img-fluid">
  </a>

  <div class="container d-flex flex-column w-50" style="margin-top: 200px">

  <div class="mt-4">
        <h2>1. Postanowienia ogólne</h2>
        <p>Niniejsza Polityka Prywatności określa zasady przetwarzania i ochrony danych osobowych użytkowników serwisu KarieraPlus.</p>
        <p>Administratorem danych osobowych jest KarieraPlus.</p>
        <p>Administrator dba o ochronę prywatności użytkowników oraz zapewnia, że przetwarzanie danych odbywa się zgodnie z obowiązującymi przepisami prawa.</p>
    </div>

    <div class="mt-4">
        <h2>2. Zakres i cel przetwarzania danych osobowych</h2>
        <p>Dane osobowe są zbierane i przetwarzane w celach:</p>
        <ul>
            <li>umożliwienia rejestracji i korzystania z Serwisu,</li>
            <li>publikacji oraz wyszukiwania ofert pracy,</li>
            <li>kontaktu pomiędzy pracodawcami a kandydatami,</li>
            <li>obsługi zgłoszeń oraz wsparcia technicznego,</li>
            <li>prowadzenia działań marketingowych i statystycznych.</li>
        </ul>
    </div>

    <div class="mt-4">
        <h2>3. Podstawy prawne przetwarzania danych</h2>
        <p>Przetwarzanie danych odbywa się na podstawie:</p>
        <ul>
            <li>zgody użytkownika (art. 6 ust. 1 lit. a RODO),</li>
            <li>niezbędności do wykonania umowy (art. 6 ust. 1 lit. b RODO),</li>
            <li>obowiązków prawnych Administratora (art. 6 ust. 1 lit. c RODO),</li>
            <li>uzasadnionego interesu Administratora (art. 6 ust. 1 lit. f RODO).</li>
        </ul>
    </div>

    <div class="mt-4">
        <h2>4. Okres przechowywania danych</h2>
        <p>Dane osobowe są przechowywane przez okres niezbędny do realizacji celów przetwarzania, a następnie usuwane lub anonimizowane.</p>
    </div>

    <div class="mt-4">
        <h2>5. Udostępnianie danych osobowych</h2>
        <p>Dane osobowe mogą być udostępniane:</p>
        <ul>
            <li>pracodawcom oraz rekruterom w ramach publikowanych ofert pracy,</li>
            <li>podmiotom wspierającym działanie Serwisu (np. dostawcom hostingu, systemów analitycznych),</li>
            <li>organom uprawnionym na podstawie przepisów prawa.</li>
        </ul>
    </div>

    <div class="mt-4">
        <h2>6. Prawa użytkowników</h2>
        <p>Użytkownik ma prawo do:</p>
        <ul>
            <li>dostępu do swoich danych,</li>
            <li>sprostowania danych,</li>
            <li>usunięcia danych ("prawo do bycia zapomnianym"),</li>
            <li>ograniczenia przetwarzania,</li>
            <li>przenoszenia danych,</li>
            <li>wniesienia sprzeciwu wobec przetwarzania danych,</li>
            <li>wycofania zgody na przetwarzanie danych w dowolnym momencie.</li>
        </ul>
    </div>

    <div class="mt-4">
        <h2>7. Pliki cookies i technologie śledzące</h2>
        <p>Serwis korzysta z plików cookies w celach statystycznych, analitycznych oraz funkcjonalnych.</p>
    </div>

    <div class="mt-4">
        <h2>8. Zmiany w Polityce Prywatności</h2>
        <p>Administrator zastrzega sobie prawo do wprowadzania zmian w niniejszej Polityce Prywatności.</p>
    </div>

    <div class="mt-4 mb-5">
        <h2>9. Kontakt</h2>
        <p>W sprawach związanych z przetwarzaniem danych osobowych można skontaktować się z Administratorem pod adresem e-mail: <a class="text-warning" href="mailto:kontakt@karieraplus.pl">kontakt@karieraplus.pl</a>.</p>
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