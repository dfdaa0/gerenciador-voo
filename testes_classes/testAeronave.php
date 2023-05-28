<?php
  include_once('global.php');

$ciaAerea = new CiaAerea(
    "MeuNome",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "MinhaSigla",
    25.5
  );

$ciaAerea2 = new CiaAerea(
    "aaaa",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "MinhaSigla",
    25.5
  );

$aeronave = new Aeronave ("fabricante",
                          "modelo",
                          10,
                          25.2,
                          "PT-AAB",
                          $ciaAerea);

echo $aeronave->getProprietaria()->getNome();

$aeronave -> setProprietaria($ciaAerea2);

echo $aeronave->getProprietaria()->getNome(), "\n";

echo $aeronave->getFabricante(), " ", $aeronave->getModelo(), " ", $aeronave->getCapacidadePassageiros(), " ", $aeronave->getCapacidadeCarga(), " ", $aeronave->getRegistro();





