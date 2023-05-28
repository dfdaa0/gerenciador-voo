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

    public function __construct(string $logradouro, string $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep) {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function getLogradouro(): string {
        return $this->logradouro;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function getComplemento(): string {
        return $this->complemento;
    }

    public function getBairro(): string {
        return $this->bairro;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getCep(): string {
        return $this->cep;
    }

}

?>
