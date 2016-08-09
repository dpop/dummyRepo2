<?php

if (isset ($request->params()["sessionId"]))
{
    $sessionID = $request->params()["sessionId"];
    $project = R::findOne("instance",' sessionId LIKE ? ',[$request->params()["sessionId"]]);
    if ($project == null)
    {
        $project = R::dispense("instance");
        $project->setProperty("sessionId", $request->params()["sessionId"]);
    }

    $project->setProperty("css",$request->params()["css"]);
    $project->setProperty("html",$request->params()["html"]);
    $project->setProperty("js",$request->params()["js"]);
    $user = $_SESSION["loggedIn"];
    $project->setProperty("userId", $user["id"]);
    R::store($project);
    echo "http://$_SERVER[HTTP_HOST]/display/".$sessionID;
}
