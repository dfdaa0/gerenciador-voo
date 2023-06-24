<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pontos extends persist{
	  private int $valor;
	  private DateTime $dataExpiracao;
	  static private $filename = 'Pontos.txt';
	  public function __construct(int $valor){
		    $this->valor = $valor;
			$this->geraDataExpiracao();
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

	  private function geraDataExpiracao(){
		$this->dataExpiracao = date_create();
		$intervalo = new DateInterval('P1Y0M0D');
		$this->dataExpiracao->add($intervalo);
	  }

	  public function setDataExpiracao(DateTime $dataExpiracao){
		$this->dataExpiracao = $dataExpiracao;
	  }
}
?>