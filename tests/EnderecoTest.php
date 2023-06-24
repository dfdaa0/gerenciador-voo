<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Endereco.php');

final class EnderecoTest extends TestCase{
    private Endereco $endereco;

    public function initializeClass(){
        /*$this->endereco = new Endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345678", 12.5, 1.6);
         */
        $this->endereco = new Endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345-678", 12.5, 1.6);
    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->endereco->getLogradouro(), "logradouro");
        $this->assertSame($this->endereco->getNumero(), 91);
        $this->assertSame($this->endereco->getComplemento(), "complemento");
        $this->assertSame($this->endereco->getBairro(), "bairro");
        $this->assertSame($this->endereco->getCidade(), "cidade");
        $this->assertSame($this->endereco->getEstado(), "estado");
        $this->assertSame($this->endereco->getCep(), "12345-678");
        $this->assertSame($this->endereco->getLongitude(), 12.5);
        $this->assertSame($this->endereco->getLatitude(), 1.6);
    }


}