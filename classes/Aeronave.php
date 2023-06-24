<?php
declare(strict_types=1);
include_once('Persiste.php');
include_once('Veiculo.php');
class Aeronave extends Veiculo{
  private float $capacidadeCarga;
  private string $registro;
  static private $filename = 'aeronave.txt';

  public function __construct(string $fabricante, string $modelo, int $capacidadePassageiros, CiaAerea $proprietaria, float $capacidadeCarga, string $registro) {   
    parent::__construct($fabricante, $modelo, $capacidadePassageiros, $proprietaria);  
    $this->capacidadeCarga = $capacidadeCarga;
    $this->setRegistro($registro);
  }
  
  static public function getFilename(){
    return get_called_class()::$filename;
  }

  public function getCapacidadeCarga() {
    return $this->capacidadeCarga;
  }
  
  public function getRegistro() {
    return $this->registro;
  }

  private function setRegistro(string $registro){
    $pattern = '/((PT)|(PP)|(PS))(-)[A-Z]{3}$/';
    if (!preg_match($pattern, $registro)){
      throw new Exception('Registro inválido.');
    }

    $this->registro = $registro;
  }

}

?>