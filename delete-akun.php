<?php
include_once "auth.php";

$username = $_SESSION["username"];
runQuery("DELETE FROM akun WHERE username = '$username'");
header("Location: logout.php");
