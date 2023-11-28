<?php
require_once "auth.php";

if (!isAdmin()) header("Location: login.php");
$pemain1 = runQuery("SELECT * FROM pemain");
$pemain2 = runQuery("SELECT * FROM pemain");
$ruangan = runQuery("SELECT * FROM ruangan");

$id = $_GET["id"];

$res_jadwal = runQuery("SELECT * FROM jadwal WHERE id = " . $id);
$row_jadwal = mysqli_fetch_assoc($res_jadwal);

if (!isAdmin()) header("Location: index.php");

if (isset($_POST["submit"])) {
    $player1_id = $_POST["player1_id"];
    $player2_id = $_POST["player2_id"];
    $waktu = $_POST["waktu"];
    $kode_ruangan = $_POST["kode_ruangan"];

    $is_waktu_pemain_sama = runQuery("SELECT * from jadwal WHERE waktu = '$waktu' AND ((player1_id = '$player1_id' AND player2_id = '$player2_id') OR (player1_id = '$player2_id' AND player2_id = '$player1_id'))");
    $is_there_waktu_ruangan = runQuery("SELECT waktu, kode_ruangan FROM jadwal WHERE waktu = '$waktu' AND kode_ruangan = '$kode_ruangan' AND id != '$id'");

    if ($player1_id === $player2_id) {
        $error = "Pemain tidak boleh sama";
    } else if (mysqli_num_rows($is_waktu_pemain_sama) > 0) {
        $error = "Pemain telah bermain di waktu yang sama";
    } else if ($is_there_waktu_ruangan->num_rows > 0) {
        $error = "Jadwal dengan Ruangan yang sama sudah ada";
    } else {
        $sql = "UPDATE jadwal SET player1_id = '$player1_id', player2_id = '$player2_id', waktu = '$waktu', kode_ruangan = '$kode_ruangan' WHERE id = $id";

        if (runQuery($sql)) {
            header("Location: admin-jadwal.php");
        } else {
            $error = "Gagal menambahkan jadwal";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Jadwal Edit</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="card-header">
                    <h1>Edit Jadwal</h1>
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
                        <label for="">Player 1</label>
                        <span>:</span>
                        <select type="text" name="player1_id" id="" required>
                            <?php while ($row_pemain = mysqli_fetch_assoc($pemain1)) : ?>
                                <?php if ($row_jadwal["player1_id"] === $row_pemain["id"]) : ?>
                                    <option value="<?= $row_pemain['id'] ?>" selected><?= $row_pemain["nama"] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row_pemain['id'] ?>"><?= $row_pemain["nama"] ?></option>
                                <?php endif ?>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="row">
                        <label for="">Player 2</label>
                        <span>:</span>
                        <select type="text" name="player2_id" id="" required>
                            <?php while ($row_pemain = mysqli_fetch_assoc($pemain2)) : ?>
                                <?php if ($row_jadwal["player2_id"] === $row_pemain["id"]) : ?>
                                    <option value="<?= $row_pemain['id'] ?>" selected><?= $row_pemain["nama"] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row_pemain['id'] ?>"><?= $row_pemain["nama"] ?></option>
                                <?php endif ?>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="row">
                        <label for="">Waktu</label>
                        <span>:</span>
                        <input type="datetime-local" class="datetime-input" name="waktu" id="" required value="<?= $row_jadwal['waktu'] ?>">
                    </div>
                    <div class="row">
                        <label for="">Ruangan</label>
                        <span>:</span>
                        <select type="text" name="kode_ruangan" id="" required>
                            <?php while ($row_ruangan = mysqli_fetch_assoc($ruangan)) : ?>
                                <?php if ($row_ruangan["kode"] === $row_jadwal["kode_ruangan"]) : ?>
                                    <option value="<?= $row_ruangan['kode'] ?>" selected><?= $row_ruangan['kode'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row_ruangan['kode'] ?>"><?= $row_ruangan['kode'] ?></option>
                                <?php endif ?>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>