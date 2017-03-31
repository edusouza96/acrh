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
	require_once("../model/Dados.php");
	$dados = new classeDados(); 	
	$rs = $dados->selecionaid($id);  
	while ($resultado = mysql_fetch_array($rs)){
		$email_user = $resultado["email_user"];
		$email_pass = $resultado["email_pass"];
		$totvs_user = $resultado["totvs_user"];
		$totvs_pass = $resultado["totvs_pass"];
		$skype_user = $resultado["skype_user"];
		$skype_pass = $resultado["skype_pass"];
		$ocomon_user = $resultado["ocomon_user"];
		$ocomon_pass = $resultado["ocomon_pass"];
		$net_user = $resultado["net_user"];
		$net_pass = $resultado["net_pass"];
	}
	
	require_once("../model/Grupos.php");
	$grupos = new classeGrupos();
	$rs = $grupos->selecionaid($id);
	while($resultado1 = mysql_fetch_array($rs)){
		$grupo1 = $resultado1["grupo1"];
		$grupo2 = $resultado1["grupo2"];
		$grupo3 = $resultado1["grupo3"];
		$grupo4 = $resultado1["grupo4"];
		$grupopoa = $resultado1["grupopoa"];
		$grupopoa2 = $resultado1["grupopoa2"];
		$grupomatriz = $resultado1["grupomatriz"];
		$grupomatriz2 = $resultado1["grupomatriz2"];
		$gestores = $resultado1["gestores"];
		$gestoresmatriz = $resultado1["gestoresmatriz"];
		$gestorespoa = $resultado1["gestorespoa"];
		$grupovarejo = $resultado1["grupovarejo"];
		$grupoatacado = $resultado1["grupoatacado"];
		$controlediario = $resultado1["controlediario"];
		
		
	}
?>
<html  lang="pt-br">
	<head>
		<meta charset="windows-1252"> 
		<title>Cadastro de Acessos</title>
	</head>

	<body>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<form action="..\controller\valida.php?op=u" method="post" name="dadosInsert">
		<input type="hidden" name="classe" value="dados_grupos">  
			<div id="geral">
				<div id="topo">
					Cadastro de Acessos				
				</div>
				<div id="formulario">
				
					<input type="hidden" name="id_dados_grupos" value="<?=$id;?>">
					<fieldset>
						<table>
							<legend>Acessos</legend>
							<tr>
								<td>Email</td>
								<td><input type="text" name="email_user" value="<?=$email_user;?>"></td>
								<td></td>
								<td>Senha</td>
								<td><input type="password" name="email_pass" value="<?=$email_pass;?>"></td>
							</tr>
							<tr>
								<td>TOTVS</td>
								<td><input type="text" name="totvs_user" value="<?=$totvs_user;?>"></td>
								<td></td>
								<td>Senha</td>
								<td><input type="password" name="totvs_pass" value="<?=$totvs_pass;?>"></td>
							</tr>
							<tr>
								<td>Skype</td>
								<td><input type="text" name="skype_user" value="<?=$skype_user;?>"></td>
								<td></td>
								<td>Senha</td>
								<td><input type="password" name="skype_pass" value="<?=$skype_pass;?>"></td>
							</tr>
							<tr>
								<td>Ocomon</td>
								<td><input type="text" name="ocomon_user" value="<?=$ocomon_user;?>"></td>
								<td></td>
								<td>Senha</td>
								<td><input type="password" name="ocomon_pass" value="<?=$ocomon_pass;?>"></td>
							</tr>
							<tr>
								<td>Rede</td>
								<td><input type="text" name="net_user" value="<?=$net_user;?>"></td>
								<td></td>
								<td>Senha</td>
								<td><input type="password" name="net_pass" value="<?=$net_pass;?>"></td>
							</tr>
						</table>	
					</fieldset>	
					<fieldset>	
						<table>	
							<legend>Grupos</legend>
							
							<tr>
								<td><INPUT TYPE="checkbox" NAME="grupo1" VALUE="1" <? if($grupo1 == 1) echo "checked"; ?>> Grupo 1</td>
								<td><INPUT TYPE="checkbox" NAME="grupomatriz" VALUE="1" <? if($grupomatriz == 1) echo "checked"; ?> > Grupo Matriz</td>
								<td><INPUT TYPE="checkbox" NAME="controlediario" VALUE="1" <? if($controlediario ==1) echo "checked"; ?>> Controle Diario</td>
								<td><INPUT TYPE="checkbox" NAME="gestores" VALUE="1" <? if($gestores == 1) echo "checked"; ?>> Gestores</td>
								
							</tr>
							<tr>
								<td><INPUT TYPE="checkbox" NAME="grupo2" VALUE="1" <? if($grupo2 == 1) echo "checked"; ?>> Grupo 2</td>
								<td><INPUT TYPE="checkbox" NAME="grupomatriz2" VALUE="1" <? if($grupomatriz2 == 1) echo "checked"; ?>> Grupo Matriz 2</td>
								<td><INPUT TYPE="checkbox" NAME="grupoatacado" VALUE="1" <? if($grupoatacado == 1) echo "checked"; ?>> Grupo Atacado</td>
								<td><INPUT TYPE="checkbox" NAME="gestoresmatriz" VALUE="1" <? if($gestoresmatriz == 1) echo "checked"; ?>> Gestores Matriz</td>
								
							</tr>
							<tr>
								<td><INPUT TYPE="checkbox" NAME="grupo3" VALUE="1" <? if($grupo3 == 1) echo "checked"; ?>> Grupo 3</td>
								<td><INPUT TYPE="checkbox" NAME="grupopoa" VALUE="1" <? if($grupopoa == 1) echo "checked"; ?>> Grupo Poa</td>
								<td><INPUT TYPE="checkbox" NAME="grupovarejo" VALUE="1" <? if($grupovarejo == 1) echo "checked"; ?>> Grupo Varejo</td>
								<td><INPUT TYPE="checkbox" NAME="gestorespoa" VALUE="1" <? if($gestorespoa == 1) echo "checked"; ?>> Gestores Poa</td>
							</tr>
							<tr>
								<td><INPUT TYPE="checkbox" NAME="grupo4" VALUE="1" <? if($grupo4 == 1) echo "checked"; ?>> Grupo 4</td>
								<td><INPUT TYPE="checkbox" NAME="grupopoa2" VALUE="1" <? if($grupopoa2 == 1) echo "checked"; ?>> Grupo Poa 2</td>
							</tr>	
						
						</table>
					</fieldset>
					<table class="botoes">
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