<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pts extends persist{
	  private valor $valor;
	  private DataExpiracao $dataExpiracao;
	  static private $filename = 'Pts.txt';
	  public function __construct($valor, $dataExpiracao){
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