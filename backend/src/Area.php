<?php
namespace Andalo;
session_start();
use \Andalo\Conn;

class Area extends Conn{

  function __construct(){}
  function getAree($dati=array()){
    $filter = [];
    if ($dati['comune'] > 0) {array_push($filter, "and (b.id_comune = ".$dati['comune']." OR c.id_comune = ".$dati['comune'].")");}
    if ($dati['tipo'] > 0) {array_push($filter, "and a.tipo = ".$dati['tipo']);}
    switch ($dati['totGeom']) {
      case 0:
        $having = "HAVING coalesce(d.ubicazioni,0) + COALESCE(e.poligoni,0) + COALESCE(f.linee,0) + COALESCE(g.punti,0) = 0 ";
      break;
      case 1:
        $having = "HAVING coalesce(d.ubicazioni,0) + COALESCE(e.poligoni,0) + COALESCE(f.linee,0) + COALESCE(g.punti,0) > 0 ";
      break;
      case 2:
        $having='';
      break;
    }
    $sql = "WITH a as (SELECT id, nome AS area, tipo from area), b as (SELECT aree.nome_area, aree.id_comune, array_to_string(array_agg(comune.comune::text || COALESCE((' '::text || localita.localita::text) || ' '::text, ''::text)), '<br>'::text) AS localita from aree JOIN comune ON aree.id_comune = comune.id left join localita on aree.id_localita = localita.id group by aree.nome_area, aree.id_comune), c as (SELECT aree.nome_area, aree.id_comune, array_to_string(array_agg(comune.comune::text || COALESCE((' '::text || indirizzo.indirizzo::text) || ' '::text, ''::text)), '<br>'::text) AS indirizzo from aree JOIN comune ON aree.id_comune = comune.id left join indirizzo on aree.id_indirizzo = indirizzo.id GROUP BY aree.nome_area, aree.id_comune), d as (select id_area, count(*) as ubicazioni from ubicazione group by id_area), e as (select id_area, count(*) as poligoni from area_int_poly group by id_area), f as (select id_area, count(*) as linee from area_int_line GROUP BY id_area), g as (select id_area, count(*) as punti from area_int_point GROUP BY id_area) select a.*, b.*, c.*, d.ubicazioni, e.poligoni, f.linee, g.punti, coalesce(d.ubicazioni,0) + COALESCE(e.poligoni,0) + COALESCE(f.linee,0) + COALESCE(g.punti,0) as tot from a LEFT JOIN b ON b.nome_area = a.id LEFT JOIN c ON c.nome_area = a.id LEFT JOIN d ON d.id_area = a.id LEFT JOIN e ON e.id_area = a.id LEFT JOIN f ON f.id_area = a.id LEFT JOIN g ON g.id_area = a.id where a.id IS NOT NULL  ".join(" ", $filter)." GROUP BY a.id, a.area, a.tipo, b.nome_area, b.localita, c.nome_area, c.indirizzo, d.ubicazioni, g.punti, e.poligoni, f.linee, b.id_comune, c.id_comune".$having." order by a.id asc;";
    return $this->simple($sql);
  }

  function comuniList(){
    $sql = "select id, upper(comune) comune from comune order by 2 asc;";
    return $this->simple($sql);
  }
  function localitaList($comune = null){
    $filter = $comune !== null ? ' where comune = '.$comune : '';
    $sql = "select id, localita from localita ".$filter." order by localita asc;";
    return $this->simple($sql);
  }
  function indirizziList($comune = null){
    $filter = $comune !== null ? ' where comune = '.$comune : '';
    $sql = "select id, indirizzo from indirizzo ".$filter." order by indirizzo asc;";
    return $this->simple($sql);
  }

  function rubricaList(){
    return $this->simple('select id, nome from anagrafica order by nome asc');
  }

  function areeList(){
    $sql="with
    area as (select area.id, area.nome, area.tipo, comune.id comuneid, comune.comune, array_agg(nullif(coalesce(localita.localita,''),'')) localita
      from area
      inner join aree on aree.nome_area = area.id
      inner join comune on aree.id_comune = comune.id
      left join localita on aree.id_localita = localita.id
      group by area.id, area.nome, area.tipo, comune.comune, comune.id),
    poly as (select id_area, count(*) poly from area_int_poly group by id_area),
    line as (select id_area, count(*) line from area_int_line group by id_area),
    point as (select id_area, count(*) point from area_int_point group by id_area),
    ubi as (select id_area, count(*) ubi from ubicazione group by id_area)
    select area.*, coalesce(poly.poly,0) + coalesce(line.line,0) + coalesce(point.point,0) ai, coalesce(ubi.ubi,0) ubi from area
    left join poly on poly.id_area = area.id
    left join line on line.id_area = area.id
    left join point on point.id_area = area.id
    left join ubi on ubi.id_area = area.id
    order by area.id desc;";
    return $this->simple($sql);
  }

  function addArea(array $dati){
    $area = array("tipo"=>$dati['tipo'],"nome"=>$dati['nome']);
    try {
      $this->begin();
      $sql = $this->buildInsert('area',$area);
      $sql = rtrim($sql, ";") . " returning id;";
      $areaId = $this->returning($sql,$area);
      if ($dati['tipo'] == 2) {
        $areaDef = array("id_comune"=>$dati['comune'],"nome_area"=>$areaId['field']);
        if (isset($dati['indirizzo'])) {$areaDef['id_indirizzo'] = $dati['indirizzo'];}
        if (isset($dati['rubrica'])) {$areaDef['id_rubrica'] = $dati['rubrica'];}
        $sql = $this->buildInsert('aree',$areaDef);
        $this->prepared($sql,$areaDef);
      }else {
        foreach ($dati['aree'] as $key => $value) {
          $areaDef = array("id_comune"=>$value['comune'],"nome_area"=>$areaId['field']);
          if (isset($value['localita'])) {$areaDef['id_localita'] = $value['localita'];}
          $sql = $this->buildInsert('aree',$areaDef);
          $this->prepared($sql,$areaDef);
        }
      }
      $this->commit();
      return array("res"=>true);
    } catch (\PDOException $e) {
      return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    } catch (\Exception $e) {
      return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    }


  }
}

?>
