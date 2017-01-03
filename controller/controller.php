<?php

class Controller
{
  private static $instance;
  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance=new self();
    }return self::$instance;
  }
  function __construct()
  {
    # code...
  }
  public function index(){
    $view= new View();
    $canal=CanalRepository::getInstance()->getCanalByNro(14);
    $view->showIndex($canal);
  }
  public function siguiente(){
    $view=new View();
    $nros=CanalRepository::getInstance()->getListNros();
    $nroCanal=UltimoRepository::getInstance()->getUltimo()->getUltimoNro();
    $num=$nroCanal;
    foreach ($nros as $key => $value) {
        if($value['numero']==$num){
          if(sizeof($nros)-1 != $key){
            $nroCanal=$nros[$key+1]['numero'];
          }
        }
    }
    $canal=CanalRepository::getInstance()->getCanalByNro($nroCanal);
    UltimoRepository::getInstance()->actualizarUlt($nroCanal);
    $view->showIndex($canal);
  }
  public function anterior(){
    $view=new View();
    $nros=CanalRepository::getInstance()->getListNrosDesc();
    $nroCanal=UltimoRepository::getInstance()->getUltimo()->getUltimoNro();
    $num=$nroCanal;
    foreach ($nros as $key => $value) {
        if($value['numero']==$num){
          if(sizeof($nros)-1 != $key){
            $nroCanal=$nros[$key+1]['numero'];
          }
        }
    }
    $canal=CanalRepository::getInstance()->getCanalByNro($nroCanal);
    UltimoRepository::getInstance()->actualizarUlt($nroCanal);
    $view->showIndex($canal);
  }
  public function indexAdmin(){
    $view= new View();
    $view->showIndexAdmin();
  }
  public function controlRemoto(){
    $view= new View();
    $view->showControl();
  }
}
