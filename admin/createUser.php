<?php
include_once '../vendor/autoload.php';
session_start();
use RedBeanPHP\R;

if (!isset($_SESSION["loggedIn"]) || !($_SESSION["loggedIn"] instanceof \RedBeanPHP\OODBBean) || $_SESSION["loggedIn"]->getProperties()["role"] != "admin")
     die("not logged in");
try
{

    R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
    if (isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["role"]))
    {

        $user = R::dispense("users");
        $user->setProperty("username", $_REQUEST["username"]);
        $user->setProperty("password", md5($_REQUEST["password"]));
        $user->setProperty("role", $_REQUEST["role"]);
        $user->setProperty("name", $_REQUEST["name"]);
        R::store($user);


    }

    header('Location: \admin.php');
}catch (Exception $e)
{
    echo $e->getMessage();

    print_r($e);
}

