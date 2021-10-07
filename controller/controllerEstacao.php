<?php 

require_once('../modelo/Estacao.php');
require_once('../funcoes/funcoes.php');
require_once('../consultas/TBESTACAO.php');


if(isset($_GET['operacao']) && !empty($_GET['operacao'])){
	switch ($_GET['operacao']) {
		case 'busca':
		if(isset($_GET['id'])){
				//$resultado = buscaEstacaoPorID($_GET['id']);
				//$estacao = new Estacao($resultado['IDEstacao'], $resultado['DESCR']);
				//echo json_encode($estacao->jsonSerialize());
		}
		break;

		case 'buscaTodos':
			//$resultado = buscaTodasEstacoes();
			//echo json_encode(criaVetorPrivado($resultado));
		break;

		case 'buscaPorLugar':
		if(isset($_GET['lugar']) && isset($_GET['latitude']) && isset($_GET['longitude'])){
					//$estacoeOrigem = getEstacaoMaisProxima(-2.542103, -44.168480);

			$estacaoOrigem = getEstacaoMaisProximaPorLatitude($_GET['latitude'], $_GET['longitude']);
			$estacaoDestino = getEstacaoMaisProximaPorDescricao($_GET['lugar']);
			
			if(!empty($estacaoOrigem) && !empty($estacaoDestino)){
				$estacoes = array();
				array_push($estacoes, buscaEstacaoPorID($estacaoOrigem['id']));
				array_push($estacoes, buscaEstacaoPorID($estacaoDestino['id']));

				//var_dump(criaVetorPrivado($estacoes));
				echo json_encode(criaVetorPrivado($estacoes), JSON_UNESCAPED_UNICODE);

			}else{
				erro_print(400, 'Recurso não encontrado');
			}
			

		}
		case 'atualiza':
		if(isset($_GET['ID'])){
						//$resultado = buscaTodasEstacoes();
						//echo json_encode($resultado);
		}
		break;
		
		case 'exclui':
		if(isset($_GET['ID'])){
						//$resultado = buscaTodasEstacoes();
						//echo json_encode($resultado);
		}
		break;


		default:
				# code...
		break;
	}
}elseif(isset($_POST['operacao']) && !empty($_POST['operacao'])){

	switch ($_POST['operacao']) {
		case 'busca':
		if(isset($_POST['id'])){
				//$resultado = buscaEstacaoPorID($_POST['id']);
				//$linha = new Estacao($resultado['IDLINHA'], $resultado['DESCR']);
				//echo json_encode($linha->jsonSerialize());
		}
		break;

		case 'buscaTodos':
			//$resultado = buscaTodasEstacoes();
			//echo json_encode(criaVetorPrivado($resultado));
		
		break;

		
		case 'atualiza':
		if(isset($_POST['ID'])){
				//$resultado = buscaTodasEstacoes();
				//echo json_encode($resultado);
		}
		break;

		case 'exclui':
		if(isset($_POST['ID'])){
				//$resultado = buscaTodasEstacoes();
				//echo json_encode($resultado);
		}
		break;
		
		
		default:
			# code...
		break;
	}

}else{
	
	

}

function criaVetorPrivado($resultado){
	$estacoes = array();

	foreach ($resultado as $estacao) {


		$temp = new Estacao($estacao['IDESTACAO'], $estacao['DESCR'], $estacao['LATITUDE'], $estacao['LONGITUDE'], $estacao['BAIRRO'], $estacao['REFERENCIA'], $estacao['ATIVO']);
		array_push($estacoes, $temp->jsonSerialize());
		
	}
	return $estacoes;
}


?>