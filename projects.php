<?php
include_once './vendor/autoload.php';
session_start();


use RedBeanPHP\R;
R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
// get project list
$user = $_SESSION["loggedIn"];
$projects = R::findAll("projects",' userId LIKE ? ',[$user["id"]]);

include 'projectsView.php';