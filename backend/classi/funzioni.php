<?php
function extent($id){

}

//non funziona
function toponimi(){
    $query = "select toponomastica.gid, upper(top_nomai) toponimo, upper(comuni.comune) comune, st_X(st_transform((toponomastica.geom),3857))||','||st_Y(st_transform((toponomastica.geom),3857)) as lonlat from toponomastica, comuni where st_contains(comuni.geom, st_transform(toponomastica.geom,3857)) order by 3,2;";
    $exec=pg_query($connection,$query);
    $array = pg_fetch_array($exec);
    return $array;
}
?>
