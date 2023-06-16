<?php
declare(strict_types=1);
include_once('Persiste.php');

class CartaoEmbarque extends persist{
    private string $nome;
    private string $sobrenome;
    private Aeroporto $origem;
    private Aeroporto $destino;
    private DateTime $horarioViagem;
    private int $assento;
    static private $filename = 'cartao_embarque.txt';

    public function __construct(string $nome, string $sobrenome, Aeroporto $origem, Aeroporto $destino, DateTime $horarioViagem, int $assento){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->origem = $origem;
        $this->destino = $destino;
        $this->horarioViagem = $horarioViagem;
        $this->assento = $assento;
    }

    static public function getFilename(){
        return get_called_class()::$filename;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function getHorarioViagem(){
        return $this->horarioViagem;
    }

    public function getAssento(){
        return $this->assento;
    }
}