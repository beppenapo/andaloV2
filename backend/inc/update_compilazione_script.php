<?php
include("db.php");
$id = $_POST['id'];
$denric_update = $_POST['denric_update'];
$compilatore = $_POST['compilatore'];
$notecmp_update = pg_escape_string($_POST['notecmp_update']);

$update = "UPDATE scheda SET compilatore = ".$compilatore.", cmp_note = '".$notecmp_update."', cmp_id = ".$denric_update." WHERE id = ".$id.";";
$result = pg_query($connection, $update);

if(!$result){die("Errore nella query: \n" . pg_last_error($connection));}
else {die("Salvataggio avvenuto correttamente" . pg_last_error($connection));}
?>
