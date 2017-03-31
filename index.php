<!DOCTYPE HTML>
<?php
	session_start();
	session_destroy();
	session_start();
?>
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>.:HOME:.</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<form name="login" action="loginTeste.php" method="post">
			<input type="hidden" name="classe" value="gerencia">
			<div id="geral">
				<div id="topo">
					Login			
				</div>
				<div id="formulario">
				<fieldset>
					<legend>Login</legend>
					<table>
						<tr>
							<td>Usuário</td>
							<td><input type="text" name="ssUsua"></td>
						</tr>
						<tr>
							<td>Senha</td>
							<td><input type="password" name="ssSen"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Acessar"></td>
						</tr>
					</table>
				</fieldset>
				</div>
				<div id="rodape">
					Desenvolvido pela equipe TI vitasons (Alexandre Rosário, Eduardo Souza, Gustavo Cesarino.)
				</div>
			</div>
		</form>
	</body>
</html>
<style>

			
				