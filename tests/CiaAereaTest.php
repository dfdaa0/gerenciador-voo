<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/CiaAerea.php');

final class CiaAereaTest extends TestCase{
    private CiaAerea $ciaAerea;
    public function initialize(){
      $this->ciaAerea = new CiaAerea(
      001,
      "Latam",
      "Latam Airlines do Brasil S.A",
      "00.000.000/0000-00",
      "LA",
      25.5
    );
    }
    public function testClassConstructor(){
        $this->initialize();
        $this->assertSame(001, $this->ciaAerea->getCodigo());
        $this->assertSame("Latam", $this->ciaAerea->getNome());
        $this->assertSame("Latam Airlines do Brasil S.A", $this->ciaAerea->getRazaoSocial());
        $this->assertSame("00.000.000/0000-00", $this->ciaAerea->getCnpj());
        $this->assertSame("LA", $this->ciaAerea->getSigla());
        $this->assertSame(25.5, $this->ciaAerea->getPrecoBagagem());
    }

  public function testAddVeiculo(){
    $this->initialize();
    $aeronave = new Aeronave('Embraer', '175', 180, $this->ciaAerea, 600, 'PP-RUZ');
    $this->assertSame(null, $this->ciaAerea->addVeiculo($aeronave));
  }
  
}