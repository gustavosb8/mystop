<?php

require_once('../funcoes/conexoes.php');

function buscaEstacaoPorID($id){
	$conexao = conectarMyStop();

	$sql = "SELECT * FROM tbestacao WHERE IDESTACAO = ".$id;
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $estacao = $select->fetch(PDO::FETCH_ASSOC);
 
    return $estacao;
}

function buscaEstacaoPorDescricao($nome){
	
}

function buscaEstacoesPorBairro($bairro){
    
    $conexao = conectarMyStop();

    $sql = "SELECT * FROM tbestacao where BAIRRO = :bairro";
 
    $select = $conexao->prepare($sql);

    $select->bindParam(':bairro', $bairro, PDO::PARAM_STR);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $paradas = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $paradas;
    
}

function buscaTodasEstacoes(){

	$conexao = conectarMyStop();

	$sql = "SELECT * FROM tbparada";
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $paradas = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $paradas;

}
?>