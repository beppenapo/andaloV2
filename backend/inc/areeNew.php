<div class="toggle" style="margin-bottom:10px;">
    <div class="sezioni sezAperta" style="margin:10px 10px 0px 10px; border:none;"><h2>Nuova area</h2></div>
    <div class="slide">
        <label style="text-align:center;display:block;font-weight:bold;">* CAMPI OBBLIGATORI.</label>
        <label>* Tipologia area</label>
        <select id="tipo" name="tipo" class="form">
            <option value="0">--scegli dalla lista--</option>
            <option value="1">area di interesse</option>
            <option value="2">ubicazione</option>
            <option value="3">cartografia</option>
        </select>
        <label>* NOME AREA</label>
        <textarea id="nomeArea" class="form" style="width:93% !important; height:16px !important;"></textarea>
        <div id="comune">
            <label>* COMUNE</label>
            <select id="comuneCarto" name="comuneCarto" class="form">
                <option value="15">--non determinabile--</option>
                <?php
                $q1 = ("SELECT DISTINCT id, comune FROM comune WHERE id != 15 order by comune asc;");
                $q1ex = pg_query($connection, $q1);
                $q1r = pg_num_rows($q1ex);
                while($row = pg_fetch_array($q1ex)){echo "<option value=".$row['id'].">".stripslashes($row['comune'])."</option>"; }
                ?>
            </select>
        </div>
        <div id="localita">
            <label>* LOCALITA'</label>
            <div id="localitaCarto"></div>
            <label id="addArea"><i class="fa fa-plus-circle"></i> Aggiungi area </label>
        </div>
        <ul id="locTot"></ul>
        <div id="indirizzo">
            <label>INDIRIZZO</label>
            <select name="indirizzo" class="form"><option value="0">--non determinabile--</option></select>
        </div>
        <div id="rubrica">   
            <label>RIFERIMENTO RUBRICA</label>
            <select name="rubrica" class="form"><option value="3">--non determinabile--</option></select>
        </div>
        <button type="button" name="salvaAree" class="pulsanti" >Salva area</button>
        <span id="test"></span>        
    </div>
</div>
