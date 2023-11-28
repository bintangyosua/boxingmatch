<?php

require_once "auth.php";

$sql = "SELECT
  DATE(waktu) AS tanggal,
  COUNT(*) AS jumlah_data,
  GROUP_CONCAT(player1_id) AS daftar_player1,
  GROUP_CONCAT(player2_id) AS daftar_player2,
  GROUP_CONCAT(kode_ruangan) AS daftar_kode_ruangan,
  GROUP_CONCAT(id) AS daftar_jadwal_id,
  GROUP_CONCAT(TIME(waktu)) AS waktu
FROM jadwal
GROUP BY tanggal
ORDER BY tanggal, waktu ASC";

$res_jadwal = runQuery($sql);

// while ($row = mysqli_fetch_assoc($res_jadwal)) {
//     print_array($row);
// }
// exit;

if (isset($_POST["beli"]) and !$_SESSION["username"]) {
    echo "<script>alert('Anda perlu login terlebih dahulu')</script>";
    echo "<script>location.href = 'login.php'</script>";
} else if (isset($_POST["beli"])) {
    $akun_username = $_POST["username"];
    $jadwal_id = $_POST["jadwal_id"];

    if (runQuery("SELECT * FROM tiket WHERE akun_username = '$_SESSION[username]' AND jadwal_id = '$jadwal_id'")->num_rows > 0) {
        echo "<script>alert('Tiket sudah dibeli')</script>";
    } else {
        runQuery("INSERT INTO tiket (akun_username, jadwal_id) VALUES ('$akun_username', '$jadwal_id')");
        echo "<script>alert('Tiket berhasil dibeli')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pertandingan</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/jadwal-pertandingan.css">
</head>

<body>
    <?php include "./components/Navbar.php"; ?>
    <div class="hero">
        <div class="background-hero">
            <span class="hero-title">
                <span style="color: #EA3A3A">JADWAL</span>
                <span>PERTANDINGAN</span>
            </span>
        </div>
    </div>
    <section class="main">
        <h1>Jadwal Pertandingan</h1>
        <hr />
        <div class="cards">
            <?php while ($data = $res_jadwal->fetch_assoc()) : ?>
                <div class="card">
                    <div class="card-main">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h2><?= date('D, j F Y', strtotime($data["tanggal"])) ?></h2>
                            <img src="./assets/images/galang-boxing.png" height="45px" alt="">
                        </div>
                        <!-- Card VS Player -->
                        <?php
                        $length = $data["jumlah_data"];
                        $players1 = explode(",", $data["daftar_player1"]);
                        $players2 = explode(",", $data["daftar_player2"]);
                        $ruangans = explode(",", $data["daftar_kode_ruangan"]);
                        $jadwal_ids = explode(",", $data["daftar_jadwal_id"]);
                        $waktu = explode(",", $data["waktu"]);
                        ?>
                        <?php for ($i = 0; $i < $length; $i++) : ?>
                            <div class="card-body">
                                <div class="player-1 player">
                                    <?php $res_pemain1 = runQuery("SELECT * FROM pemain") ?>
                                    <?php while ($row_pemain = mysqli_fetch_assoc($res_pemain1)) : ?>
                                        <?php if ($players1[$i] == $row_pemain["id"]) : ?>
                                            <span><?= $row_pemain["nama"] ?></span>
                                        <?php endif ?>
                                    <?php endwhile ?>
                                    <img src="./assets/images/profile-1.png" class="card-profile" alt="">
                                </div>
                                <div class="card-vs">VS</div>
                                <div class="player-2 player">
                                    <img src="./assets/images/profile-2.png" class="card-profile" alt="">
                                    <?php $res_pemain2 = runQuery("SELECT * FROM pemain"); ?>
                                    <?php while ($row_pemain = mysqli_fetch_assoc($res_pemain2)) : ?>
                                        <?php if ($players2[$i] == $row_pemain["id"]) : ?>
                                            <span><?= $row_pemain["nama"] ?></span>
                                        <?php endif ?>
                                    <?php endwhile ?>
                                </div>
                            </div>
                            <!-- Card Footer (time schedule) -->
                            <div class="card-footer">
                                <div style=" display: flex; justify-content: center; gap: 5px;">
                                    <div class="card-time"><?= date('H:i', strtotime($waktu[$i])) ?></div>
                                    <div class="card-time"><?= $ruangans[$i] ?></div>
                                </div>
                                <div style="margin: 5px 0;">
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <?php $is_bought = runQuery("SELECT * FROM tiket WHERE akun_username = '$_SESSION[username]' AND jadwal_id = '$jadwal_ids[$i]'")->num_rows > 0 ?>
                                    <?php endif ?>
                                    <?php if (isset($is_bought)) : ?>
                                        <button>Sudah dibeli</button>
                                    <?php else : ?>
                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <input type="hidden" name="jadwal_id" value="<?= $jadwal_ids[$i] ?>">
                                            <input type="hidden" name="username" value="<?= $_SESSION["username"] ?? '' ?>">
                                            <button style="background-color: darkcyan; color: white;" name="beli">Beli Tiket</button>
                                        </form>
                                    <?php endif ?>
                                </div>
                            </div>
                            <?php if ($i < $length - 1) : ?>
                                <hr style="margin: 30px 0;">
                            <?php endif ?>
                        <?php endfor ?>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </section>
    <footer>
        <p>Copyright 2023 || Boxing</p>
    </footer>
</body>

</html>