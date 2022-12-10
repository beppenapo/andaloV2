<?php
session_start();
ob_start();
require("db.php");
$id = $_POST['schedaFoto'];
$allowedExts = array("mp3", "ogg", "wav", "mp4");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

/*echo "tipo: ".$_FILES['file']['type']." <br>";
echo "size: ".$_FILES['file']['size']." <br>";
echo "ext: ".$extension."<br>";
echo "tmp_name: ".$_FILES["file"]["tmp_name"]."<br>";
echo "nome: ".$_FILES["file"]["name"]."<br>";
echo "error: ".$_FILES['file']['error']." <br>";

$path = realpath("../foto/");

if($path !== false AND is_dir($path)){
    // Return canonicalized absolute pathname
    echo $path;
}else{
    echo "cartella non letta";
}*/

if ((($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/ogg")
|| ($_FILES["file"]["type"] == "audio/wav"))
&& ($_FILES["file"]["size"] < 1073741824)//1gb in bytes
&& in_array($extension, $allowedExts)){
    if ($_FILES["file"]["error"] > 0){
        $msg = "Errore nel caricamento: " . $_FILES["file"]["error"] . "<br>";
    }else{
        if (file_exists("../../audio/" . $_FILES["file"]["name"])){
            $msg = $_FILES["file"]["name"] . " esiste già un file con questo nome. ";
        }else{
            if(move_uploaded_file($_FILES["file"]["tmp_name"], "../../audio/" . $_FILES["file"]["name"])){
                $up="insert into file(id_scheda, path, tipo)values($id, '".$_FILES["file"]["name"]."',2);";
                $exec = pg_query($connection, $up);
                if(!$exec){
                    $msg = "errore nella query, multimedia non salvato:". pg_last_error($connection);
                }else{
                    $msg = "Multimedia caricato!<br/>Entro 5 secondi verrai reindirizzato nella pagina del punto di interesse...<br/>Se la pagina impiega troppo tempo <a href='poi.php?id=".$id."'>clicca qui</a> per tornare alla pagina precedente";
                }
            }else{
                $msg = "Il file non è stato caricato sul server " .$_FILES["file"]["error"];
            }
            
        }
    }
}else{
    $msg = "File non valido o non selezionato!";
}
header("Refresh: 3; URL=../scheda_archeo.php?id=".$id);
echo $msg;
?>
