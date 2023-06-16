<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Aeroporto.php');

final class AeroportoTest extends TestCase{
    public function testClassConstructor(){
        $aeroporto = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');

        $this->assertSame('AAA', $aeroporto->getSigla());
        $this->assertSame('Belo Horizonte', $aeroporto->getCidade());
        $this->assertSame('Minas Gerais', $aeroporto->getEstado());

    }
}