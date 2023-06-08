<?php
declare(strict_types=1);
include_once('Persiste.php');
class PassageiroVip extends Passageiro{
  protected int $registro;
  protected ProgramaDeMilhas $programaDeMilhas;
  protected Pontos $pontos;
  static private $filename = 'passageiroVip.txt';

  static public function getFilename() {
    return get_called_class()::$filename;
  }

  public function __construct(int $registro, ProgramaDeMilhas $programaDeMilhas, Pontos $pontos, string $nome, string $rg, string $passaporte,
    string $cpf, string $nacionalidade, DateTime $nascimento, string $email, Endereco $endereco){
    $this->programaDeMilhas = $programaDeMilhas;
    $this->registro = $registro;
    $this->pontos = $pontos;
    parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco);

  }

  public function getProgramaDeMilhas(){
    return $this->programaDeMilhas;
  }

  public function getRegistro(){
    return $this->registro;
  }

  public function getPontos(){
    return $this->pontos;
  }
}