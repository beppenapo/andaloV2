<?php
include('db.php');

$idArea = $_POST['idArea'];
$tpsch = $_POST['tpsch'];
$dir = 'scheda_archeo.php?id=';

$query = "
SELECT aree.nome_area AS id_area, scheda.id AS id_scheda, scheda.dgn_numsch, cronologia.cro_spec, scheda.dgn_dnogg, lista_dgn_tpsch.css
FROM area, aree, aree_scheda, scheda, cronologia, lista_dgn_tpsch
WHERE aree.nome_area = area.id
  AND aree_scheda.id_area = aree.nome_area
  AND aree_scheda.id_scheda = scheda.id
  AND scheda.dgn_tpsch = lista_dgn_tpsch.id
  AND cronologia.id_scheda = scheda.id
  AND area.tipo <> 2
  AND scheda.fine = 2
  AND aree.nome_area = $idArea
  AND ($tpsch)
ORDER BY dgn_numsch ASC;
";
$result = @pg_query($connection, $query);
$righe = @pg_num_rows($result);
if(!$result){echo "<div id='resContentHeader'><h1>$h1</h1></div>";}
else {
   echo "<ul id='listaSchede'>";
   if($righe > 0) {
    for ($x = 0; $x < $righe; $x++){
       $idScheda = pg_result($result, $x,"id_scheda");
       $idArea = pg_result($result, $x,"id_area");
       $numScheda = pg_result($result, $x,"dgn_numsch");
       $crono = pg_result($result, $x,"cro_spec");
       $crono = stripslashes(nl2br($crono));
       $descrizione = pg_result($result, $x,"dgn_dnogg");
       $descrizione = stripslashes(nl2br($descrizione));
       $stile = pg_result($result, $x,"css");
       echo "
          <li class='itemScheda'>
           <h2 class='$stile'>
             <a href='$dir$idScheda' class='$stile' target='_blank' title='Apri la scheda selezionata'>$numScheda</a>
           </h2>
           <p>$crono</p>
           <p>$descrizione</p>
         </li>";
    }
   }else {echo "<li><h1>L'area selezionata presenta schede in lavorazione</h1></li>";}
   echo "</ul>";
}
?>
