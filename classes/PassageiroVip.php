<?php
declare(strict_types=1);
include_once('Persiste.php');
class PassageiroVip extends Passageiro{
  protected int $registro;
  protected ProgramaDeMilhas $programaDeMilhas;
  protected Array $pontos; //array de objetos do tipo Pontos
  static private $filename = 'passageiroVip.txt';

  static public function getFilename() {
    return get_called_class()::$filename;
  }

  public function __construct(int $registro, ProgramaDeMilhas $programaDeMilhas, Array $pontos, string $nome, string $rg, string $passaporte,
    string $cpf, string $nacionalidade, string $nascimento, string $email, Endereco $endereco){
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

  public function getPontosAcumulados(){
    $total = 0;
    for ($i=0; $i < count($this->pontos); $i++) { 
      $total += $this->pontos[$i]->getValor();
    }
    return $total;
  }

  public function addPontos(Pontos $pts){
    $this->pontos[] = $pts;
  }

  public function removePontosExpirados(){
    $today = date_create('now');
    for ($i=0; $i < count($this->pontos); $i++) { 
      if($this->pontos[$i]->getDataExpiracao() < $today){
        array_splice($this->pontos, $i, 1);
      }
    }
  }
}