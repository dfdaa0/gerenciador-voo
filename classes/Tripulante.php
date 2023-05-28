<?php

class Tripulante extends Pessoa {
    public function __construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco) {
        parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco);
    }
}

?>