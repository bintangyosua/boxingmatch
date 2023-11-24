<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = "web_boxing";
$conn = mysqli_connect($host, $user, $pass, $db) or die('Not Connect');

function runQuery(string $sql)
{
    global $conn;

    return mysqli_query($conn, $sql);
}
