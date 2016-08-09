
<div class="logo-container">
    <a href="/"> <img src="../public/images/logo.png" class="logo"></a>
</div>

<div class="divider"> </div>

<div class="projects-container">
    <div class="create-proj-container"> Create new project : <a class="create-btn btn btn-primary btn-circle" href="/"> <i class="fa fa-plus" aria-hidden="true"></i> </a></div>
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
                <a href="<?php echo "/project/".$project->getProperties()["sessionId"] ?>"> Launch </a> |
                <a href="<?php echo "/delete/".$project->getProperties()["sessionId"] ?>"> Delete</a>
            </td>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
</body>

</html>