<?php

//Variable de búsqueda
if(isset($_POST['valorBusqueda'])){
$consultaBusqueda = $_POST['valorBusqueda'];
}else{
  $consultaBusqueda="vacio";
}
//$consultaBusqueda = "AL";

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


  $jsonArray=array();
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

    $jsonArray=array(
      "mensaje"=>$consultaBusqueda,
    );
		}//Fin while $resultados

}
 echo json_encode($jsonArray);
//Fin isset $consultaBusqueda
//echo $mensaje;
//Devolvemos el mensaje que tomará jQuery
//print_r($resultado);
?>
