<?php
extract($_REQUEST);//recoger todas las variables que pasan Metodo GET o POST

/*hacemos el llamado al archivo que contiene los valores parametros conexion a la base de datos*/
require"hospital.php";

//Creamos el objeto conexion utilizando la extension mysqli
$objConexion = new mysqli($host,$user,$password,$baseDatos);

//verificamos la conexion
if($objConexion->connect_errno)
{
echo "Error de conexion a la Base de Datos".$objConexion->connect_error;
exit();
}
//Vamos a realizar el proceso para insertar al paciente

//Guardamos en una variable la sentencias sql
$sql="insert into pacientes(pacIdentificacion,pacNombres,pacApellidos,pacFechaNacimiento,pacSexo)
values('$_REQUEST[identificacion]','$_REQUEST[nombres]','$_REQUEST[apellido]',
'$_REQUEST[fechaNacimiento]','$_REQUEST[sexo]')";

//Ejecutamos la consulta llamado al metodo query del objeto conexion y padando la sentencia sql

if($objConexion->query($sql))
header("location:insertarPaciente.php?pag=insertarPaciente&msj=1");
else
header("location:insertarPaciente.php?pag=insertarPaciente&msj=2");
?>