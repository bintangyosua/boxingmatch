<?php
include 'auth.php';
include 'koneksi.php';

// checkLogin();

$query = "SELECT schedule.id, pertandingan.nama, schedule.tanggal FROM schedule JOIN pertandingan ON schedule.pertandingan_id = pertandingan.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Dashboard</h2>
    <p>Selamat datang, <?php echo $_SESSION['yourname']; ?>!</p>

    <h3>Jadwal Pertandingan:</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pertandingan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p><a href="edit_profile.php">Edit Profil</a></p>
    <p><a href="delete_account.php">Hapus Akun</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>

</html>