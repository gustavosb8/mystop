<?php 

$pagina = $_SESSION['pagina'];

switch ($pagina[1]) {
	case 'linhas':
	require_once('controllerLinha.php');
	break;

	case 'estacoes':
	require_once('controllerEstacao.php');
	break;

	case 'teste':
	require_once('../aplicacao/teste.php');
	break;

	default:
	require_once('../aplicacao/404.php');
	break;
}
	/*
	require_once('modelo/Linha.php');
	require_once('funcoes/funcoes.php');
	require_once('consultas/TBLINHA.php');

	if(isset($_POST['operacao'])){
		echo $_POST['operacao'].'<br>';
	}

	if(isset($_POST['user']) && isset($_POST['pass'])){
		$linha = new Linha($_POST['user'], $_POST['pass']);
		echo json_encode($linha->jsonSerialize());
	}

	/*
	if(false)){

		$paradas = buscaTodasParadas();

		//$array = getArrayParadas($paradas);
		

		$json = json_encode($paradas);

		print_r($json);

		
	}elseif(false)){
		$resultado = buscaLinhaPorID(1);
		if($resultado){
			$linha = new Linha($resultado['ID'], $resultado['DESCR']);
			echo json_encode($linha->jsonSerialize());
		}else{
			echo 'Não foi possivel encontrar linha com este ID';
		}
	}else{
		//erro_print(400, 'Recurso não encontrado');
	}
	*/
?>