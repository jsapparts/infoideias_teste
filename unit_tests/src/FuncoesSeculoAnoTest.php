<?php

use PHPUnit\Framework\TestCase;

class FuncoesSeculoAnoTest extends TestCase
{
	public function testSeculoAno1905(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(20, $funcoes->SeculoAno(1905));
	}

	public function testSeculoAno1700(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(17, $funcoes->SeculoAno(1700));
	}

	public function testSeculoAno0(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(0, $funcoes->SeculoAno(0));
	}

	public function testSeculoAno1(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(1, $funcoes->SeculoAno(1));
	}

	public function testSeculoAno100(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(1, $funcoes->SeculoAno(100));
	}

	public function testSeculoAno101(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(2, $funcoes->SeculoAno(101));
	}

	public function testSeculoAno200(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(2, $funcoes->SeculoAno(200));
	}

	public function testSeculoAno201(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(3, $funcoes->SeculoAno(201));
	}

	public function testSeculoAno2000(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(20, $funcoes->SeculoAno(2000));
	}

	public function testSeculoAno2022(): void {
		$funcoes = new SRC\Funcoes();
		$this->assertEquals(21, $funcoes->SeculoAno(2022));
	}
}
