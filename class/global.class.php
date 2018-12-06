<?php
require("db.class.php");
class General extends Db{
  function __construct(){}
  public function imgWall($dati){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random() limit ".$dati['limit'].";";
    return $this->simple($sql);
  }
}

?>
