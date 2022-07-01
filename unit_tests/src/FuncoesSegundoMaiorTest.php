<?php

use PHPUnit\Framework\TestCase;

class FuncoesSegundoMaiorTest extends TestCase
{
	public function testSegundoMaior25(): void {
		$funcoes = new SRC\Funcoes();

		$md_array = array (
			array(25,22,18),
			array(10,15,13),
			array(24,5,2),
			array(80,17,15)
		);

		$this->assertEquals(25, $funcoes->SegundoMaior($md_array));
	}

	public function testSegundoMaior350(): void {
		$funcoes = new SRC\Funcoes();

		$md_array = array (
			array(284,212, 52),
			array(23,350,183),
			array(24,205,5),
			array(1,17,1550)
		);

		$this->assertEquals(350, $funcoes->SegundoMaior($md_array));
	}
}