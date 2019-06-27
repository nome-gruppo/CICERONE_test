<?php
namespace classi\utilities;

class Mail{
  private $nome_mittente;
  private $mail_mittente;
  private $mail_destinatario;
  private $mail_oggetto;
  private $mail_corpo;

  public function __construct(){

  }
  public function setNomeMittente($nomeMittente){
      $this->nome_mittente = $nomeMittente;
  }
  public function setMailMittente($mailMittente){
      $this->mail_mittente = $mailMittente;
  }
  public function setMailDestinatario($mailDestinatario){
      $this->mail_destinatario = $mailDestinatario;
  }

  public function mailPrenotazione(){
    $this->mail_oggetto="Richiesta di prenotazione";
    $this->mail_corpo="";
    $mail_headers = "From: " .  $this->nome_mittente . " <" .  $this->mail_mittente . ">\r\n";
    $mail_headers .= "Reply-To: " .  $this->mail_mittente . "\r\n";
    $mail_headers .= "X-Mailer: PHP/" . phpversion();
    $result=mail($this->mail_destinatario, $this->mail_oggetto, $this->mail_corpo, $mail_headers);
    return $result;
  }
  public function mailConferma(){
    $this->mail_oggetto="Conferma prenotazione";
    $this->mail_corpo="";
    $mail_headers = "From: " .  $this->nome_mittente . " <" .  $this->mail_mittente . ">\r\n";
    $mail_headers .= "Reply-To: " .  $this->mail_mittente . "\r\n";
    $mail_headers .= "X-Mailer: PHP/" . phpversion();
    $result=mail($this->mail_destinatario, $this->mail_oggetto, $this->mail_corpo, $this->mail_headers);
    return $result;
  }


}
