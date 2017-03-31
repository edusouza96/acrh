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
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>Cadastro de Usuarios Gerenciadores</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="..\controller\valida.php?op=i" method="post" name="gerenciaInsert">
		<input type="hidden" name="classe" value="gerencia">  
			<div id="geral">
				<div id="topo">
					Cadastro de Usuarios Gerenciadores				
				</div>
				<div id="formulario">
				
				<fieldset>
					<legend>Cadastro</legend>
					<table>
						<tr>
							<td>Nome de Usuario</td>
							<td><input type="text" name="user"></td>
						</tr>
						<tr>
							<td>Senha</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td>Setor</td>
							<td>
								<input type="radio" name="admin" value="1"/> TI<br />
								<input type="radio" name="admin" value="0"/> RH<br />
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