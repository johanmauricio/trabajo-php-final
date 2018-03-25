<?php

 require "hospital.php";
  
  $objConexion = new mysqli($host,$user,$password,$baseDatos);
  
  if ($objConexion->connect_errno)
  {
	  echo "Error conexion a la DB".$objConexion->connect_error;
	  exit();
  }
  
  $sql="UPDATE pacientes SET pacFechaNacimiento = ? where pacIdentificacion = ?";
  
  $resultado=$objConexion->prepare($sql);
  
  $nuevaFecha="1999-08-04";
  $cedula="102454598";
  
  
  $resultado->bind_param("ss",$nuevaFecha,$cedula);
  
  $result=$resultado->execute();
  
  if($result)
	    
	echo "Se actualizo la fecha de nacimiento de forma correcta !! ";
	
	else 
		
	echo "Problemas al actualizar";

?> 