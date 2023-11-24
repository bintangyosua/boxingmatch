<?php
require_once "auth.php";

if (!isAdmin()) header("Location: index.php");
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
            <form action="">
                <div class="card-header">
                    <h1>Tambah Jadwal</h1>
                    <a href="admin-jadwal.php">
                        <button class="new-schedule" type="submit">
                            <img src="./assets/images/svgs/plus.svg" alt="">
                            <span>Tambah</span>
                        </button>
                    </a>
                </div>
                <hr class="divider">
                <div class="form">
                    <div class="row">
                        <label for="">Player 1</label>
                        <span>:</span>
                        <input type="text" name="" id="">
                    </div>
                    <div class="row">
                        <label for="">Player 2</label>
                        <span>:</span>
                        <input type="text" name="" id="">
                    </div>
                    <div class="row">
                        <label for="">Datetime</label>
                        <span>:</span>
                        <input type="datetime-local" class="datetime-input" name="" id="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>