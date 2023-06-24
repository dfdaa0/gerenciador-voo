<?php
declare(strict_types=1);
include_once('Persiste.php');

class Sistema extends persist{
  private $usuarios = array();
  private $autenticado = false;
  static private $filename = 'sistema.txt';

  public function __construct(){
    $login = "admin";
    $senha = "secretPass";
    $email = "admin@gmail.com";
    $admin = new Usuario($login,$email,$senha);
    $this->usuarios[] = $admin;
  }

  static public function getFilename(){
    return get_called_class()::$filename;
  }

  public function login(string $login, string $senha){
    try{
      $usuarioEncontrado = $this->buscarUsuario($login, $senha);
      $this->autenticado = true;
      echo "Usuário encontrado: " . $usuarioEncontrado->getLogin()."\n";
    }
    catch (Exception $e) {
      echo "Erro: " . $e->getMessage();
    }
  }

  private function buscarUsuario($login, $senha) {
    foreach ($this->usuarios as $usuario) {
        if ($usuario->getLogin() === $login && $usuario->getSenha() === $senha) {
            return $usuario;
        }
    }

    throw new Exception("Login ou senha incorretos.\n");
}
  private function verificaAutenticacao(){
    if(!$this->autenticado){
      throw new Exception("realize login no sistema antes de realizar qualquer operacao\n");
    }
    return true;
  }

  public function cadastraCompanhia(string $nome, string $codigo, string $razao, string $sigla, string $cnpj, float $precoBagagem){
    try{      
        if(!$this->verificaAutenticacao()){
          return;
        }
        $cia = new CiaAerea($codigo,$nome,$razao, $cnpj,$sigla, $precoBagagem);
        $cia->save();
      echo "Companhia " . $nome . " cadastrada com sucesso!\n";
      return $cia;
    }
    catch (Exception $e) {
         echo "Erro: " . $e->getMessage();
    }
  }
  public function cadastraAeronave($modelo, $fabicante, $passageiros, $carga, $ciaAerea,$sigla){
    try{      
          if(!$this->verificaAutenticacao()){
            return;
          }
          $aeronave = new Aeronave($fabicante,$modelo,$passageiros,$ciaAerea,$carga,$sigla);
          $aeronave->save();
          echo "Aeronave cadastrada com sucesso!\n";
          return $aeronave;
      }
      catch (Exception $e) {
         echo "Erro: " . $e->getMessage() . "\n";
    }
  }
  public function cadastraAeroporto(string $sigla, string $cidade, string $estado, string $nome){
    try{      
        if(!$this->verificaAutenticacao()){
          return;
        }
        $aeroporto = new Aeroporto($sigla,$cidade,$estado);
        $aeroporto->save();
        echo "Aeroporto " . $nome . " cadastrado com sucesso!\n";
        return $aeroporto;
    }
    catch (Exception $e) {
         echo "Erro: " . $e->getMessage();
    }
  }
  public function cadastraVoo(Aeroporto $origem, Aeroporto $destino, DateTime $horarioPartida, 
                       int $duracaoEstimada, string $codLinha, Aeronave $aeronave, 
                       CiaAerea $proprietaria, string $frequencia = null){
    try{      
        if(!$this->verificaAutenticacao()){
          return;
        }
        $voo = new Linha($origem, $destino, $horarioPartida, 
                         $duracaoEstimada, $codLinha, $aeronave, $proprietaria);
       
        if($frequencia === null){
        echo "Voo: " . $codLinha . " com saída do aeroporto "
          . $origem->getCidade() . " e destino a " . $destino->getCidade() . 
          " cadastrado com sucesso!\n";
        }else{
          $voo->setFrequencia('diario');
                  echo "Voo ".$frequencia . " " . $codLinha . " com saída do aeroporto " 
                    . $origem->getCidade() . " e destino a " . $destino->getCidade() 
                    . " cadastrado com sucesso!\n";
          
        }
        $voo->save();
        return $voo;
    }
    catch (Exception $e) {
         echo "Erro: " . $e->getMessage() . "\n";
    }
  }
  public function gerarViagens(){
      $voos = Linha::getRecords();
      $voosComFrequencia = $this->filtrarVoos($voos);
  
      foreach ($voosComFrequencia as $voo) {;
          switch ($voo->getFrequencia()) {
              case 'diario':
                  $this->agendarViagem($voo, '1');
                  break;
              case 'semanal':
                  $this->agendarViagem($voo, '7');
                  break;
              default:
                  $this->agendarViagem($voo);
                  break;
          }
      }
  }

  public function filtrarVoos($voos): array {
      $hoje = new DateTime();
      $trintaDiasDepois = (new DateTime())->modify('+30 days');
  
      $voosFiltrados = array();
  
      foreach ($voos as $voo) {
          if ($voo->getFrequencia() !== null || ($voo->getHorarioPartida() > $hoje 
                                                 && $voo->getHorarioPartida() < $trintaDiasDepois)) {
              $voosFiltrados[] = $voo;
          }
      }
  
      return $voosFiltrados;
  }
  public function agendarViagem($voo,$freq = null) {
    $viagens = array();
    $trintaDiasDepois = (new DateTime())->modify('+30 days');
    $hoje = new DateTime();
    if($voo->getHorarioPartida() < $hoje){
      while ($voo->getHorarioPartida() < $hoje){
        $voo->setHorarioPartida($voo->getHorarioPartida()->modify('+' . $freq . ' day'));
      }
    }
    
    if($freq !== null){
          while ($voo->getHorarioPartida() < $trintaDiasDepois) {
            $viagem = new Viagem($voo,$voo->getAeronave(),$voo->getHorarioPartida());
            $viagem->save();
            $viagens[] = $viagem;
    
          echo "Viajem com saida de " . $voo->getOrigem()->getCidade() . " e destino a " 
            . $voo->getDestino()->getCidade() 
            . " cadastrada para o dia [" . $voo->getHorarioPartida()->format('Y-m-d')
            . "] com sucesso!\n";

            $voo->setHorarioPartida($voo->getHorarioPartida()->modify('+' . $freq . ' day'));

      }

    } else{
      $viagem = new Viagem($voo,$voo->getAeronave(), $voo->getHorarioPartida());
      $viagem->save();
      echo "Viajem com saida de " . $voo->getOrigem()->getCidade() . " e destino a " .
        $voo->getDestino()->getCidade() . " cadastrada para o dia [" 
        . $voo->getHorarioPartida()->format('Y-m-d') .
        "] com sucesso!\n";
    }

  }

}

