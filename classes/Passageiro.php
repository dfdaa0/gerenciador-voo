<?php
declare(strict_types=1);
include_once('Persiste.php');
class Passageiro extends Pessoa{
  static private $filename = 'passageiro.txt';
  
  static public function getFilename() {
    return get_called_class()::$filename;
  }

  __construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email){
    parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email);
  }
  
}