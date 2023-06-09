<?php
declare(strict_types=1);

include_once('Persiste.php');

class Viagem extends persist{
  private Linha $linha;
  private Aeronave $aeronave;
  private? Datetime $horaPartida;
  private? Datetime $horaChegada;
  private Array $vagas;
  private float $precoMin;
  private int $pontosViagem;
  private bool $chegadaOcorreu;
  static private $filename = 'viagem.txt';

  public function __construct(Linha $linha, Aeronave $aeronave, $horaPartida) {
    $this->aeronave = $aeronave;
    $this->horaPartida = $horaPartida;
    $this->setVagas();
    $this->linha = $linha;
    $this->chegadaOcorreu = false;
    $this->precoMin = 400;
    $this->pontosViagem = 50;
  }

  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  public function getYear() {
    return $this->linha->getHorarioPartida()->format ("Y");
  }
      
  public function getMonth() {
    return $this->linha->getHorarioPartida()->format("m");
          
  }

  public function getDay() {
    return $this->linha->getHorarioPartida()->format ("d");
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
    if($this->chegadaOcorreu == false){
      throw new Exception('Viagem não terminou');
    }
    return $this->horaChegada;
  }

  public function setHoraChegada(Datetime $horaChegada) {
    $this->horaChegada = $horaChegada;
    $this->chegadaOcorreu = true;
  }

  public function getPrecoMin() {
    return $this->precoMin;
  }
  
  public function getPontosViagem() {
    return $this->pontosViagem;
  }

  private function setVagas(){
    for ($i=0; $i < $this->aeronave->getCapacidadePassageiros(); $i++) { 
      $this->vagas[$i] = true;
    }
  }

  public function compraVaga(int $i){
    if($i < 0 || $i>=$this->aeronave->getCapacidadePassageiros()){
      throw new exception("Vaga inexistente");
    }
    if($this->vagas[$i] == false){
      throw new exception ("Vaga já está ocupada");
    }
    $this->vagas[$i] = false;
  }

  public function getDisponibilidadeVaga(int $i){
    if($i < 0 || $i>=$this->aeronave->getCapacidadePassageiros()){
      throw new exception("Vaga inexistente");
    }

    if($this->vagas[$i] == true){
      return "Vaga disponível";
    }

    else{
      return "Vaga indisponível";
    }
  }

  public function setPrecoMin(float $precoMin){
    $this->precoMin = $precoMin;
  }

}
