<?php
declare(strict_types=1);
include_once('Persiste.php');

class Viagem extends persist{
  private string $codigoViagem;
  private Linha $linha;
  private string $aeronave;
  private string $horaPartida;
  private string $horaChegada;
  private string $ciaAerea; // Sigla da CiaAerea 
  private $vagas = array();
  protected string $dataHora;
  static private $filename = 'viagem.txt';

  public function __construct($linha, $aeronave, $horaPartida, $horaChegada, $dataHora, $codigoViagem, $ciaAerea) {
    $this->dataHora = $dataHora;
    $this->linha = $linha;
    $this->aeronave = $aeronave;
    $this->horaPartida = $horaPartida;
    $this->horaChegada = $horaChegada;
    // $this->setCodigoViagem($codigoViagem, $ciaAerea);
    $this->ciaAerea = $ciaAerea;
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  public function getYear() {
    return $this-> dataHora ->format ("Y");
  }
      
  public function getMonth() {
    return $this->dataHora->format("m");
          
  }

  public function getDay() {
    return $this-> dataHora ->format ("D");
  }

  public function getDataHora() {
        return $this->dataHora;
  }
  
  public function getLinha() {
    return $this->linha;
  }

  public function setLinha($linha) {
    $this->linha = $linha;
  }

  public function getAeronave() {
    return $this->aeronave;
  }

  public function setAeronave($aeronave) {
    $this->aeronave = $aeronave;
  }

  public function getHoraPartida() {
    return $this->horaPartida;
  }

  public function setHoraPartida($horaPartida) {
    $this->horaPartida = $horaPartida;
  }

  public function getHoraChegada() {
    return $this->horaChegada;
  }

  public function setHoraChegada($horaChegada) {
    $this->horaChegada = $horaChegada;
  }

  public function getCodigoViagem() {
    return $this->codigoViagem;
  }

  private function setCodigoViagem($codigoViagem, $ciaAerea) {
    if (strlen($codigoViagem) != 6 || !ctype_alpha(substr($codigoViagem, 0, 2)) || !ctype_digit(substr($codigoViagem, 2))) {
      echo "Formatação incorreta. Exemplo: AA2222";
      return false;
    }
    if (substr($codigoViagem, 0, 2) != $ciaAerea) {
      echo "Sigla da Companhia Aérea não coincide";
      return false;
    }
    else {
      $this->codigoViagem = $codigoViagem;
      return true;
    }
  }

  public function getCiaAerea() {
    return $this->ciaAerea;
  }
  
  public function validaCodigoViagem($codigoViagem, $ciaAerea) {

}
}
/*
$dataHora = DateTime::createFromFormat('Y-m-d H:i:s', '2021-10-01 10:30:00');
$viagem = new Viagem('linha1', 'aeronave1', '10:30', '15:30', $dataHora);
echo "Hora Partida: " . $viagem->getDataHora()->format('Y-m-d H:i:s') . PHP_EOL;

echo "aeronave: " . $viagem->getAeronave() . PHP_EOL;
echo "Hora Partida: " . $viagem->getHoraPartida() . PHP_EOL;
*/