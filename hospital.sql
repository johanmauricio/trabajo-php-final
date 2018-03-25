# Host: localhost  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-03-25 14:16:00
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "consultorios"
#

DROP TABLE IF EXISTS `consultorios`;
CREATE TABLE `consultorios` (
  `idConsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `conNombre` char(15) DEFAULT NULL,
  PRIMARY KEY (`idConsultorio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "consultorios"
#


#
# Structure for table "medicos"
#

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `medIdentificacion` char(15) NOT NULL,
  `medNombres` varchar(50) NOT NULL,
  `medApellidos` varchar(50) NOT NULL,
  `medEspecialidad` varchar(50) NOT NULL,
  `medTelefono` char(15) NOT NULL,
  `medCorreo` varchar(50) NOT NULL,
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "medicos"
#


#
# Structure for table "pacientes"
#

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `pacIdentificacion` char(15) NOT NULL,
  `pacNombres` varchar(50) NOT NULL,
  `pacApellido` varchar(50) NOT NULL,
  `pacFechaNacimiento` date NOT NULL,
  `pacSexo` enum('F,m') NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "pacientes"
#

INSERT INTO `pacientes` VALUES (1,'106170589','johan maurricio','falla bravo','1990-09-21','F,m'),(2,'106265654','mauricio','zea','1999-10-22','F,m'),(3,'101245896','camilo','bogo','1992-12-24','F,m'),(4,'106148746','daniel','campo','1990-11-29','F,m'),(5,'106148546','carlos','sama','1980-08-09','F,m'),(6,'104252466','andrea','ortega','1998-02-06','F,m'),(7,'101245247','sandra','camello','1978-10-22','F,m'),(8,'104247778','catalina','gomez','1999-05-04','F,m'),(9,'104517887','camila','casas','2000-10-10','F,m');

#
# Structure for table "citas"
#

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `citFecha` date NOT NULL,
  `citHora` time NOT NULL,
  `citPaciente` int(11) NOT NULL,
  `citMedico` int(11) NOT NULL,
  `citConsultorio` int(11) NOT NULL,
  `citEstado` enum('Asignado, Atendido') NOT NULL,
  `citObservatorio` text NOT NULL,
  PRIMARY KEY (`idCita`),
  KEY `FK1_citPaciente` (`citPaciente`),
  KEY `FK2_citMedico` (`citMedico`),
  KEY `FK3_citConsultorio` (`citConsultorio`),
  CONSTRAINT `FK1_citPaciente` FOREIGN KEY (`citPaciente`) REFERENCES `pacientes` (`idPaciente`),
  CONSTRAINT `FK2_citMedico` FOREIGN KEY (`citMedico`) REFERENCES `medicos` (`idMedico`),
  CONSTRAINT `FK3_citConsultorio` FOREIGN KEY (`citConsultorio`) REFERENCES `consultorios` (`idConsultorio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "citas"
#


#
# Structure for table "tipo"
#

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tipo"
#


#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioLogin` char(15) DEFAULT NULL,
  `usuarioPassword` varchar(60) DEFAULT NULL,
  `usuarioEstado` enum('Activo','Inactivo') DEFAULT NULL,
  `usuarioTipo` enum('Administrador','Asistente','Medico','Paciente') DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,'johan','1021','Activo','Administrador'),(2,'camilo','123','Inactivo','Asistente');
