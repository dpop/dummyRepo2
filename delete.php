<?php
include_once 'vendor/autoload.php';
session_start();
use RedBeanPHP\R;

if (!isset($_SESSION["loggedIn"]))
    header('Location: projects.php?error="Could not delete project"');

R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');

$user = $_SESSION["loggedIn"];
$sessionId = $_REQUEST["sessionId"];
$project = R::findOne("projects",' sessionId LIKE ? ',[$sessionId]);

R::trash($project);

header('Location: projects.php');
