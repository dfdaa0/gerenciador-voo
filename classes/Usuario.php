<?php
declare(strict_types=1);
include_once('Persiste.php');
class Usuario extends persist{
    private string $login;
    private string $email;
    private string $senha;
    static private $filename = 'usuario.txt';

    public function __construct(string $login, string $email, string $senha){
        $this->login = $login;
        $this->setEmail($email);
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

    private function setEmail(string $email) {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $email = strtoupper($email);
        if (preg_match($pattern, $email) != 1){
          throw new Exception('Email inválido');
        }
        $this->email = $email;
    }

    
}
