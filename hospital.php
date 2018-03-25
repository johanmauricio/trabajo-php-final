<?php
//variables parametros conexion servidor y base de datos
$host="localhost";
$user="root";
$password="";
$baseDatos="hospital";

//creamos el objeto conexion utilizando la extension mysqli
$objConexion = new mysqli($host,$user,$password,$baseDatos);

//verificamos la conexion
if($objConexion->connect_errno)
{
	echo"Error de conexion de la Base de Datos". $objConexion->connect_error;
	exit();
	
}
else
{
	echo"Conectados al servidor y listos para utilizar la Base de Datos ". $baseDatos;
}
?>	
