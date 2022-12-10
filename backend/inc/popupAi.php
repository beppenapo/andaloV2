<?php
include('db.php');
$array = $_POST['arr'];
$arrayActive = $_POST['arrActive'];
$arrayArea = $_POST['arrArea'];
$i = count($array);
$y = count($arrayActive);
$w = count($arrayArea);

if($i==0) {$h1='Non è stata selezionata alcuna area';}

$items = implode(" OR ", $array);
$items2 = str_replace("area_int_poly.id","area_int_line.id",$items);
$tpsch = implode(" OR ", $arrayActive);
$area = implode(" OR ", $arrayArea);

// $id = '';
// $tipo = '';
// $idarea = '';

$query="
SELECT
    area_int_poly.id,
    area.nome as area,
    aree.nome_area as id_area,
    st_area(area_int_poly.the_geom) as misura,
    st_xmin(area_int_poly.the_geom) as xmin,
    st_xmax(area_int_poly.the_geom) as xmax,
    st_ymin(area_int_poly.the_geom) as ymin,
    st_ymax(area_int_poly.the_geom) as ymax
FROM area_int_poly, aree, area
WHERE
    area_int_poly.id_area = aree.nome_area AND
    aree.nome_area = area.id AND
    (area.tipo = 1 or area.tipo=3) and
    ($items) AND
    ($area)
UNION
SELECT
    area_int_line.id,
    area.nome as area,
    aree.nome_area as id_area,
    st_length(area_int_line.the_geom) as misura,
    st_xmin(area_int_line.the_geom) as xmin,
    st_xmax(area_int_line.the_geom) as xmax,
    st_ymin(area_int_line.the_geom) as ymin,
    st_ymax(area_int_line.the_geom) as ymax
FROM area_int_line, aree, area
WHERE
    area_int_line.id_area = aree.nome_area AND
    aree.nome_area = area.id AND
    (area.tipo = 1 or area.tipo=3) and
    ($items2) AND
    ($area)
ORDER BY misura ASC
";
$result = @pg_query($connection, $query);
$righe = @pg_num_rows($result);
if(!$result){echo "<div id='resContentHeader'><h1>$h1</h1></div>";}
else {
    echo "<div id='resContentHeader'><h1>$h1</h1></div>";
    echo "<div id='resContentData'><ul class='ulpopup'>";
    if($righe != 0) {
        while($a = pg_fetch_array($result)){
            $extent = $a['xmin'].','.$a['ymin'].','.$a['xmax'].','.$a['ymax'];
            echo "<li id='".$a['id_area']."' ext='".$extent."' class='openSchede' >".$a['area']."</li>";
        }
    }else {echo "<li><h1>L'area selezionata presenta schede in lavorazione</h1></li>";}
    echo "</ul></div>";
}
?>
<div id="resContentSchede"></div>

<script type="text/javascript">
var tpsch = "<?php echo($tpsch); ?>";
function openSchede(idArea){
   $.ajax({
    url: 'inc/popupAiSchede.php',
    type: 'POST',
    data: {idArea:idArea, tpsch:tpsch},
    success: function(data){$("#resContentSchede").html(data);}
   });//ajax*/
}

$('.openSchede').on({
   click: function(){
       $(this).addClass('active').siblings().removeClass('active');
       var ext = $(this).attr('ext');
       if (ext == 0) return;
       var parse = ext.split(',');
       var newExt= new OpenLayers.Bounds(parse[0],parse[1],parse[2],parse[3]);
       map.zoomToExtent(newExt);
       var idArea = $(this).attr('id');
       openSchede(idArea);
   },
   mouseenter: function() {
       var id_area=$(this).attr('id');
       var featHiLite = highlightLayer.getFeaturesByAttribute('id_area', id_area);
       highlightLayer.drawFeature(featHiLite[0], "select");
   },
   mouseleave: function() {
       var id_area=$(this).attr('id');
       var featHiLite = highlightLayer.getFeaturesByAttribute('id_area', id_area);
       highlightLayer.drawFeature(featHiLite[0], "default");

   }
});
</script>
