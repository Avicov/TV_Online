<?php

/**
* 
*/
class Canal 
{
	private $id;
	private $estado;
	private $imagen;
	private $numero;
	private $codigo;
	private $link;
	private $nombre;
	private $descripcion;
	
	function __construct($id,$est,$img,$num,$cod,$link,$nom,$desc)
	{
		$this->id=$id;
		$this->estado=$est;
		$this->imagen=$img;
		$this->numero=$num;
		$this->codigo=$cod;
		$this->link=$link;
		$this->nombre=$nom;
		$this->descripcion=$desc;
	}

	public function getId(){
		return $this->id;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function getCodigo(){
		return $this->codigo;
	}
	public function getLink(){
		return $this->link;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
}