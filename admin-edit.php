<?php
require_once "auth.php";

if (!isAdmin()) header("Location: index.php");

$id = $_GET["id"];
$res = runQuery("SELECT * FROM jadwal WHERE id = $id")->fetch_assoc();

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $player1 = $_POST["player1"];
    $player2 = $_POST["player2"];
    $waktu = $_POST["waktu"];

    $is_there_waktu = runQuery("SELECT waktu FROM jadwal WHERE waktu = '$waktu'");

    if ($is_there_waktu->num_rows > 0) {
        $error = "Jadwal sudah ada";
    } else {
        $sql = "UPDATE jadwal SET player1 = '$player1', player2 = '$player2', waktu = '$waktu' WHERE id = $id";
        if (runQuery($sql)) {
            header("Location: admin-jadwal.php");
        } else {
            $error = "Gagal mengedit jadwal";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit</title>
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
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="row">
                        <label for="">Player 1</label>
                        <span>:</span>
                        <input type="text" name="player1" id="" value="<?= $res["player1"] ?>">
                    </div>
                    <div class="row">
                        <label for="">Player 2</label>
                        <span>:</span>
                        <input type="text" name="player2" id="" value="<?= $res["player2"] ?>">
                    </div>
                    <div class="row">
                        <label for="">Datetime</label>
                        <span>:</span>
                        <input type="datetime-local" class="datetime-input" name="waktu" id="" value="<?= $res["waktu"] ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>