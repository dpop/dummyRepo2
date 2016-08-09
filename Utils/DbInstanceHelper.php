<?php
use RedBeanPHP\R;

class DbInstanceHelper
{
    public static function saveCode($codeType,$sessionId,$code)
    {
        $dbEntry = R::findOne("instance",' sessionID LIKE ? ',[$sessionId]);

        if ($dbEntry == null)
            $dbEntry = R::dispense("instance");

        $dbEntry->$codeType = $code;
        $dbEntry->setProperty("sessionID",$sessionId);
        R::store($dbEntry);
        return $dbEntry->getProperties()["sessionID"];
    }
}