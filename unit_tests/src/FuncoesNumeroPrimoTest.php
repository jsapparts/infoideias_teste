<?php

use PHPUnit\Framework\TestCase;

class FuncoesNumeroPrimoTest extends TestCase
{
	public function testNumeroPrimoAte31(): void {
		$funcoes = new SRC\Funcoes();

		/* Números primos válidos */
		$this->assertTrue($funcoes->NumeroPrimo(2));
		$this->assertTrue($funcoes->NumeroPrimo(3));
		$this->assertTrue($funcoes->NumeroPrimo(5));
		$this->assertTrue($funcoes->NumeroPrimo(7));
		$this->assertTrue($funcoes->NumeroPrimo(11));
		$this->assertTrue($funcoes->NumeroPrimo(13));
		$this->assertTrue($funcoes->NumeroPrimo(17));
		$this->assertTrue($funcoes->NumeroPrimo(19));
		$this->assertTrue($funcoes->NumeroPrimo(23));
		$this->assertTrue($funcoes->NumeroPrimo(29));
		$this->assertTrue($funcoes->NumeroPrimo(31));

		/* Números fora do conjuto dos números primos */
		$this->assertFalse($funcoes->NumeroPrimo(4));
		$this->assertFalse($funcoes->NumeroPrimo(8));
		$this->assertFalse($funcoes->NumeroPrimo(10));
		$this->assertFalse($funcoes->NumeroPrimo(15));
		$this->assertFalse($funcoes->NumeroPrimo(21));
		$this->assertFalse($funcoes->NumeroPrimo(26));
		$this->assertFalse($funcoes->NumeroPrimo(28));
		$this->assertFalse($funcoes->NumeroPrimo(30));
	}

	public function testNumeroPrimoAcima31(): void {
		$funcoes = new SRC\Funcoes();

		/* Números primos válidos */
		$this->assertTrue($funcoes->NumeroPrimo(37));
		$this->assertTrue($funcoes->NumeroPrimo(41));
		$this->assertTrue($funcoes->NumeroPrimo(67));
		$this->assertTrue($funcoes->NumeroPrimo(83));
		$this->assertTrue($funcoes->NumeroPrimo(89));
		$this->assertTrue($funcoes->NumeroPrimo(97));
		$this->assertTrue($funcoes->NumeroPrimo(109));
		$this->assertTrue($funcoes->NumeroPrimo(113));
		$this->assertTrue($funcoes->NumeroPrimo(127));
		$this->assertTrue($funcoes->NumeroPrimo(151));
		$this->assertTrue($funcoes->NumeroPrimo(163));
		$this->assertTrue($funcoes->NumeroPrimo(167));
		$this->assertTrue($funcoes->NumeroPrimo(191));
		$this->assertTrue($funcoes->NumeroPrimo(211));
		$this->assertTrue($funcoes->NumeroPrimo(223));
		$this->assertTrue($funcoes->NumeroPrimo(257));
		$this->assertTrue($funcoes->NumeroPrimo(269));
		$this->assertTrue($funcoes->NumeroPrimo(283));

		/* Números fora do conjuto dos números primos */
		$this->assertFalse($funcoes->NumeroPrimo(68));
		$this->assertFalse($funcoes->NumeroPrimo(90));
		$this->assertFalse($funcoes->NumeroPrimo(112));
		$this->assertFalse($funcoes->NumeroPrimo(125));
		$this->assertFalse($funcoes->NumeroPrimo(169));
		$this->assertFalse($funcoes->NumeroPrimo(250));
	}

	public function testNumeroPrimoAcima500(): void {
		$funcoes = new SRC\Funcoes();

		/* Números primos válidos */
		$this->assertTrue($funcoes->NumeroPrimo(503));
		$this->assertTrue($funcoes->NumeroPrimo(547));
		$this->assertTrue($funcoes->NumeroPrimo(599));
		$this->assertTrue($funcoes->NumeroPrimo(607));
		$this->assertTrue($funcoes->NumeroPrimo(653));
		$this->assertTrue($funcoes->NumeroPrimo(661));
		$this->assertTrue($funcoes->NumeroPrimo(683));
		$this->assertTrue($funcoes->NumeroPrimo(733));
		$this->assertTrue($funcoes->NumeroPrimo(769));
		$this->assertTrue($funcoes->NumeroPrimo(773));
		$this->assertTrue($funcoes->NumeroPrimo(823));
		$this->assertTrue($funcoes->NumeroPrimo(839));
		$this->assertTrue($funcoes->NumeroPrimo(863));
		$this->assertTrue($funcoes->NumeroPrimo(877));
		$this->assertTrue($funcoes->NumeroPrimo(919));
		$this->assertTrue($funcoes->NumeroPrimo(941));
		$this->assertTrue($funcoes->NumeroPrimo(991));
		$this->assertTrue($funcoes->NumeroPrimo(997));

		/* Números fora do conjuto dos números primos */
		$this->assertFalse($funcoes->NumeroPrimo(500));
		$this->assertFalse($funcoes->NumeroPrimo(605));
		$this->assertFalse($funcoes->NumeroPrimo(686));
		$this->assertFalse($funcoes->NumeroPrimo(770));
		$this->assertFalse($funcoes->NumeroPrimo(878));
		$this->assertFalse($funcoes->NumeroPrimo(994));
	}

	public function testNumeroPrimo5Digitos(): void {
		$funcoes = new SRC\Funcoes();

		/* Números primos válidos */
		$this->assertTrue($funcoes->NumeroPrimo(98419));
		$this->assertTrue($funcoes->NumeroPrimo(34721));
		$this->assertTrue($funcoes->NumeroPrimo(57973));
		$this->assertTrue($funcoes->NumeroPrimo(79319));
		$this->assertTrue($funcoes->NumeroPrimo(11329));
		$this->assertTrue($funcoes->NumeroPrimo(21521));
		$this->assertTrue($funcoes->NumeroPrimo(86561));
		$this->assertTrue($funcoes->NumeroPrimo(91771));
		$this->assertTrue($funcoes->NumeroPrimo(21491));
		$this->assertTrue($funcoes->NumeroPrimo(51679));

		/* Números fora do conjuto dos números primos */
		$this->assertFalse($funcoes->NumeroPrimo(34720));
		$this->assertFalse($funcoes->NumeroPrimo(79318));
		$this->assertFalse($funcoes->NumeroPrimo(21526));
		$this->assertFalse($funcoes->NumeroPrimo(91772));
	}

	public function testNumeroPrimo8Digitos(): void {
		$funcoes = new SRC\Funcoes();

		/* Números primos válidos */
		$this->assertTrue($funcoes->NumeroPrimo(49409317));
		$this->assertTrue($funcoes->NumeroPrimo(97337573));
		$this->assertTrue($funcoes->NumeroPrimo(95931107));
		$this->assertTrue($funcoes->NumeroPrimo(47309707));

		/* Números fora do conjuto dos números primos */
		$this->assertFalse($funcoes->NumeroPrimo(49409318));
		$this->assertFalse($funcoes->NumeroPrimo(95931100));
	}
}
