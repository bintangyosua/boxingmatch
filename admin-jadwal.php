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
            <h1>Jadwal Pertandingan</h1>
            <a href="admin-create.php">
                <button class="new-schedule">New</button>
            </a>
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
                        <td class="f-actions">
                            <a href="admin-edit.php">
                                <button class="btn-edit">Edit</button>
                            </a>
                            <a href="admin-delete.php">
                                <button class="btn-delete">Delete</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jaden</td>
                        <td>Maliki</td>
                        <td><?= date("Y-m-d H:i:s") ?></td>
                        <td class="f-actions"><button class="btn-edit">Edit</button><button class="btn-delete">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>