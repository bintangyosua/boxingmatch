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
      <table>
        <tr>
          <td>Username</td>
          <td>:</td>
          <td>gilanggg</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>gilang@gg.com</td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td>********</td>
        </tr>
      </table>
      <div class="buttons">
        <button class="edit">edit profile</button>
        <button class="hapus">hapus akun</button>
      </div>
    </div>
  </div>
</body>


</html>