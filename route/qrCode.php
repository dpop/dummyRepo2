<?php
$displayUrl = "http://$_SERVER[HTTP_HOST]/display/".$sessionId;

?>
<script src="/public/js/qrcode.min.js"  type="application/javascript"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
<style type="text/css">
     body
     {
         background-color: #f27132;
         margin:0;
     }

    h3
    {
        color: white;
        text-transform: uppercase;
        margin-bottom: 0px;;
    }

    .tile-container
    {
        float: left;
        padding: 12px;
        padding-left:15px;
        padding-right: 15px;
        margin : 5px;
        font-size:25px;
        color: white;
    }

    div.fb-container
    {
        background-color: #3B5998;
        margin-left:2px;
    }

    .tw-container
    {
        background-color: #4099FF;
    }

    .sc-container
    {
        background-color: #fffc00;
    }

    .ev-container
    {
        background-color: #007bb5;
    }

    .copy-container
    {
        padding-top: 10px;
        padding-bottom: 10px;
        width:100%;
    }

     .copy-container>button
     {
         margin: 0 auto;
         height: 30px;
         width:250px;
         color: white;
         background-color: darkgray;
         border: 0;

     }
    .qr-sm-container
    {
        overflow: hidden;
    }
</style>
<div style="width:310px;">
    <div style="padding: 30px; padding-top: 60px; padding-bottom: 10px; overflow: hidden; margin:0 auto;">
        <div class="qr-inner-container">
            <div id="qrcode" style="margin:0px auto;  width:158px;"></div>
            <p style="color : #fff;">Use your Tek4Kidz App Launcher or QR code reader to scan and run your program.</p>
        </div>
        <div class="qr-sm-container">
            <h3>Share your app</h3>
            <div class="tile-container fb-container">
                <i class="fa fa-facebook-official" aria-hidden="true"></i>
            </div>
            <div class="tile-container tw-container">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
            <div class="tile-container sc-container">
                <i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
            </div>
            <div class="tile-container ev-container">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>

        </div>
        <div class="copy-container"> <button > Copy Link </button></div>
    </div>
</div>




<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: <?php echo "'".$displayUrl."'"; ?>,
        width: 158,
        height: 158,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

//    $("#qrcode").qrcode( {
//        text: <?php //echo "'".$displayUrl."'"; ?>//,
//        width: 168,
//        height: 168,
//        colorDark : "#000000",
//        colorLight : "#ffffff",
//        correctLevel : QRCode.CorrectLevel.H
//    });

   qrcode.makeCode( <?php echo "'".$displayUrl."'"; ?>);
</script>



