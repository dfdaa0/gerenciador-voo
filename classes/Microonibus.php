<?php
declare(strict_types=1);
include_once('Persiste.php');

class Microonibus extends Veiculo{
  private Rota $rota;
  static private $filename = 'Microonibus.txt';

  static public function getFilename(){
    return get_called_class()::$filename;
}

  public function __construct($embarque, $enderecos, $fabricante, $modelo, $capacidadePass, $proprietaria){
    parent::__construct($fabricante, $modelo, $capacidadePass, $proprietaria);
    $this->rota= new Rota($embarque, $enderecos);
  }
}