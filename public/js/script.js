var htmkCodeMirror = CodeMirror.fromTextArea(document.getElementById("FirstCodeWindow"), {

    smartIdent: false,
    mode: "htmlmixed",
    extraKeys: {"Ctrl-Space": "autocomplete"},
    value: document.documentElement.innerHTML
});
var cssCodeMirror = CodeMirror.fromTextArea(document.getElementById("SecondCodeWindow"), {
    lineNumbers: false,
    smartIdent: false,
    mode: "css",
    extraKeys: {"Ctrl-Space": "autocomplete"},
    value: document.documentElement.innerHTML
});

var jsCodeMirror = CodeMirror.fromTextArea(document.getElementById("ThirdCodeWindow"), {
    lineNumbers: false,
    smartIdent: false,
    mode:  "javascript",
    extraKeys: {"Ctrl-Space": "autocomplete"},
    value: document.documentElement.innerHTML
});

htmkCodeMirror.on("blur", function () {
    sendData("/actions/saveHtml.php",$("#html-hidden"),htmkCodeMirror.doc.getValue());
});

cssCodeMirror.on("blur", function () {
    sendData("/actions/saveCss.php",$("#css-hidden"),cssCodeMirror.doc.getValue());
});

jsCodeMirror.on("blur", function () {
    sendData("/actions/saveJs.php",$("#js-hidden"),jsCodeMirror.doc.getValue());
});


$(document).ready(function() {

    var sessionID = getParameterByName("sessionId");
    if (!location.origin)
        location.origin = location.protocol + "//" + location.host;

    $("#result-frame").attr("src",location.origin + "/display.php?sessionId="+sessionID);
});


$(".qr-code").click(function (e) {
    e.preventDefault();
    var $this = $(this);
    if ($this.hasClass("qr-open"))
    {
        $this.removeClass("qr-open");
    }else
    {
        $this.addClass("qr-open");
    }
    $("#code-container").toggle();
});

$(".qr-code").hover(function(){

}, function(){
    if (!$(this).hasClass("qr-open"))
    {
        $("#code-container").hide();
    }

});

$(".save").hover(function(){

}, function(){
    if (!$(this).hasClass("qr-open"))
    {
        $("#save-container").hide();
    }

});

$(".save").click(function (e) {
    e.preventDefault();

    var $this = $(this);
    if ($this.hasClass("qr-open"))
    {
        $this.removeClass("qr-open");
    }else
    {
        $this.addClass("qr-open");
    }
    $("#save-container").toggle();
});

$(".saveProject").submit(function(e)
{
    e.preventDefault();
    var $this = $(this);
    $.ajax({
        url: $this.attr("action") ,
        method: "POST",
        data: { projName : $(".proj-name").val(),
                html : htmkCodeMirror.doc.getValue(),
                css: cssCodeMirror.doc.getValue(),
                js: cssCodeMirror.doc.getValue(),
                sessionId: getParameterByName("sessionId")
               },
        success: function(result)
        {
            if (result == "done")
            {
                $("#save-container").hide();
                alertify.alert('Success',"Project saved");
            }
        }
    });

});


function sendData(url,hiddenContainer,codeValue)
{
    if (codeValue ==  hiddenContainer.val())
        return;
    $.ajax({
        url: url,
        method: "POST",
        data: { code : codeValue, sessionId : getParameterByName("sessionId")},
        success: function(result)
        {
            console.log(result);
            $("#result-frame").attr("src",result);
        }
    });
    console.log(url +" has new value " + codeValue);
    hiddenContainer.val(codeValue);
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}