<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
error_reporting(true);

$url = $_SERVER['REQUEST_URI'];

//var_dump($_SERVER['REQUEST_URI']);

if(strstr($url, '?')){

	$url = explode('?', $url);
	$pagina = explode('/', $url[0]);

	$_SESSION['url'] = $url[0];
	$_SESSION['pagina'] = $pagina;
	$_SESSION['absolute_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$pagina[1].'/';

}else{
    if($pagina[1] === ""){
        
	    $pagina = explode('/', $url);

    	$_SESSION['url'] = $url;
	    $_SESSION['pagina'] = $pagina;
	    $_SESSION['absolute_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$pagina[1].'/';
    }else{
        
	    $pagina = explode('/', $url);
    
	    $_SESSION['url'] = $url;
	    $_SESSION['pagina'] = $pagina;
	    $_SESSION['absolute_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$pagina[1];
    }
    

}


if(empty($pagina[1])){

	require_once('../aplicacao/index.php');
}else{

	require_once('../controller/controller.php');
}

?>