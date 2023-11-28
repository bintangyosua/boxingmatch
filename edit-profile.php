<?php
require_once "auth.php";

if (!isLoggedIn()) header("Location: index.php");

$username = $_SESSION["username"];
$res = $conn->query("SELECT * FROM akun WHERE username = '$username'");
$data = $res->fetch_assoc();

if (isset($_POST["simpan"])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST["lastname"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $res = $conn->query("SELECT * FROM akun");
    while ($old_data = mysqli_fetch_assoc($res)) {
        if ($password !== $confirmPassword) {
            $error = "Password tidak cocok";
            break;
        } else if ($username === $data["username"]) {
            $sql = "UPDATE akun SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' WHERE username = '$username'";
        } else if ($username === $old_data["username"]) {
            $error = "Username sudah ada";
            break;
        } else {
            $sql = "UPDATE akun SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', password = '$password' WHERE username = '" . $_SESSION["username"] . "'";
            $_SESSION["username"] = $username;
            // exit();
        }

        if (runQuery($sql)) {
            header("Location: profile.php");
            exit();
        } else {
            $error = "Gagal melakukan update profile";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <section class="main">
        <div class="card">
            <h1>Edit Profile</h1>
            <?php if (isset($error)) { ?>
                <div class="error-message">
                    <span class="error-text"><?= $error; ?></span>
                </div>
            <?php } ?>
            <hr />
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
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
                            <input type="text" name="firstname" id="" placeholder="First Name" value="<?= $data["firstname"] ?>" pattern="[a-z A-Z]+$" title="Hanya huruf" required>
                            <input type="text" name="lastname" id="" placeholder="Last Name" value="<?= $data["lastname"] ?>" pattern="[a-z A-Z]+$" title="Hanya huruf" required>
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
                            <input type="text" name="username" id="" placeholder="Input username" value="<?= $data["username"] ?>" required pattern="[a-z0-9]+$" title="Hanya huruf kecil dan angka">
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
                            <input type="email" name="email" id="" placeholder="Input email" value="<?= $data["email"] ?>">
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
                            <input type="password" name="password" id="" placeholder="Input password" value="<?= $data["password"] ?>">
                            <input type="password" name="confirm_password" id="" placeholder="Confirm your password" value="<?= $data["password"] ?>">
                        </div>
                    </div>
                    <div class="input-row submit">
                        <button value="simpan" name="simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>