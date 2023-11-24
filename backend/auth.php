<?php
session_start();

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
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
