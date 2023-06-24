<?php
declare(strict_types=1);
include_once('Persiste.php');
include_once('classes/Pessoa.php');

class Passageiro extends Pessoa{
  protected Array $passagens;
  static private $filename = 'passageiro.txt';
  
  static public function getFilename() {
    return get_called_class()::$filename;
  }

  public function __construct(string $nome, string $rg, string $passaporte,
  string $cpf, string $nacionalidade, string $nascimento, string $email, Endereco $endereco){
    parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco);
    $this->passagens = [];
  }

  public function getListaPassagens(){
    return $this->passagens;
  }

  public function addPassagem(Passagem $passagem){
    $this->passagens[] = $passagem;
  }
  
}