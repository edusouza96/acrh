<?
error_reporting(0);
 session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:../index.php");
  }
	
 $grupoEmail = $_POST["grupoEmail"];
 if($grupoEmail!=""){
	require_once("../model/Grupos.php");
	$grupos =new classeGrupos(); 		
	$rs = $grupos->selecionaGrupo($grupoEmail);  	

 }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="windows-1252"> 
		<title>Lista Grupo</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estiloLista.css">
		<input type="hidden" name="classe" value="grupo">
		<div id="geral">
			<div id="topo">
				Lista Grupo
			</div>
			<div id="formulario">
				<a href="../Geral/HomeAdmin.php"><input type="button" class="voltar"></a>
				<form action="listaGrupo.php" method="post" name="listaGrupo">
					<table>
						<tr>
							<td>Buscar Grupo</td>
							<td>
								<select name="grupoEmail">
									<option value=''>Selecione</option>
									<option value='grupo1'>Grupo 1</option>
									<option value='grupo2'>Grupo 2</option>
									<option value='grupo3'>Grupo 3</option>
									<option value='grupo4'>Grupo 4</option>
									<option value='grupopoa'>Grupo Poa</option>
									<option value='grupopoa2'>Grupo Poa2</option>
									<option value='grupomatriz'>Grupo Matriz</option>
									<option value='grupomatriz2'>Grupo Matriz 2</option>
									<option value='gestores'>Gestores</option>
									<option value='gestoresmatriz'>Gestores Matriz</option>
									<option value='gestorespoa'>Gestores Poa</option>
									<option value='grupovarejo'>Grupo Varejo</option>
									<option value='grupoatacado'>Grupo Atacado</option>
									<option value='controlediario'>Controle Diario</option>
								</select>
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
								$nome = $resultado[0];
								$email = $resultado[2];
								echo "
									<tr>
										<td>$nome</td>
										<td>$email</td>										
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