<?php
  include_once('global.php');

  $categoria = new categoria("nomeCategoria", 500);

  $ciaAerea = new CiaAerea(
    "MeuNome",
    "MinhaRazaoSocial",
    "MeuCNPJ",
    "MinhaSigla",
    25.5,
     12
  );

  $programaDeMilhas = new ProgramaDeMilhas("nomePrograma", $categoria, $ciaAerea);

  echo $programaDeMilhas->getCategoria()->getPontuacaoMinima();