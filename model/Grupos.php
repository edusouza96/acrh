<?php
require_once("ConexaoMysql.php");
Class classeGrupos{
	private $id_grupos;
	private $grupo1;
	private $grupo2;
	private $grupo3;
	private $grupo4;
	private $grupopoa;
	private $grupopoa2;
	private $grupomatriz;
	private $grupomatriz2;
	private $gestores;
	private $gestoresmatriz;
	private $gestorespoa;
	private $grupovarejo;
	private $grupoatacado;
	private $controlediario;
	
	
	public function setId_grupos($id_grupos) {
	  $this->id_grupos= $id_grupos;
	}
	public function getId_grupos() {
	  return $this->id_grupos;
	}
	
	public function setGrupo1($grupo1) {
	  $this->grupo1= $grupo1;
	}
	public function getGrupo1() {
	  return $this->grupo1;
	}
	public function setGrupo2($grupo2) {
	  $this->grupo2= $grupo2;
	}
	public function getGrupo2() {
	  return $this->grupo2;
	}
	public function setGrupo3($grupo3) {
	  $this->grupo3= $grupo3;
	}
	public function getGrupo3() {
	  return $this->grupo3;
	}
	public function setGrupo4($grupo4) {
	  $this->grupo4= $grupo4;
	}
	public function getGrupo4() {
	  return $this->grupo4;
	}
	public function setGrupopoa($grupopoa) {
	  $this->grupopoa= $grupopoa;
	}
	public function getGrupopoa() {
	  return $this->grupopoa;
	}
	public function setGrupopoa2($grupopoa2) {
	  $this->grupopoa2= $grupopoa2;
	}
	public function getGrupopoa2() {
	  return $this->grupopoa2;
	}
	public function setGrupomatriz($grupomatriz) {
	  $this->grupomatriz= $grupomatriz;
	}
	public function getGrupomatriz() {
	  return $this->grupomatriz;
	}
	public function setGrupomatriz2($grupomatriz2) {
	  $this->grupomatriz2= $grupomatriz2;
	}
	public function getGrupomatriz2() {
	  return $this->grupomatriz2;
	}
	public function setGestores($gestores) {
	  $this->gestores= $gestores;
	}
	public function getGestores() {
	  return $this->gestores;
	}
	public function setGestoresmatriz($gestoresmatriz) {
	  $this->gestoresmatriz= $gestoresmatriz;
	}
	public function getGestoresmatriz() {
	  return $this->gestoresmatriz;
	}
	public function setGestorespoa($gestorespoa) {
	  $this->gestorespoa= $gestorespoa;
	}
	public function getGestorespoa() {
	  return $this->gestorespoa;
	}
	public function setGrupovarejo($grupovarejo) {
	  $this->grupovarejo= $grupovarejo;
	}
	public function getGrupovarejo() {
	  return $this->grupovarejo;
	}
	public function setGrupoatacado($grupoatacado) {
	  $this->grupoatacado= $grupoatacado;
	}
	public function getGrupoatacado() {
	  return $this->grupoatacado;
	}
	
	public function setControlediario($controlediario) {
	  $this->controlediario= $controlediario;
	}
	public function getControlediario() {
	  return $this->controlediario;
	}

	//METODOS DE BANCO
	//SELECT
    function seleciona(){
		$mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM grupos;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//SELECT ID
    function selecionaid($id_grupos){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT * FROM grupos where id_grupos=$id_grupos;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//BUSCA GRUPO
    function selecionaGrupo($grupoEmail){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("SELECT nome,$grupoEmail,email_user FROM grupos, infousuario,dados where id_grupos = id_usuario and id_grupos = id_dados and $grupoEmail=1 ;");
		$mySQL->disconnect();
		return $rs;
    }
	
	//DELETE
    function delete($id_grupos){
        $mySQL = new MySQL;
		$rs = $mySQL->executeQuery("delete from grupos where id_grupos = $id_grupos");
		$mySQL->disconnect();
		return $rs;
    }
	
	function insert(){
        $mySQL = new MySQL;
		$sql = "Insert into grupos (id_grupos,grupo1,grupo2,grupo3,grupo4,grupopoa,grupopoa2, grupomatriz,grupomatriz2,gestores,gestoresmatriz,gestorespoa,grupovarejo,grupoatacado,controlediario) values 
		('$this->id_grupos','$this->grupo1','$this->grupo2', '$this->grupo3','$this->grupo4','$this->grupopoa','$this->grupopoa2','$this->grupomatriz','$this->grupomatriz2','$this->gestores','$this->gestoresmatriz','$this->gestorespoa','$this->grupovarejo','$this->grupoatacado', '$this->controlediario')";
		$rs = $mySQL->executeQuery($sql);
		$mySQL->disconnect();
		return $rs;
    }

	//UPDATE
    function update($id_grupos){
        $mySQL = new MySQL;
		$sql = "update grupos set id_grupos='$this->id_grupos',grupo1='$this->grupo1',grupo2='$this->grupo2', grupo3='$this->grupo3',grupo4='$this->grupo4',grupopoa='$this->grupopoa',grupopoa2='$this->grupopoa2',grupomatriz='$this->grupomatriz',
		grupomatriz2='$this->grupomatriz2', gestores='$this->gestores',gestoresmatriz='$this->gestoresmatriz',gestorespoa='$this->gestorespoa',grupovarejo='$this->grupovarejo',grupoatacado='$this->grupoatacado',controlediario='$this->controlediario' where id_grupos = $id_grupos";
		$rs = $mySQL->executeQuery($sql);
		//echo $sql;
		$mySQL->disconnect();
		return $rs;
    }
	
}
?>