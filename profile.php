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
      <h2 class="profile-name">Gilang</h2>
      <div class="main-card">
        <div class="row">
          <div class="label">Username</div>
          <div>:</div>
          <div class="value">gilanggg</div>
        </div>
        <div class="row">
          <div class="label">Email</div>
          <div>:</div>
          <div class="value">gilang@gg.com</div>
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
          <button class="hapus">hapus akun</button>
        </a>
      </div>
    </div>
  </div>
</body>


</html>