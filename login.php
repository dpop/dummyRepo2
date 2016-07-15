<?php
include_once './vendor/autoload.php';
session_start();
use RedBeanPHP\R;

    $username = "testUser1";
    $password = "test";
    if (isset($_POST["username"]))
    {
        $requestUser = $_POST["username"];
        $requestPassword = $_POST["password"];
        R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
        $user = R::findOne("users",' username LIKE ? ',[$requestUser]);
        $x = $requestPassword == $user->getProperties()["password"];
        if ($user != null && $user->getProperties()["password"] == md5($requestPassword))
        {
            $_SESSION["loggedIn"] = $user;
            header('Location: index.php');
        }
    }
?>
<html>
<head>
    <link href="public/css/tekStyle.css" rel="stylesheet">
</head>
<body>
<div class="logo-container">
    <img src="public/images/logo.png" class="logo">
</div>

    <div class="divider"> </div>
<div class="container">
    <div class="login-container">

    <div class="login-block">
        <form method="post" action="login.php">
            <input id ="username" type="text" name="username" placeholder="Username"> <br />
            <input  id ="password" type="password" name="password" placeholder="Password"> <br />
            <button id="submit"> Login </button>
        </form>

    </div>
    </div>
</div>

</body>
</html>
