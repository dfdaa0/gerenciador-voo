<?php
declare(strict_types=1);
include_once('Persiste.php');
class Aeronave extends Veiculo{
    private float $capacidadeCarga;
    private string $registro;
    static private $filename = 'aeronave.txt';
  
    public function __construct(float $capacidadeCarga, string $registro) {   
      parent::__construct($fabricante, $modelo, $capacidadePass, $proprietaria);  
      $this->capacidadeCarga = $capacidadeCarga;
        if($this->validaRegistro($registro)){
          $this->registro = $registro;
        }
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

    private function validaRegistro($registro) {
      if (strlen($registro) != 6 || $registro[2] != '-') {  
        return false;
      }
      $prefixo = substr($registro, 0, 2);
      if ($prefixo != 'PT' && $prefixo != 'PR' && $prefixo != 'PP' && $prefixo != 'PS') {
          echo 'Aeronave não permitida para voos nacionais.';
          return false;
      }
      if (!ctype_upper($registro[0]) || !ctype_upper($registro[1])) {  
        return false;
      }
      if (!ctype_upper($registro[3]) || !ctype_upper($registro[4]) || !ctype_upper($registro[5])) {  
        return false;
      }
      return true;
  }

}


?>