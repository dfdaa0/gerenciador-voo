<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Aeronave.php');
include_once('classes/CiaAerea.php');

final class AeronaveTest extends TestCase{
    private Aeronave $aeronave1;
    private Aeronave $aeronave2;

    public function initializeClass(){
        $ciaAerea = new CiaAerea(
            001,
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );
        $this->aeronave1 = new Aeronave('Embraer', '175', 180, $ciaAerea, 600, 'PP-RUZ');
        // $this->aeronave2 = new Aeronave('Embraer', '175', 180, $ciaAerea, 600, 'PX-RUZ');
    }

    public function testClassConstructor(){
        // string $fabricante, string $modelo, int $capacidadePass, CiaAerea $proprietaria, float $capacidadeCarga, string $registro
        $this->initializeClass();
        $this->assertSame("Embraer", $this->aeronave1->getFabricante());
        $this->assertSame("175", $this->aeronave1->getModelo());
        $this->assertSame(180, $this->aeronave1->getCapacidadePassageiros());
        $this->assertSame(600.0, $this->aeronave1->getCapacidadeCarga());
        $this->assertSame("PP-RUZ", $this->aeronave1->getRegistro());
    }

}