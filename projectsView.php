<html>
<head>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/codemirror.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/tekStyle.css">
</head>
<body>
<div class="logo-container">
    <a href="index.php"> <img src="public/images/logo.png" class="logo"></a>
</div>

<div class="divider"> </div>

<div class="projects-container">
    <table class="table">
        <thead>
        <tr >
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projects as $project){
            if ($project instanceof \RedBeanPHP\OODBBean) {?>
        <tr >
            <td><?php  echo $project->getProperties()["projName"]; ?></td>
            <td>
                <a href="<?php echo "index.php?sessionId=".$project->getProperties()["sessionId"] ?>"> Edit </a> |
                <a href="<?php echo "delete.php?sessionId=".$project->getProperties()["sessionId"] ?>"> Delete</a>
            </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
</body>

</html>