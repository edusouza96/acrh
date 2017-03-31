<?
error_reporting(0);
//administrador
 session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:HomeAdmin.php");
  }
 if($_SESSION["admin"] == 0){
	 header("location:../Geral/HomeAdmin.php");	
 }
$buscaUser = $_POST["buscaUser"];
if($buscaUser != ""){
	require_once("../model/InfoUsuario.php");
	$info =new classeInfoUsuario(); 		
	$rs = $info->selecionaUsuario($buscaUser);  	
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="windows-1252"> 
		<title>Lista Usuario</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estiloLista.css">
		<input type="hidden" name="classe" value="user">
		<div id="geral">
			<div id="topo">
				Lista Usuario
			</div>
			<div id="formulario">
				<a href="../Geral/HomeAdmin.php"><input type="button" class="voltar"></a>
				<form action="listaUsuarios.php" method="post" name="listaUsuario">
					<table>
						<tr>
							<td>Buscar Colaborador</td>
							<td><input type="text" name="buscaUser"></td>
							<td><input type="submit" value="Buscar"></td>
						</tr>
					</table>
				</form>
				<table   class="zebrar">
					<tr>
						<td>Nome Usuario</td>
						<td>Departamento</td>
						<td>Admissão</td>
						<td>Preencher Acessos</td>
						<td>Emitir PDF</td>
					</tr>
					<?php
						//laço de repetição para exibir os dados do banco na table
						while ($resultado = mysql_fetch_array($rs)){
							$id_usuario = $resultado["id_usuario"];
							$nome = $resultado["nome"];
							$depfilial = $resultado["depfilial"];
							$admissao = $resultado["admissao"];
							echo "
								<tr>
									<td>$nome</td>
									<td>$depfilial</td>
									<td>$admissao</td>
									<td><a href='cadastroDados.php?id=$id_usuario'><img src='../css/editar.png' /></a></td>
									<td><a href='../GerarPDF.php?id=$id_usuario'><img src='../css/gerar.gif' /></a></td>
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