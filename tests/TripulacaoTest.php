<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Tripulacao.php');

final class TripulacaoTest extends TestCase{
    private Tripulacao $tripulacao;
    private Tripulante $piloto;
    private Tripulante $copiloto;
    private Array $comissarios;

    public function initializeClass(){
        $nome1 = 'João';
        $nome2 = 'Bruno';
        $nome3 = 'Bernardo';
        $nome4 = 'Manoel';
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
            "001",
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );
        
        $this->piloto = new Tripulante($nome1, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco, $cht, $aeroporto, $ciaAerea);
        $this->copiloto = new Tripulante($nome2, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco, $cht, $aeroporto, $ciaAerea);
        $this->comissarios[0] = new Tripulante($nome3, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco, $cht, $aeroporto, $ciaAerea);
        $this->comissarios[1] = new Tripulante($nome4, $rg, $passaporte, $cpf, $nacionalidade, $nascimento, $email, $endereco, $cht, $aeroporto, $ciaAerea);

        $this->tripulacao = new Tripulacao($this->piloto, $this->copiloto, $this->comissarios);
    }
    
    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->piloto, $this->tripulacao->getPiloto());
        $this->assertSame($this->copiloto, $this->tripulacao->getCopiloto());
        $this->assertSame($this->comissarios, $this->tripulacao->getComissarios());

        $novosComissarios[0] = $this->tripulacao->getCopiloto();
        $novosComissarios[1] = $this->tripulacao->getComissarios()[0];

        $novoPiloto = $this->tripulacao->getComissarios()[1];
        $novoCopiloto = $this->tripulacao->getPiloto();
        $this->tripulacao->setPiloto($novoPiloto);
        $this->tripulacao->setCopiloto($novoCopiloto);
        $this->tripulacao->setComissarios($novosComissarios);
        $this->assertSame($novoPiloto, $this->tripulacao->getPiloto());
        $this->assertSame($novoCopiloto, $this->tripulacao->getCopiloto());
        $this->assertSame($novosComissarios, $this->tripulacao->getComissarios());
    }
}