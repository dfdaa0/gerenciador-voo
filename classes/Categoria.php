<?php
declare(strict_types=1);
include_once('Persiste.php');
class Categoria extends persist{
	  private string $nome;
	  private int $pontuacaoMinima;
	  static private $filename = 'Categoria.txt';
	  public function __construct(string $nome, int $pontuacaoMinima){
		    $this->cliente = $nome;
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
  	  public function setNome(string nome){
	    	$this->nome = nome;
        $this->nome
	  }
	  public function setPontuacaoMinima(int pontuacaoMinima){
	    	$this->pontuacaoMinima = pontuacaoMinima;
      return $this->pontuacaoMinima
	  }
}?
?>