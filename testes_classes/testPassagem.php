<?php
  declare(strict_types=1);
  include_once('global.php');
  $origem = new Aeroporto(
    "AZL",
    "BH",
    "MG"
  );

  $destino = new Aeroporto(
    "PPP",
    "SP",
    "SP"
  );

$endereco = new Endereco("logradouro", 91, "complemento", "bairro", "cidade", "estado", "22222-909", 2.5, 25.4);

$passageiro = new Passageiro("Francesco", "00.000.000-0", "CS265436", "000.000.000-00",
"Brasileiro", "12/12/2012", "aaaaa@gmail.com", $endereco);

$ciaAerea = new CiaAerea(
    "MeuNome",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "AB",
    25.5
  );

//criando um objeto Aeronave

$aeronave = new Aeronave ("FabricanteABC",
                          "modelo",
                          10,
                          $ciaAerea,
                          25.5,
                          "PT-AAB");
                                                  
//criando um objeto DateTime
$horarioPartida = new DateTime("08:55");

$linha = new Linha ($origem, $destino, $horarioPartida, 72, "AB2023" ,$aeronave, $ciaAerea);

$linha2 = new Linha ($destino, $origem, $horarioPartida, 72, "AB2022" ,$aeronave, $ciaAerea);

$viagem = new Viagem($linha, $linha->getAeronave());

$viagem2 = new Viagem($linha2, $linha2->getAeronave());

$franquias = [21.2, 19.4, 23.0];

$viagens[]= $viagem;

$viagens[]= $viagem2;

$passagem = new Passagem($passageiro, $viagens, "codBarras", $franquias);

echo $passagem->getPassageiro()->getNome(), " ", $passagem->getOrigem()->getSigla(), " ";

echo $passagem->getDestino()->getSigla(), " ", $passagem->getCodBarras(), " ";

echo $passagem->getViagens()[0]->setHoraPartida($horarioPartida);

echo $passagem->getViagens()[0]->getHoraPartida()->format("H:i"), " ";

echo count($passagem->getFranquias()), " ";

$passagem->fazEmbarque($viagem2);

var_dump($passagem->getStatus()[$viagem->getLinha()->getCodLinha()]);

echo " ";

var_dump($passagem->getStatus()[$viagem2->getLinha()->getCodLinha()]);













?>