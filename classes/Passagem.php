<?php
declare(strict_types=1);
include_once('Persiste.php');
class Passagem extends persist{
  private Passageiro $passageiro;
  private Aeroporto $origem;
  private Aeroporto $destino;
  private Array $viagens;
  private Array $status;
  private String $codBarras;
  private Int $franquias;
  //franquias só podem ter no máximo 23kg cada. Falta implementar isso
  static private $filename = 'passagem.txt';
  
  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  Public Function __construct(Passageiro $passageiro, Aeroporto $origem, Aeroporto $destino, Array $viagens, String $codBarras, Int $franquias){
    $this->geraStatus($viagens);
    $this->passageiro = $passageiro;
    $this->origem = $origem;
    $this->destino = $destino;
    $this->viagens = $viagens;
    $this->codBarras = $codBarras;
    if($this->checaFranquias($franquias)){
      $this->franquias = $franquias;
    }
  }

  Public Function getPassageiro(){
    return $this->passageiro;
  }

  Public Function getOrigem(){
    return $this->origem;
  }

  Public Function getDestino(){
    return $this->destino;
  }

  Public Function getViagens() {
    return $this->viagens;
  }

  Public Function getStatus() {
    return $this->status;
  }

  Public Function getCodBarras() {
    return $this->codBarras;
  }

  Public Function getFranquias() {
    return $this->franquias;
  }

  Private Function checaFranquias(int $franquias){
    if($franquias > 3 || $franquias < 0){
      return false;
    }
    return true;
  }

  private function geraStatus(array $viagens){
    
    for ($i=0; $i < count($viagens); $i++) { 
      $this->status[$viagens[$i]->getCodigoViagem()] = EnumStatus::PassagemAdquirida;
    }
    
  }

  public function fazCheckIn(Viagem $viagem){
    for ($i=0; $i < count($this->status); $i++) {
      $this->status[$i] = EnumStatus::CheckinRealizado;
    }
  }

  public function cancelaPassagem(){
    for ($i=0; $i < count($this->status); $i++) { 
      $this->status[$i] = EnumStatus::PassagemCancelada;
    }
    
  }

  public function fazEmbarque(Viagem $viagem){
    $this->status[$viagem->getCodigoViagem()] = EnumStatus::EmbarqueRealizado;
  }

  public function fazNoShow(){
    for ($i=0; $i < count($this->status); $i++) { 
      $this->status[$i] = EnumStatus::NoShow;
    }
  }

  
  

}
?>