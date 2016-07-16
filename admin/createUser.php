<?php
include_once '../vendor/autoload.php';
session_start();
use RedBeanPHP\R;

//if (!isset($_SESSION["loggedIn"]) || !($_SESSION["loggedIn"] instanceof \RedBeanPHP\OODBBean) || $_SESSION["loggedIn"]->getProperties()["role"] != "admin")
//     die("not logged in");
try
{

    R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
    if (isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["role"]))
    {

        $user = R::dispense("users");
        $user->setProperty("username", $_REQUEST["username"]);
        $user->setProperty("password", md5($_REQUEST["password"]));
        $user->setProperty("role", $_REQUEST["role"]);

        R::store($user);


    }

    header('Location: \admin.php');
}catch (Exception $e)
{
    print_r($e);
}

