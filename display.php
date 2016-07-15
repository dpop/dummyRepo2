<?php
include_once './vendor/autoload.php';

use RedBeanPHP\R;
$sessionId = $_REQUEST["sessionId"];
R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
$session =  R::findOne("instance",' sessionID LIKE ? ',[$sessionId]);
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

    <script type="application/javascript" >
        <?php echo $js; ?>
    </script>
    </body>
</html>
