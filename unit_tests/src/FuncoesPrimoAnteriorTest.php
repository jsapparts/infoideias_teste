<?php

use PHPUnit\Framework\TestCase;

class FuncoesPrimoAnteriorTest extends TestCase
{
	public function testPrimoAnteriorDe0E1(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(-1, $funcoes->PrimoAnterior(0));
		$this->assertEquals(-1, $funcoes->PrimoAnterior(1));
	}

	public function testPrimoAnteriorDe7(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(7, $funcoes->PrimoAnterior(10));
	}

	public function testPrimoAnteriorDe29(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(23, $funcoes->PrimoAnterior(29));
	}

	public function testPrimoAnteriorVariados(): void {
		$funcoes = new SRC\Funcoes();

		$this->assertEquals(2, $funcoes->PrimoAnterior(3));
		$this->assertEquals(7, $funcoes->PrimoAnterior(11));
		$this->assertEquals(17, $funcoes->PrimoAnterior(18));
		$this->assertEquals(83, $funcoes->PrimoAnterior(87));
		$this->assertEquals(151, $funcoes->PrimoAnterior(154));
		$this->assertEquals(223, $funcoes->PrimoAnterior(225));
	}
}
