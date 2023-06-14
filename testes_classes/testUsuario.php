<?php
declare(strict_types=1);
include_once('global.php');

$usuario = new Usuario("meuLogin", "meuEmail", "minhaSenha");

echo $usuario->getEmail(), $usuario->getLogin(), $usuario->getSenha();