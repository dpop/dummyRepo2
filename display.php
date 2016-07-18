<?php
include_once './vendor/autoload.php';

use RedBeanPHP\R;
$sessionId = $_REQUEST["sessionId"];
R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
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
