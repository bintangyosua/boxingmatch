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
                <a href="admin-create.php">
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
                            <th>Datetime</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Yanto</td>
                            <td>Mukidi</td>
                            <td><?= date("Y-m-d H:i:s") ?></td>
                            <td>
                                <div class="f-actions">
                                    <a href="admin-edit.php">
                                        <img src="./assets/images/svgs/edit.svg" alt="">
                                    </a>
                                    <a href="admin-delete.php">
                                        <img src="./assets/images/svgs/delete.svg" alt="">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>