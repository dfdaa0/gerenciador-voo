<?php
  include_once('global.php');

  $aeroporto = new Aeroporto(
    "AZL",
    "BH",
    "MG"
  );

echo $aeroporto->getSigla();

$aeroporto->setSigla("AAA");

echo $aeroporto->getSigla();

echo $aeroporto->getCidade();

echo $aeroporto->getEstado();


  // var_dump($ciaAerea);