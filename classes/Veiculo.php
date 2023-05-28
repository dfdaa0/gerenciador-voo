<?php
declare(strict_types=1);
include_once('Persiste.php');

class Veiculo extends persist{
  protected string $fabricante;
  protected string $modelo;
  protected int $capacidadePass;
  protected CiaAerea $proprietaria;

  public function __construct($fabricante, $modelo, $capacidadePass, $proprietaria){
    $this->fabricante = $fabricante;
    $this->modelo = $modelo;
    $this->capacidadePass = $capacidadePass;
    $this->proprietaria = $proprietaria;
  }
  
  public function getFabricante(){
  return $this->fabricante;
}

  public function getModelo(){
  return $this->modelo;
}
  
  public function getCapacidadePass(){
  return $this->capacidadePass;
}
  
  public function getProprietaria(){
  return $this->proprietaria;
}
  
  public function setProprietaria($proprietaria){
  $this->proprietaria = $proprietaria;
}
  
}