<!DOCTYPE HTML>
<?php
  session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:../index.php");
  }
	$id = $_GET["id"];
	require_once("../model/InfoUsuario.php");
	$info = new classeInfoUsuario(); 	
	$rs = $info->selecionaid($id);  
	while ($resultado = mysql_fetch_array($rs)){
		$nome = $resultado["nome"];
		$depfilial = $resultado["depfilial"];
		$cargo = $resultado["cargo"];
		$codVendedor = $resultado["codVendedor"];
		$admissao = $resultado["admissao"];
		$demissao = $resultado["demissao"];
		
	}
?>
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>Atualização do Colaborador </title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="..\controller\valida.php?op=u" method="post" name="infoUpdate">
		<input type="hidden" name="classe" value="infoUsuario">  
		<input type="hidden" name="id_usuario" value="<?=$id;?>">
			<div id="geral">
				<div id="topo">
					Atualização do Colaborador			
				</div>
				<div id="formulario">
					
				<fieldset>
					<legend>Atualizar do Colaborador</legend>
					<table>
						<tr>
							<td>Nome</td>
							<td><input type="text" name="nome" value="<?=$nome;?>"></td>
						</tr>
						<tr>
							<td>Departamento\Filial</td>
							<td><input type="text" name="depfilial" value="<?=$depfilial;?>"></td>
						</tr>
						<tr>
							<td>Cargo</td>
							<td><input type="text" name="cargo" value="<?=$cargo;?>"></td>
						</tr>
						<tr>
							<td>Código Vendedor</td>
							<td><input type="text" name="codVendedor" value="<?=$codVendedor;?>"></td>
						</tr>
						<tr>
							<td>Admissão</td>
							<td><input type="date" name="admissao" value="<?=$admissao;?>"></td>
						</tr>
						<tr>
							<td>Demissão</td>
							<td><input type="date" name="demissao" value="<?=$demissao;?>"></td>
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