<?php
declare(strict_types=1);
include_once('Persiste.php');
class Usuario extends persist{
    private string $login;
    private string $email;
    private string $senha;
    static private $filename = 'veiculo.txt';

    public function __construct(string $login, string $email, string $senha){
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getEmail(){
        return $this->email;
    }
}