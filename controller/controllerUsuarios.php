<?php 

	require_once('modelo/Usuario.php');
	require_once('funcoes/funcoes.php');
	require_once('consultas/TBUSUARIO.php');


	if(isset($_GET['getAllUser'])){

		$usuarios = buscaTodosUsuarios();
		
		//$array = getArrayUsuarios($usuarios);
	
			
		$json = json_encode($usuarios);

		print_r($json);
		
	}elseif(isset($_GET['user'])){

		$usuario = buscaUsuarioPorID(1);
		if($usuario){
			$usuario = new Usuario($usuario['ID'], $usuario['NOME'], $usuario['SEXO'], $usuario['EMAIL']);
			echo json_encode($usuario->jsonSerialize());
		}else{
			echo 'Não foi possivel encontrar usuario com este ID';
		}
	}else{
		erro_print(400, 'Recurso não encontrado');
	}

?>