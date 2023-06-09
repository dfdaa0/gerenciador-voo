<?php
declare(strict_types=1);
include_once('Persiste.php');
class Aeroporto extends persist{
  private string $sigla;
  private string $cidade;
  private string $estado;
  static private $filename = 'aeroporto.txt';
  
  public function __construct(string $sigla, string $cidade, string $estado) {
    $this->setSigla($sigla);
    $this->cidade = $cidade;
    $this->estado = $estado;
  }
  static public function getFilename(){
    return get_called_class()::$filename;
  }

  public function getSigla() {
    return $this->sigla;
  }

  private function setSigla($sigla) {
    $pattern = "/^[A-Z]{3}$/";
    if (!preg_match($pattern, $sigla)){
      throw new Exception('Sigla inválida. Formato esperado: AAA');
    }
    $this->sigla = $sigla;
  }

  public function getCidade() {
    return $this->cidade;
  }

  public function getEstado() {
    return $this->estado;
  }

}
?>