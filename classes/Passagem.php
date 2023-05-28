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
  static private $filename = 'passagem.txt';
  public function __construct(){
    
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }
 
  Public Function __construct(Passageiro $passageiro, Aeroporto  $origem, Aeroporto $destino, Array $viagens, Array $status, String $codBarras, Int $franquias){
  //faltando implementar
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
  Private Function checaFranquias(Int $franquias){
    if($franquias > 3 || $franquias < 0){
      return false;
    }
    return true;
  }
  

}?
?>