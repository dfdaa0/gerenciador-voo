<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Passageiro.php');
include_once('classes/Passagem.php');

final class PassageiroTest extends TestCase{
    Private Passageiro $passageiro;
    public function initializeClass(){
        $endereco = new endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345-678", 12.5, 1.6);

         $this->passageiro = new Passageiro("Francesco", "00.000.000-0", "CS265436",
          "000.000.000-00","Brasileiro", "12/02/2000", "aaaaa@gmail.com", $endereco);
    }

    public function testAddPassagem(){
        $this->initializeClass();
        $this->assertEmpty($this->passageiro->getListaPassagens());
        
        $passagem1 = $this->retornaPassagem1();
        $passagem2 = $this->retornaPassagem2();

        $arrayPassagens[] = $passagem1;
        $arrayPassagens[] = $passagem2;

        $this->passageiro->addPassagem($passagem1);
        $this->passageiro->addPassagem($passagem2);
        $this->assertSame(count($this->passageiro->getListaPassagens()), 2);
        $this->assertSame($arrayPassagens, $this->passageiro->getListaPassagens());
        
    }

    public function retornaPassagem1(){
        
            $this->initializeClass();
            $ciaAerea = new CiaAerea(
                "001",
                "Latam",
                "Latam Airlines do Brasil S.A",
                "00.000.000/0000-00",
                "LA",
                25.5
            );
    
            $aeronave1 = new Aeronave('Embraer', '175', 180, $ciaAerea, 600, 'PP-RUZ');
           
            $aeroporto1 = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');
            $aeroporto3 = new Aeroporto('CCC', 'São Paulo', 'São Paulo');
            $aeroporto2 = new Aeroporto('BBB', 'Rio de Janeiro', 'Rio de Janeiro');
    
            $horarioPartida = new DateTime("08:55");
    
            $linha1 = new Linha($aeroporto1, $aeroporto3, $horarioPartida, 72, "LA2023" ,$aeronave1, $ciaAerea);
            $linha2 = new Linha($aeroporto3, $aeroporto2, $horarioPartida, 72, "LA2022" ,$aeronave1, $ciaAerea);
    
            $viagem = new Viagem ($linha1, $aeronave1, $linha1->getHorarioPartida());
            $viagem2 = new Viagem ($linha2, $aeronave1, $linha2->getHorarioPartida());
    
            $viagens[]= $viagem;
            $viagens[]= $viagem2;
    
            $franquias = [21.2, 19.4, 23.0];
    
            $passagem = new Passagem($this->passageiro, $viagens, "codBarras", $franquias, 200.0);
        
            return $passagem;
    }

    public function retornaPassagem2(){
        
        $this->initializeClass();
        $ciaAerea = new CiaAerea(
            "001",
            "Latam",
            "Latam Airlines do Brasil S.A",
            "00.000.000/0000-00",
            "LA",
            25.5
        );

        $aeronave1 = new Aeronave('Embraer', '175', 180, $ciaAerea, 600, 'PP-RUZ');
       
        $aeroporto1 = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');
        $aeroporto2 = new Aeroporto('BBB', 'Rio de Janeiro', 'Rio de Janeiro');

        $horarioPartida = new DateTime("08:55");

        $linha1 = new Linha($aeroporto2, $aeroporto1, $horarioPartida, 72, "LA2023" ,$aeronave1, $ciaAerea);

        $viagem = new Viagem ($linha1, $aeronave1, $linha1->getHorarioPartida());

        $viagens[]= $viagem;

        $franquias = [21.2, 19.4, 23.0];

        $passagem = new Passagem($this->passageiro, $viagens, "codBarras", $franquias, 200.0);
    
        return $passagem;
}

}