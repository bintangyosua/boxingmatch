<?php

require_once "./auth.php";
if (!isAdmin()) header("Location: login.php");

$res = runQuery("SELECT * FROM akun");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">

</head>

<body>
    <?php include_once "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admin - User</h1>
            </div>
            <hr class="divider" />
            <div class="schedules-wrapper">
                <table class="schedules">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Last Name</th>
                            <th>Email</th>
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
                                    <td><?= $row["username"] ?></td>
                                    <td><?= $row["firstname"] . " " . $row["lastname"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td>
                                        <div class="f-actions">
                                            <a href="admin-user-edit.php?username=<?= $row["username"] ?>">
                                                <img src="./assets/images/svgs/edit.svg" alt="">
                                            </a>
                                            <a onclick="handleDelete('<?= $row['username'] ?>')">
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
        function handleDelete(username) {
            if (confirm("Apakah anda yakin??")) {
                location.href = "admin-user-delete.php?username=" + username
            }
        }
    </script>
</body>

</html>