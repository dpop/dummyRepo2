<?php

$user = $_SESSION["loggedIn"];
$sessionId =$request->params()["sessionId"];
$project = RedBeanPHP\R::findOne("projects",' sessionId LIKE ? ',[$sessionId]);

RedBeanPHP\R::trash($project);


$response->redirect('/projects')->send();