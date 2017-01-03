<?php

/**
* 
*/
class Ultimo 
{
	private $ultimoNro;

	function __construct($nro)
	{
		$this->ultimoNro=$nro;
	}

	public function getUltimoNro(){
		return $this->ultimoNro;
	}
}