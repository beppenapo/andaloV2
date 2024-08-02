<?php
require 'vendor/autoload.php';
use \Biblio\User;
$funzione = $_POST['trigger'];
unset($_POST['trigger']);
if(isset($funzione) && function_exists($funzione)){echo $funzione(new User());}

function login($class){return json_encode($class->login($_POST));}


?>