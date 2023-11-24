<?php
include 'auth.php';
include 'koneksi.php';

checkLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Hapus akun dari tabel 'akun'
    $queryDeleteAkun = "DELETE FROM akun WHERE id = $user_id";
    $conn->query($queryDeleteAkun);

    // Hapus jadwal pertandingan yang terkait dengan akun dari tabel 'schedule'
    $queryDeleteSchedule = "DELETE FROM schedule WHERE pertandingan_id IN (SELECT id FROM pertandingan WHERE id = $user_id)";
    $conn->query($queryDeleteSchedule);

    // Hapus akun dari sesi dan redirect ke halaman awal
    logout();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun</title>
</head>

<body>
    <h2>Hapus Akun</h2>
    <p>Anda yakin ingin menghapus akun Anda?</p>

    <form method="post" action="">
        <button type="submit">Ya, Hapus Akun</button>
    </form>

    <p><a href="dashboard.php">Batalkan</a></p>
</body>

</html>