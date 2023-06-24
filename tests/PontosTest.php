<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Pontos.php');

final class PontosTest extends TestCase{
    
    public function testClassConstructor(){
        $pontos = new Pontos(250);
        $this->assertSame($pontos->getValor(), 250);
    
        $this->assertSame($pontos->getDataExpiracao()->format('m/Y'), "06/2024");
        
        $dataExpiracao = DateTime::createFromFormat('d/m/Y', '24/04/2020');
        
        $pontos->setDataExpiracao($dataExpiracao);
        $this->assertSame($pontos->getDataExpiracao()->format('d/m/Y'), "24/04/2020");
    }
    
}