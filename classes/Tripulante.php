<?php
declare(strict_types=1);
include_once('Persiste.php');

class Tripulante extends Pessoa {
    protected string $cht;
    protected CiaAerea $ciaAerea;
    protected Aeroporto $aeroporto;
    static private $filename = 'tripulante.txt';
    
    public function __construct(string $nome, string $rg, string $passaporte, string $cpf,
        string $nacionalidade, string $nascimento, string $email, Endereco $endereco,
        string $cht, Aeroporto $aeroporto, CiaAerea $ciaAerea) {
        
        parent::__construct($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco);
        $this->cht = $cht;
        $this->ciaAerea = $ciaAerea;
        $this->aeroporto = $aeroporto;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function getCht(){
        return $this->cht;
    }

    public function getCiaAerea(){
        return $this->ciaAerea;
    }

    public function getAeroporto(){
        return $this->aeroporto;
    }
}

?>