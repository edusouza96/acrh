<?php
require_once("ConexaoMysql.php");
require_once("ocomon.php");
Class classeInfoUsuario{
	private $id_usuario;
	private $nome;
	private $depfilial;
	private $cargo;
	private $codVendedor;
	private $admissao;
	private $demissao;
	
	public function setId_usuario($id_usuario) {
	  $this->id_usuario= $id_usuario;
	}
	public function getId_usuario() {
	  return $this->id_usuario;
	}
	
	public function setNome($nome) {
	  $this->nome= $nome;
	}
	public function getNome() {
	  return $this->nome;
	}
	public function setDepfilial($depfilial) {
	  $this->depfilial= $depfilial;
	}
	public function getDepfilial() {
	  return $this->depfilial;
	}
	public function setCargo($cargo) {
	  $this->cargo= $cargo;
	}
	public function getCargo() {
	  return $this->cargo;
	}
	public function setCodVendedor($codVendedor) {
	  $this->codVendedor = $codVendedor;
	}
	public function getCodVendedor() {
	  return $this->codVendedor;
	}
	public function setAdmissao($admissao) {
	  $this->admissao= $admissao;
	}
	public function getAdmissao() {
	  return $this->admissao;
	}
	public function setDemissao($demissao) {
	  $this->demissao= $demissao;
	}
	public function getDemissao() {
	  return $this->demissao;
	}
	

	//METODOS DE BANCO
	//SELECT
    function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM infousuario;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT ID
    function selecionaid($id_usuario){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM infousuario where id_usuario=$id_usuario;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT USER
    function selecionaUsuario($buscaUser){
		$mySQL = new MySQL;
		if($buscaUser == '*'){
			$buscaUser='';
		}
		$rs = $mySQL->executeQuery("SELECT  * FROM infousuario where nome Like '%".$buscaUser."%' ;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//DELETE
    function delete($id_usuario){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from infousuario where id_usuario = $id_usuario");
		$mySQL->disconnect();
		return $rs;
    }
	
	function insert(){
        $mySQL1 = new MySQL1;
		$sqlOcomon = "INSERT INTO ocorrencias (problema, descricao,sistema,contato,telefone, local,data_abertura,operador,aberto_por,oco_scheduled) 
					VALUES ( 2, 'Criar Acessos/Bloquear',3, 'RH', '1956',6,now(),352,352,0)";
		$rsOcomon = $mySQL1->executeQuery($sqlOcomon);
		$mySQL1->disconnect();
		$mySQL = new MySQL;
		$sql = "Insert into infousuario (id_usuario, nome,depfilial,cargo,codVendedor,admissao,demissao) values 
								('$this->id_usuario','$this->nome','$this->depfilial', '$this->cargo', '$this->codVendedor', '$this->admissao','$this->demissao')";
		$rs = $mySQL->executeQuery($sql);
		
		$mySQL->disconnect();
		return $rs;
    }

	//UPDATE
    function update($id_usuario){
        $mySQL = new MySQL;
		$sql = "update infousuario set nome='$this->nome',depfilial='$this->depfilial', cargo='$this->cargo', codVendedor='$this->codVendedor',
								admissao='$this->admissao',demissao='$this->demissao' where id_usuario = $id_usuario";
		$rs = $mySQL->executeQuery($sql);
		//echo $sql;
		$mySQL->disconnect();
		return $rs;
    }
	
}
?>