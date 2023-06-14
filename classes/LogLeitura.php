<?php
declare(strict_types=1);
include_once('Persiste.php');
class LogLeitura extends Log{
    private string $entidadeAcessada;
    private string $informacaoAcessada;
    static private $filename = 'logLeitura.txt';

    public function __construct($entidadeAcessada, $informacaoAcessada){
        $this->entidadeAcessada = $entidadeAcessada;
        $this->informacaoAcessada = $informacaoAcessada;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }
    
    public function getEntidadeAcessada(){
        return $this->entidadeAcessada;
    }

    public function getInformacaoAcessada(){
        return $this->informacaoAcessada;
    }
        
    }
