<?php
session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:../index.php");
  }
?>
<!DOCTYPE HTML>
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>Cadastro do Colaborador </title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="..\controller\valida.php?op=i" method="post" name="infoInsert">
		<input type="hidden" name="classe" value="infoUsuario">  
			<div id="geral">
				<div id="topo">
					Cadastro do Colaborador			
				</div>
				<div id="formulario">
					<fieldset>
						<legend>Dados do Colaborador</legend>
						<table>
							<tr>
								<td>Nome</td>
								<td><input type="text" name="nome"></td>
							</tr>
							<tr>
								<td>Departamento\Filial</td>
								<td><input type="text" name="depfilial"></td>
							</tr>
							<tr>
								<td>Cargo</td>
								<td><input type="text" name="cargo"></td>
							</tr>
							<tr>
								<td>Código Vendedor</td>
								<td><input type="text" name="codVendedor"></td>
							</tr>
							<tr>
								<td>Admissão</td>
								<td><input type="date" name="admissao"></td>
							</tr>
						
						</table>
					</fieldset>
					<table  class="botoes">
						<tr>
							<td><input type="submit" class="enviar" value=""></td>
							<td><input type="button" class="cancelar" onClick="JavaScript: window.history.back();"><td>
						</tr>
					</table>
					
				</div>
				<div id="rodape">
					Desenvolvido pela equipe TI vitasons (Alexandre Rosário, Eduardo Souza, Gustavo Cesarino.)
				</div>
			</div>
		</form>
	</body>
</html>