<?php
require_once "auth.php";

if (!isAdmin()) header("Location: index.php");

if (!isset($_GET["id"])) header("Location: admin-jadwal.php");

$id = $_GET["id"];
runQuery("DELETE FROM jadwal WHERE id = '$id'");
header("Location: admin-jadwal.php");
