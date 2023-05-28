<?php
declare(strict_types=1);
include_once('Persiste.php');
class Cliente extends Pessoa{
  private string $nome;
  private string $sobrenome;
  private string $rg;
  private int $passaporte;
  static private $filename = 'cliente.txt';
  
  public function __construct($nome, $sobrenome, $rg, $passaporte){
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    $this->rg = $rg;
    $this->passaporte = $passaporte;
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }
  public function getNome(){
    return $this->nome;
  }
  public function getSobrenome(){
    return $this->sobrenome;
  }
  public function getRg(){
    return $this->rg;
  }
  public function getPassaporte(){
    return $this->passaporte;
  }
}
?>