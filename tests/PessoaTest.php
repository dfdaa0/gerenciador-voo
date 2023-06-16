<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Endereco.php');
include_once('classes/Pessoa.php');

final class PessoaTest extends TestCase{
    private Pessoa $pessoa;
    private Endereco $endereco;

    public function initializeClass(){
        $this->endereco = new endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345-678", 12.5, 1.6);

         /*$this->pessoa = new Pessoa("Francesco", "a", "a",
          "a","Brasileiro", "a", "a", $this->endereco);
*/
    
         $this->pessoa = new Pessoa("Francesco", "00.000.000-0", "CS265436",
          "000.000.000-00","Brasileiro", "12/02/2000", "aaaaa@gmail.com", $this->endereco);
    }

    public function testClassConstructor(){
        $this->initializeClass();
        $this->assertSame($this->pessoa->getNome(), "Francesco");
        $this->assertSame($this->pessoa->getRg(), "00.000.000-0");
        $this->assertSame($this->pessoa->getPassaporte(), "CS265436");
        $this->assertSame($this->pessoa->getCpf(), "000.000.000-00");
        $this->assertSame($this->pessoa->getNacionalidade(), "Brasileiro");
        $this->assertSame($this->pessoa->getNascimento()->format('d/m/Y'), "12/02/2000");
        $this->assertSame($this->pessoa->getEmail(), "AAAAA@GMAIL.COM");
        $this->assertSame($this->pessoa->getEndereco(), $this->endereco);
    }


}