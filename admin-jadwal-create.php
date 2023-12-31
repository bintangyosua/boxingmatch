<?php
require_once "auth.php";

$pemain1 = runQuery("SELECT * FROM pemain");
$pemain2 = runQuery("SELECT * FROM pemain");
$ruangan = runQuery("SELECT * FROM ruangan");

if (!isAdmin()) header("Location: index.php");

$today = date("Y-m-d H:i");

if (isset($_POST["submit"])) {
    $player1_id = $_POST["player1_id"];
    $player2_id = $_POST["player2_id"];
    $waktu = $_POST["waktu"];
    $kode_ruangan = $_POST["kode_ruangan"];


    $is_waktu_pemain_sama = runQuery("SELECT * from jadwal WHERE waktu = '$waktu' AND ((player1_id = '$player1_id' AND player2_id = '$player2_id') OR (player1_id = '$player2_id' AND player2_id = '$player1_id'))");
    $is_there_waktu_ruangan = runQuery("SELECT waktu, kode_ruangan FROM jadwal WHERE waktu = '$waktu' AND kode_ruangan = '$kode_ruangan'");

    if ($player1_id === $player2_id) {
        $error = "Pemain tidak boleh sama";
    } else if (mysqli_num_rows($is_waktu_pemain_sama) > 0) {
        $error = "Pemain telah bermain di waktu yang sama";
    } else if ($is_there_waktu_ruangan->num_rows > 0) {
        $error = "Jadwal dengan Ruangan yang sama sudah ada";
    } else {
        $sql = "INSERT INTO jadwal (player1_id, player2_id, waktu, kode_ruangan) VALUES ('$player1_id', '$player2_id', '$waktu', '$kode_ruangan')";
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
    <title>Admin - Jadwal Create</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="card-header">
                    <h1>Tambah Jadwal</h1>
                    <a href="admin-jadwal.php">
                        <button class="new-schedule" type="submit" name="submit" value="submit">
                            <img src="./assets/images/svgs/plus.svg" alt="">
                            <span>Tambah</span>
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
                                <?php if ($player1_id === $row_pemain['id']) : ?>
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
                                <?php if ($player2_id === $row_pemain['id']) : ?>
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
                        <input type="datetime-local" class="datetime-input" name="waktu" id="cal" value="<?= $today ?>" required>
                    </div>
                    <div class="row">
                        <label for="">Ruangan</label>
                        <span>:</span>
                        <select type="text" name="kode_ruangan" id="" required>
                            <?php while ($row_ruangan = mysqli_fetch_assoc($ruangan)) : ?>
                                <option value="<?= $row_ruangan['kode'] ?>"><?= $row_ruangan['kode'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.addEventListener('load', () => {
            var now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());

            /* remove second/millisecond if needed - credit ref. https://stackoverflow.com/questions/24468518/html5-input-datetime-local-default-value-of-today-and-current-time#comment112871765_60884408 */
            now.setMilliseconds(null)
            now.setSeconds(null)

            document.getElementById('cal').value = now.toISOString().slice(0, -1);
        });
    </script>
</body>

</html>