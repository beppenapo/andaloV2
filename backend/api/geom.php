<?php
require '../vendor/autoload.php';
use \Andalo\Geom;
$obj = new Geom;
$funzione = $_GET['trigger'];
unset($_GET['trigger']);
if(isset($funzione) && function_exists($funzione)) {
  $trigger = $funzione($obj);
  echo $trigger;
}

function getAree($obj){
  $scheda = $_GET['scheda'] ? $_GET['scheda'] : null;
  return $obj->getAree($_GET['tab'], $scheda);
}
?>
