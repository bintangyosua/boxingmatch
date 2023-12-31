<?php
require_once "auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/dashboard.css">
    <link rel="stylesheet" href="./assets/styles/background-transition.css">
    <style>
        .hero-description h1 span {
            font-size: 1.5rem;

            @media (min-width: 495px) {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="hero-description">
        <h1>
            <span>BOXING</span>
            <br />
            <span>MATCHDAY</span>
        </h1>

        <p>Indulge in the adrenaline-pumping action of the latest boxing matches, featuring thw world's top fighters. Witness their unrivaled athleticism and strategic brilliance as they battle it out in the ring, leaving audiences on the edge of their seats. See the match schedule here!</p>

        <a href="jadwal-pertandingan.php">
            <button class="btn-schedules">
                <img src="./assets/images/svgs/calendar.svg" alt="">
                <span>Schedules</span>
            </button>
        </a>

    </div>
    <script src="./assets/scripts/background-transition.js"></script>
</body>

</html>