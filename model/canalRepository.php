<?php

class CanalRepository extends PDORepository{

	private static $instance;

	public static function getInstance(){
		if(!self::$instance){
			self::$instance=new self();
		}return self::$instance;
	}

	public function getCanalByNro($nro){
		$mapper=function($row){
      		$resource=new Canal($row['id_canales'],$row['estado'],$row['imagen'],$row['numero'],$row['codigo'],$row['link'],$row['nombre'],$row['descripcion']);
      		return $resource;
    	};
    	$answer=$this->queryList("SELECT * FROM canales WHERE numero=?",[$nro],$mapper);
    	return $answer[0];
	}

	public function getListNros(){
		$answer=$this->queryInnerList(
			"SELECT numero FROM canales ORDER BY numero ASC",[]);
		return $answer;
	}
	public function getListNrosDesc(){
		$answer=$this->queryInnerList(
			"SELECT numero FROM canales ORDER BY numero DESC",[]);
		return $answer;
	}

	public function getLastCanal(){
		$answer=$this->queryInnerList(
			"SELECT ultimoNro FROM ultimo",[]);
		return $answer;
	}
}