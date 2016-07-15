<?php
include_once './vendor/autoload.php';

$sessionId = $_REQUEST["sessionId"];

$displayUrl = "http://$_SERVER[HTTP_HOST]/Schwan/display.php?sessionId=".$sessionId;

?>

<html>
<head>
    <script src="public/js/jquery-2.2.4.js"  type="application/javascript"></script>
    <script src="public/js/qrcode.min.js"  type="application/javascript"></script>
</head>
<body style="background-color: #f27132; margin:0; ">
<div style="padding: 10px; padding-top: 60px">
    <div id="qrcode" style="margin:0px auto;  width:128px;"></div>
    <p style="color : #fff;">Use your mobile phone, tablet or device's QR code reader to launch your program.</p>
</div>



<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: <?php echo "'".$displayUrl."'"; ?>,
        width: 128,
        height: 128,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    qrcode.makeCode( <?php echo "'".$displayUrl."'"; ?>);
</script>
</body>
</html>


