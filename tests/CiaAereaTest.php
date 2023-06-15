<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/CiaAerea.php');

final class CiaAereaTest extends TestCase{

    public function testClassConstructor(){
        $ciaAerea = new CiaAerea(
            001,
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $this->assertSame(001, $ciaAerea->getCodigo());
        $this->assertSame("Latam", $ciaAerea->getNome());
        $this->assertSame("Latam Airlines do Brasil S.A", $ciaAerea->getRazaoSocial());
        $this->assertSame("00.000.000/0000-00", $ciaAerea->getCnpj());
        $this->assertSame("LA", $ciaAerea->getSigla());
        $this->assertSame(25.5, $ciaAerea->getPrecoBagagem());
    }
}