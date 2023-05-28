<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pedido extends persist{
  private Cliente $cliente;
  private BuscaViagem $planoDeVoo;
  private $listaDePassagens = array();
  static private $filename = 'pedido.txt';
  public function __construct($cliente, $planoDeVoo, $listaDePassagens){
    $this->cliente = $cliente;
    $this->planoDeVoo = $planoDeVoo;
    $this->listaDePassagens = $listaDePassagens;
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }
  public function getCliente(){
    return $this->cliente;
  }
  public function getOrigem(){
    return $this->origem;
  }
  public function getDestino(){
    return $this->destino;
  }

  public function getListaDePassagens(){
    return $this->listaDePassagens;
  }

}?
?>