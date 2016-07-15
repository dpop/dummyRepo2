<?php
session_start();
include_once './vendor/autoload.php';
$loginUrl = "login.php";
if (!isset( $_SESSION["loggedIn"]))
{
    header('Location: '.$loginUrl);
}


include_once './work.php';
?>  