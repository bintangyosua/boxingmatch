<?php
require_once "./auth.php";

$res = runQuery("SELECT * FROM pemain");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pemain</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admin - Pemain</h1>
                <a href="admin-pemain-create.php">
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
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$res) : ?>
                            <tr>
                                <td colspan="5">Tidak ada akun</td>
                            </tr>
                        <?php else : ?>
                            <?php $counter = 1 ?>
                            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $row["nama"] ?></td>
                                    <td><?= $row["umur"] ?></td>
                                    <td><?= $row["kota"] ?></td>
                                    <td>
                                        <div class="f-actions">
                                            <a href="admin-pemain-edit.php?id=<?= $row["id"] ?>">
                                                <img src="./assets/images/svgs/edit.svg" alt="">
                                            </a>
                                            <a onclick="handleDelete('<?= $row['id'] ?>')">
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
        function handleDelete(id) {
            if (confirm("Apakah anda yakin??")) {
                location.href = "admin-pemain-delete.php?id=" + id
            }
        }
    </script>
</body>

</html>