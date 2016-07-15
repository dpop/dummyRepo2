<?php
include_once '../vendor/autoload.php';
session_start();

if (!isset($_SESSION["loggedIn"]))
    die("mue ponta");
use RedBeanPHP\R;

R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
if (isset ($_POST["projName"]))
{
    $project = R::findOne("projects",' sessionId LIKE ? ',[$_POST["sessionId"]]);
    if ($project == null)
    {
        $project = R::dispense("projects");

    }

    $project->setProperty("sessionId", $_POST["sessionId"]);
    $project->setProperty("projName",$_POST["projName"]);
    $project->setProperty("css",$_POST["css"]);
    $project->setProperty("html",$_POST["html"]);
    $project->setProperty("js",$_POST["js"]);
    $user = $_SESSION["loggedIn"];
    $project->setProperty("userId", $user["id"]);
    R::store($project);
    echo "done";
}
