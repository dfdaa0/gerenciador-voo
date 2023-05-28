<?php
  include_once('global.php');

  $ciaAerea = new CiaAerea(
    "MeuNome",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "MinhaSigla",
    25.5
  );

  echo $ciaAerea->getNome(), " ", $ciaAerea->getRazaoSocial(), " ", $ciaAerea->getCnpj(), "\n";

  echo $ciaAerea->getSigla(), " ", $ciaAerea->getPrecoBagagem();

  $ciaAerea->setPrecoBagagem(-10);

  echo $ciaAerea->getPrecoBagagem();
