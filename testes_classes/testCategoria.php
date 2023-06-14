<?php
  include_once('global.php');

  $categoria = new categoria("nomeCategoria", 500);

  echo $categoria->getNome(), " ", $categoria->getPontuacaoMinima();