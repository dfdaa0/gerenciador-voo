<?php
declare(strict_types=1);
include_once('Persiste.php');

class Sistema extends persist{
    public function fazLogin(string $login, string $senha){
        
        if($this->login != $login || $this->senha != $senha){
            throw new exception ("Login ou senha errados");
        }

        return true;
    }
}