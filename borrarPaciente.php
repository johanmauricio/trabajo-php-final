<?php

 require "hospital.php";
  
  $objConexion = new mysqli($host,$user,$password,$baseDatos);
  
  if ($objConexion->connect_errno)
  {
	  echo "Error conexion a la DB".$objConexion->connect_error;
	  exit();
  }
  
  $sql="DELETE FROM pacientes WHERE pacIdentificacion = ?";
  
  $resultado=$objConexion->prepare($sql);
  $cedula="102454598";
   
   
   $resultado->bind_param('s',$cedula);
   
   $result=$resultado->execute();
   if($result)
	     
	  echo "Se elimino al paciente de forma correcta";
  else
	  echo "Problemas al eliminar al paciente ";
?>