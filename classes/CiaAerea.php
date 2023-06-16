<?php
declare(strict_types=1);
include_once('Persiste.php');
class CiaAerea extends persist{
    private string $nome;
    private int $codigo;
    private string $razaoSocial;
    private string $cnpj;
    private string $sigla;
    private float $precoBagagem;
    private array $veiculos = [];
    static private $filename = 'cia.txt';
    
    public function __construct(int $codigo, string $nome, string $razaoSocial, string $cnpj, string $sigla, float $precoBagagem) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->razaoSocial = $razaoSocial;
        $this->setCnpj($cnpj);
        $this->setSigla($sigla);
      
        $this->setPrecoBagagem($precoBagagem);
    }

    static public function getFilename(){
      return get_called_class()::$filename;
    }
    
    public function getCodigo() {
      return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }
    
    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    private function setCnpj(string $cnpj){
      $pattern = "/^(\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2})$/";
      if (!preg_match($pattern, $cnpj)){
        throw new Exception('CNPJ inválido. Formato 00.000.000/0000-00');
      }
      $this->cnpj = $cnpj;
    }

    public function getSigla() {
        return $this->sigla;
    }
  
    private function setSigla(string $sigla) {
      $pattern = "/^[A-Z]{2}$/";
      if (!preg_match($pattern, $sigla)){
        throw new Exception('Sigla inválida');
      }
      $this->sigla = $sigla;
    }

    public function getPrecoBagagem() {
      return $this->precoBagagem;
    }

    public function setPrecoBagagem(float $precoBagagem) {
      if($precoBagagem <= 0){
        throw new Exception("Preço da bagagem deve ser maior que 0.");
      }
      $this->precoBagagem = $precoBagagem;
    }

    public function addVeiculo(Veiculo $veiculo){
      array_push($this->veiculos, $veiculo);
    }

}

?>