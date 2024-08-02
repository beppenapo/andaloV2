<?php
require 'vendor/autoload.php';
use \Biblio\Index;

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (!isset($data['trigger'])) {
  echo json_encode(['error' => 'Invalid input: trigger not set']);
  exit;
}

$funzione = $data['trigger'];
unset($data['trigger']);

if(isset($funzione) && function_exists($funzione)){
  echo $funzione(new Index(), $data);
} else {
  echo json_encode(['error' => 'Function not found or not callable']);
}

function luoghi($class, $data){return json_encode($class->luoghi($data));}
function markerList($class, $data){
  $area = isset($data['area']) ? $data['area'] : null;
  return $class->markerList($area);
}
function imgMapList($class, $data){return json_encode($class->imgMapList($data['area']));}
function parole($class, $data){return json_encode($class->parole($data));}
function autori($class, $data){return json_encode($class->autori($data));}

?>