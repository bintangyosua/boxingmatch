<?php

require_once "auth.php";

$username = $_GET["username"];
runQuery("DELETE FROM akun WHERE username = '$username'");
header("Location: admin-user.php");
