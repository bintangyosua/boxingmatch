<?php
session_start();

require_once "./koneksi.php";

function isLoggedIn()
{
    if (!isset($_SESSION['username'])) {
        return false;
    }

    return true;
}

function isAdmin()
{
    if (isLoggedIn()) {
        $username = $_SESSION["username"];
        $res = runQuery("SELECT is_admin FROM akun WHERE username = '$username'");
        if ($res->fetch_assoc()["is_admin"] == 0) {
            return false;
        }

        return true;
    }
}

function checkLogin()
{
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

function logout()
{
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
