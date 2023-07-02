<?php
declare(strict_types=1);
include_once('Persiste.php');
class Passagem extends persist{
  private Passageiro $passageiro;
  private Aeroporto $origem;
  private Aeroporto $destino;
  private Viagem $viagens;
  private EnumStatus $status;
  private String $codBarras;
  private Array $franquias;
  private float $valorMulta;
  static private $filename = 'passagem.txt';
  
  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  Public Function __construct(Passageiro $passageiro, Viagem $viagens, String $codBarras, Array $franquias, float $valorMulta){
    $this->viagens = $viagens;
    $this->geraStatus($viagens);
    $this->passageiro = $passageiro;
    $this->origem = $this->viagens->getLinha()->getOrigem();
    $this->destino = $this->viagens->getLinha()->getDestino();
    $this->viagens = $viagens;
    $this->codBarras = $codBarras;
    if($this->checaFranquias($franquias)){
      $this->franquias = $franquias;
    }
    $this->valorMulta = $valorMulta;
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

  private function geraStatus(){
    
    
      $this->status = EnumStatus::PassagemAdquirida;
    
    
  }

  public function fazCheckIn(){
     
      $this->status = EnumStatus::CheckinRealizado;
    
  }

  public function cancelaPassagem(){
    
      $this->status = EnumStatus::PassagemCancelada;
    
    
  }

  public function fazEmbarque(){
    $this->status = EnumStatus::EmbarqueRealizado;
  }

  public function fazNoShow(){
    
   
      
      $this->status = EnumStatus::NoShow;
    
  }

  public function getValorMulta(){
    return $this->valorMulta;
  }
  

}
?>