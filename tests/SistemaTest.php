<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Sistema.php');
include_once('classes/container.php');

final class SistemaTest extends TestCase{
    private Sistema $sistema;


    public function initializeClass(){
        $this->sistema = new Sistema;
    }

    public function testAcessoSemLogin(){
        $this->initializeClass();
        $this->sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA', '12.085.581/0001-90', 19.2);
    echo "\n";
    }

    public function testCadastroCiaAerea(){
        $this->initializeClass();
        $this->sistema->login('admin','secretPass');
        $latam = $this->sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA', '12.085.581/0001-90', 19.2);
        $azul = $this->sistema->cadastraCompanhia('Azul','002', 'Azul Linhas Aéreas Brasileiras S.A.','AD', '12.085.581/0001-90', 19.2);
        $testeLatam = new CiaAerea ('001', 'Latam', 'Latam Airlines do Brasil S.A.', '12.085.581/0001-90','LA', 19.2);
        $testeAzul =  new CiaAerea('002','Azul', 'Azul Linhas Aéreas Brasileiras S.A.', '12.085.581/0001-90','AD', 19.2);

        $this->assertSame($testeLatam, $latam);

    }


}