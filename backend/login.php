<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <?php require("inc/metatag.php"); ?>
        <link href="css/default.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <style>
           table{width:850px;margin: 0px auto;}
           table tr td{padding:0px 50px;}
           div#loghi{margin-top:200px;}
           .logDiv{width:100%;display:inline-block !important;}
           .logDiv input,.logDiv select{width:80% !important;display:inline-block !important;margin-left:-4px !important;}
           .logDiv select{padding:9px 8px !important;width:85% !important;background-color:white !important;}
           .fa{border: 1px solid #cacaca;padding: 11px;color:#3b3b3b}
           .par{font-size: 18px;line-height:18px;}
        </style>
    </head>
    <body>
        <div id="container">
            <div id="wrap">
                <div id="loginWrap">
                    <?php if(!$_SESSION['id_user']) {?>
                    <div id="loginTitle">Bentornato</div>
                    <div id="loginForm">
                        <form id="login_form" name="login_form" action="inc/loginScript.php" method="post">
                            <input name="login" type="hidden" value="yes"/>
                            <input name="hub" type="hidden" value="1"/>
                            <div class="logDiv">
                                <i class="fa fa-user fa-fw fa-2x"></i>
                                <input id="username" name="username" class="text" type="text" placeholder="Nome utente" required/>
                            </div>
                            <div class="logDiv">
                                <i class="fa fa-plug fa-fw fa-2x"></i>
                                <input id="password" name="password" class="text" type="Password" placeholder="password" required/>
                            </div>
                            <div id="username_errors" class="form_errors"></div>
                            <input name="login_button" value="Accedi" type="submit" />
                        </form>
                    </div>
                    <?php }else { ?>
                    <div id="loginTitle">Ciao <?php echo($_SESSION['username']);?></div>
                    <div id="loginForm">
                        <div class="loginTitle2">La tua sessione di lavoro è già aperta!</div>
                        <div class="login2" id="home">Torna alla home page</div>
                        <div class="login2" id="mappa">Accedi alla mappa</div>
                        <form id="login_form" name="login_form" action="inc/loginScript.php" method="post">
                            <input name="login" type="hidden" value="no"/>
                            <input name="login_button" value="Chiudi sessione" type="submit" />
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div><!-- wrap-->
        </div><!--container-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://use.fontawesome.com/c00c4cc98c.js"></script>
        <script type="text/javascript" src="lib/menu.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {
                $('#home').click(function(){window.location.href= 'home.php';});
                $('#mappa').click(function(){window.location.href= 'webgis.php';});
            });
        </script>
    </body>
</html>
