<?php
include_once "auth.php";

if (!isLoggedIn()) header("Location: index.php");

$username = $_SESSION["username"];
runQuery("DELETE FROM akun WHERE username = '$username'");
header("Location: logout.php");
