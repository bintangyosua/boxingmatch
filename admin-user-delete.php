<?php

require_once "auth.php";

if (!isAdmin()) header("Location: login.php");
$username = $_GET["username"];
runQuery("DELETE FROM akun WHERE username = '$username'");
header("Location: admin-user.php");
