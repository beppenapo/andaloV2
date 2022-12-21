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
// $imgList = $obj->simple("
// SELECT
//   scheda.id,
//   scheda.dgn_dnogg,
//   scheda.dgn_numsch,
//   file.path
// FROM
//   aree_scheda,
//   file,
//   scheda
// WHERE
//   aree_scheda.id_scheda = scheda.id AND
//   file.id_scheda = scheda.id and
//   aree_scheda.id_area = ".$_GET['area']."
// group by scheda.id, scheda.dgn_dnogg,scheda.dgn_numsch, file.path;
// ");
// echo json_encode($imgList);
?>
