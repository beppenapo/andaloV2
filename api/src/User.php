<?php
namespace Biblio;
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User extends Connection{
  
  function __construct(){}

  public function login(array $dati){
    try {
      $usrInfo = $this->checkEmail($dati['email']);
      $this->checkAct($dati['email']);
      $this->checkPwd($dati['pwd']);
      $this->setSession($usrInfo);
      return "Credenziali corrette, stai per accedere all'area riservata";
    } catch (\Exception $e) {
      return $e->getMessage();
    } catch (\PDOException $e){
      return $e->getMessage();
    }

  }

  private function checkEmail(string $email){
    $check = $this->simple("select id_user, cognome, nome from usr where email = '".$email."';");
    if (count($check)==0) {
      throw new \Exception("Errore! Email non valida o scritta male", 1);
    }
    return $check[0];
  }

  private function checkAct(string $email){
    $check = $this->simple("select * from usr where attivo = 1 and email = '".$email."';");
    if (count($check)==0) {
      throw new \Exception("Errore! Il tuo account è stato disabilitato per motivi di sicurezza", 1);
    }
    return $check;
  }

  private function checkPwd(string $pwd){
    $check = $this->simple("select id_user from usr where password = crypt('".$pwd."',password);");
    if (count($check)==0) {
      throw new \Exception("Errore! Password non è corretta o digitata male", 1);
    }
    return true;
  }

  private function setSession(array $dati){
    $_SESSION['id_user']=$dati['id_user'];
    $_SESSION['utente']=$dati['cognome']." ".$dati['nome'];
    return true;
  }
}

?>