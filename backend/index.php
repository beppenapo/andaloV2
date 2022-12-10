<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <?php require("inc/metatag.php"); ?>
        <link href="css/index.css" type="text/css" rel="stylesheet" media="screen" >
    </head>
    <body>
        <div id="container">
            <div id="wrap">
                <div id="messaggio">
                    <div id="messaggioText"></div>
                </div>
                <div id="switch">
                    <div id="home" data-msg="Entra nella sezione del sito dedicata al progetto. Qui troverai informazioni sulla metodologia e le fonti della ricerca, gli strumenti sviluppati, i progetti in corso.">HOME</div>
                    <div id="webgis" data-msg="Da questo link potrai accedere direttamente al webgis, navigare tra le mappe a disposizione ed interrogarne i dati.">WEBGIS</div>
                    <div id="ricerche" data-msg="Consulta il catalogo delle schede e ricerca nel database le fonti che ti interessano!">DATABASE</div>
                </div>
            </div>
        </div>
        <div id="footer"><?php include("inc/footer.inc"); ?></div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#messaggioText").hide();
                $("#switch>div").on({
                    click:function(){
                        var url = $(this).attr('id')+".php";
                        window.location.href= url;
                    }
                    , mouseenter:function(){
                        var msg=$(this).data('msg');
                        $("#messaggioText").html(msg).show();
                    }
                    , mouseleave:function(){
                        $("#messaggioText").hide().html('');
                    }
                });
            });
        </script>
    </body>
</html>
