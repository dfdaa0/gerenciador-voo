<?php
declare(strict_types=1);
include_once('Persiste.php');

class Viagem extends persist{
  private string $codigoViagem;
  private Linha $linha;
  private Aeronave $aeronave;
  private Datetime $horaPartida;
  private Datetime $horaChegada;
  private Array $vagas;
  private float $valorMin;
  private int $pontosViagem;
  static private $filename = 'viagem.txt';

  public function __construct(Linha $linha, Aeronave $aeronave, Datetime $horaPartida, Datetime $horaChegada, float $valorMin, int $pontosViagem) {
    $this->linha = $linha;
    $this->aeronave = $aeronave;
    $this->horaPartida = $horaPartida;
    $this->horaChegada = $horaChegada;
    $this->valorMin = $valorMin;
    $this->pontosViagem = $pontosViagem;
    createPontosViagem();
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
  
  public function getLinha() {
    return $this->linha;
  }

  public function getAeronave() {
    return $this->aeronave;
  }

  public function getHoraPartida() {
    return $this->horaPartida;
  }

  public function setHoraPartida(DateTime $horaPartida) {
    $this->horaPartida = $horaPartida;
  }

  public function getHoraChegada() {
    return $this->horaChegada;
  }

  public function setHoraChegada(Datetime $horaChegada) {
    $this->horaChegada = $horaChegada;
  }

  public function getCodigoViagem() {
    return $this->codigoViagem;
  }

  private function setCodigoViagem(string $codigoViagem) {
    if (strlen($codigoViagem) != 6 || !ctype_alpha(substr($codigoViagem, 0, 2)) || !ctype_digit(substr($codigoViagem, 2))) {
      echo "Formatação incorreta. Exemplo: AA2222";
      return false;
    }
    if (substr($codigoViagem, 0, 2) != $this->ciaAerea) {
      echo "Sigla da Companhia Aérea não coincide";
      return false;
    }
    else {
      $this->codigoViagem = $codigoViagem;
      return true;
    }
  }

  public function getValorMin() {
    return $this->pontosViagem;
  }
  
  private function setValorMin(int $pontosViagem){
    // implementar
  }
  
  public function getPontosViagem() {
    return $this->pontosViagem;
  }
  
  private function setPontosViagem(int $pontosViagem){
    // implementar
  }


  private function createPontosViagem(){
    // implementar
  };

}
