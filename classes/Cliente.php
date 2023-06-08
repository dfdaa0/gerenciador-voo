<?php
declare(strict_types=1);
include_once('Persiste.php');
class Cliente extends Pessoa{
  private Array $pedidos;
  static private $filename = 'cliente.txt';
  
  public function __construct(string $nome, string $rg, string $passaporte,
  string $cpf, string $nacionalidade, DateTime $nascimento, string $email, Endereco $endereco){
    parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco);
  }

  public function addPedido(Pedido $pedido){
    $pedidos[] = $pedido;
  }
 
}
?>