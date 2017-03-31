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

require_once("../model/Gerencia.php");
$gerencia =new classeGerencia(); 		
$rs = $gerencia->seleciona();  	
?>
<html>
	<head>
		<meta charset="windows-1252"> 
		<title>Lista Gerenciadores</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estiloLista.css">
		<div id="geral">
			<div id="topo">
				Lista Gerenciadores
			</div>
			
			<div id="formulario">
				<input type="button" class="voltar" onClick="JavaScript: window.history.back();">
				<table  class="zebrar">
					<tr>
						<td>Usuario</td>
						<td>Senha</td>
						<td>Setor</td>
						<td>Alterar</td>
						<td>Deletar</td>
					</tr>
					<?php
						//laço de repetição para exibir os dados do banco na table
						while ($resultado = mysql_fetch_array($rs)){
							$id_gerencia = $resultado["id_gerencia"];
							$user = $resultado["user"];
							$password = $resultado["password"];
							$adminS = $resultado["admin"];
							if($adminS==1){
								$adminS = "TI";
							}else if ($adminS == 0){
								$adminS = "RH";
							}
							echo "
								<tr>
									<td>$user</td>
									<td>$password</td>
									<td>$adminS</td>
									<td><a href='alterarGerencia.php?id=$id_gerencia'><img src='../css/editar.png' /></a></td>
									<td><a href='../controller/valida.php?op=d&id=$id_gerencia&classe=gerencia'><img src='../css/deletar.png' /></a></td>
									
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