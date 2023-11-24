<?php
require_once "auth.php";

if (!isAdmin()) header("Location: index.php");

if (isset($_POST["submit"])) {
    $player1 = $_POST["player1"];
    $player2 = $_POST["player2"];
    $waktu = $_POST["waktu"];

    $is_there_waktu = runQuery("SELECT waktu FROM jadwal WHERE waktu = '$waktu'");

    if ($is_there_waktu->num_rows > 0) {
        $error = "Jadwal sudah ada";
    } else {
        $sql = "INSERT INTO jadwal (player1, player2, waktu) VALUES ('$player1', '$player2', '$waktu')";
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
    <title>Admin - Create</title>
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
                        <input type="text" name="player1" id="" required>
                    </div>
                    <div class="row">
                        <label for="">Player 2</label>
                        <span>:</span>
                        <input type="text" name="player2" id="" required>
                    </div>
                    <div class="row">
                        <label for="">Waktu</label>
                        <span>:</span>
                        <input type="datetime-local" class="datetime-input" name="waktu" id="" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>