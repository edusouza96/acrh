<?
 session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:HomeAdmin.php");
  }
 if($_SESSION["admin"] == 0){
	 header("location:../Geral/HomeAdmin.php");	
 }
 ?>
<!DOCTYPE HTML>
<?php
	$id = $_GET["id"];
	require_once("../model/Gerencia.php");
	$gerencia = new classeGerencia(); 	
	$rs = $gerencia->selecionaid($id);  
	while ($resultado = mysql_fetch_array($rs)){
		$user = $resultado["user"];
		$password = $resultado["password"];
		$adminS = $resultado["admin"];
		
		
	}
?>
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>Atualização de Usuarios Gerenciadores</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="..\controller\valida.php?op=u" method="post" name="gerenciaUpdate">
		<input type="hidden" name="classe" value="gerencia">  
		<input type="hidden" name="id_gerencia" value="<?=$id;?>">  
			<div id="geral">
				<div id="topo">
					Atualização de Usuarios Gerenciadores				
				</div>
				<div id="formulario">
				
				<fieldset>
						<legend>Atualizar </legend>
					<table>
						<tr>
							<td>Nome de Usuario</td>
							<td><input type="text" name="user" value="<?=$user;?>" ></td>
						</tr>
						<tr>
							<td>Senha</td>
							<td><input type="password" name="password" value="<?=$password;?>"></td>
						</tr>
						<tr>
							<td>Setor</td>
							<td>
								<input type="radio" name="admin" value="1" <? if($adminS == 1) echo "checked"; ?>/> TI<br />
								<input type="radio" name="admin" value="0" <? if($adminS == 0) echo "checked"; ?> /> RH<br />
							</td>
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