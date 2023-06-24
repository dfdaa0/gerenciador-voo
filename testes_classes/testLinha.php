<?php
  include_once('global.php');

//criando um objeto CiaAerea

$ciaAerea = new CiaAerea(
    "MeuNome",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "MinhaSigla",
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
  //echo $horarioPartida->format("H:i");

  $linha = new Linha ("BH", "RJ", $horarioPartida, 72, "AB2023" ,$aeronave, $ciaAerea);

  echo $linha->getOrigem(), " ", $linha->getDestino(), " ", $linha->getHorarioPartida()->format("H:i"), "\n";
  
  echo $linha->getAeronave()->getFabricante(), " ", $linha->getCiaAerea()->getNome();

  echo $linha->getDuracaoEstimada(), " ", $linha->getCodLinha(), "\n"; 

$aeronaveDois = new Aeronave("FabricanteDEF", "modelo", 10, $ciaAerea, 25.5, "PT-AAB");

$linha->setAeronave($aeronaveDois);

echo $linha->getAeronave()->getFabricante();



  
  