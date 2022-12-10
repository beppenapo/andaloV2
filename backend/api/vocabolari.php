<?php
require '../vendor/autoload.php';
use \Andalo\Vocabolari;
$obj = new Vocabolari;
$funzione = $_POST['trigger'];
unset($_POST['trigger']);
if(isset($funzione) && function_exists($funzione)) {
  $trigger = $funzione($obj);
  echo $trigger;
}

function getValue($obj){return json_encode($obj->getValue($_POST['tab']));}
function addVal($obj){return json_encode($obj->addVal($_POST['dati']));}
function modVal($obj){return json_encode($obj->modVal($_POST['dati']));}
function delVal($obj){return json_encode($obj->delVal($_POST['dati']));}

?>
