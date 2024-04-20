<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KarieraPlus - znajdź swoją wymarzoną prace!</title>
  <?php
  include_once '../includes.php';
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">
</head>

<body>

  <header>
    <?php
    include_once '../header/index.php';
    ?>
  </header>

  <section style="background-color: red; height: 200px;">
    <!-- wyszukiwarka -->
  </section>

  <section class="position-absolute top-50 start-50 translate-middle">
    <?php

    $sql = "SELECT * FROM offer";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo '<div style="width: 350px; height: 200px; padding: 5px;" class="border rounded shadow-sm float-start m-3">';
        echo '<div>';
          echo '<img src="../Images/logos/logoRounded.ico" alt="company logo" style="width: 70px;" class="float-start me-1">';
          echo '<div>';
            echo '<label>'.$row['profession_name'].'</label><br>';
            echo '<label>'.$row['duties'].'</label><br>';
            echo '<label>'.$row['salary'].'</label>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    }
    ?>
  </section>

</body>

</html>