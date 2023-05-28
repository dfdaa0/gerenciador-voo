<?php
declare(strict_types=1);
include_once('Persiste.php');

class Microonibus extends Veiculo{
  private Rota rota;

  public function __construct($embarque, $enderecos, $fabricante, $modelo, $capacidadePass, $proprietaria){
    parent::__construct($fabricante, $modelo, $capacidadePass, $proprietaria);
    $this->rota= new Rota($embarque, $enderecos);
  }
}