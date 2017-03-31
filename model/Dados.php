<?php
require_once("ConexaoMysql.php");
Class classeDados{
	private $id_dados;
	private $email_user;
	private $email_pass;
	private $skype_user;
	private $skype_pass;
	private $totvs_user;
	private $totvs_pass;
	private $ocomon_user;
	private $ocomon_pass;
	private $net_user;
	private $net_pass;
	private $bloqueado;
	
	
	public function setId_dados($id_dados) {
	  $this->id_dados= $id_dados;
	}
	public function getId_dados() {
	  return $this->id_dados;
	}
	
	public function setEmail_user($email_user) {
	  $this->email_user= $email_user;
	}
	public function getEmail_user() {
	  return $this->email_user;
	}
	public function setEmail_pass($email_pass) {
	  $this->email_pass= $email_pass;
	}
	public function getEmail_pass() {
	  return $this->email_pass;
	}
	public function setSkype_user($skype_user) {
	  $this->skype_user= $skype_user;
	}
	public function getSkype_user() {
	  return $this->skype_user;
	}
	public function setSkype_pass($skype_pass) {
	  $this->skype_pass= $skype_pass;
	}
	public function getSkype_pass() {
	  return $this->skype_pass;
	}
	public function setTotvs_user($totvs_user) {
	  $this->totvs_user= $totvs_user;
	}
	public function getTotvs_user() {
	  return $this->totvs_user;
	}
	public function setTotvs_pass($totvs_pass) {
	  $this->totvs_pass= $totvs_pass;
	}
	public function getTotvs_pass() {
	  return $this->totvs_pass;
	}
	public function setOcomon_user($ocomon_user) {
	  $this->ocomon_user= $ocomon_user;
	}
	public function getOcomon_user() {
	  return $this->ocomon_user;
	}
	public function setOcomon_pass($ocomon_pass) {
	  $this->ocomon_pass= $ocomon_pass;
	}
	public function getOcomon_pass() {
	  return $this->ocomon_pass;
	}
	public function setNet_user($net_user) {
	  $this->net_user= $net_user;
	}
	public function getNet_user() {
	  return $this->net_user;
	}
	public function setNet_pass($net_pass) {
	  $this->net_pass= $net_pass;
	}
	public function getNet_pass() {
	  return $this->net_pass;
	}
	public function setBloqueado($bloqueado) {
	  $this->bloqueado= $bloqueado;
	}
	public function getBloqueado() {
	  return $this->bloqueado;
	}
	

	//METODOS DE BANCO
	//SELECT
    function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM dados;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT EMAIL
    function selecionaEmail($buscaEmail){
		$mySQL = new MySQL;
		if($buscaEmail == '*'){
			$buscaEmail='';
		}
		$rs = $mySQL->executeQuery("SELECT  nome,email_user FROM dados,	infousuario where email_user Like '%".$buscaEmail."%' and id_dados = id_usuario; ");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT ID
    function selecionaid($id_dados){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM dados where id_dados=$id_dados;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//DELETE
    function delete($id_dados){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from dados where id_dados = $id_dados");
		$mySQL->disconnect();
		return $rs;
    }
	
	function insert(){
        $mySQL = new MySQL;
		$sql = "Insert into dados (id_dados, email_user,email_pass,skype_user,skype_pass,totvs_user,totvs_pass, ocomon_user,ocomon_pass,net_user,net_pass,bloqueado) values 
		('$this->id_dados','$this->email_user','$this->email_pass', '$this->skype_user','$this->skype_pass','$this->totvs_user','$this->totvs_pass','$this->ocomon_user','$this->ocomon_pass','$this->net_user','$this->net_pass','$this->bloqueado')";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect();
		return $rs;
    }

	//UPDATE
    function update($id_dados){
        $mySQL = new MySQL;
		$sql = "update dados set email_user='$this->email_user',email_pass='$this->email_pass', skype_user='$this->skype_user',skype_pass='$this->skype_pass',totvs_user='$this->totvs_user',totvs_pass='$this->totvs_pass',
		ocomon_user='$this->ocomon_user',ocomon_pass='$this->ocomon_pass', net_user='$this->net_user',net_pass='$this->net_pass' where id_dados = $id_dados";
		$rs = $mySQL->executeQuery($sql);
		//echo $sql;
		$mySQL->disconnect();
		return $rs;
    }
	
}
?>