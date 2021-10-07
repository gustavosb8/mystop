<?php

require_once('../funcoes/conexoes.php');

function buscaLinhaID($id){
	$conexao = conectarMyStop();

	$sql = "SELECT * FROM tblinha WHERE IDLINHA = ".$id;
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $linha = $select->fetch(PDO::FETCH_ASSOC);
 
    return $linha;
}

function buscaLinhaPorDescricao($nome){
	
}

function buscaTodasLinhas(){

	$conexao = conectarMyStop();

	$sql = "SELECT * FROM tblinha";
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $linhas = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $linhas;

}

function buscaLinhaTesteAcesso(){

    $conexao = conectarMyStop();

    $sql = "SELECT 1";
 
    $select = $conexao->prepare($sql);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $linhas = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $linhas;

}

function buscaLinhasPorEstacao($idOrigem, $idDestino){
    $conexao = conectarMyStop();

    $sql = "SELECT distinct tbl.* 
                FROM tb_estacao_linha tbel
                    INNER JOIN tblinha tbl ON (tbl.IDLINHA = tbel.IDLINHA)
                    INNER JOIN tbestacao tbe ON (tbe.IDESTACAO = tbel.IDESTACAO)
                WHERE tbe.IDESTACAO IN (:idOrigem, :idDestino)";
 
    $select = $conexao->prepare($sql);

    $select->bindParam(':idOrigem', $idOrigem, PDO::PARAM_INT);
    $select->bindParam(':idDestino', $idDestino, PDO::PARAM_INT);
 
    try{
 
        $select->execute();
 
    } catch (\PDOException $erro) {
 
        array_push($_SESSION['erros'], $erro->getMessage());
        echo $erro->getMessage();
        return array();
         
    }
 
    $linhas = $select->fetchAll(PDO::FETCH_ASSOC);
 
    return $linhas;
}
?>