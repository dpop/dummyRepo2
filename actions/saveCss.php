<?php
include_once '../vendor/autoload.php';
session_start();
include_once '../Utils/DbInstanceHelper.php';
use RedBeanPHP\R;

if (!isset($_SESSION["loggedIn"]))
    die("not logged in");

R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');

$sessionID = DbInstanceHelper::saveCode("css");


echo "http://$_SERVER[HTTP_HOST]/display.php?sessionId=".$sessionID;