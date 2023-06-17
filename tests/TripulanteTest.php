<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/CiaAerea.php');
include_once('classes/Endereco.php');
include_once('classes/Aeroporto.php');
include_once('classes/Tripulante.php');


class TripulanteTest extends TestCase
{
    public function testClassConstructor()
    {
        $nome = 'João';
        $rg = '00.000.000-9';
        $passaporte = 'CS265436';
        $cpf = '123.456.789-00';
        $nacionalidade = 'Brasileiro';
        $nascimento = '01/01/1990';
        $email = 'joao@example.com';
        $endereco = new Endereco("logradouro", 91, "complemento", "bairro",
        "cidade","estado", "12345-678", 12.5, 1.6);
        $cht = '1234567890';
        $aeroporto = new Aeroporto('AAA', 'Aeroporto A', 'Cidade A', 'Estado A');
        $ciaAerea = new CiaAerea(
            001,
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $tripulante = new Tripulante($nome, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco, $cht, $aeroporto, $ciaAerea);

        $this->assertSame($cht, $tripulante->getCht());
        $this->assertSame($aeroporto, $tripulante->getAeroporto());
        $this->assertSame($ciaAerea, $tripulante->getCiaAerea());
    }
}