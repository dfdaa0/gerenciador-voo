<?php
declare(strict_types=1);
include_once('Persiste.php');
class Categoria extends persist{
	  private string $nome;
	  private int $pontuacaoMinima;
	  static private $filename = 'Categoria.txt';
	  public function __construct(string $nome, int $pontuacaoMinima){
		    $this->nome = $nome;
		    $this->pontuacaoMinima = $pontuacaoMinima;
	  }
	  static public function getFilename(){
	    	return get_called_class()::$filename;
	  }
	  public function getNome(){
	    	return $this->nome;
	  }
	  public function getPontuacaoMinima(){
	    	return $this->pontuacaoMinima;
	  }
}
?>