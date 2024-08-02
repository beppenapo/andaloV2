<?php
require 'vendor/autoload.php';
use \Biblio\Scheda;

// Controlla il tipo di contenuto della richiesta
/* L'operatore ?? in PHP è l'operatore di coalescenza nulla (null coalescing operator). È utilizzato per verificare se una variabile è definita e non è null. Se la variabile è definita e non è null, il suo valore viene usato; altrimenti, viene usato il valore a destra dell'operatore cioè ''. */
$contentType = $_SERVER["CONTENT_TYPE"] ?? '';

// Gestisci i dati in base al tipo di contenuto
if (strpos($contentType, 'application/json') !== false) {
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
} elseif (strpos($contentType, 'multipart/form-data') !== false) {
    $data = $_POST;
    if (isset($_FILES) && count($_FILES) > 0) {
        $data['files'] = $_FILES; // Include i file caricati nei dati
    }
} else {
    echo json_encode(['error' => 'Unsupported content type']);
    exit;
}


if (!isset($data['trigger'])) {
  echo json_encode(['error' => 'Invalid input: trigger not set']);
  exit;
}

$funzione = $data['trigger'];
unset($data['trigger']);

if(isset($funzione) && function_exists($funzione)){
  echo $funzione(new Scheda(), $data);
} else {
  echo json_encode(['error' => 'Function not found or not callable']);
}

function getScheda($class,$data){return json_encode($class->getScheda($data['id']));}
function viewScheda($class,$data){return json_encode($class->viewScheda($data['id']));}
function liste($class, $data){return json_encode($class->liste());}
function checkNum($class, $data){return json_encode($class->checkNum($data['scheda']));}
function checkFileExists($class, $data){return json_encode($class->checkFileExists($data['file']));}

function salvaScheda($class, $data){return json_encode($class->salvaScheda($data));}
function updateScheda($class, $data){return json_encode($class->updateScheda($data['dati']));}
function delScheda($class, $data){return json_encode($class->delScheda($data['dati']));}
function getIdByNumsch($class, $data){return json_encode($class->getIdByNumsch($data['numsch']));}
function feedback($class, $data){return json_encode($class->feedback($data));}

?>