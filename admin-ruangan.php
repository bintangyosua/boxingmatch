<?php
require_once "./auth.php";

$res = runQuery("SELECT * FROM ruangan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ruangan</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php require_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admin - Ruangan</h1>
                <a href="admin-ruangan-create.php">
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$res) : ?>
                            <tr>
                                <td colspan="5">Tidak ada Ruangan</td>
                            </tr>
                        <?php else : ?>
                            <?php $counter = 1 ?>
                            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $row["kode"] ?></td>
                                    <td><?= $row["nama"] ?></td>
                                    <td>
                                        <div class="f-actions">
                                            <a href="admin-ruangan-edit.php?kode=<?= $row["kode"] ?>">
                                                <img src="./assets/images/svgs/edit.svg" alt="">
                                            </a>
                                            <a onclick="handleDelete('<?= $row['kode'] ?>')">
                                                <img src="./assets/images/svgs/delete.svg">
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
        function handleDelete(kode) {
            if (confirm("Apakah anda yakin??")) {
                location.href = "admin-ruangan-delete.php?kode=" + kode
            }
        }
    </script>
</body>

</html>