<?php

require_once('controller/controller.php');
require_once('model/PDORepository.php');
require_once('model/canal.php');
require_once('model/canalRepository.php');
require_once('model/ultimo.php');
require_once('model/ultimoRepository.php');
require_once('view/TwigView.php');
require_once('view/View.php');

if(isset($_GET['action'])&&$_GET['action']=='arriba'){
	Controller::getInstance()->siguiente();
}
elseif(isset($_GET['action'])&&$_GET['action']=='abajo'){
	Controller::getInstance()->anterior();
}else{
	Controller::getInstance()->index();
}

/*
print_r(CanalRepository::getInstance()->getListNros());
foreach (CanalRepository::getInstance()->getListNros() as $key => $value) {
		print_r(CanalRepository::getInstance()->getListNros()[$key]['numero']);
        echo $value['numero'];
    }
  print_r(UltimoRepository::getInstance()->getUltimo()->getUltimoNro());*/
 // UltimoRepository::getInstance()->actualizarUlt(20);