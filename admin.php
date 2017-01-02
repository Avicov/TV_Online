<?php

require_once('controller/controller.php');
require_once('view/TwigView.php');
require_once('view/View.php');

function esAction($accion){
    if(isset($_GET["action"]) && $_GET["action"] == $accion){
      return TRUE;
    }else{
      return FALSE;
    }
}
if(esAction('control')){
    Controller::getInstance()->controlRemoto();
}else{
	Controller::getInstance()->indexAdmin();
}