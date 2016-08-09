<?php

$user = $_SESSION["loggedIn"];
$projects =  RedBeanPHP\R::findAll("projects",' userId LIKE ? ',[$user["id"]]);

include 'projectsView.php';