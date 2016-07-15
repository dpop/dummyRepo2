<?php
include_once '../vendor/autoload.php';
session_start();
include_once '../Utils/DbInstanceHelper.php';
use RedBeanPHP\R;
if (!isset($_SESSION["loggedIn"]))
    die("not logged in");
R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');

$sessionID = DbInstanceHelper::saveCode('html');

echo "http://$_SERVER[HTTP_HOST]/Schwan/display.php?sessionId=".$sessionID;