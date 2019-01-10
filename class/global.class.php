<?php
require("db.class.php");
class General extends Db{
  function __construct(){}
  public function imgWall($dati){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random() limit ".$dati['limit'].";";
    return $this->simple($sql);
  }

  public function lazyLoad(){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random();";
    return $this->simple($sql);
  }

  public function geotag(){
    $sql = "SELECT c.id, c.comune as area, count(f.id) as schede FROM foto2 f, aree, area, aree_scheda, comune c WHERE aree.nome_area = area.id AND aree.id_comune = c.id AND aree_scheda.id_scheda = f.id_scheda AND area.tipo = 1 and aree_scheda.id_area = area.id and c.comune != '-' group by c.id, c.comune having count(f.id) > 10 order by 1 asc";
    return $this->simple($sql);
  }
}

?>
