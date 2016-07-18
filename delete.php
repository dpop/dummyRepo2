<?php
include_once 'vendor/autoload.php';
session_start();
use RedBeanPHP\R;

if (!isset($_SESSION["loggedIn"]))
    header('Location: projects.php?error="Could not delete project"');

R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');

$user = $_SESSION["loggedIn"];
$sessionId = $_REQUEST["sessionId"];
$project = R::findOne("projects",' sessionId LIKE ? ',[$sessionId]);

R::trash($project);

header('Location: projects.php');
