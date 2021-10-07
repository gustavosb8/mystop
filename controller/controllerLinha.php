<?php 
require_once('../modelo/Linha.php');
require_once('../funcoes/funcoes.php');
require_once('../funcoes/api.php');
require_once('../consultas/TBLINHA.php');


if(isset($_GET['operacao']) && !empty($_GET['operacao'])){
	
	switch ($_GET['operacao']) {
		case 'buscaPorID':
		if(isset($_GET['id'])){
			$resultado = buscaLinhaID($_GET['id']);
			$linha = new Linha($resultado['IDLINHA'], $resultado['DESCR']);
			echo json_encode($linha->jsonSerialize(), JSON_UNESCAPED_UNICODE);
		}
		break;

		case 'buscaTodos':
			$resultado = buscaTodasLinhas();
			//var_dump(criaVetorPrivado($resultado));
			echo json_encode(criaVetorPrivado($resultado), JSON_UNESCAPED_UNICODE);
		break;

		case 'buscaPorEstacao':
			if (isset($_GET['estacaoOrigem']) && isset($_GET['estacaoDestino']) 
				&& !empty($_GET['estacaoOrigem']) && !empty($_GET['estacaoDestino'])) {
				//$resultado = buscaLinhasPorEstacao($_GET['estacaoOrigem']), $_GET['estacaoDestino']));
				$resultado = buscaLinhasPorEstacao(1,2);
				echo json_encode(criaVetorPrivado($resultado), JSON_UNESCAPED_UNICODE);
			}else{
				echo 'Erro';
			}
		break;

		
		case 'atualiza':
			if(isset($_GET['ID'])){
				//$resultado = buscaTodasLinhas();
				//echo json_encode($resultado);
			}
		break;

		case 'exclui':
			if(isset($_GET['ID'])){
				//$resultado = buscaTodasLinhas();
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
			$resultado = buscaLinhaID($_POST['id']);
			$linha = new Linha($resultado['IDLINHA'], $resultado['DESCR']);
			echo json_encode($linha->jsonSerialize(), JSON_UNESCAPED_UNICODE);
		}
		break;

		case 'buscaTodos':
			$resultado = buscaTodasLinhas();
			echo json_encode(criaVetorPrivado($resultado), JSON_UNESCAPED_UNICODE);
		
		break;

		
		case 'atualiza':
			if(isset($_POST['ID'])){
				//$resultado = buscaTodasLinhas();
				//echo json_encode($resultado);
			}
		break;

		case 'exclui':
			if(isset($_POST['ID'])){
				//$resultado = buscaTodasLinhas();
				//echo json_encode($resultado);
			}
		break;
		
		
		default:
			# code...
		break;
	}
	
}else{
	
	echo 'TESTE';
	//$resultado = buscaTodasLinhas();
	//echo json_encode(criaVetorPrivado($resultado));
	
	
	//echo calcDistancia(-2.53388400, -44.16794400, -2.529769, -44.238788);
	//echo '<br>';
	//echo calcDistancia(-2.53388400, -44.16794400, -2.522546, -44.248808);

}

function criaVetorPrivado($resultado){
	$linhas = array();

	foreach ($resultado as $linha) {
		$temp = new Linha($linha['IDLINHA'], $linha['DESCR']);
		array_push($linhas, $temp->jsonSerialize());
	}
	return $linhas;
}
?>