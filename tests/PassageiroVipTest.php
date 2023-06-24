<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/PassageiroVip.php');

final class PassageiroVipTest extends TestCase{
    Private PassageiroVip $passageiroVip;
    Private Array $pontos;
    Private ProgramaDeMilhas $programaDeMilhas;
    
    public function initializeClass(){
        $proprietaria = new CiaAerea(
            "001",
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $categoria = new Categoria("nomeCategoria", 90);
        $this->programaDeMilhas = new ProgramaDeMilhas("abcdefgh", $categoria, $proprietaria);

        $this->pontos = [];

        $endereco = new endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345-678", 12.5, 1.6);

        $this->passageiroVip = new PassageiroVip(57, $this->programaDeMilhas,  $this->pontos, "Francesco", "00.000.000-0", "CS265436",
          "000.000.000-00","Brasileiro", "12/02/2000", "aaaaa@gmail.com", $endereco);

    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->passageiroVip->getPontos(), $this->pontos);
        $this->assertSame($this->passageiroVip->getProgramaDeMilhas(), $this->programaDeMilhas);
        $this->assertSame($this->passageiroVip->getRegistro(), 57);
        $this->assertSame($this->passageiroVip->getPontosAcumulados(), 0);
    }

    public function testAlterarPontuacao(){
        $this->initializeClass();

        $sessentaPontos = new Pontos(60);
        $quarentaPontos = new Pontos(40);

        $dataExpiracao = DateTime::createFromFormat('d/m/Y', '24/04/2020');
        $quarentaPontos->setDataExpiracao($dataExpiracao);

        $this->passageiroVip->addPontos($sessentaPontos);
        $this->passageiroVip->addPontos($quarentaPontos);
        $this->assertSame($this->passageiroVip->getPontosAcumulados(), 100);
        $this->passageiroVip->removePontosExpirados();
        $this->assertSame($this->passageiroVip->getPontosAcumulados(), 60);

    }

   
    


}