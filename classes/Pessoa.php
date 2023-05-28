<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pessoa extends persist{
    protected string $nome;
    protected string $rg;
    protected string $passaporte;
    protected string $cpf;
    protected string $nacionalidade;
    protected string $nascimento;
    protected string $email;
    protected Endereco $endereco;
    static private $filename = 'pessoa.txt';
  

    public function __construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email,$endereco) {
        $this->nome = $nome;
        $this->rg = $rg;
        $this->passaporte = $passaporte;
        $this->cpf = $cpf;
        $this->nacionalidade = $nacionalidade;
        $this->nascimento = $nascimento;
        $this->email = $email;
		$this->endereco = $endereco;
    }

    static public function getFilename(){
    		return get_called_class()::$filename;
  	}
  
    public function getNome() {
        return $this->nome;
    }

    public function getRg() {
        return $this->rg;
    }

    private function setRg(string $rg) {
        $pattern = "/^\d{2}\.\d{3}\.\d{3}-[a-zA-Z0-9]{1}$/";
        $rg = strtoupper($rg);
        if (preg_match($pattern, $rg) != 1){
            throw new Exception('RG inválido');
        }
        $this->rg = $rg;
    }

    public function getPassaporte() {
        return $this->passaporte;
    }

    private function setPassaporte(string $passaporte) {
        $pattern = "/^[A-Z]{2}\d{7}$/";
        $passaporte = strtoupper($passaporte);
        if (preg_match($pattern, $passaporte) != 1){
            throw new Exception('Passaporte inválido');
        }
        $this->passaporte = $passaporte;
    }

    public function getCpf() {
        return $this->cpf;
    }

    private function setCpf(string $cpf) {
        $pattern = "/^\d{3}\.\d{3}\.\d{3}-\d{2}$/";
        $cpf = strtoupper($cpf);
        if (preg_match($pattern, $cpf) != 1){
            throw new Exception('CPF inválido');
        }
        $this->cpf = $cpf;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    private function setNascimento(string $nascimento) {
      $pattern = "/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/";
      $nascimento = stringtoupper($nascimento);
        if (preg_match($pattern, $nascimento) != 1){
        throw new Exception('Data inválida');
        }
      $this->$nascimento = $nascimento;
    }
  
   public function getEmail() {
      return $this->email;
    }
  
    private function setEmail(string $email) {
      $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
      $email = stringtoupper($email);
        if (preg_match($pattern, $email) != 1){
        throw new Exception('Email inválido');
        }
      $this->$email = $email;
  }

  public function getLogradouro() {
      return $this->logradouro;
    }

  public function getNLogradouro() {
      return $this->nLogradouro;
    }  
  
  public function getBairro() {
      return $this->bairro;
    }
  
  public function getCep() {
      return $this->cep;
    }

  private function setCep(string $cep) {
      $pattern = "/^\d{5}-\d{3}$/";
      $email = stringtoupper($cep);
        if (preg_match($pattern, $cep) != 1){
        throw new Exception('CEP inválido');
        }
      $this->$cep = $cep;
  }
  
  public function getCidade() {
      return $this->cidade;
    }

  public function getEstado() {
      return $this->estado;
    }
}