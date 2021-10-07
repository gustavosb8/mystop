<?php 

require_once('../funcoes/conexoes.php');
require_once('../consultas/TBLINHA.php');

$server = (!empty($_SERVER['HTTP_HOST']) ? true : false);

$database = (!empty(buscaLinhaTesteAcesso()) ? true : false);

$connetion = (!is_null(conectarMyStop()) ? true : false);



function test($value){
	if($value){
		echo 'style="background-color: #48da488c;color: azure;" >ON';
	}else{
		echo 'style="background-color: #ff0018a3;color: azure;" >OFF';
	}
}


?>


<head>
	<title>MyStop</title>
	<link rel="shortcut icon" href="img/logo.png" />
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <style type="text/css">
 	.header{
 		text-align: center;
 		background-color: #9999cc;
 		border: 1px solid #666;

 	}

 	.text_intro{
 		color: azure;
 		padding-top: 2rem;
 		padding-bottom: 5%;

 </style>


<div class="container">
 <div style="display: flex;padding-left: 30%;" class="header">
 	<img style="width: 19%;" class="rounded" src="img/server.png">
 	<h3 class="text_intro">Your API is ONLINE!<br> Check the INFO:</h3><br><br>
 </div>

 <br>

 <table class="table">
 	<thead>
 		<th scope="col">Order</th>
 		<th scope="col">Serviço</th>
 		<th scope="col">Status</th>
 	</thead>
 	<tbody>
 		<tr>
 			<th scope="row">1</th>
 			<td>Server</td>
 			<td <?php test($server); ?></td>
 		</tr>
 		<tr>
 			<th scope="row">2</th>
 			<td>Database Access</td>
 			<td <?php test($database); ?></td>
 		</tr>
 		<tr>
 			<th scope="row">3</th>
 			<td>Database Connection</td>
 			<td <?php test($connetion); ?></td>
 		</tr>
 	</tbody>
 </table>
</div>
