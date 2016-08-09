        <div class="logo-container">
           <a href="/"> <img src="/public/images/logo.png" class="logo"></a>

            <div class="pull-right" id="bs-example-navbar-collapse-1">
                <ul class="tek-menu" >
                    <li ><a class="save" href="#">Save Your Work <span class="sr-only">(current)</span></a></li>
                    <li ><a href="/projects">Projects <span class="sr-only">(current)</span></a></li>
                    <li ><a class="qr-code" href=<?php echo "/qrCode/sessionId=".$sessionId ?>>Send Program <span class="sr-only">(current)</span></a></li>
                    <li ><a href="/signout">Sign Out<span class="sr-only">(current)</span></a></li>
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
                                <div class="refresh-container"><a id="refresh-btn" href="#"><img src="/public/images/tablet-button.png"></a></div>
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

            <iframe src="<?php echo "/qrCode/".$sessionId ?>" ></iframe>
        </div>

        <div id="save-container">
            <form class="saveProject form-inline" method="post" action="/saveProject">
                <div class="form-group">
                <input  class="proj-name form-control" name="proj-name" type="text" placeholder="Project Name">
                <button id="submit" class="btn btn-primary btn-saveProj"> Save </button>
                </div>
            </form>
        </div>
