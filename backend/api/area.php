<?php
require '../vendor/autoload.php';
use \Andalo\Area;
$lavoro = new Area;
$funzione = $_POST['trigger'];
unset($_POST['trigger']);
if(isset($funzione) && function_exists($funzione)) {
  $trigger = $funzione($lavoro);
  echo $trigger;
}

function getAree($lavoro){return json_encode($lavoro->getAree($_POST));}
function comuniList($lavoro){return json_encode($lavoro->comuniList());}
function localitaList($lavoro){
  $comune = isset($_POST['comune']) ? $_POST['comune'] : null;
  return json_encode($lavoro->localitaList($comune));
}
function indirizziList($lavoro){
  $comune = isset($_POST['comune']) ? $_POST['comune'] : null;
  return json_encode($lavoro->indirizziList($comune));
}
function areeList($lavoro){return json_encode($lavoro->areeList());}
function addArea($lavoro){return json_encode($lavoro->addArea($_POST['dati']));}
?>
