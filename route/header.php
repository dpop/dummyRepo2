<html>
<head>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/codemirror.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/tekStyle.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
<?php
    if (isset($request->params()["sessionId"]))
    {
        echo "<div id=\"sessionIdHolder\" style=\"display:none;\">".$request->params()["sessionId"]."</div>";
    }
?>