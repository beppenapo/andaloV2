<?php
require 'vendor/autoload.php';
use \Biblio\Gallery;

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (!isset($data['trigger'])) {
  echo json_encode(['error' => 'Invalid input: trigger not set']);
  exit;
}

$funzione = $data['trigger'];
unset($data['trigger']);

if(isset($funzione) && function_exists($funzione)){
  echo $funzione(new Gallery(), $data);
} else {
  echo json_encode(['error' => 'Function not found or not callable']);
}

// function imgWall($class, $data){return json_encode($class->imgWall($data));}
function loadGallery($class, $data){return json_encode($class->loadGallery($data));}

?>