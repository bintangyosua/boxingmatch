<?php
include("koneksi.php");

$insert = "INSERT INTO akun (yourname, username, password) VALUES ('$yourname', '$username', '$password')";
mysqli_query($conn, $insert);
