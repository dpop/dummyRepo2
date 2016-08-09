<?php


try
{


    if (isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["role"]))
    {

        $user = RedBeanPHP\R::dispense("users");
        $user->setProperty("username", $_REQUEST["username"]);
        $user->setProperty("password", md5($_REQUEST["password"]));
        $user->setProperty("role", $_REQUEST["role"]);
        $user->setProperty("name", $_REQUEST["name"]);
        RedBeanPHP\R::store($user);


    }

    header('Location: /admin');
}catch (Exception $e)
{
    echo $e->getMessage();

    print_r($e);
}

