<?php

require_once "./auth.php";
if (!isAdmin()) header("Location: login.php");

$kode = $_GET["kode"];
runQuery("DELETE FROM ruangan WHERE kode = '$kode'");
header("Location: admin-ruangan.php");
