<?php
include_once './vendor/autoload.php';
session_start();



//if (!isset($_SESSION["loggedIn"]) || !($_SESSION["loggedIn"] instanceof \RedBeanPHP\OODBBean) || $_SESSION["loggedIn"]->getProperties()["role"] != "admin" )
//    header('Location: index.php');
?>

<html>
<head>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/codemirror.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/tekStyle.css">
</head>
<body>
<h1> create users</h1>
<div class="container-fluid ">
    <form class="form-inline" method="post" action="admin/createUser.php">
      <div class="form-group">
        <label for="exampleInputName2">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="Jane Doe">
      </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Password:</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <div class="form-group">
            <label >Role:</label>
            <select class="form-control" name="role" >
                <option value="admin" > admin</option>
                <option value="user" > user</option>
            </select>
        </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Email:</label>
        <input type="email" class="form-control" name ="email" placeholder="jane.doe@example.com">
      </div>
      <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
</body>
</html>