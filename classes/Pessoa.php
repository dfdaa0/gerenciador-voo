<?php
declare(strict_types=1);
include_once('Persiste.php');
class Pessoa extends persist{
    protected string $nome;
    protected string $rg;
    protected string $passaporte;
    protected string $cpf;
    protected string $nacionalidade;
    protected DateTime $nascimento;
    protected string $email;
    protected Endereco $endereco;
    static private $filename = 'pessoa.txt';
  

    public function __construct(string $nome, string $rg, string $passaporte, string $cpf,
      string $nacionalidade, string $nascimento, string $email, Endereco $endereco) {
        $this->nome = $nome;
        $this->setRg($rg);
        $this->setPassaporte($passaporte);
        $this->setCpf($cpf);
        $this->nacionalidade = $nacionalidade;
        $this->setNascimento($nascimento);
        $this->setEmail($email);
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
        $pattern = "/^[A-Z]{2}\d{6}$/";
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
      $nascimento = strtoupper($nascimento);
      if (preg_match($pattern, $nascimento) != 1){
        throw new Exception('Data inválida');
      }
      $this->nascimento = DateTime::createFromFormat('d/m/Y', $nascimento);
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    private function setEmail(string $email) {
      $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
      $email = strtoupper($email);
      if (preg_match($pattern, $email) != 1){
        throw new Exception('Email inválido');
      }
      $this->email = $email;
  }

    public function getNascimento() {
    return $this->nascimento;
  }

  public function getEndereco(){
    return $this->endereco;
  }

}