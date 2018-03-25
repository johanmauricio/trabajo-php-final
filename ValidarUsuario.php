<?php
session_start();
extract($_REQUEST);
require "hospital.php";
/* los variables que viene del formulario son $login $password */

/*asigno a la variable password el valor encriptado de lo que colocaron
  en el password del formulario ya que asi esta en la base de datos */
  
  $pass = md5($_REQUEST['pass']);
  $login = $_REQUEST['login'];
  
  $objConexion = new mysqli($host,$user,$password,$baseDatos);
  
  if($objConexion->connect_errno)
	 {
	echo"Error de conexion de la Base de Datos". $objConexion->connect_error;
	exit();
	}
else
{
	return $objConexion;
}

	
 
  // Vamos a realizar el proseso para consultar los pacientes
  //Guardamos en una variable la sentencia sql
 $sql="select * from usuario where usuarioLogin ='$login' and usuarioPassword = '$pass'";
  //Asignar a una variable el resultado de la consulta
  $resultado=$objConexion->query($sql);
  $resultado=$objConexion->query($sql);
 //verifico si existe el usuario
  $existe = $resultado->num_rows;
  
  if($existe==1) //quiere decir que los datos estan bien
  {
  $usuario=$resultado->fetch_object();
  $_SESSION['user']=$usuario->usuarioLogin;
  header("location:listaPaciente.php?pag=contenido");
  
  }
  else
  {
  header("location:login.php?pag=login&x=1"); //x=1 quiere decir que el usuario no esta registrado

  }
  ?>