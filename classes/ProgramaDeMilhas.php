<?php
declare(strict_types=1);
include_once('Persiste.php');

class ProgramaDeMilhas extends persist{
	  private string $nome;
	  private Categoria $categoria;
	  private CiaAerea $proprietaria;
	  static private $filename = 'ProgramaDeMilhas.txt';
	  public function __construct($nome, $categoria, $proprietaria){
		    $this->nome = $nome;
		    $this->categoria = $categoria;
			$this->proprietaria = $proprietaria;
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
  	  
	  public function getProprietaria(){
			return $this->proprietaria;
	  }
}
?>