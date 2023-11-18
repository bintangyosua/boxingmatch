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
            <?php for ($i = 0; $i < 3; $i++) { ?>
                <div class="card">
                    <div class="card-main">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h2>Sun, 18 November 2023</h2>
                            <img src="./assets/images/galang-boxing.png" height="45px" alt="">
                        </div>
                        <!-- Card VS Player -->
                        <div class="card-body">
                            <div class="player-1 player">
                                <span>Player 1</span>
                                <img src="./assets/images/svgs/circle.svg" class="card-profile" alt="">
                            </div>
                            <div class="card-vs">VS</div>
                            <div class="player-2 player">
                                <img src="./assets/images/svgs/circle.svg" class="card-profile" alt="">
                                <span>Player 2</span>
                            </div>
                        </div>
                        <!-- Card Footer (time schedule) -->
                        <div class="card-footer">
                            <div class="card-time">19:00</div>
                        </div>
                    </div>
                </div>

                <?php } ?>?>
        </div>
    </section>
    <footer>
        <p>Copyright 2023 || Boxing</p>
    </footer>
</body>

</html>