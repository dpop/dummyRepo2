<?php
include_once getcwd().'/vendor/autoload.php';
session_start();

$loginUrl = "login.php";
if (!isset( $_SESSION["loggedIn"]))
{
    header('Location: '.$loginUrl);
}
else
{
    $user = $_SESSION["loggedIn"];
}


include_once './work.php';
