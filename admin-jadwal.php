<?php
require_once "auth.php";

if (!isAdmin()) header("Location: index.php");

$res = runQuery("SELECT * FROM jadwal ORDER BY waktu ASC");
$res_jadwal = runQuery("SELECT jadwal.* FROM jadwal ORDER BY waktu ASC");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Jadwal</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Jadwal Pertandingan</h1>
                <a href="admin-jadwal-create.php">
                    <button class="new-schedule">
                        <img src="./assets/images/svgs/plus.svg" alt="">
                        <span>Tambah</span>
                    </button>
                </a>
            </div>
            <hr class="divider" />
            <div class="schedules-wrapper">
                <table class="schedules">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Player 1</th>
                            <th>Player 2</th>
                            <th>Jadwal</th>
                            <th>Kode Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$res) : ?>
                            <tr>
                                <td colspan="5">Tidak ada jadwal</td>
                            </tr>
                        <?php else : ?>
                            <?php $counter = 1 ?>
                            <?php while ($row_jadwal = mysqli_fetch_assoc($res_jadwal)) : ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <?php $res_pemain1 = runQuery("SELECT * FROM pemain"); ?>
                                    <?php while ($row_pemain = mysqli_fetch_assoc($res_pemain1)) : ?>
                                        <?php if ($row_jadwal["player1_id"] === $row_pemain["id"]) : ?>
                                            <td><?= $row_pemain["nama"] ?></td>
                                        <?php endif ?>
                                    <?php endwhile ?>
                                    <?php $res_pemain2 = runQuery("SELECT * FROM pemain"); ?>
                                    <?php while ($row_pemain = mysqli_fetch_assoc($res_pemain2)) : ?>
                                        <?php if ($row_jadwal["player2_id"] === $row_pemain["id"]) : ?>
                                            <td><?= $row_pemain["nama"] ?></td>
                                        <?php endif ?>
                                    <?php endwhile ?>
                                    <td><?= $row_jadwal["waktu"] ?></td>
                                    <td><?= $row_jadwal["kode_ruangan"] ?></td>
                                    <td>
                                        <div class="f-actions">
                                            <a href="admin-jadwal-edit.php?id=<?= $row_jadwal["id"] ?>">
                                                <img src="./assets/images/svgs/edit.svg" alt="">
                                            </a>
                                            <a onclick="handleDelete('<?= $row_jadwal['id'] ?>')">
                                                <img src="./assets/images/svgs/delete.svg" alt="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $counter++ ?>
                            <?php endwhile ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function handleDelete(id) {
            if (confirm("Apakah anda yakin??")) {
                location.href = "admin-delete.php?id=" + id
            }
        }
    </script>
</body>

</html>