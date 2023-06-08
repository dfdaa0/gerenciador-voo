<?php
include_once("Persiste.php");
class Endereco extends persist{
    protected string $logradouro;
    protected string $numero;
    protected string $complemento;
    protected string $bairro;
    protected string $cidade;
    protected string $estado;
    protected string $cep;
    static private $filename = 'Endereco.txt';

    public function __construct(string $logradouro, string $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep) {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getCep(){
        return $this->cep;
    }

}

?>
