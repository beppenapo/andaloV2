<?php
namespace Biblio;
class Gallery extends Connection{
  
  function __construct(){}

  public function countFiltered(string $join=null, array $filter){
    $where = '';
    $geotag = '';
    if(isset($filter['filters']) && count($filter['filters'])>0){ $where = " where ".join(" AND ", $filter['filters']); }
    if($join !== null){ $geotag = " inner join geotag on geotag.id = viewscheda.id "; }
    $sql="select count(*) tot from viewscheda ".$geotag." ".$where.";";
    return $this->simple($sql)[0];
  }

  public function imgWall(array $dati, string $join=null){
    $where = '';
    $geotag = '';
    $orderBy = $dati['orderBy'] == 'index' ? 'random()' : 'data_compilazione desc, id desc';
    if(isset($dati['filters']) && count($dati['filters'])>0){ $where = " where ".join(" AND ", $dati['filters']); }
    if($join !== null){ $geotag = " inner join geotag on geotag.id = viewscheda.id "; }
    $sql="select * from viewscheda ".$geotag.$where." order by ".$orderBy." limit ".$dati['limit']." offset ".$dati['offset']." ;";
    error_log($sql);
    return $this->simple($sql);
  }

  public function geotag(array $dati){
    $sql = "SELECT * from geotag WHERE id_comune = ".$dati['val']." limit ".$dati['limit']." offset ".$dati['offset'].";";
    return $this->simple($sql);
  }

  public function loadGallery(array $req): array{
    $out=[];
    $filter=[];
    $geotag = null;
    if (isset($req['stato'])) {
      switch ($req['stato']) {
        case 'chiuse':
          $filter[] = "viewscheda.fine = 2";
          $filter[] = "viewscheda.pubblica = true";
          break;
        case 'aperte':
          $filter[] = "viewscheda.fine = 1";
          $filter[] = "viewscheda.pubblica = true";
          break;
        case 'nascoste':
          $filter[] = "viewscheda.pubblica = false";
          break;
      }
    }

    if (isset($req['filtro'])) {
      switch ($req['filtro']) {
        case 'tag':
          $key = (string)$req['tag'];
          $filter[] = "'$key' in(select(unnest(viewscheda.tags)))";
          break;
        case 'geotag':
          $filter[] = "geotag.id_comune = ".$req['val'];
          $geotag = 'geotag';
          break;
        case 'titolo':
  $search = strtolower($req['tag']);
  $words = preg_split("/[\s']+/", trim($search));
  $words = array_filter($words, fn($w) => $w !== '');

  if (count($words) > 1) {
    $pattern = preg_quote(array_shift($words), "'");
    foreach ($words as $word) {
      $pattern .= '\s+.*?' . preg_quote($word, "'");
    }
  } elseif (count($words) === 1) {
    $pattern = preg_quote($words[0], "'");
  } else {
    $pattern = '';
  }

  error_log("REGEX: $pattern");

  $fields = [
    'viewscheda.sog_titolo',
    'viewscheda.dgn_numsch',
    'viewscheda.dgn_dnogg',
    'viewscheda.cro_spec',
    'viewscheda.sog_sogg',
    'viewscheda.sog_note',
    'viewscheda.sog_notestor',
    'viewscheda.alt_note'
  ];

  if ($pattern !== '') {
    $fieldRegexFilters = [];
    foreach ($fields as $field) {
      $fieldRegexFilters[] = "$field ~* '$pattern'";
    }
    $filter[] = '(' . implode(' OR ', $fieldRegexFilters) . ')';
  }
  break;
        case 'autore':
          $key = (string)$req['tag'];
          $filter[] = "viewscheda.sog_autore = '".$key."'";
          break;
      }
    }


    $dati = ["limit" => $req['limit'], "offset"=> $req['offset'],"filters"=>$filter, "orderBy" => $req['page']];
    $out['img'] =  $this->imgWall($dati,$geotag);
    $tot = $this->countFiltered($geotag,["filters"=>$filter])['tot'];
    if($tot == 0){
      $out['title'] = 'Nessuna immagine corrispondente al tuo criterio di ricerca!';
    }else{
      if (isset($req['filtro'])) {
        switch ($req['filtro']) {
          case 'tag':
            $txt2 = 'a cui è associata la tag "'.$req['tag'].'"';
            break;
          case 'geotag':
            $txt2 = $tot == 1 ? ' scattata ' : ' scattate ';
            $txt2 .= ' in località "'.$req['tag'].'"';
            break;
          case 'titolo':
            $txt2 = $tot == 1 ? ' che contiene la parola ' : ' che contengono le parole ';
            $txt2 .= '"'.$req['tag'].'"';
            break;
          case 'autore':
            $txt2 = $tot == 1 ? ' attribuita a ' : ' attribuite a ';
            $txt2 .= '"'.$req['tag'].'"';
            break;
        }
        $txt1 = $tot == 1 ? ' immagine ' : ' immagini ';
        $out['title'] = $tot.$txt1.$txt2;
      }else{
        $out['title'] = $tot == 1 ? "1 immagine trovata" : $tot." immagini trovate";
      }
    }

    return $out;
  }

