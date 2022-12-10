<?php
namespace Andalo;
session_start();
class Vocabolari extends Conn{

  function __construct(){}
  function getTables(){
    $sql = "select * from liste_valori order by etichetta asc;";
    return $this->simple($sql);
  }

  function getValue($tab){
    $field = 'definizione';
    if ($tab === 'tag') { $field = 'tag';}
    $sql = "select ".$field." as value from ".$tab." order by ".$field." asc";
    return $this->simple($sql);
  }

  function addVal(array $dati){
    $field = $dati['tab'] == 'tag' ? 'tag' : 'definizione';
    // $arr = array("definizione" => $dati['val']);
    // if ($dati['tab'] === 'tag') { $arr = array("tag" => $dati['val']);}
    // $sql = $this->buildInsert($dati['tab'],$arr);
    // $res = $this->prepared($sql,$arr);
    $sql = $this->simple("insert into ".$dati['tab']."(".$field.") values ('".$dati['val']."');");
    if (!$sql) { throw new Exception($res, 1);}
    return array("msg"=>'La definizione è stata correttamente salvata!.');
  }

  function modVal(array $dati){
    $field = $dati['tab'] == 'tag' ? 'tag' : 'definizione';
    $sql = $this->simple("update ".$dati['tab']." set ".$field." = '".$dati['mod']."' where ".$field." = '".$dati['old']."'");
    if (!$sql) { throw new Exception($sql, 1);}
    return array("msg"=>'La definizione è stata correttamente modificata!.');
  }

  function delVal(array $dati){
    $field = $dati['tab'] == 'tag' ? 'tag' : 'definizione';
    $sql = $this->simple("delete from ".$dati['tab']." where ".$field." = '".$dati['val']."';");
    if (!$sql) { throw new Exception($sql, 1);}
    return array("msg"=>'La definizione è stata eliminata!.');
  }
}

?>
