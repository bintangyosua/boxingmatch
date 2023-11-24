<?php
include "./auth.php";

if (!isLoggedIn()) header("Location: login.php");

$username = $_SESSION["username"];
$res = runQuery("SELECT * FROM akun WHERE username = '$username'");
$data = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="./assets/styles/style.css">
  <link rel="stylesheet" href="./assets/styles/profile.css">
</head>

<body>
  <?php include "./components/Navbar.php" ?>
  <div class="bg-img">
    <div class="card">
      <img src="./assets/images/profile.jpeg" alt="" class="card-img">
      <h2 class="profile-name" style="font-weight: 700;"><?= $data["firstname"] . " " . $data["lastname"] ?></h2>
      <div class="main-card">
        <div class="row">
          <div class="label">Username</div>
          <div>:</div>
          <div class="value"><?= $data["username"] ?></div>
        </div>
        <div class="row">
          <div class="label">Email</div>
          <div>:</div>
          <div class="value"><?= $data["email"] ?></div>
        </div>
        <div class="row">
          <div class="label">Password</div>
          <div>:</div>
          <div class="value">********</div>
        </div>
      </div>

      <div class="buttons">
        <a href="edit-profile.php" style="cursor: pointer;">
          <button class="edit">edit profile</button>
        </a>
        <a href="#">
          <button class="hapus" onclick="confirmDelete()">hapus akun</button>
        </a>
      </div>
    </div>
  </div>

  <script>
    function confirmDelete() {
      if (confirm("Apakah kamu yakinnn??")) {
        location.href = 'delete-akun.php';
      }
    }
  </script>
</body>


</html>