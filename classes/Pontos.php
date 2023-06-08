<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pontos extends persist{
	  private int $valor;
	  private DateTime $dataExpiracao;
	  static private $filename = 'Pontos.txt';
	  public function __construct(int $valor, DateTime $dataExpiracao){
		    $this->valor = $valor;
		    $this->dataExpiracao = $dataExpiracao;
	  }
	  static public function getFilename(){
	    	return get_called_class()::$filename;
	  }
	  public function getValor(){
	    	return $this->valor;
	  }
	  public function getDataExpiracao(){
	    	return $this->dataExpiracao;
	  }
}
?>