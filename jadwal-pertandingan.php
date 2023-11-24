<?php

require_once "auth.php";

$sql = "SELECT
  DATE(waktu) AS tanggal,
  COUNT(*) AS jumlah_data,
  GROUP_CONCAT(player1) AS daftar_player1,
  GROUP_CONCAT(player2) AS daftar_player2,
  GROUP_CONCAT(TIME(waktu)) AS waktu
FROM jadwal
GROUP BY tanggal ORDER BY tanggal ASC";

$res = runQuery($sql);



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
            <?php while ($data = $res->fetch_assoc()) : ?>
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
                        $waktu = explode(",", $data["waktu"]);
                        ?>
                        <?php for ($i = 0; $i < $length; $i++) : ?>
                            <div class="card-body">
                                <div class="player-1 player">
                                    <span><?= $players1[$i] ?></span>
                                    <img src="./assets/images/profile-1.png" class="card-profile" alt="">
                                </div>
                                <div class="card-vs">VS</div>
                                <div class="player-2 player">
                                    <img src="./assets/images/profile-2.png" class="card-profile" alt="">
                                    <span><?= $players2[$i] ?></span>
                                </div>
                            </div>
                            <!-- Card Footer (time schedule) -->
                            <div class="card-footer">
                                <div class="card-time"><?= date('H:i', strtotime($waktu[$i])) ?></div>
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