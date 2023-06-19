<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Categoria.php');

final class CategoriaTest extends TestCase{
    public function testClassConstructor(){
        $categoria = new Categoria("categoriaNome", 90);

        $this->assertSame($categoria->getNome(), "categoriaNome");
        $this->assertSame($categoria->getPontuacaoMinima(), 90);

    }
}