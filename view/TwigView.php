<?php

require_once('./Twig/Autoloader.php');

abstract class TwigView{

	private static $twig;

	public static function getTwig(){

		if(!isset(self::$twig)){

			Twig_Autoloader::register();
			$loader= new Twig_Loader_Filesystem('./template');
			self::$twig=new Twig_Environment($loader);
			self::$twig->loadTemplate('template.html.twig');
		}return self::$twig;
	}
}
