<?php
declare(strict_types=1);
include_once('Persiste.php');
class Tripulacao extends persist{
  private Tripulante $piloto;
  private Tripulante $copiloto;
  private array $comissarios;
  static private $filename = 'tripulacao.txt';

  public function __construct(Tripulante $piloto, Tripulante $copiloto, array $comissarios)
  {
    $this->piloto = $piloto;
    $this->copiloto = $copiloto;
    $this->comissarios = $comissarios;
  }

  static public function getFilename(){
    return get_called_class()::$filename;
  }

  public function getPiloto(){
    return $this->piloto;
  }

  public function getCopiloto(){
    return $this->copiloto;
  }

  public function getComissarios(){
    return $this->comissarios;
  }

  public function setPiloto(Tripulante $piloto){
    $this->piloto = $piloto;
  }

  public function setCopiloto(Tripulante $copiloto){
    $this->copiloto = $copiloto;
  }

  public function setComissarios(array $comissarios){
    $this->comissarios = $comissarios;
  }
}
?>