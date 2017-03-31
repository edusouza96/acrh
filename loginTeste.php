<?php

session_start();
$ssUsua = $_POST["ssUsua"];
$ssSen = $_POST["ssSen"];
require_once("model/Gerencia.php");

$con=new ClasseGerencia(); //Instancia a class

$rs = $con->logar($ssUsua,$ssSen);  //Seleciona
while ($resultado = mysql_fetch_array($rs)){
	$ssAdmin = $resultado["admin"];
	$_SESSION["usuario"] =  $resultado["user"];
	$_SESSION["senha"] =  $resultado["password"];
}
$_SESSION["admin"] = $ssAdmin;

if($_SESSION["usuario"]==null || $_SESSION["senha"]==null){
	 header("location:index.php");
}else{

	 if($ssAdmin == 1){
		 header("location:../acrh/Geral/HomeAdmin.php");
	 }else if($ssAdmin == 0){
		 header("location:../acrh/Geral/HomeAdmin.php");
	 }else{
		 header("location:index.php");
	 }
}

?>