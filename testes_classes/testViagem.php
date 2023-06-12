<?php
  include_once('global.php');

//criando um objeto CiaAerea

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

  $linha = new Linha ("BH", "RJ", $horarioPartida, 72, "AB2023" ,$aeronave, $ciaAerea);

$aeronaveDois = new Aeronave("FabricanteDEF", "modelo", 10, $ciaAerea, 25.5, "PT-AAB");

$linha->setAeronave($aeronaveDois);

$viagem = new Viagem($linha, $linha->getAeronave());

echo $viagem->getDay(), "/", $viagem->getMonth(), "/", $viagem->getYear(), "\n";

echo $viagem->getLinha()->getCodLinha(), " ", $viagem->getAeronave()->getRegistro(), "\n";

$partida = new DateTime("08:58");
$chegada = new DateTime("10:55");

$viagem->setHoraPartida($partida);

echo $viagem->getHoraPartida()->format("H:i"), " ";

$viagem->setHoraChegada($chegada);

echo $viagem->getHoraChegada()->format("H:i");

echo " ", $viagem->getPrecoMin(), " ", $viagem->getPontosViagem(), " ";

echo $viagem->getDisponibilidadeVaga(5), " ";

$viagem->compraVaga(5);

echo $viagem->getDisponibilidadeVaga(5), " ";











  
  