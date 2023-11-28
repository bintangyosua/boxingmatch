<?php
include "auth.php";

if (!isAdmin()) header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
    <style>
        .card-body {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 7px;
            margin-top: 5px;
        }

        .btn-admin {
            width: 7rem;
            background-color: black;
            padding: 15px 20px;
        }
    </style>
</head>

<body>
    <?php include_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <h1 class="title">Admin</h1>
            <div class="card-body">
                <a href="admin-user.php">
                    <button class="btn-admin">User</button>
                </a>
                <a href="admin-jadwal.php">
                    <button class="btn-admin">Jadwal</button>
                </a>
                <a href="admin-pemain.php">
                    <button class="btn-admin">Pemain</button>
                </a>
                <a href="admin-ruangan.php">
                    <button class="btn-admin">Ruangan</button>
                </a>
            </div>
        </div>
</body>

</html>