<?php
declare(strict_types=1);
include_once('Persiste.php');
class LogEscrita extends Log{
    private string $entidadeAlterada;
    private string $objAntesAlteracao;
    private string $objDepoisAlteracao;

    static private $filename = 'logEscrita.txt';

    public function __construct(string $entidadeAlterada, string $objAntesAlteracao,
    string $objDepoisAlteracao)
    {
        $this->entidadeAlterada = $entidadeAlterada;
        $this->objAntesAlteracao = $objAntesAlteracao;
        $this->objDepoisAlteracao = $objDepoisAlteracao;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function getEntidadeAlterada(){
        return $this->entidadeAlterada;
    }

    public function getObjAntesAlteracao(){
        return $this->objAntesAlteracao;
    }
    
    public function getObjDepoisAlteracao(){
        return $this->objDepoisAlteracao;
    }

}