<?php
include("../inc/db.php");
$geomTypes = array('point', 'line', 'poly');

if(empty($_POST)) {
  $idArea = !empty($_GET['idArea']) ? (int)$_GET['idArea'] : null;
  $idUbicazione = !empty($_GET['idUbicazione']) ? (int)$_GET['idUbicazione'] : null;
  if(!empty($idArea)) {
    $areaGeoms = array();
    foreach($geomTypes as $geomType) {
      $sql = "select st_astext(the_geom) as geometry, id, id_area from area_int_$geomType where id_area = $idArea";
      $result = pg_query($connection, $sql);
      if(pg_num_rows($result) > 0) {
        while($row = pg_fetch_assoc($result)) {
          array_push($areaGeoms, $row);
        }
      }
    }
    echo json_encode($areaGeoms);
  } else if(!empty($idUbicazione)) {
    $sql = "select st_astext(the_geom) as geometry, id, id_area from ubicazione where id_area = $idUbicazione";
    $result = pg_query($connection, $sql);
    if(pg_num_rows($result) > 0) {
      echo json_encode(pg_fetch_assoc($result));
    } else {
      echo '';
    }
  }
} else {
  switch($_POST['action']) {
    case 'save':
      $features = $_POST['features'];
      $type = $_POST['type'];
      if(!empty($features)) {
        foreach($features as $feature) {
          if($type == 'area') {
            $tableName = getTableForGeomType($feature['geometryType']);
          } else {
            $tableName = 'ubicazione';
          }
          if(!empty($feature['geometry'])) {
            $geomWkt = pg_escape_string($feature['geometry']);
            $geomFn = "st_geomfromtext('$geomWkt', 3857)";
          }
          if($type == 'area') {
            $geomFn = 'st_multi(' . $geomFn . ')';
          }
          if($feature['action'] == 'insert') {
            $idArea = (int)$feature['id_area'];
            $sql = "insert into $tableName (id_area, the_geom) values ($idArea, $geomFn)";
            pg_query($connection, $sql);
          } else if($feature['action'] == 'update') {
            $id = (int)$feature['id'];
            $sql = "update $tableName set the_geom = $geomFn where id = $id";
            pg_query($connection, $sql);
          } else if($feature['action'] == 'delete') {
            $id = (int)$feature['id'];
            $sql = "delete from $tableName where id = $id";
            pg_query($connection, $sql);
          }
        }
      }
    break;
  }
}

function getTableForGeomType($geomType) {
  switch($geomType) {
    case 'MultiPoint':
    case 'Point':
      return 'area_int_point';
    break;
    case 'MultiLineString':
    case 'LineString':
      return 'area_int_line';
    break;
    case 'MultiPolygon':
    case 'Polygon':
      return 'area_int_poly';
    break;
  }
}
