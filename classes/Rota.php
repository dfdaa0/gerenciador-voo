<?php
declare(strict_types=1);
include_once('Persiste.php');

class Rota extends Persist{
    private DateTime $embarque;
    private Array $enderecos;
    private float $distancia;
    static private $filename = 'Rota.txt';
    
    public function __construct(DateTime $embarque, Array $enderecos){
        $this->embarque = $embarque;
        $this->setListaEnderecos($enderecos);
        $this->calculaDistancia($enderecos);
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function setListaEnderecos(Array $enderecos){
        $this->enderecos = $enderecos;
    }

    public function getListaEnderecos(){
        return $this->enderecos;
    }

    private function calculaDistancia(){
        //a implementar usando api do google maps
    }
}


?>