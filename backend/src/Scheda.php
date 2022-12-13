<?php
namespace Andalo;
session_start();
class Scheda extends Conn{

  function __construct(){}

  function getScheda(int $id){
    $out=[];
    $scheda = $this->simple("select * from scheda where id = ".$id.";");
    $crono = $this->simple("select * from cronologia where id_scheda = ".$id.";");
    $out['scheda'] = $scheda[0];
    $out['cronologia'] = $crono[0];
    return $out;
  }

  function getTags(){
    $sql = "select tag from tag order by tag asc;";
    return $this->simple($sql);
  }
  function getSchede(){
    // $sql = "select id,dgn_numsch, dgn_tpsch, livello from scheda order by dgn_numsch asc;";
    $sql = "select s.id, s.dgn_numsch numsch, s.dgn_tpsch tpsch, tipo.definizione tipo, livello.definizione definizione, s.livello, s.dgn_dnogg dnogg, s.note, s.fine from scheda s inner join lista_dgn_livind livello on s.livello = livello.id inner join lista_dgn_tpsch tipo on s.dgn_tpsch = tipo.id order by s. dgn_numsch asc;";
    return $this->simple($sql);
  }

  function getListaUtenti(){
    return $this->simple("select id_user, concat(cognome,' ',nome) compilatore from usr order by 2 asc;");
  }

  function getListeGeneriche(){
    $list=['lista_dgn_livind', 'lista_cro_motiv', 'lista_ai_motiv', 'anagrafica', 'lista_cre_servizi', 'lista_stato_conserv'];
    $out=[];
    foreach ($list as $key => $tab) { $out[$tab] = $this->simple("select * from ".$tab." order by 2 asc;"); }
    return $out;
  }
  function getListaRicerche(){
    $sql = "SELECT * FROM ricerca order by denric asc;";
    return $this->simple($sql);
  }
  function getListaAree($tipo){
    $sql = "SELECT distinct a.id, a.nome AS area, an.nome FROM aree, area a, anagrafica an  WHERE aree.nome_area = a.id  AND aree.id_rubrica = an.id  AND a.tipo = ".$tipo." order by 2 asc;";
    return $this->simple($sql);
  }

  function addScheda(array $dati){
    // return $dati;
    //creo il riferimento per le tabelle specifiche
    $tab='';
    switch ($dati['scheda']['dgn_tpsch']) {
     case 1: $tab = "fonti_orali"; break;
     case 2: $tab = "materiali"; break;
     case 4: $tab = "archivi"; break;
     case 5: $tab = "biblio"; break;
     case 6: $tab = "archeo"; break;
     case 7: $tab = "foto"; break;
     case 8: $tab = "fonti_archtt"; break;
     case 9: $tab = "beni_stoart"; break;
     case 10: $tab = "cartografia"; break;
    }
    try {
      $this->begin();
      $schedaSql = $this->buildInsert('scheda',$dati['scheda']);
      $schedaSql = rtrim($schedaSql, ";") . " returning id;";
      $schedaId = $this->returning($schedaSql,$dati['scheda']);

      if ($dati['scheda']['livello'] == 1) {
        $liv1 = array('dgn_numsch' => $dati['scheda']['dgn_numsch']);
        $this->addSection($tab,$schedaId['field'],$liv1);
      }

      if ($dati['scheda']['livello'] == 2) {
        $liv2 = array('dgn_numsch2' => $dati['scheda']['dgn_numsch']);
        $this->addSection($tab.$dati['scheda']['livello'],$schedaId['field'],$liv2);
      }

      $this->addSection('cronologia',$schedaId['field'],$dati['cronologia']);

      if (isset($dati['consultabilita'])) {
        $this->addSection('consultabilita',$schedaId['field'],$dati['consultabilita']);
      }
      if (isset($dati['altrif'])) {
        foreach ($dati['altrif']['dati'] as $val) {
          $arr = array(
            "scheda" => $schedaId['field'],
            "numsch" => $dati['scheda']['dgn_numsch'],
            "tpsch" => $dati['scheda']['dgn_tpsch'],
            "livello" => $dati['scheda']['livello'],
            "scheda_altrif" => $val[1],
            "numsch_altrif" => $val[0],
            "tpsch_altrif" => $val[2],
            "livello_altrif" => $val[3]
          );
          $sql = $this->buildInsert('altrif',$arr);
          $res = $this->prepared($sql,$arr);
          if (!$res) { throw new Exception($res, 1);}
        }
      }

      if (isset($dati['aree_scheda'])) {
        if (isset($dati['aree_scheda']['dati'])) {
          foreach ($dati['aree_scheda']['dati'] as $val) {
            $arr = [];
            $arr['id_area'] = $val[0];
            $arr['id_motivazione'] = $val[1];
            $this->addSection('aree_scheda',$schedaId['field'],$arr);
          }
        }
        if (isset($dati['aree_scheda']['id_area'])) {
          $arr = [];
          $arr['id_area'] = $dati['aree_scheda']['id_area'];
          $arr['id_motivazione'] = $dati['aree_scheda']['id_motivazione'];
          $this->addSection('aree_scheda',$schedaId['field'],$arr);
        }
      }

      if (isset($dati['tags'])) {
        $x = array();
        $x['scheda'] = $schedaId['field'];
        $x['tags'] = '{'.join(",",$dati['tags']['tags']).'}';
        $sql = $this->buildInsert('tags',$x);
        $res = $this->prepared($sql,$x);
        if (!$res) { throw new Exception($res, 1);}
      }
      $this->commit();
      return array("res"=>true, "scheda"=>$schedaId['field'], "msg"=>'La scheda è stata correttamente salvata!.');
    } catch (\PDOException $e) {
      return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    } catch (\Exception $e) {
      return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    }

  }

  function modificaTags(array $dati){
    $this->begin();
    $this->simple("delete from tags where scheda = ".$dati['scheda'].";");
    $x = array();
    $x['scheda'] = $dati['scheda'];
    $x['tags'] = '{'.join(",",$dati['tags']).'}';
    $sql = $this->buildInsert('tags',$x);
    $res = $this->prepared($sql,$x);
    if (!$res) { throw new Exception($res, 1);}
    $this->commit();
    return array("res"=>true, "msg"=>'Tag salvate');
  }

  function tagScheda($scheda){
    $sql = "select unnest(tags) tag from tags where scheda = ".$scheda." order by 1 asc;";
    return $this->simple($sql);
  }

  private function addSection(string $tab, int $scheda, array $dati){
    $dati['id_scheda'] = $scheda;
    if (isset($dati['servizi'])) {$dati['servizi'] = join(',',$dati['servizi']);}
    $sql = $this->buildInsert($tab,$dati);
    $res = $this->prepared($sql,$dati);
    if (!$res) { throw new Exception($res, 1);}
    return $res;
  }
}

?>