  // public function loadGallery(array $req): array{
  //   $out=[];
  //   $filter=[];
  //   if (isset($req['stato'])) {
  //     switch ($req['stato']) {
  //       case 'chiuse':
  //         $filter["fine"] = " = 2";
  //         $filter["pubblica"] = " = true";
  //         break;
  //       case 'aperte':
  //         $filter["fine"] = " = 1";
  //         $filter["pubblica"] = " = true";
  //         break;
  //       case 'nascoste':
  //         $filter["pubblica"] = " = false";
  //         break;
  //     }
  //   }
  //   if (isset($req['filtro'])) {
  //     switch ($req['filtro']) {
  //       case 'tag':
  //         $filter[$req['tag']] = "in(select(unnest(tags)))";
  //         $dati = ["table"=>'viewscheda', "limit" => $req['limit'], "offset"=> $req['offset'],"filters"=>$filter];
  //         $out['img'] = $this->imgWall($dati);
  //         $txt2 = 'a cui è associata la tag "'.$req['tag'].'"';
  //         $tot = $this->countFiltered('viewscheda',["filters"=>$filter])['tot'];
  //       break;
  //       case 'geotag':
  //         $filter["id_comune"] = " = ".$req['val'];
  //         $dati = ["table"=>'geotag', "limit" => $req['limit'], "offset"=> $req['offset'],"filters"=>$filter];
  //         $out['img'] = $this->imgWall($dati);
  //         // $out['img'] = $this->geotag($req);
  //         $tot = $this->countFiltered('geotag', ["filters"=>$filter])['tot'];
  //         $txt2 = $tot == 1 ? ' scattata ' : ' scattate ';
  //         $txt2 .= ' in località "'.$req['tag'].'"';
  //       break;
  //       case 'titolo':
  //         $keywords = str_replace(' ', ' & ', $req['tag']);
  //         $filter["to_tsvector(concat_ws(' ',sog_titolo,dgn_numsch,dgn_dnogg,cro_spec,sog_sogg,sog_note,sog_notestor,alt_note))"] = "@@ to_tsquery('".$keywords."')";
  //         $out['img'] = $this->imgWall(["limit" => $req['limit'], "offset"=> $req['offset'], "filters"=>$filter]);
  //         $txt2 = count($out['img']) == 1 ? ' che contiene la parola ' : ' che contengono le parole ';
  //         $txt2 .= '"'.$req['tag'].'"';
  //         $tot = $this->countFiltered('viewscheda',["filters"=>$filter])['tot'];
  //       break;
  //     }
  //   }else{
  //     $out['img'] =  $this->imgWall(["limit" => $req['limit'], "offset"=> $req['offset'],"filters"=>$filter]);
  //     $txt2 = 'totali';
  //     $tot = $this->countFiltered('viewscheda',["filters"=>$filter])['tot'];
  //   }
  //   if($tot == 0){
  //     $out['title'] = 'Nessuna immagine corrispondente al tuo criterio di ricerca!';
  //   }else{
  //     $txt1 = $tot == 1 ? ' immagine ' : ' immagini ';
  //     $out['title'] = $tot.$txt1.$txt2;
  //   }
  //   return $out;
  // }
}

?>