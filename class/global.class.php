<?php
require("db.class.php");
class General extends Db{
  function __construct(){}
  public function imgWall($dati){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random() limit ".$dati['limit'].";";
    return $this->simple($sql);
  }

  public function geotag(){
    // $sql = "SELECT comune.id, replace(comune.comune,'-','AREA NON DEFINITA') area, count(*) as schede FROM area, aree, aree_scheda, scheda, comune, area_int_poly WHERE aree.nome_area = area.id AND aree.id_comune = comune.id AND aree_scheda.id_area = area.id AND area_int_poly.id_area = area.id and aree_scheda.id_scheda = scheda.id AND area.tipo = 1 and scheda.dgn_tpsch = 7 and scheda.livello = 2 group by comune.id, comune.comune order by 1 asc;";
    $sql = "SELECT c.id, c.comune as area, count(f.id) as schede FROM foto2 f, aree, area, aree_scheda, comune c WHERE aree.nome_area = area.id AND aree.id_comune = c.id AND aree_scheda.id_scheda = f.id_scheda AND area.tipo = 1 and aree_scheda.id_area = area.id and c.comune != '-' group by c.id, c.comune having count(f.id) > 10 order by 1 asc";
    return $this->simple($sql);
  }
}

?>
