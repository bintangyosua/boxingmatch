<?php
require_once "./auth.php";

$username = $_GET['username'];
$res = runQuery("SELECT * FROM akun WHERE username = '$username'");
$row = mysqli_fetch_assoc($res);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $is_admin = $_POST['is_admin'] ?? 0;

    runQuery("UPDATE akun SET is_admin = $is_admin WHERE username = '$username'");

    header("Location: admin-user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Edit</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php require_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="card-header">
                    <h1>Admin - User Edit</h1>
                    <a href="admin-jadwal.php">
                        <button class="new-schedule" type="submit" name="submit" value="submit">
                            <img src="./assets/images/svgs/plus.svg" alt="">
                            <span>Simpan</span>
                        </button>
                    </a>
                </div>
                <hr class="divider">
                <div class="form">
                    <div class="row">
                        <label for="">Username</label>
                        <span>:</span>
                        <input type="text" name="username" id="" readonly value="<?= $row['username'] ?>">
                    </div>
                    <div class="row" style="justify-content: start;">
                        <label for="" style="margin-left: 15px;">Admin</label>
                        <span>:</span>
                        <?php if ($row["is_admin"]) : ?>
                            <input type="checkbox" name="is_admin" style="width: fit-content" value="1" checked>
                        <?php else : ?>
                            <input type="checkbox" name="is_admin" style="width: fit-content" value="1">
                        <?php endif ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>