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
 
  Public Function __construct(Passageiro $passageiro, Array $viagens, String $codBarras, Array $franquias){
    $this->viagens = $viagens;
    $this->geraStatus($viagens);
    $this->passageiro = $passageiro;
    $this->origem = $this->viagens[0]->getLinha()->getOrigem();
    $this->destino = $this->viagens[count($viagens)-1]->getLinha()->getDestino();
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
      $this->status[$viagens[$i]->getLinha()->getCodLinha()] = EnumStatus::PassagemAdquirida;
    }
    
  }

  public function fazCheckIn(){
    $n = count($this->status);
    for ($i=0; $i < $n; $i++) {
      $codigo = $this->viagens[$i]->getLinha()->getCodLinha(); 
      $this->status[$codigo] = EnumStatus::CheckinRealizado;
    }
  }

  public function cancelaPassagem(){
    $n = count($this->status);
    for ($i=0; $i < $n; $i++) {
      $codigo = $this->viagens[$i]->getLinha()->getCodLinha(); 
      $this->status[$codigo] = EnumStatus::PassagemCancelada;
    }
    
  }

  public function fazEmbarque(Viagem $viagem){
    $this->status[$viagem->getLinha()->getCodLinha()] = EnumStatus::EmbarqueRealizado;
  }

  public function fazNoShow(){
    $n = count($this->status);
    for ($i=0; $i < $n; $i++) { 
      $codigo = $this->viagens[$i]->getLinha()->getCodLinha(); 
      $this->status[$codigo] = EnumStatus::NoShow;
    }
  }

  
  

}
?>