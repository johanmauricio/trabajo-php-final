<?php

$objConexion = new Mysqli("localhost","root","","hospital");

// Se supone que la baseDatos tiene una tabla pacientes

//$sql = "Select * from pacientes";
//$resultado = $objConexion->query($sql);



$sql="select pacNombres,pacApellido,pacFechaNacimiento from pacientes";
$resultado=$objConexion->query($sql);

while($pacientes=$resultado->fetch_array())
{
   //imprima cada registro
   //echo"Identificacion paciente:".$pacientes['pacIdentificacion'];
   echo"Nombre paciente:".$pacientes['pacNombres'];
   echo"Apellido paciente:".$pacientes['pacApellido'].'<br/>';
   echo"Fecha de nacimiento paciente:".$pacientes['pacFechaNacimiento'];
   //echo"Sexo paciente:".$pacientes['pacSexo'];
   
 }
   
   ?>