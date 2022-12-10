<?php
//lista colore
$queryCol =  "SELECT * from lista_dtc_icol where id != ".$cartoArr["id_colore"]." order by 2 asc";
$resCol = pg_query($connection, $queryCol);
while ($c = pg_fetch_array($resCol)) { $colore .= "<option value='".$c['id']."'>".$c['definizione']."</option>";}

//lista supporto
$querySupp = "SELECT * FROM lista_dsc_supp WHERE id != ".$cartoArr["id_supporto"]." ORDER BY 2 ASC;";
$resSupp = pg_query($connection,$querySupp);
while ($s = pg_fetch_array($resSupp)) {$supporto .= "<option value='".$s['id']."'>".$s['definizione']."</option>";}
?>
<div id="cartoDati_form">
    <label>SUPPORTO</label>
    <select id="cartoSupporto" name="cartoSupporto" class="form">
        <option value="<?php echo $cartoArr['id_supporto'];?>"><?php echo $cartoArr['supporto'];?></option>
        <?php echo $supporto; ?>
    </select>

    <label>BN/COLORE</label>
    <select id="cartoColore" name="cartoColore" class="form">
        <option value="<?php echo $cartoArr['id_colore'];?>"><?php echo $cartoArr['colore'];?></option>
        <?php echo $colore; ?>
    </select>

    <label>MISURA STAMPA</label>
    <textarea id="cartoMisura" class="form" style=""><?php echo stripslashes($cartoArr['misura']); ?></textarea>

    <label>RAPPORTO DI SCALA</label>
    <textarea id="cartoScala" class="form" style=""><?php echo stripslashes($cartoArr['scala']); ?></textarea>

    <div class="login2" style="margin-top:20px;" id="cartoDatiSalva">Salva modifiche</div>
    <div class="chiudiForm login2">Annulla modifiche</div>
</div>
