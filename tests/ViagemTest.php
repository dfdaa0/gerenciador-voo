<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Aeronave.php');
include_once('classes/CiaAerea.php');
include_once('classes/Aeroporto.php');
include_once('classes/Linha.php');
include_once('classes/Viagem.php');

final class ViagemTest extends TestCase{
    private Viagem $viagem;
    private Linha $linha1;
    private Aeronave $aeronave1;
    private Aeroporto $aeroporto1;
    private Aeroporto $aeroporto2;
    private CiaAerea $ciaAerea;
    private DateTime $horarioPartida;

    public function initializeClass(){
        $this->ciaAerea = new CiaAerea(
            "001",
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $this->aeronave1 = new Aeronave('Embraer', '175', 180, $this->ciaAerea, 600, 'PP-RUZ');
       
        $this->aeroporto1 = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');

        $this->aeroporto2 = new Aeroporto('BBB', 'Rio de Janeiro', 'Rio de Janeiro');

        $this->horarioPartida = new DateTime("08:55");

        $this->linha1 = new Linha($this->aeroporto1, $this->aeroporto2,
         $this->horarioPartida, 72, "LA2023" ,$this->aeronave1, $this->ciaAerea);

        $this->viagem = new Viagem ($this->linha1, $this->aeronave1, $this->linha1->getHorarioPartida());
       
    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->aeronave1, $this->viagem->getAeronave());
        $this->assertSame($this->linha1, $this->viagem->getLinha());
    }

    public function testHoraPartidaChegada(){
        $this->initializeClass();
        $partida = new DateTime("08:58");
        //$this->viagem->getHoraPartida();
        $this->viagem->setHoraPartida($partida);
        $chegada = new DateTime("10:55");
        //$this->viagem->getHoraChegada();
        $this->viagem->setHoraChegada($chegada);
        $this->assertSame($partida, $this->viagem->getHoraPartida());
        $this->assertSame($chegada, $this->viagem->getHoraChegada());
    }

    public function testDayMonthYear(){
        $this->initializeClass();
        $horarioLinha = new DateTime("08:55");
        //$this->assertSame($this->viagem->getDay(), "29");
        $this->assertSame($this->viagem->getDay(), $horarioLinha->format("d"));
        $this->assertSame($this->viagem->getMonth(), $horarioLinha->format("m"));
        $this->assertSame($this->viagem->getYear(), $horarioLinha->format("Y"));
    }

    public function testPrecoPontos(){
        $this->initializeClass();
        $this->assertSame(50, $this->viagem->getPontosViagem());
        $this->assertSame(400.0, $this->viagem->getPrecoMin());
        $this->viagem->setPrecoMin(100.0);
        $this->assertSame(100.0, $this->viagem->getPrecoMin());
    }

    public function testVagas(){
        $this->initializeClass();
        $this->assertSame($this->viagem->getDisponibilidadeVaga(0), "Vaga disponível");
        $this->viagem->compraVaga(0);
        $this->assertSame($this->viagem->getDisponibilidadeVaga(0), "Vaga indisponível");
        //$this->viagem->compraVaga(0);
        //$this->viagem->compraVaga(-1);
        //$this->viagem->getDisponibilidadeVaga(-1);
        //$this->viagem->compraVaga(15369);
        //$this->viagem->getDisponibilidadeVaga(57829);
    }



}