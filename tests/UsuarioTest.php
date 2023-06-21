<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include_once('classes/Usuario.php');

final class UsuarioTest extends TestCase{
    public function testClassConstructor(){
        //$usuario = new Usuario("meuLogin", "abcdef", "minhaSenha");
        $usuario = new Usuario("meuLogin", "abcdef@gmail.com", "minhaSenha");
        $this->assertSame("meuLogin", $usuario->getLogin());
        $this->assertSame("minhaSenha", $usuario->getSenha());
        $this->assertSame("ABCDEF@GMAIL.COM", $usuario->getEmail());
    }
}