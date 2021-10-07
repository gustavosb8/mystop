<?php 

require_once('funcoes/conexoes.php');

function buscaUsuarioPorID($id){
	$conexao = conectarMyStop();

	 $sql = "SELECT * FROM tbusuario WHERE ID = ".$id;
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $usuario = $select->fetch(PDO::FETCH_ASSOC);
 
    return $usuario;

}

function buscaUsuarioPorNome($nome){
	
}

function buscaTodosUsuarios(){

	$conexao = conectarMyStop();

	 $sql = "SELECT * FROM tbusuario";
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $usuarios = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $usuarios;

}



?>