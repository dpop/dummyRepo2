<?php


$sessionId = $request->params()["sessionId"];
$session =  RedBeanPHP\R::findOne("instance",' sessionID LIKE ? ',[$sessionId]);
if ($session == null)
    return;
$html = $session->getProperties()["html"];
$js = $session->getProperties()["js"];
$css = $session->getProperties()["css"];
?>

<html>
    <head>
        <style type="text/css">
            <?php echo $css; ?>
        </style>
    </head>
    <body>
    <div class="main-body">
        <?php echo $html; ?>
    </div>
    <script src="/public/js/jquery-2.2.4.js" ></script>
    <script type="application/javascript" >
        <?php echo $js; ?>
    </script>
    </body>
</html>
