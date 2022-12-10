<?php
session_start();
require('inc/db.php');
require("classi/funzioni.php");

$query = "select toponomastica.gid, upper(top_nomai) toponimo, upper(comuni.comune) comune, st_X(st_transform((toponomastica.geom),3857))||','||st_Y(st_transform((toponomastica.geom),3857)) as lonlat from toponomastica, comuni where st_contains(comuni.geom, st_transform(toponomastica.geom,3857)) order by 3,2;";
$exec=pg_query($connection,$query);
while ($toponimi = pg_fetch_array($exec)) {
    $opt.="<option value='".$toponimi['lonlat']."'>".$toponimi['comune']." - ".$toponimi['toponimo']."</option>";
}
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <?php require("inc/metatag.php"); ?>
        <link href="css/mappa.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/google.css" rel="stylesheet" type="text/css">
        <link href="lib/OpenLayers-2.11/theme/default/style.css" rel="stylesheet" type="text/css">
        <link href="lib/jquery-ui-1.11.4/jquery-ui.min.css" type="text/css" rel="stylesheet" media="screen" />
    </head>
    <body onload="init()">
        <div id="map"></div>
        <div id="logo" class="hover"></div>
        <div id="logo2Wrap">
            <div id="logo2" class="logoTondo">
                <div id="database" title="Da questo link potrai accedere alla pagina di ricerca."> <p>DATABASE</p> </div>
            </div>
        </div>
        <div id="pannello"></div>
        <div id="drag" class="attivo"></div>
        <div id="zoomArea"></div>
        <div id="zoomMax"></div>
        <div id="history">
            <div id="btnPrev"></div>
            <div id="btnNext"></div>
        </div>
        <div id="nord"></div>

        <div id="topoSearch">
            <select>
                <option value='0'>--zoom su località--</option>
                <?php echo $opt; ?>
            </select>
        </div>

        <div id="text">
            <div id="switcher">
                <div id="cartografiaToggle"><h1 class="switcher">CARTOGRAFIA DI BASE</h1></div>
                <div id='cartografiaSwitch'>
                    <div class="livelli">
                        <label for="gsat" class="hover">
                            <input type="radio" id="gsat" name="baselayer" value="gsat" class='checkLiv' onclick="map.setBaseLayer(gsat)" checked /> SATELLITE
                        </label>
                    </div>
                    <div class="livelli">
                        <label for="osm" class="hover">
                            <input type="radio" id="osm" name="baselayer" value="osm" class='checkLiv' onclick="map.setBaseLayer(osm)" /> OPENSTREETMAP
                        </label>
                    </div>
                    <div class="livelli">
                        <label for="comuni" class="hover">
                            <input type="checkbox" name="overlays" id="comuni" class='checkLiv' value="comuni" data-tipo="0" checked/> COMUNI
                        </label>
                        <div class="legende legendeAree legendeComuni hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="toponomastica" class="hover" title="Il livello mostra la toponomastica dell'area. Il livello è attivo solo da una scala pari o minore a 1:25000">
                            <input type="checkbox" name="overlays" id="toponomastica" class='checkLiv' value="toponomastica" data-tipo="0" checked disabled /> TOPONOMASTICA <i class="fa fa-info"></i>
                        </label>
                        <div class="legende legendeAree legendeTopo hide"></div>
                    </div>
                </div>

                <div id="areaToggle" class="hover" title="Mostra/nascondi le aree di interesse">
                    <h1 class="switcher layerToggle" data-classe='ai'>AREA DI INTERESSE</h1>
                </div>
                <div id='areaSwitch'>
                    <div class="livelli">
                        <label for="aree_archeo" class="info hover" title="Il livello mostra le aree di interesse archeologico">
                            <input type="checkbox" id="aree_archeo" name="overlays" value="aree_archeo" data-tipo="6" class='checkLiv ai'/>
                            ARCHEOLOGICA
                        </label>
                        <div class="legende legendeAree legendeAreeArcheo hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_architet" class="info hover" title="Il livello mostra le aree di interesse architettonico">
                            <input type="checkbox" id="aree_architet" name="overlays" value="aree_architett" data-tipo="8" class='checkLiv ai'/>
                            ARCHITETTONICA
                        </label>
                        <div class="legende legendeAree legendeAreeArchitet hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_archivi" class="info hover" title="Il livello mostra le aree di interesse archivistico">
                            <input type="checkbox" id="aree_archivi" name="overlays" value="aree_archivi" data-tipo="8" class='checkLiv ai'/>
                            ARCHIVISTICA
                        </label>
                        <div class="legende legendeAree legendeAreeArchiv hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_biblio" class="info hover" title="Il livello mostra le aree di interesse bibliografico">
                            <input type="checkbox" id="aree_biblio" name="overlays" value="aree_biblio" data-tipo="5" class='checkLiv ai'/>
                            BIBLIOGRAFICA
                        </label>
                        <div class="legende legendeAree legendeAreeBiblio hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_carto" class="info hover" title="Il livello mostra le aree di interesse cartografico">
                            <input type="checkbox" id="aree_carto" name="overlays" value="aree_carto" data-tipo="10" class='checkLiv ai'/>
                            CARTOGRAFICA
                        </label>
                        <div class="legende legendeAree legendeAreeCarto hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_cult" class="info hover" title="Il livello mostra le aree di interesse per la cultura materiale del luogo">
                            <input type="checkbox" id="aree_cult" name="overlays" value="aree_cultmat" data-tipo="2" class='checkLiv ai'/>
                            <input type="checkbox" name="overlays" value="aree_cultmat_line" data-tipo="2" class='checkLiv ai lineCheckBox hide'/>
                            CULTURA MATERIALE
                        </label>
                        <div class="legende legendeAree legendeAreeCult hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_foto" class="info hover" title="Il livello mostra le aree di interesse fotografico">
                            <input type="checkbox" id="aree_foto" name="overlays" value="aree_foto" data-tipo="7" class='checkLiv ai'/>
                            FOTOGRAFICA
                        </label>
                        <div class="legende legendeAree legendeAreeFoto hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_orale" class="info hover" title="Il livello mostra le aree di interesse per le fonti orali">
                            <input type="checkbox" id="aree_orale" name="overlays" value="aree_orale" data-tipo="1" class='checkLiv ai'/>
                            ORALE
                        </label>
                        <div class="legende legendeAree legendeAreeOrale hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="aree_stoart" class="info hover" title="Il livello mostra le aree di interesse storico-artistico">
                            <input type="checkbox" id="aree_stoart" name="overlays" value="aree_stoart" data-tipo="9" class='checkLiv ai'/>
                            STORICO-ARTISTICA
                        </label>
                        <div class="legende legendeAree legendeAreeStoArt hide"></div>
                    </div>
                    <div class="livelli">
                        <div class="sliderLivelli">
                            <div class="sliderOpacity" id="sliderArea">
                                <div class="ui-slider-handle"></div>
                            </div>
                            <span class="amount" id="amountAree"></span>
                        </div>
                    </div>
                </div>

                <div id="ubiToggle" class="hover" title="Mostra/nascondi le ubicazioni">
                    <h1 class="switcher layerToggle" data-classe="ubi">UBICAZIONE FONTE</h1>
                </div>
                <div id='ubiSwitch'>
                    <div class="livelli">
                        <label for="ubi_archeo" class="info hover" title="Il livello mostra le ubicazioni di interesse archeologico">
                            <input type="checkbox" name="overlays" id="ubi_archeo" value="ubi_archeo" class='checkLiv ubi'/>
                            ARCHEOLOGICA
                        </label>
                        <div class="legende legendeUbi legendeUbiArcheo hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_architet" class="info hover" title="Il livello mostra le aree di interesse architettonico">
                            <input type="checkbox" name="overlays" id="ubi_architet" value="ubi_archit" class='checkLiv ubi' />
                            ARCHITETTONICA
                        </label>
                        <div class="legende legendeUbi legendeUbiArchitet hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_archiv" class="info hover" title="Il livello mostra le aree di interesse archivistico">
                            <input type="checkbox" name="overlays" id="ubi_archiv" value="ubi_archiv" class='checkLiv ubi' />
                            ARCHIVISTICA
                        </label>
                        <div class="legende legendeUbi legendeUbiArchiv hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_biblio" class="info hover" title="Il livello mostra le aree di interesse bibliografico">
                            <input type="checkbox" name="overlays" id="ubi_biblio" value="ubi_biblio" class='checkLiv ubi' />
                            BIBLIOGRAFICA
                        </label>
                        <div class="legende legendeUbi legendeUbiBiblio hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_cult" class="info hover" title="Il livello mostra le aree di interesse per la cultura materiale del luogo">
                            <input type="checkbox" name="overlays" id="ubi_cult" value="ubi_mater" class='checkLiv ubi' />
                            CULTURA MATERIALE
                        </label>
                        <div class="legende legendeUbi legendeUbiCult hide"></div>
                    </div>
                    <div class="livelli bassa">
                        <label for="ubi_foto" class="info hover" title="Il livello mostra le aree di interesse fotografico">
                            <input type="checkbox" name="overlays" id="ubi_foto" value="ubi_foto" class='checkLiv ubi' />
                            FOTOGRAFICA
                        </label>
                        <div class="legende legendeUbi legendeUbiFoto hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_orale" class="info hover" title="Il livello mostra le aree di interesse per le fonti orali">
                            <input type="checkbox" name="overlays" id="ubi_orale" value="ubi_oral" class='checkLiv ubi' />
                            ORALE
                        </label>
                        <div class="legende legendeUbi legendeUbiOrale hide"></div>
                    </div>
                    <div class="livelli">
                        <label for="ubi_stoart" class="info hover" title="Il livello mostra le aree di interesse storico-artistico">
                            <input type="checkbox" name="overlays" id="ubi_stoart" value="ubi_stoart" class='checkLiv ubi' />
                            STORICO-ARTISTICA
                        </label>
                        <div class="legende legendeUbi legendeUbiStoArt hide"></div>
                    </div>
                </div>
            </div>

            <div id="ricerca" class="hide">
                <div id="ricercaToggle"  class="tip" title="Mostra/nascondi i form per la ricerca avanzata">
                    <h1>RICERCA</h1>
                </div>
                <div id="formRicerca">
                    <div class="sezioni" id="datiGenerali"><h2>DATI GENERALI</h2></div>
                    <div class="sezioni" id="compilazione"><h2>COMPILAZIONE</h2></div>
                    <div class="sezioni" id="provenienza"><h2>PROVENIENZA</h2></div>
                    <div class="sezioni" id="cronologia"><h2>CRONOLOGIA</h2></div>
                    <div class="sezioni" id="anagrafica"><h2>ANAGRAFICA</h2></div>
                    <div class="sezioni" id="documentazione"><h2>DOCUMENTAZIONE</h2></div>
                    <div class="sezioni" id="consultabilita"><h2>CONSULTABILITA'</h2></div>
                    <div class="sezioni" id="conservazione"><h2>STATO DI CONSERVAZIONE</h2></div>
                    <div class="sezioni" id="archeologica"><h2>ARCHEOLOGICA</h2></div>
                    <div class="sezioni" id="architettonica"><h2>ARCHITETTONICA</h2></div>
                    <div class="sezioni" id="archivistica"><h2>ARCHIVISTICA</h2></div>
                    <div class="sezioni" id="bibliografica"><h2>BIBLIOGRAFICA</h2></div>
                    <div class="sezioni" id="cultura"><h2>CULTURA MATERIALE</h2></div>
                    <div class="sezioni" id="fotografica"><h2>FOTOGRAFICA</h2></div>
                    <div class="sezioni" id="orale"><h2>ORALE</h2></div>
                    <div class="sezioni" id="storicoArtistica"><h2>STORICO-ARTISTICA</h2></div>
                </div>
            </div>
        </div>

        <!-- <div id="sliderWrap">
            <div id="sliderLabel"><label>Anno </label></div>
            <div id="slider"></div>
        </div>-->

        <div id="scalebar"></div>
        <div id="coord"></div>

        <div id="resultWrap">
            <div id="result">
                <div id="resultHeader">
                    <div id="resHeadImg" data-icon='&#10006;'>&#10006;</div>
                </div>
                <div id="resultContent"></div>
            </div>
        </div>
        <script type="text/javascript" src="lib/jquery-core/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="lib/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="lib/OpenLayers-2.12/OpenLayers.js"></script>
        <script type="text/javascript" src="lib/OpenLayers-2.10/ScaleBar.js"></script>
        <script src="http://maps.google.com/maps/api/js?v=3.2&amp;sensor=false"></script>
        <script src="lib/webgis.js"></script>
    </body>
</html>
