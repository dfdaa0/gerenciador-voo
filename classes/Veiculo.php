<?php
declare(strict_types=1);
include_once('Persiste.php');

class Veiculo extends persist{
  protected string $fabricante;
  protected string $modelo;
  protected int $capacidadePassageiros;
  protected CiaAerea $proprietaria;
  static private $filename = 'veiculo.txt';

  public function __construct(string $fabricante, string $modelo, int $capacidadePassageiros, CiaAerea $proprietaria){
    $this->fabricante = $fabricante;
    $this->modelo = $modelo;
    $this->capacidadePassageiros = $capacidadePassageiros;
    $this->proprietaria = $proprietaria;
  }
  
  static public function getFilename(){
    return get_called_class()::$filename;
  }

  public function getFabricante(){
  return $this->fabricante;
}

  public function getModelo(){
  return $this->modelo;
}
  
  public function getCapacidadePassageiros(){
  return $this->capacidadePassageiros;
}
  
  public function getProprietaria(){
  return $this->proprietaria;
}
  
  public function setProprietaria($proprietaria){
  $this->proprietaria = $proprietaria;
}
  
}