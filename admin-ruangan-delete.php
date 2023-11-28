<?php

require_once "./auth.php";

$kode = $_GET["kode"];
runQuery("DELETE FROM ruangan WHERE kode = '$kode'");
header("Location: admin-ruangan.php");
