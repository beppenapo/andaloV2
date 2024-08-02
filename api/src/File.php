<?php 
namespace Biblio;
class File extends Connection{
  private $folder;
  private $imageAllowed = array(
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg', 
  );
  private $maxSize = 52428800; //50MB

  function __construct()  {
    $isLocal = ($_SERVER['SERVER_NAME'] === 'localhost');
    $uploadDir = $isLocal ? '/bibliopaganella/foto/' : '/bibliopaganella.org/foto/';
    $this->folder = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
  }

  public function upload($file, $name){
    $this->checkError($file['error']);
    $this->checkType($file['name'], $file['type']);
    $this->checkSize($file['error']);
    $this->moveFile($file, $name);
    return true;
  }

  public function deleteFile(string $file){
    if(!unlink($this->folder.$file)){ throw new \Exception("Errore: non è stato possibile eliminare il file", 1); }
    return true;
  }

  public function checkFileExistsByName(string $name){
    return $this->simple("select id_scheda, path from file where path = '".$name."'");
  }

  protected function checkError($error){
    if($error == 1){
      throw new \Exception("Errore durante il caricamento dell'immagine, riprova o contatta il responsabile della piattaforma.", 1);
    }
    return true;
  }

  protected function checkType($fileExt, $fileMime){
    $ext = explode('.', $fileExt);
    $ext = array_pop($ext);
    $ext = mb_strtolower(strval($ext));
    if(!array_key_exists($ext,$this->imageAllowed)){
      throw new \Exception("Errore: stai cercando di caricare un file con estensione non accettata", 1);
    }
    if($fileMime !== $this->imageAllowed[$ext]){
      throw new \Exception("Errore: stai cercando di caricare un file non consentito", 1);
    }
    return true;
  }
  
  protected function checkSize($size){
    if($size > $this->maxSize){
      throw new \Exception("Errore: il file supera le dimensioni consentite", 1);
    }
    return true;
  }

  protected function moveFile($file, $name){
    $fileLoc = $this->folder.$name;
    if(!move_uploaded_file($file["tmp_name"], $fileLoc)){ 
      throw new \Exception("Errore durante lo spostamento nella cartella finale: ".$fileLoc, 1); 
    }
    chmod($fileLoc, 0666);
    return true;
  }
}
?>