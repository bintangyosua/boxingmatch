<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yourname = $_POST['yourname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];


    if ($password !== $confirmPassword) {
        $error = "Password tidak cocok";
    } else {
        $query = "INSERT INTO akun (yourname, username, email,  password) VALUES ('$yourname', '$username', '$email', '$password')";
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
</head>

<body>
    <h2>Register</h2>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="">
        <label>Your Name:</label>
        <input type="text" name="yourname" required><br>

        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Email:</label>
        <input type="text" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <p> Sudah punya akun? <a href="login.php"> Masuk Disini!</a> </p>

        <button type="submit">Register</button>
    </form>
</body>

</html>