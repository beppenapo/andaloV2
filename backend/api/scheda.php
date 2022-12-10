<?php
require '../vendor/autoload.php';
use \Andalo\Scheda;
$obj = new Scheda;
$funzione = $_POST['trigger'];
unset($_POST['trigger']);
if(isset($funzione) && function_exists($funzione)) {
  $trigger = $funzione($obj);
  echo $trigger;
}

function addScheda($obj){return json_encode($obj->addScheda($_POST['dati']));}
function getTags($obj){return json_encode($obj->getTags());}
function getSchede($obj){return json_encode($obj->getSchede());}
function tagScheda($obj){return json_encode($obj->tagScheda($_POST['scheda']));}
function modificaTags($obj){return json_encode($obj->modificaTags($_POST['dati']));}

?>
