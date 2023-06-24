<?php
declare(strict_types=1);
include_once('global.php');

$endereco = new endereco("logradouro", 91, "complemento", "bairro", "cidade",
"estado", "12345-678", 12.5, 1.6);

$pessoa = new Pessoa("Francesco", "00.000.000-0", "CS265436", "000.000.000-00",
"Brasileiro", "12/02/2000", "aaaaa@gmail.com", $endereco);

echo $pessoa->getNome(), " ", $pessoa->getRg(), " ", $pessoa->getPassaporte(), " ",
$pessoa->getCpf(), " ", $pessoa->getNacionalidade(), " ", $pessoa->getNascimento()->format('d/m/Y'), " ",
$pessoa->getEmail()," ", $pessoa->getEndereco()->getNumero();

?>