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
  private Array $franquias;
  static private $filename = 'passagem.txt';
  
  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  Public Function __construct(Passageiro $passageiro, Aeroporto $origem, Aeroporto $destino, Array $viagens, String $codBarras, Array $franquias){
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

  Private Function checaFranquias(Array $franquias){
    if(count($franquias) > 3 || count($franquias) < 0){
      throw new Exception('Número de franquias inválido');
    }
    for ($i=0; $i < count($franquias); $i++) { 
      if($franquias[$i] > 23 || $franquias[$i] < 0){
        throw new Exception('Peso de franquias inválido');
      }
    }
    return true;
  }

  private function geraStatus(array $viagens){
    
    for ($i=0; $i < count($viagens); $i++) { 
      $this->status[$viagens[$i]->getCodigoViagem()] = EnumStatus::PassagemAdquirida;
    }
    
  }

  public function fazCheckIn(){
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
    $this->status[$viagem->getLinha()->getCodLinha()] = EnumStatus::EmbarqueRealizado;
  }

  public function fazNoShow(){
    for ($i=0; $i < count($this->status); $i++) { 
      $this->status[$i] = EnumStatus::NoShow;
    }
  }

  
  

}
?>