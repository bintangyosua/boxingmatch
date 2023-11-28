<?php
include_once 'auth.php';
include_once 'koneksi.php';

if (isLoggedIn()) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
        // exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/NavbarAuth.php" ?>
    <section class="main">
        <!-- Login Card -->
        <div class="card">
            <h1>LOGIN</h1>
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
                                <img src="./assets/images/svgs/username.svg" width="20px" alt="">
                                <span>Username</span>
                            </span>
                        </div>
                        <div class="input-colon">:</div>
                        <div class="input-data">
                            <input type="text" name="username" id="" placeholder="Input username" pattern="[a-z0-9]+$" title="Hanya huruf kecil dan angka tanpa spasi">
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
                            <input type="password" name="password" id="" placeholder="Input password">
                        </div>
                    </div>
                    <div class="input-row submit">
                        <hr>
                        <button>Login</button>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
        <div>Belum punya akun? <a href="register.php"><b>Daftar Disini !</b></a></div>
    </section>
</body>

</html>