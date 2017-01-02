<?php
/**
 *
 */
//debe ser abstracta.
class PDORepository
{
  const USUARIO="root";
  const PASSWORD="";
  const HOST="localhost";
  const DB="tvbd";

  private function getConnection(){
    $u=self::USUARIO;
    $p=self::PASSWORD;
    $h=self::HOST;
    $d=self::DB;
    $connection=new PDO("mysql:dbname=$d;host=$h",$u,$p);
    return $connection;
  }

  public function queryList($sql,$args,$mapper){
    $conexion=$this->getConnection();
    $stmt=$conexion->prepare($sql);
    $stmt->execute($args);
    $list=[];
    while($elem=$stmt->fetch()){
      $list[]=$mapper($elem);
    }return $list;
  }
   public function queryExecute($sql,$args){
    $conexion=$this->getConnection();
    $stmt=$conexion->prepare($sql);
    return $stmt->execute($args);
  }
  public function queryInnerList($sql,$args){
    $conexion=$this->getConnection();
    $stmt=$conexion->prepare($sql);
    $stmt->execute($args);
    while($elem=$stmt->fetch()){
      $list[]=$elem;
    }return $list;
  }
}
