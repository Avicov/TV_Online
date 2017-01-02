<?php

/**
* 
*/
class View extends TwigView
{
	public function showIndex($resource){
		echo self::getTwig()->render('inicio.html.twig',array('canales'=>$resource));
	}
	public function showIndexAdmin(){
		echo self::getTwig()->render('admin.html.twig');
	}
	public function showControl(){
		echo self::getTwig()->render('control_remoto.html.twig');
	}
}