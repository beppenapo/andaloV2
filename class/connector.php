<?php
require($_POST['oop']['file']);
$class=new $_POST['oop']['classe'];
$funzione = $_POST['oop']['func'];
if(isset($funzione) && function_exists($funzione)) {
  $trigger = $funzione($class);
  echo $trigger;
}
## index function ##
function imgWall($class){return json_encode($class->imgWall($_POST['dati']));}
function geotag($class){return json_encode($class->geotag());}
?>
