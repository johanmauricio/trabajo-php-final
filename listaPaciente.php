<?php 
   
     require "hospital.php";
	 
	 $objConexion = new mysqli($host,$user,$password,$baseDatos);
	 
	 if($objConexion->connect_errno)
	 
	 {
   echo "Error de conexion en la DB".$objConexion->connect_error;
  exit();
   
	 }
	$sql="SELECT * FROM pacientes";
	//Ejecutamos consulta llamando al query $objConexion
	
	$resultado=$objConexion->query($sql);
	
	$cantidadRegistros = $resultado->num_rows;
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/>
	<title>Centro Medico Lista</title> 
	</head>
	<body>
	<h1 align="center">Listado Pacientes</h1>
	<table width="70%" border="1" align="center">
	<tr align="center" bgcolor="#99ff66">
	      <td>Identificacion</td>
		  <td>Nombres</td>
		  <td>Apellidos</td>
		  <td>Fecha Nacimiento</td>
		  <td>Sexo</td>
   </tr>
   <?php 
      
   while($datos=$resultado->fetch_array())
   {
	  
   ?>
       <tr>
      	<td><?php echo $datos['pacIdentificacion']?></td>
		<td><?php echo $datos['pacNombres']?></td>
		<td><?php echo $datos['pacApellido']?></td>
		<td><?php echo $datos['pacFechaNacimiento']?></td>
		<td><?php echo $datos['pacSexo']?></td>
		</tr> 
   <?php 
   } // cerrando el ciclo while    
   ?>
   </table>
   </body>
   </html> 
		
