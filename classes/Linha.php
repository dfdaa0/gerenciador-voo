<?php
declare(strict_types=1);
include_once('Persiste.php');
class Linha extends persist{

    private string $origem;
    private string $destino;
    private DateTime $horarioPartida;
    private array $frequencia;
    private int $duracaoEstimada;
    private string $codLinha;
    private Aeronave $aeronave;
    private ciaAerea $proprietaria;
    static private $filename = 'linha.txt';

    public function __construct( $origem,  $destino, $horarioPartida,  $duracaoEstimada,  $codLinha, $aeronave, $ciaAerea) {
          $this->origem = $origem;
          $this->destino = $destino;
          $this->horarioPartida = $horarioPartida;
          $this->duracaoEstimada = $duracaoEstimada;
          if(this->setCodLinha($codLinha)){
                  $this->codLinha = $codLinha;
          }
          $this->aeronave = $aeronave;
          $this->proprietaria = $proprietaria;
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
  
   
    public function getAeronave() {
        return $this->aeronave;
    }

    public function setAeronave($aeronave) {
        $this->aeronave = $aeronave;
    }

    

    public function getCiaAerea() {
        return $this->ciaAerea;
    }

//checa se o código está no formato certo
    private function setCodLinha($codLinha){
      if (strlen($codLinha) != 6) {  
        return false;
      }
      $prefixo = substr($codLinha, 0, 2);
      $sufixo = substr($codLinha, 2, 4);
      //checa se os dígitos iniciais são letras
      if (!ctype_alpha($prefixo)) {
        return false;
    }     
      //checa se os dígitos finais são números
      if (!ctype_digit($sufixo)) {
        return false;
    }     
  return true;
}

?>