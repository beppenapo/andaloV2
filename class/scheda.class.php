<?php
require("db.class.php");
class Scheda extends Db{
  public $scheda;
  function __construct($scheda){ $this->scheda = $scheda; }
  public function getScheda(){
    $sql="select * from foto2,file where file.id_scheda=foto2.id_scheda and foto2.id_scheda = ".$this->scheda.";";
    return array("sql"=>$sql,"scheda"=>$this->simple($sql));
  }
}


?>
