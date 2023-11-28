<?php
require_once "./auth.php";

$id = $_GET["id"];
$res = runQuery("SELECT * FROM pemain WHERE id = " . $id);
$old_data = mysqli_fetch_assoc($res);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $kota = $_POST["kota"];

    runQuery("UPDATE pemain SET nama = '$nama', umur = '$umur', kota = '$kota' WHERE id = " . $id);
    header("Location: admin-pemain.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Pemain</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php require_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="card-header">
                    <h1>Admin - Edit Pemain</h1>
                    <a href="admin-jadwal.php">
                        <button class="new-schedule" type="submit" name="submit" value="submit">
                            <img src="./assets/images/svgs/plus.svg" alt="">
                            <span>Simpan</span>
                        </button>
                    </a>
                </div>
                <?php if (isset($error)) { ?>
                    <div class="error-message">
                        <span class="error-text"><?= $error; ?></span>
                    </div>
                <?php } ?>
                <hr class="divider">
                <div class="form">
                    <div class="row">
                        <label for="">Nama</label>
                        <span>:</span>
                        <input type="text" name="nama" value="<?= $old_data['nama'] ?>" pattern="[a-z A-Z]+$" title="Hanya huruf dan angka">
                    </div>
                    <div class="row">
                        <label for="">Umur</label>
                        <span>:</span>
                        <input type="number" name="umur" value="<?= $old_data['umur'] ?>" pattern="[0-9]+$" title="Hanya angka">
                    </div>
                    <div class="row">
                        <label for="">Kota</label>
                        <span>:</span>
                        <input type="text" name="kota" required value="<?= $old_data['kota'] ?>" pattern="[a-z A-Z]+$" title="Hanya huruf">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>