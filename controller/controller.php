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
  public function siguiente($nro){
    $view=new View();
    $nros=CanalRepository::getInstance()->getListNros();
    $nroCanal=$nro;
    foreach ($nros as $key => $value) {
        if($value['numero']==$nro){
          $nroCanal=$nros[$key+1]['numero'];
        }
    }
    $canal=CanalRepository::getInstance()->getCanalByNro($nroCanal);
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
