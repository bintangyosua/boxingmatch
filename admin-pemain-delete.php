<?php

require_once "./auth.php";

$id = $_GET["id"];
runQuery("DELETE FROM pemain WHERE id = '$id'");
header("Location: admin-pemain.php");
