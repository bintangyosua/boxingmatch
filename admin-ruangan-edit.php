<?php
require_once "./auth.php";

$old_kode = $_GET["kode"];
$res = runQuery("SELECT * FROM ruangan WHERE kode = '$old_kode'");
$row = $res->fetch_assoc();

if (isset($_POST["submit"])) {
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];


    if (runQuery("SELECT * FROM ruangan WHERE kode = '$kode' AND kode != '$old_kode'")->num_rows > 0) {
        $error = "Kode ruangan sudah ada";
    } else {
        runQuery("UPDATE ruangan SET kode = '$kode', nama = '$nama' WHERE kode = '$old_kode'");
        header("Location: admin-ruangan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Ruangan</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php require_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="card-header">
                    <h1>Admin - Edit Ruangan</h1>
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
                        <label for="">Kode</label>
                        <span>:</span>
                        <input type="text" name="kode" value="<?= $row["kode"] ?>">
                    </div>
                    <div class="row">
                        <label for="">Nama</label>
                        <span>:</span>
                        <input type="text" name="nama" value="<?= $row["nama"] ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>