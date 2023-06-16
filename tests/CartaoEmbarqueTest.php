<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/CartaoEmbarque.php');
include_once('classes/Aeroporto.php');

final class CartaoEmbarqueTest extends TestCase{
    public function testClassConstructor(){
        $origem = new Aeroporto('AAA', 'Belo Horizonte', 'Minas Gerais');
        $destino = new Aeroporto('BBB', 'São Paulo', 'São Paulo');
        $horarioViagem = new DateTime('2022-10-10 03:45');
        $cartaoEmbarque = new CartaoEmbarque('Nome', 'Sobrenome', $origem, $destino, $horarioViagem, 10);

        $horarioViagemEsperado = new DateTime('2022-10-10 03:45');

        $this->assertSame('Nome', $cartaoEmbarque->getNome());
        $this->assertSame('Sobrenome', $cartaoEmbarque->getSobrenome());
        $this->assertSame($horarioViagemEsperado->getTimestamp(), $cartaoEmbarque->getHorarioViagem()->getTimestamp());
        $this->assertSame(10, $cartaoEmbarque->getAssento());
    }
}