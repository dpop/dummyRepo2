<?php
include_once './vendor/autoload.php';
session_start();
use RedBeanPHP\R;

    if (isset($_POST["username"]))
    {
        $requestUser = $_POST["username"];
        $requestPassword = $_POST["password"];

        R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
        $user = R::findOne("users",' username LIKE ? ',[$requestUser]);

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

    <div class="divider">

    </div>
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
