<?php
include_once './vendor/autoload.php';
session_start();


use RedBeanPHP\R;
R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
// get project list
$user = $_SESSION["loggedIn"];
$projects = R::findAll("projects",' userId LIKE ? ',[$user["id"]]);

include 'projectsView.php';