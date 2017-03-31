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
		<title>.:HOME:.</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="" method="" name="home">  
			<div id="geral">
				<div id="topo">
					.::HOME::.			
				</div>
				<div id="formulario">
					<div id="menu">
						<?php
							include 'menu.php';
						?>
					</div>
				</div>
				<div id="rodape">
					Desenvolvido pela equipe TI vitasons (Alexandre Rosário, Eduardo Souza, Gustavo Cesarino.)
				</div>
			</div>
		</form>
	</body>
</html>
<style>