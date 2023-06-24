<?php
declare(strict_types=1);
include_once('Persiste.php');
class Linha extends persist{

    private Aeroporto $origem;
    private Aeroporto $destino;
    private DateTime $horarioPartida;
    private ?string $frequencia = null;
    private int $duracaoEstimada;
    private string $codLinha;
    private Aeronave $aeronave;
    private ciaAerea $proprietaria;
    static private $filename = 'linha.txt';

    public function __construct(Aeroporto $origem, Aeroporto $destino, DateTime $horarioPartida, int $duracaoEstimada, string $codLinha, Aeronave $aeronave, CiaAerea $proprietaria, string $frequencia = null) {
          $this->proprietaria = $proprietaria;    
          $this->origem = $origem;
          $this->frequencia = $frequencia;
          $this->destino = $destino;
          $this->horarioPartida = $horarioPartida;
          $this->duracaoEstimada = $duracaoEstimada;
          if($this->setCodLinha($codLinha)){
                  $this->codLinha = $codLinha;
          }
          $this->aeronave = $aeronave;
      }
  
    static public function getFilename(){
    return get_called_class()::$filename;
  }
  
    public function getOrigem() {
        return $this->origem;
    }

    public function getDestino() {
        return $this->destino;
    }
  
    public function getHorarioPartida() {
        return $this->horarioPartida;
    }

    public function getDuracaoEstimada() {
        return $this->duracaoEstimada;
    }

    public function getCodLinha(){
      return $this->codLinha;
    }

    public function geraViagens() {
        /* a implementar*/
    }    
  
    public function getFrequencia() {
        return $this->frequencia;
    }
    public function getAeronave() {
        return $this->aeronave;
    }

    public function setAeronave(Aeronave $aeronave) {
        $this->aeronave = $aeronave;
    }

    
    public function setFrequencia(string $freq) {
        $this->frequencia = $freq;
    }

      
    public function setHorarioPartida(DateTime $hora) {
        $this->horarioPartida->setDate(
        (int)$hora->format('Y'),
        (int)$hora->format('m'),
        (int)$hora->format('d')
    );
    }
    


    public function getCiaAerea() {
        return $this->proprietaria;
    }

//checa se o código está no formato certo
    private function setCodLinha(string $codLinha){
      if (strlen($codLinha) != 6) {  
        return false;
      }
      $prefixo = substr($codLinha, 0, 2);
      $sufixo = substr($codLinha, 2, 4);
      //checa se os dígitos iniciais são letras e os finais são números
      if (!ctype_alpha($prefixo) || !ctype_digit($sufixo)) {
        throw new exception("Formato de código de linha errado");
    }     
      //checa se os dígitos iniciais são iguais à sigla
      if ($prefixo != $this->proprietaria->getSigla()) {
        throw new exception("Código de linha com prefixo diferente do esperado");
    }     
  return true;
}
}
?>
