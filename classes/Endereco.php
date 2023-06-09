<?php
include_once("Persiste.php");
class Endereco extends persist{
    protected string $logradouro;
    protected int $numero;
    protected string $complemento;
    protected string $bairro;
    protected string $cidade;
    protected string $estado;
    protected string $cep;
    protected float $longitude;
    protected float $latitude;
    static private $filename = 'Endereco.txt';

    public function __construct(string $logradouro, int $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep, float $longitude, float $latitude) {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->setCep($cep);
        $this->longitude = $longitude;
        $this->latitude = $latitude;
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

    private function setCep(string $cep){
        if(strlen($cep)!=9){
            throw new Exception('Cep inválido');
        }
        for ($i=0; $i < 5; $i++) { 
            if(!is_numeric($cep[$i])){
                throw new Exception('Cep inválido');
            }
        }
        if($cep[5]!="-"){
            throw new Exception('Cep inválido');
        }
        for ($i=6; $i < 9; $i++) { 
            if(!is_numeric($cep[$i])){
                throw new Exception('Cep inválido');
            }
        }
        $this->cep = $cep;
    }

    public function getLongitude(){
        return $this->longitude;
    }

    public function getLatitude(){
        return $this->latitude;
    }

}

?>
