<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Aeronave.php');
include_once('classes/CiaAerea.php');
include_once('classes/Aeroporto.php');
include_once('classes/Linha.php');

final class LinhaTest extends TestCase{
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
       
    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->aeroporto1, $this->linha1->getOrigem());
        $this->assertSame($this->aeroporto2, $this->linha1->getDestino());
        $this->assertSame($this->horarioPartida, $this->linha1->getHorarioPartida());
        $this->assertSame(72, $this->linha1->getDuracaoEstimada());
        $this->assertSame("LA2023", $this->linha1->getCodLinha());
        $this->assertSame($this->aeronave1, $this->linha1->getAeronave());
        $this->assertSame($this->ciaAerea, $this->linha1->getCiaAerea());
    }

}