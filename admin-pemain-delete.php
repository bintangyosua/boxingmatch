<?php

require_once "./auth.php";
if (!isAdmin()) header("Location: login.php");

$id = $_GET["id"];
runQuery("DELETE FROM pemain WHERE id = '$id'");
header("Location: admin-pemain.php");
