<?php
require_once("ConexaoMysql.php");
Class classeGerencia{
	private $id_gerencia;
	private $user;
	private $password;
	private $admin;	
	
	public function setId_gerencia($id_gerencia) {
	  $this->id_gerencia= $id_gerencia;
	}
	public function getId_gerencia() {
	  return $this->id_gerencia;
	}
	
	public function setUser($user) {
	  $this->user= $user;
	}
	public function getUser() {
	  return $this->user;
	}
	public function setPassword($password) {
	  $this->password= $password;
	}
	public function getPassword() {
	  return $this->password;
	}
	public function setAdmin($admin) {
	  $this->admin= $admin;
	}
	public function getAdmin() {
	  return $this->admin;
	}

	//METODOS DE BANCO
	//SELECT
    function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM gerencia;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT ID
    function selecionaid($id_gerencia){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM gerencia where id_gerencia=$id_gerencia;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//DELETE
    function delete($id_gerencia){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from gerencia where id_gerencia = $id_gerencia");
		$mySQL->disconnect();
		return $rs;
    }
	
	function insert(){
        $mySQL = new MySQL;
		$sql = "Insert into gerencia (id_gerencia,user,password,admin) values ('$this->id_gerencia','$this->user','$this->password', '$this->admin')";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect();
		return $rs;
    }

	//UPDATE
    function update($id_gerencia){
        $mySQL = new MySQL;
		$sql = "update gerencia set id_gerencia='$this->id_gerencia',user='$this->user',password='$this->password', admin='$this->admin' where id_gerencia = $id_gerencia";
		$rs = $mySQL->executeQuery($sql);
		//echo $sql;
		$mySQL->disconnect();
		return $rs;
    }
	
	//Logar
	function logar($usuario,$senha){
	    $mySQL = new MySQL;
		$sql = "select user, password,admin from gerencia where BINARY  user = '$usuario' and password = '$senha'";
		$rs = $mySQL->executeQuery($sql);
		echo $sql;
		$mySQL->disconnect();
		return $rs;
    }

}
?>