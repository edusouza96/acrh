<?
	error_reporting(0);
	session_start();
	if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
		header("location:../index.php");
	}
  
// require_once("../model/InfoUsuario.php");
// $info =new classeInfoUsuario(); 		
// $rs = $info->seleciona();  	
 $buscaMail = $_POST["buscaMail"];
 if($buscaMail!=""){
	require_once("../model/Dados.php");
	$dados =new classeDados(); 		
	$rs = $dados->selecionaEmail($buscaMail);  	

 }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="windows-1252"> 
		<title>Lista Email</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estiloLista.css">
		<input type="hidden" name="classe" value="user">
		<div id="geral">
			<div id="topo">
				Lista Email
			</div>
			<div id="formulario">
				<a href="../Geral/HomeAdmin.php"><input type="button" class="voltar"></a>
				<form action="listaEmail.php" method="post" name="listaEmail">
					<table>
						<tr>
							<td>Buscar Email</td>
							<td><input type="text" name="buscaMail"></td>
							<td><input type="submit" value="Buscar"></td>
						</tr>
					</table>
				</form>
				
				<table   class="zebrar">
					<tr>
						<td>Nome</td>
						<td>Email</td>
					</tr>
					<?php
						
							//laço de repetição para exibir os dados do banco na table
							while ($resultado = mysql_fetch_array($rs)){
								$nome = $resultado["nome"];
								$email_user = $resultado["email_user"];
								echo "
									<tr>
										<td>$nome</td>
										<td>$email_user</td>
									</tr>
								";					  
							}
						
					 ?>
				</table>
			</div>
			<div id="rodape">
				Desenvolvido pela equipe TI vitasons (Alexandre Rosário, Eduardo Souza, Gustavo Cesarino.)
			</div>
		</div>
	</body>
</html>