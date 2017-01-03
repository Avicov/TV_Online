<?php

class UltimoRepository extends PDORepository{

	private static $instance;

	public static function getInstance(){
		if(!self::$instance){
			self::$instance=new self();
		}return self::$instance;
	}

	public function getUltimo(){
		$mapper=function($row){
			$resource=new Ultimo($row['ultimoNro']);
			return $resource;
		};
		$answer=$this->queryList(
			"SELECT ultimoNro FROM ultimo",[],$mapper);
		return $answer[0]; 
	}

	public function actualizarUlt($nro){
		$answer=$this->queryExecute(
			"UPDATE ultimo SET ultimoNro=? WHERE id_ultimo=?",[$nro,1]);
		return $answer;
	}
}