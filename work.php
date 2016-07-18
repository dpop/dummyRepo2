<?php

use RedBeanPHP\R;



if (!isset( $_REQUEST["sessionId"]))
{
    $newSessionId = trim(getGUID());
    header('Location: '."http://$_SERVER[HTTP_HOST]/index.php?sessionId=".$newSessionId);
}

$sessionId = $_REQUEST["sessionId"];

R::setup('mysql:host=nj5rh9gto1v5n05t.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=v0vy6pdz1i32xf7p','ge6dgnr0zsn542q9','ko35aey9vufosp63');
$dbEntry = R::findOne("instance",' sessionID LIKE ? ',[$sessionId]);
$html = "";
$js = "";
$css = "";
if ($dbEntry != null )
{
    $html = $dbEntry->getProperties()["html"];
    $js = $dbEntry->getProperties()["js"];
    $css = $dbEntry->getProperties()["css"];
}
function getGUID()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid =  substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;
    }
}

require_once 'view.php';