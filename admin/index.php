<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin page</title>
  <?php
  include_once '../includes.php';
  //error_reporting(0);
  ?>
  <link rel="stylesheet" href="../styles/header/styles.css">
  <link rel="stylesheet" href="../styles/user-page/styles.css">

  <style>
    .profile-card {
      width: 1000px;
      margin: 50px auto;
      padding: 20px;
    }

    .profile-card h2 {
      font-size: 24px;
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

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    thead th {
      position: sticky;
      top: 0;
      z-index: 1;
    }

    .admin-containers {
      max-height: 200px;
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
          if ($userExists['role'] != "admin") {
            header("Location: ../main/index.php");
          }
        } else {
          header("Location: ../main/index.php");
        }

        ?>
        <div class="mb-3 shadow position-relative">
          <div style="height: 100px;">
            <div id="image-container">
              <?php
              if ($userExists['avatar'] != "") {
                echo '<img src="../Images/ProfilePictures/' . $userExists['avatar'] . '" alt="profile picture" class="float-start profile-avatar me-1">';
              } else {
                echo '<img src="../Images/logos/logo.ico" alt="default profile picture" class="float-start profile-avatar me-1">';
              }
              ?>
              <p><?php echo $userExists['firstname'] . " " . $userExists['surname'] . "<span class='text-info'> ADMIN</span>"; ?></p>
            </div>
          </div>
        </div>

        <div class="mb-3 shadow position-relative">
          <h2 class="p-1">Użytkownicy:</h2>
          <div class="admin-containers overflow-x-hidden overflow-y-auto">
            <table class="p-1">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Firstname</th>
                  <th>Surname</th>
                  <th>Birth date</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Role</th>
                  <th class="text-warning">Edit</th>
                  <th class="text-danger">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    if ($row['user_id'] != $userExists['user_id']) {
                      echo '<tr>';
                      echo '<td>' . $row['user_id'] . '</td>';
                      echo '<td>' . $row['firstname'] . '</td>';
                      echo '<td>' . $row['surname'] . '</td>';
                      echo '<td>' . $row['birth_date'] . '</td>';
                      echo '<td>' . $row['email'] . '</td>';
                      echo '<td>' . $row['phone_number'] . '</td>';
                      echo '<td>' . $row['role'] . '</td>';
                      echo '<td><a href="../admin/editUser.php?userId=' . $row['user_id'] . '&email=' . $row['email'] . '" class="text-warning">edit</a></td>';
                      echo '<td><a href="../admin/deleteUser.php?userId=' . $row['user_id'] . '" class="text-danger">delete</a></td>';
                      echo '</tr>';
                    }
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mb-3 shadow position-relative">
          <h2 class="p-1">Oferty:</h2>
          <div class="admin-containers overflow-x-hidden overflow-y-auto">
            <table class="p-1">
              <tr>
                <td>Id</td>
                <td>Firstname</td>
                <td>Surname</td>
                <td>Birth date</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Role</td>
                <td class="text-warning">Edit</td>
                <td class="text-danger">Delete</td>
              </tr>
              <?php
              $sql = "SELECT * FROM user";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<tr>';
                  echo '<td>' . $row['user_id'] . '</td>';
                  echo '<td>' . $row['firstname'] . '</td>';
                  echo '<td>' . $row['surname'] . '</td>';
                  echo '<td>' . $row['birth_date'] . '</td>';
                  echo '<td>' . $row['email'] . '</td>';
                  echo '<td>' . $row['phone_number'] . '</td>';
                  echo '<td>' . $row['role'] . '</td>';
                  echo '<td><a href="../admin/editUser.php?userId=' . $row['user_id'] . '" class="text-warning">edit</a></td>';
                  echo '<td><a href="../admin/deleteUser.php?userId=' . $row['user_id'] . '" class="text-danger">delete</a></td>';
                  echo '</tr>';
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>