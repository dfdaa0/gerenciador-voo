<?php
declare(strict_types=1);
include_once('Persiste.php');
class Log extends persist{
    protected Usuario $usuario;
    protected DateTime $dataHora;
    
    static private $filename = 'log.txt';

    public function __construct(Usuario $usuario, DateTime $dataHora)
    {
        $this->usuario = $usuario;
        $this->dataHora = $dataHora;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

}