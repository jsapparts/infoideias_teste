<?php

namespace SRC;

class Funcoes
{
	const ANOS_POR_SECULO = 100;
	const HABILITAR_REGISTRO_DEPURAÇÃO = false;

	public static function RegistroDbg(string $registro) {
		if (self::HABILITAR_REGISTRO_DEPURAÇÃO) {
			echo($registro);
		}
	}

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
		$contagemValores = count($arr);

		$sequencias = [];
		$seqInicio = 0;

		// Registrar na saída padrão
		$arrStr = "[";
		foreach ($arr as $valor) { $arrStr .= (strlen($arrStr) == 1 ? '' : ', ') . $valor; };
		$arrStr .= "]";

		self::RegistroDbg("\n------- ( >= Input Arr.: " . $arrStr . " ) -------\n");

		foreach ($arr as $indice => $valor) {
			self::RegistroDbg("\nValor.: '" . $valor . "'");
			$ultimoValor = ($indice == ($contagemValores - 1));

			self::RegistroDbg("@Idx: " . $indice . "\n@SeqStart: " . $seqInicio);

			if (!$ultimoValor) {
				self::RegistroDbg("@!last");

				$proximoValor = $arr[$indice + 1];
				self::RegistroDbg("\t\tPróximo Valor.: '" . $proximoValor . "'");

				if ($valor >= $proximoValor) {
					$valorInicio = $arr[$seqInicio];
					self::RegistroDbg("\n\t Seq. Found: [" . $seqInicio . "(" . $valorInicio . ") - " . $indice . "(" . $valor . ")]");

					$sequencias[] = [
						$seqInicio, $indice, $valor, $proximoValor
					];
					$seqInicio = $indice + 1;
				}
			} else {
				// A última sequência foi formada com o elemento anterior ao final ..
				// .. então essa é uma nova sequência de um único elemento.

				// Uma vez que $seqInicio começa em 0, isso será verdade também para sequências
				// .. de valor único. e.g.: [1], [4], [150]
				$valorInicio = $arr[$seqInicio];

				self::RegistroDbg("\n\t Seq. Found: [" . $seqInicio . "(" . $valorInicio . ") - " . $indice . "(" . $valor . ")]");
				$sequencias[] = [
					$seqInicio, $indice, $valorInicio, $valor
				];
			}
		}

		self::RegistroDbg("\n\n#Seq.: " . count($sequencias));

		$totalSequencias = count($sequencias);
		if ($totalSequencias == 1) {
			return true;
		}

		$remocoesNecessarias = 0;
		$indiceChecagemDireita = 0;

		foreach ($sequencias as $indice => $sequencia) {
			$ultimaSequencia = ($indice == ($totalSequencias - 1));

			if ($ultimaSequencia) {
				// Devido a lógica de checagem utilizada a última sequência já terá ..
				// .. sido trabalhada quando o loop chegar no índice da mesma
				self::RegistroDbg("\n#SEQ.: [" . $sequencia[0] . ', ' . $sequencia[1] . ', ' . $sequencia[2] . ', ' . $sequencia[3] . "]");
				break;
			}

			self::RegistroDbg("\n+SEQ.: [" . $sequencia[0] . ', ' . $sequencia[1] . ', ' . $sequencia[2] . ', ' . $sequencia[3] . "]");

			$sequenciaInicioIndice = $sequencia[0];
			$sequenciaFimIndice = $sequencia[1];

			$elementosSequencia = ($sequenciaFimIndice - $sequenciaInicioIndice);

			if ($elementosSequencia == 0) {
				// Nesse caso o elemento apenas um elemento existe e retirar o mesmo ..
				// .. é a melhor escolha
				++$remocoesNecessarias;
				continue;
			}

			if ($sequenciaFimIndice <= $indiceChecagemDireita) {
				// Em caso de já termos checado todas os valores dessa sequência ..
				// .. durante uma iteração anterior
				continue;
			}

			// Caso não seja a última sequência vamos checar quantos valores a serem ..
			// .. removidos até que uma continuidade crescente possa ser alcançada
			$proximaSequencia = $sequencias[$indice + 1];
			$proximaSequenciaInicio = $proximaSequencia[2];
			$proximaSequenciaFim = $proximaSequencia[3];

			// Definir por qual sequencia começar a verificação tentando preservar a maior delas
			$elementosProximaSequencia = ($proximaSequencia[1] - $proximaSequencia[0]);
			$prioridadeAEsquerda = ($elementosSequencia > $elementosProximaSequencia);

			self::RegistroDbg(",  [<>]Prioridade: " . ($prioridadeAEsquerda ? "<" : ">"));

			if ($prioridadeAEsquerda) {
				if ($elementosProximaSequencia == 0) {
					// A próxima sequência tem apenas 1 elemento, a melhor estratégia ..
					// .. seria a de dropar ela
					++$remocoesNecessarias;
					continue;
				}

				if ($arr[$sequenciaFimIndice - 1] < $proximaSequenciaInicio) {
					// Caso removessemos o último elemento da sequência atual procederia ..
					// .. como uma ordem crescente
					++$remocoesNecessarias;
					++$indiceChecagemDireita;
					continue;
				}

				$sequenciaFimValor = $arr[$sequenciaFimIndice];
				$inicioChecagemIndice = max($proximaSequencia[0], $indiceChecagemDireita);

				// Checar por elementos da próxima sequência que possam ser removidos
				for ($indiceValor = $inicioChecagemIndice; $indiceValor <= $proximaSequencia[1]; ++$indiceValor) {

					$valorN = $arr[$indiceValor];
					$indiceChecagemDireita = $indiceValor;

					if ($valorN <= $sequenciaFimValor) {
						// Valor duplicado ou menor que a última sequência, marcar remoção e ..
						// .. continuar checando
						++$remocoesNecessarias;
						continue;
					}

					// O valor é maior, então não precisa ser removido
					break;
				}
			} else {
				// Priorizar a próxima sequência a direita, tentando remover os valores ..
				// .. da sequência a esquerda

				if ($elementosProximaSequencia == 0) {
					// Nesse caso o elemento inicial seria menor, e ambos teriam ..
					// .. apenas 1 elemento, então o melhor é contar o drop e prosseguir
					++$remocoesNecessarias;
					continue;
				}

				if ($arr[$proximaSequencia[0] + 1] > $arr[$sequenciaFimIndice]) {
					// Caso removessemos o primeiro elemento da próxima sequência uma ordem ..
					// .. crescente seria estabelecida
					++$remocoesNecessarias;
					continue;
				}

				$fimChecagemIndice = max($sequenciaInicioIndice, $indiceChecagemDireita);

				// Checar por elementos da sequência atual que possam ser removidos
				for ($indiceValor = $sequenciaFimIndice; $indiceValor >= $fimChecagemIndice; --$indiceValor) {

					$valorN = $arr[$indiceValor];

					if ($valorN >= $proximaSequenciaInicio) {
						// Valor duplicado ou maior que o próximo valor da próxima sequência ..
						// .. marcar remoção e continuar checando
						++$remocoesNecessarias;
						continue;
					}

					// O valor é menor, então não precisa ser removido
					break;
				}

				// Como iremos checar no minímo até o fim dessa sequência vamos atualizar ..
				// .. o índice que mede o quão longe já checamos
				$indiceChecagemDireita = $sequenciaFimIndice;
			}
		}

		self::RegistroDbg("\n\n#Remoções.: " . $remocoesNecessarias);
		self::RegistroDbg("\n---------------- [::] ----------------\n");

		return ($remocoesNecessarias <= 1);
	}
}