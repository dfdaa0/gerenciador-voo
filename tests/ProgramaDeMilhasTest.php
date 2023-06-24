<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/ProgramaDeMilhas.php');
include_once('classes/CiaAerea.php');
include_once('classes/Categoria.php');

final class ProgramaDeMilhasTest extends TestCase{
    
    public function testClassConstructor(){
        
        $proprietaria = new CiaAerea(
            001,
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $categoria = new Categoria("nomeCategoria", 90);
        $programaDeMilhas = new ProgramaDeMilhas("abcdefgh", $categoria, $proprietaria);

        $this->assertSame($proprietaria, $programaDeMilhas->getProprietaria());
        $this->assertSame($categoria, $programaDeMilhas->getCategoria());
        $this->assertSame("abcdefgh", $programaDeMilhas->getNome());
    }
}