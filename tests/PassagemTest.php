<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Endereco.php');
include_once('classes/Passageiro.php');
include_once('classes/Aeroporto.php');
include_once('classes/EnumStatus.php');
include_once('classes/Passagem.php');

final class PassagemTest extends TestCase{
    private Passagem $passagem;
    private Passageiro $passageiro;
    private Aeroporto $aeroporto1;
    private Aeroporto $aeroporto2;
    private Array $viagens;
    private Array $franquias;

    public function initializeClass(){
        $endereco = new Endereco("logradouro", 91, "complemento", "bairro", "cidade", "estado", "22222-909", 2.5, 25.4);
        $this->passageiro = new Passageiro("Francesco", "00.000.000-0", "CS265436", "000.000.000-00","Brasileiro", "12/12/2012", "aaaaa@gmail.com", $endereco);
        $ciaAerea = new CiaAerea(
            001,
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $aeronave1 = new Aeronave('Embraer', '175', 180, $ciaAerea, 600, 'PP-RUZ');
       
        $this->aeroporto1 = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');
        $aeroporto3 = new Aeroporto('CCC', 'São Paulo', 'São Paulo');
        $this->aeroporto2 = new Aeroporto('BBB', 'Rio de Janeiro', 'Rio de Janeiro');

        $horarioPartida = new DateTime("08:55");

        $linha1 = new Linha($this->aeroporto1, $aeroporto3, $horarioPartida, 72, "LA2023" ,$aeronave1, $ciaAerea);
        $linha2 = new Linha($aeroporto3, $this->aeroporto2, $horarioPartida, 72, "LA2022" ,$aeronave1, $ciaAerea);

        $viagem = new Viagem ($linha1, $aeronave1);
        $viagem2 = new Viagem ($linha2, $aeronave1);

        $this->viagens[]= $viagem;
        $this->viagens[]= $viagem2;

        //$this->franquias = [21.2, 19.4, 23.0, 56.3];
        //$this->franquias = [21.2, 19.4, 24.0];
        //$this->franquias = [21.2, 19.4, -1.0];
        $this->franquias = [21.2, 19.4, 23.0];

        $this->passagem = new Passagem($this->passageiro, $this->viagens, "codBarras", $this->franquias, 200.0);
    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->passagem->getPassageiro(), $this->passageiro);
        $this->assertSame($this->passagem->getOrigem(), $this->aeroporto1);
        $this->assertSame($this->passagem->getDestino(), $this->aeroporto2);
        $this->assertSame($this->passagem->getViagens(), $this->viagens);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::PassagemAdquirida);
        $this->assertSame($this->passagem->getCodBarras(), "codBarras");
        $this->assertSame($this->passagem->getFranquias(), $this->franquias);
        $this->assertSame($this->passagem->getValorMulta(), 200.0);
    }

    public function testMudancaStatus(){
        $this->initializeClass();
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::PassagemAdquirida);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::PassagemAdquirida);
        $this->passagem->fazCheckIn();
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::CheckinRealizado);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::CheckinRealizado);
        $this->passagem->fazEmbarque($this->passagem->getViagens()[0]);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::EmbarqueRealizado);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::CheckinRealizado);
        $this->passagem->cancelaPassagem();
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::PassagemCancelada);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::PassagemCancelada);
        $this->passagem->fazNoShow();
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[0]->getLinha()->getCodLinha()], EnumStatus::NoShow);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::NoShow);
        $this->passagem->fazEmbarque($this->passagem->getViagens()[1]);
        $this->assertSame($this->passagem->getStatus()[$this->passagem->getViagens()[1]->getLinha()->getCodLinha()], EnumStatus::EmbarqueRealizado);
    }


}