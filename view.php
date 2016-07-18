<html>
    <head>
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/js/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="public/js/codemirror/addon/hint/show-hint.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/tekStyle.css">
        <script src="//cdn.jsdelivr.net/alertifyjs/1.7.1/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.7.1/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.7.1/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.7.1/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.7.1/css/themes/bootstrap.min.css"/>

    </head>
    <body>




        <div class="logo-container">
           <a href="index.php"> <img src="public/images/logo.png" class="logo"></a>

            <div class="pull-right" id="bs-example-navbar-collapse-1">
                <ul class="tek-menu" >
                    <li ><a class="save" href="#">Save Your Work <span class="sr-only">(current)</span></a></li>
                    <li ><a href="projects.php">Projects <span class="sr-only">(current)</span></a></li>
                    <li ><a class="qr-code" href=<?php echo "qrCode.php?sessionId=".$_REQUEST["sessionId"] ?>>Send Program <span class="sr-only">(current)</span></a></li>
                    <li ><a href="signout.php">Sign Out<span class="sr-only">(current)</span></a></li>
                </ul>
            </div>

        </div>

        <div class="divider"> <div class="welcome-message"> Hello <?php echo $user->getProperties()["name"];  ?> </div> </div>
        <div class="container-fluid working-area">
            <div class="row">
                <div class="col-md-6 code-area">
                    <div class="editor-container">
                        <div class="programming-language"> Html</div>
                        <textarea id="FirstCodeWindow" class="editor-window"> <?php  echo $html; ?></textarea>
                    </div>
                    <div class="editor-container">
                        <div class="programming-language"> Css</div>
                        <textarea id="SecondCodeWindow" class="editor-window"> <?php  echo $css; ?></textarea>
                    </div>
                    <div class="editor-container">
                        <div class="programming-language"> JavaScript</div>
                        <textarea id="ThirdCodeWindow" class="editor-window"> <?php  echo $js; ?></textarea>
                    </div>

                </div>
                <div class="col-md-6">
<!--                    <div class="display-results">-->
<!--                        <iframe id="result-frame"> </iframe>-->
<!--                    </div>-->
                        <div class="containe-results">
                            <div class="result-frame-container">
                                <iframe id="result-frame"> </iframe>
                                <div class="refresh-container"><a id="refresh-btn" href="#"><img src="public/images/tablet-button.png"></a></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div style="display: none;" >
            <div id="html-hidden"> </div>
            <div id="css-hidden"> </div>
            <div id="js-hidden"> </div>
        </div>

        <div id="code-container">

            <iframe src="<?php echo "qrCode.php?sessionId=".$_REQUEST["sessionId"] ?>" ></iframe>
        </div>

        <div id="save-container">
            <form class="saveProject" method="post" action="actions/saveProject.php">
                <input  class="proj-name" name="proj-name" type="text" placeholder="Project Name">
                <button id="submit"> Save </button>
            </form>
        </div>
        <script src="public/js/jquery-2.2.4.js" ></script>
        <script src="public/js/bootstrap.min.js" ></script>
        <script src="public/js/codemirror/lib/codemirror.js" ></script>
        <script src="public/js/codemirror/addon/hint/show-hint.js"></script>
        <script src="public/js/codemirror/addon/hint/xml-hint.js"></script>
        <script src="public/js/codemirror/addon/hint/html-hint.js"></script>
        <script src="public/js/codemirror/addon/hint/css-hint.js"></script>
        <script src="public/js/codemirror/addon/hint/javascript-hint.js"></script>
        <script src="public/js/codemirror/mode/xml/xml.js"></script>
        <script src="public/js/codemirror/mode/javascript/javascript.js"></script>
        <script src="public/js/codemirror/mode/css/css.js"></script>
        <script src="public/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="public/js/script.js" ></script>
        <script>

        </script>
    </body>
</html>