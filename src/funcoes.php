<?php

namespace SRC;

class Funcoes
{
	const ANOS_POR_SECULO = 100;

	/*

	Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

	 * */
	public function SeculoAno(int $ano): int {
		if ($ano <= 0) {
			return 0;
		}

		$seculo = 0;

		if ($ano <= self::ANOS_POR_SECULO) {
			$seculo = 1;
		} else {
			$seculo = ($ano / self::ANOS_POR_SECULO);

			if (gettype($seculo) != "integer") {
				$seculo += 1;
			}
		}

		return $seculo;
	}

	/*

	Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

	Exemplo para teste:

	Numero = 10 resposta = 7
	Número = 29 resposta = 23

	 * */
	public function PrimoAnterior(int $numero): int {
		if ($numero <= 1) {
			// Sem número primo
			return -1;
		}

		if ($numero == 2 || $numero == 3) {
			// Caso seja o número dois não há um primo anterior a ele e para o 3 é o 2
			return 2;
		}

		for ($n = $numero - 1; $n > 2; --$n) {
			if (! $this->NumeroPrimo($n)) {
				continue;
			}

			// Número primo encontrado
			return $n;
		}

		// Sem número primo anterior encontrado
		return -2;
	}

	const PRIMOS_DE_TEST = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31);

	public function NumeroPrimo(int $numero): bool {
		$numPar = (($numero % 2) == 0);

		if ($numPar && $numero != 2) {
			// Apenas o número 2 é um par dentro do conjunto de números primos
			return false;
		}

		if (in_array($numero, self::PRIMOS_DE_TEST)) {
			// Caso seja um dos valores de teste já está validado como um número primo
			return true;
		}

		$fatores_extras = 0;

		foreach (self::PRIMOS_DE_TEST as &$primo) {
			$resto = $numero % $primo;

			if ($resto == 0) {
				// Completamente divísivel, um fator foi encontrado
				++$fatores_extras;
				continue;
			}

			$quociente = $numero / $primo;
			if ($quociente < $primo && $fatores_extras == 0) {
				// Caso o resto da divisão seja diferente de zero e o quociente for menor que o divisor, este é um número primo
				return true;
			}
		}

		return ($fatores_extras == 0);
	}



	/*

	Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

	Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

	 * */
	public function SegundoMaior(array $arr): int {
		$maiorValor = 0;
		$segundoMaiorValor = 0;

		foreach ($arr as $arrFilha) {
			foreach ($arrFilha as $valor) {
				if ($valor > $maiorValor) {
					$segundoMaiorValor = $maiorValor;
					$maiorValor = $valor;
				} elseif ($valor > $segundoMaiorValor) {
					$segundoMaiorValor = $valor;
				}
			}
		}

		return $segundoMaiorValor;
	}



	/*

	Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
		 -  Sequencias com apenas um elemento são consideradas crescentes

	[1, 3, 2, 1]  false
	[1, 3, 2]  true
	[1, 2, 1, 2]  false
	[3, 6, 5, 8, 10, 20, 15] false
	[1, 1, 2, 3, 4, 4] false
	[1, 4, 10, 4, 2] false
	[10, 1, 2, 3, 4, 5] true
	[1, 1, 1, 2, 3] false
	[0, -2, 5, 6] true
	[1, 2, 3, 4, 5, 3, 5, 6] false
	[40, 50, 60, 10, 20, 30] false
	[1, 1] true
	[1, 2, 5, 3, 5] true
	[1, 2, 5, 5, 5] false
	[10, 1, 2, 3, 4, 5, 6, 1] false
	[1, 2, 3, 4, 3, 6] true
	[1, 2, 3, 4, 99, 5, 6] true
	[123, -17, -5, 1, 2, 3, 12, 43, 45] true
	[3, 5, 67, 98, 3] true

	 * */
	public function SequenciaCrescente(array $arr): bool {
		$primeiroValor = true;
		$valorAnterior = 0;

		$contagemValores = count($arr);
		$contagemRemocoes = 0;

		$cases = '';

		foreach ($arr as $indice => $valor) {
			if (gettype($valor) != "integer") {
				return false;
			}

			$primeiroValor = ($indice == 0);
			$ultimoValor = ($indice == ($contagemValores - 1));

			if (!$primeiroValor) {
				$valorAnterior = $arr[$indice - 1];
			}

			$segundoValor = ($indice == 1);

			if (!$ultimoValor) {
				$proximoValor = $arr[$indice + 1];

				if ($valor > $proximoValor) {
					++$contagemRemocoes;

					if ($segundoValor && isset($valorAnterior) && $valorAnterior == $proximoValor) {
						++$contagemRemocoes;
					}
				} else if ($valor == $proximoValor) {
					++$contagemRemocoes;
				}
			}

			$penultimoValor = ($indice == $contagemValores - 2);

			if (!$primeiroValor && !$ultimoValor && !$segundoValor && !$penultimoValor) {
				$valorAnterior2 = $arr[$indice - 2];
				$proximoValor2 = $arr[$indice - 2];

				if ($valorAnterior > $valor && $valor < $proximoValor) {
					++$contagemRemocoes;
				}
			}
		}

		return ($contagemRemocoes <= 1);
	}
}
