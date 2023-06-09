<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pedido extends Persist{
  private Cliente $cliente;
  private Array $listaDePassagens;
  static private $filename = 'pedido.txt';
  public function __construct(Cliente $cliente, Array $listaDePassagens){
    $this->cliente = $cliente;
    $this->listaDePassagens = $listaDePassagens;
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }
  public function getCliente(){
    return $this->cliente;
  }

  public function getListaDePassagens(){
    return $this->listaDePassagens;
  }

}
?>