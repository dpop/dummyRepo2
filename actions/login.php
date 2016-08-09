<?php

$requestUser = $_POST["username"];
$requestPassword = $_POST["password"];

$user = RedBeanPHP\R::findOne("users",' username LIKE ? ',[$requestUser]);

if ($user != null && $user->getProperties()["password"] == md5($requestPassword))
{
    $_SESSION["loggedIn"] = $user;

    $response->redirect("/")->send();
}