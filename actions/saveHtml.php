<?php

include_once 'Utils/DbInstanceHelper.php';
$sessionId = $request->params()["sessionId"];

$code = $request->params()['code'];
$sessionID = DbInstanceHelper::saveCode('html',$sessionId,$code);

echo "http://$_SERVER[HTTP_HOST]/display/".$sessionID;