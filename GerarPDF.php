<?php
  $id = $_GET["id"];
	require_once("model/InfoUsuario.php");
	$info = new classeInfoUsuario(); 	
	$rs = $info->selecionaid($id);  
	while ($resultado2 = mysql_fetch_array($rs)){
		$nome = $resultado2["nome"];
		$cargo = $resultado2["cargo"];
		$codVendedor = $resultado2["codVendedor"];
		$depfilial = $resultado2["depfilial"];
		$admissao = $resultado2["admissao"];
	}
	require_once("model/Dados.php");
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
	require_once("model/Grupos.php");
	$grupos = new classeGrupos();
	$rs = $grupos->selecionaid($id);
	while($resultado1 = mysql_fetch_array($rs)){
		
		$gp1 = array ( "Grupo 1" => $resultado1["grupo1"], "Grupo 2" => $resultado1["grupo2"],"Grupo 3" => $resultado1["grupo3"], "Grupo 4" => $resultado1["grupo4"]);
		$gp2 = array ( "Grupo Poa" => $resultado1["grupopoa"], "Grupo Poa 2" => $resultado1["grupopoa2"],"Grupo Matriz" => $resultado1["grupomatriz"], "Grupo Matriz 2" => $resultado1["grupomatriz2"]);
		$gp3 = array ( "Gestores" => $resultado1["gestores"], "Gestores Poa" => $resultado1["gestorespoa"],"Gestores Matriz" => $resultado1["gestoresmatriz"]);
		$gp4 = array ( "Grupo Varejo" => $resultado1["grupovarejo"], "Grupo Atacado" => $resultado1["grupoatacado"],"Controle Diario" => $resultado1["controlediario"]);
	}




  define('MPDF_PATH', 'PDF/');
  include(MPDF_PATH.'mpdf.php');
  
  $mpdf=new mPDF();
  $mpdf->WriteHTML("
		<table border='1'>
			<tr>
				<td colspan='4' bgcolor='#C0C0C0'>
					<center>Informações do Colaborador</center>
				</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Nome</td>
				<td>".$nome."</td>
				<td bgcolor='#6495ED'>Cargo</td>
				<td>".$cargo."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Departamento/Filial</td>
				<td>".$depfilial."</td>
				<td bgcolor='#6495ED'>Admissao</td>
				<td>".$admissao."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Código Vendedor</td>
				<td>".$codVendedor."</td>
				<td bgcolor='#6495ED'></td>
				<td></td>
			</tr>
			<tr>
				<td colspan='4' bgcolor='#C0C0C0'>
					<center>Logins e Senhas</center>
				</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Email</td>
				<td>".$email_user."</td>
				<td bgcolor='#6495ED'>Senha</td>
				<td>".$email_pass."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Skype</td>
				<td>".$totvs_user."</td>
				<td bgcolor='#6495ED'>Senha</td>
				<td>".$skype_pass."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>TOTVS</td>
				<td>".$skype_user."</td>
				<td bgcolor='#6495ED'>Senha</td>
				<td>".$totvs_pass."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Ocomon</td>
				<td>".$ocomon_user."</td>
				<td bgcolor='#6495ED'>Senha</td>
				<td>".$ocomon_pass."</td>
			</tr>
			<tr>
				<td bgcolor='#6495ED'>Rede</td>
				<td>".$net_user."</td>
				<td bgcolor='#6495ED'>Senha</td>
				<td>".$net_pass."</td>
			</tr>
			<tr>
				<td colspan='4' bgcolor='#C0C0C0'>
					<center>Grupos de Email</center>
				</td>
			</tr>
			<tr>
		");
		
	foreach ($gp1 as $k => $v) {
		if($v == 1){
			$mpdf->WriteHTML("<td>$k</td>");
		}
	}
	$mpdf->WriteHTML("</tr><tr>");
		
	foreach ($gp2 as $k => $v) {
		if($v == 1){
			$mpdf->WriteHTML("<td>$k</td>");
		}
	}
	$mpdf->WriteHTML("</tr><tr>");
	
	foreach ($gp3 as $k => $v) {
		if($v == 1){
			$mpdf->WriteHTML("<td>$k</td>");
		}
	}
	$mpdf->WriteHTML("</tr><tr>");
	
	foreach ($gp4 as $k => $v) {
		if($v == 1){
			$mpdf->WriteHTML("<td>$k</td>");
		}
	}
	$mpdf->WriteHTML("</tr></table>");
	
	$mpdf->Output();
	exit();
?>
