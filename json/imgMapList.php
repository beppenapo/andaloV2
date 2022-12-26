<?php
require("../class/db.class.php");
$obj = new Db;
$list=[];
foreach ($_GET['scheda'] as $foto) {
  $sql = "select s.id, s.dgn_dnogg, file.path from scheda s inner join file on file.id_scheda = s.id where s.id = ".$foto.";";
  $res = $obj->simple($sql);
  array_push($list,$res);
}
echo json_encode($list);
?>
