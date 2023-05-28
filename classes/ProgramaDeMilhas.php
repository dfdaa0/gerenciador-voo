<?php
declare(strict_types=1);
include_once('Persiste.php');

class ProgramaDeMilhas extends persist{
	  private string $nome;
	  private Categoria $categoria;
	  static private $filename = 'ProgramaDeMilhas.txt';
	  public function __construct($nome, $categoria){
		    $this->nome = $nome;
		    $this->categoria = $categoria;
	  }
	  static public function getFilename(){
	    	return get_called_class()::$filename;
	  }
	  public function getNome(){
	    	return $this->nome;
	  }
	  public function getCategoria(){
	    	return $this->categoria;
	  }
  	  public function setNome(string nome){
	    	$this->nome = nome;
        $this->nome
	  }
	  public function setCategoria(Categoria categoria){
	    	$this->categoria = categoria;
      return $this->categoria
	  }
}?
?>