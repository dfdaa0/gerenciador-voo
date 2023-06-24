<?php
declare(strict_types=1);
include_once('global.php');

$endereco = new endereco("logradouro", 91, "complemento", "bairro", "cidade",
"estado", "12345-678", 12.5, 1.6);

echo $endereco->getLogradouro(), " ", $endereco->getNumero(), $endereco->getComplemento(),
" ", $endereco->getBairro(), " ", $endereco->getCidade(), " ", $endereco->getEstado(),
" ", $endereco->getCep(), " ", $endereco->getLatitude(), " ", $endereco->getLongitude();


?>