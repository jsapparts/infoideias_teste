<?php

use PHPUnit\Framework\TestCase;

class FuncoesSequenciaCrescenteTest extends TestCase
{
	public function testSequenciaCrescentePadrao(): void {
		$funcoes = new SRC\Funcoes();

		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 3, 2, 1]));
		$this->assertEquals(true, $funcoes->SequenciaCrescente([1, 3, 2]));

		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 2, 1, 2]));
		$this->assertEquals(false, $funcoes->SequenciaCrescente([3, 6, 5, 8, 10, 20, 15]));

		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 1, 2, 3, 4, 4]));
		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 4, 10, 4, 2]));

		$this->assertEquals(true, $funcoes->SequenciaCrescente([10, 1, 2, 3, 4, 5]));
		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 1, 1, 2, 3]));

		$this->assertEquals(true, $funcoes->SequenciaCrescente([0, -2, 5, 6]));
		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 2, 3, 4, 5, 3, 5, 6]));

		$this->assertEquals(false, $funcoes->SequenciaCrescente([40, 50, 60, 10, 20, 30]));
		$this->assertEquals(true, $funcoes->SequenciaCrescente([1, 1]));

		$this->assertEquals(true, $funcoes->SequenciaCrescente([1, 2, 5, 3, 5]));
		$this->assertEquals(false, $funcoes->SequenciaCrescente([1, 2, 5, 5, 5]));

		$this->assertEquals(false, $funcoes->SequenciaCrescente([10, 1, 2, 3, 4, 5, 6, 1]));
		$this->assertEquals(true, $funcoes->SequenciaCrescente([1, 2, 3, 4, 3, 6]));

		$this->assertEquals(true, $funcoes->SequenciaCrescente([1, 2, 3, 4, 99, 5, 6]));
		$this->assertEquals(true, $funcoes->SequenciaCrescente([123, -17, -5, 1, 2, 3, 12, 43, 45]));

		$this->assertEquals(true, $funcoes->SequenciaCrescente([3, 5, 67, 98, 3]));
	}
}