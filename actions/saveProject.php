<?php
include_once '../vendor/autoload.php';
session_start();

if (!isset($_SESSION["loggedIn"]))
    die("mue ponta");
use RedBeanPHP\R;

R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
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
