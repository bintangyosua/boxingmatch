<?php
include 'auth.php';
include 'koneksi.php';

checkLogin();

$user_id = $_SESSION['user_id'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses form edit profil jika disubmit
    $yourname = $_POST['yourname'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    // Untuk keperluan contoh, hanya memperbarui nama dan username
    $queryUpdateProfile = "UPDATE akun SET yourname='$yourname', username='$username' WHERE id=$user_id";
    $conn->query($queryUpdateProfile);
    $queryUpdateProfile = "UPDATE akun SET email='$email', email='$email' WHERE id=$user_id";
    $conn->query($queryUpdateProfile);

    // Redirect kembali ke dashboard setelah memperbarui profil
    header("Location: dashboard.php");
    exit();
}

$queryUser = "SELECT * FROM akun WHERE id = $user_id";
$resultUser = $conn->query($queryUser);
$userData = $resultUser->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
</head>

<body>
    <h2>Edit Profil</h2>
    <form method="post" action="">
        <label>Your Name:</label>
        <input type="text" name="yourname" value="<?php echo $userData['yourname']; ?>" required><br>

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $userData['username']; ?>" required><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $userData['email']; ?>" required><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>

</html>