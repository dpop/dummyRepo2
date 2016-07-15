<?php

use Klein\Klein;
use RedBeanPHP\R;



if (!isset( $_REQUEST["sessionId"]))
{
    $newSessionId = trim(getGUID());
    header('Location: '."http://$_SERVER[HTTP_HOST]/index.php?sessionId=".$newSessionId);
}

$sessionId = $_REQUEST["sessionId"];

R::setup('mysql:host=198.71.225.63;dbname=qbits_tek4kidz','tek4kidz','Aebaht4I');
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