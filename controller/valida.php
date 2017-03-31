<?php
$classe = $_POST["classe"];
$classeGet = $_GET["classe"];
if($classeGet =='gerencia'){
	gerencia();
}
switch($classe){
	case 'gerencia':
		gerencia();
		break;
	case 'dados_grupos':
		dados_grupos();
		break;
	case 'grupos':
		grupos();
		break;
	case 'infoUsuario':
		infoUsuario();
		break;
	
}



function crud($objeto,$id){
	$op = $_GET["op"];
	if ($op=="i"){
		$i = $objeto->insert();
		header("location:../Geral/HomeAdmin.php");
	}elseif ($op=="u"){
		$i = $objeto->update($id);
		header("location:../Geral/HomeAdmin.php");
	}elseif($op=="d"){
		$id = $_GET["id"];
		$i = $objeto->delete($id);
		header("location:../Admin/listaGerencia.php");
	}
}
function gerencia(){
	require "../model/Gerencia.php";
	$id_gerencia = $_POST["id_gerencia"];
	$user = $_POST["user"];
	$password = $_POST["password"];
	$admin = $_POST["admin"];
		
	$gerencia = new classeGerencia;
	$gerencia->setId_gerencia($id_gerencia);
	$gerencia->setUser($user);
	$gerencia->setPassword($password);
	$gerencia->setAdmin($admin);
	crud($gerencia,$id_gerencia);
	
}
function dados_grupos(){
	require "../model/Dados.php";
	$id_dados = $_POST["id_dados_grupos"];
	$email_user = $_POST["email_user"];
	$email_pass = $_POST["email_pass"];
	$skype_user = $_POST["skype_user"];
	$skype_pass = $_POST["skype_pass"];
	$totvs_user = $_POST["totvs_user"];
	$totvs_pass = $_POST["totvs_pass"];
	$ocomon_user = $_POST["ocomon_user"];
	$ocomon_pass = $_POST["ocomon_pass"];
	$net_user = $_POST["net_user"];
	$net_pass = $_POST["net_pass"];
	$bloqueado = $_POST["bloqueado"];
		
	$dados = new classeDados;
	$dados->setId_dados($id_dados);
	$dados->setEmail_user($email_user);
	$dados->setEmail_pass($email_pass);
	$dados->setSkype_user($skype_user);
	$dados->setSkype_pass($skype_pass);
	$dados->setTotvs_user($totvs_user);
	$dados->setTotvs_pass($totvs_pass);
	$dados->setOcomon_user($ocomon_user);
	$dados->setOcomon_pass($ocomon_pass);
	$dados->setNet_user($net_user);
	$dados->setNet_pass($net_pass);
	crud($dados,$id_dados);
	

	require "../model/Grupos.php";
	$id_grupos = $_POST["id_dados_grupos"];;
	$grupo1 = $_POST["grupo1"];
	$grupo2 = $_POST["grupo2"];
	$grupo3 = $_POST["grupo3"];
	$grupo4 = $_POST["grupo4"];
	$grupopoa = $_POST["grupopoa"];
	$grupopoa2 = $_POST["grupopoa2"];
	$grupomatriz = $_POST["grupomatriz"];
	$grupomatriz2 = $_POST["grupomatriz2"];
	$gestores = $_POST["gestores"];
	$gestoresmatriz = $_POST["gestoresmatriz"];
	$gestorespoa = $_POST["gestorespoa"];
	$grupovarejo = $_POST["grupovarejo"];
	$grupoatacado = $_POST["grupoatacado"];
	$controlediario = $_POST["controlediario"];
		
	$grupos = new classeGrupos;
	$grupos->setId_grupos($id_grupos);
	$grupos->setGrupo1($grupo1);
	$grupos->setGrupo2($grupo2);
	$grupos->setGrupo3($grupo3);
	$grupos->setGrupo4($grupo4);
	
	$grupos->setGrupopoa($grupopoa);
	$grupos->setGrupopoa2($grupopoa2);
	$grupos->setGrupomatriz($grupomatriz);
	$grupos->setGrupomatriz2($grupomatriz2);
	
	$grupos->setGestores($gestores);
	$grupos->setGestoresmatriz($gestoresmatriz);
	$grupos->setGestorespoa($gestorespoa);
	
	$grupos->setGrupovarejo($grupovarejo);
	$grupos->setGrupoatacado($grupoatacado);
	$grupos->setControlediario($controlediario);
	
	crud($grupos,$id_grupos);
	
}
function infoUsuario(){
	require "../model/InfoUsuario.php";
	$id_usuario = $_POST["id_usuario"];
	$nome = $_POST["nome"];
	$depfilial = $_POST["depfilial"];
	$cargo = $_POST["cargo"];
	$codVendedor = $_POST["codVendedor"];
	$admissao = $_POST["admissao"];
	$demissao = $_POST["demissao"];
		
	$info = new classeInfoUsuario;
	$info->setId_usuario($id_usuario);
	$info->setNome($nome);
	$info->setDepfilial($depfilial);
	$info->setCargo($cargo);
	$info->setCodVendedor($codVendedor);
	$info->setAdmissao($admissao);
	$info->setDemissao($demissao);
	crud($info,$id_usuario);
	
}
/*
INSERT INTO ocorrencias ('problema', 'descricao','sistema','contato','telefone', 'local','data_abertura','operador', 'aberto_por','oco_schedule') 
	VALUES
( 2, 'Criar Acessos/Bloquear',3, 'RH', '1956',6,TIMESTAMP,352,352,0)

*/
?>  


