<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST["lastname"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];


    if ($password !== $confirmPassword) {
        $error = "Password tidak cocok";
    } else {
        $query = "INSERT INTO akun (firstname, lastname, username, email,  password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
        if ($conn->query($query) === true) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Gagal melakukan registrasi";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/NavbarAuth.php" ?>
    <section class="main">
        <div class="card">
            <h1>REGISTRASI</h1>
            <hr />
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="input-field">
                    <div class="input-row">
                        <div class="input-label">
                            <span>
                                <img src="./assets/images/svgs/profile.svg" width="20px" alt="">
                                <span>Your name</span>
                            </span>
                        </div>
                        <div class="input-colon">:</div>
                        <div class="input-data input-data-name">
                            <input type="text" name="firstname" id="" placeholder="First Name" required pattern="[a-z A-Z]+$" title="Hanya huruf">
                            <input type="text" name="lastname" id="" placeholder="Last Name" required pattern="[a-z A-Z]+$" title="Hanya huruf">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-label">
                            <span>
                                <img src="./assets/images/svgs/username.svg" width="20px" alt="">
                                <span>Username</span>
                            </span>
                        </div>
                        <div class="input-colon">:</div>
                        <div class="input-data">
                            <input type="text" name="username" id="" placeholder="Input username" required pattern="[a-z0-9]+$" title="Hanya huruf kecil dan angka">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-label">
                            <span>
                                <img src="./assets/images/svgs/email.svg" width="20px" alt="">
                                <span>Email</span>
                            </span>
                        </div>
                        <div class="input-colon">:</div>
                        <div class="input-data">
                            <input type="email" name="email" id="" placeholder="Input email" required>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-label">
                            <span>
                                <img src="./assets/images/svgs/password.svg" width="20px" alt="">
                                <span>Password</span>
                            </span>
                        </div>
                        <div class="input-colon">:</div>
                        <div class="input-data input-data-password">
                            <input type="password" name="password" id="" placeholder="Input password" required>
                            <input type="password" name="confirm_password" id="" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="input-row submit">
                        <button type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div>Sudah punya akun? <a href="login.php"><b>Masuk Disini !</b></a></div>
    </section>
</body>

</html>