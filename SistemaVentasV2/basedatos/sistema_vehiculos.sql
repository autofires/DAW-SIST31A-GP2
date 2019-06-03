/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - sistema_vehiculos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistema_vehiculos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistema_vehiculos`;

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id_marca` INT(255) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(100) DEFAULT NULL,
  `marcaf` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=INNODB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `marcas` */


/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario` VARCHAR(100) NOT NULL,
  `contra` VARCHAR(10000) DEFAULT NULL,
  `tipo_usuario` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */



/*Table structure for table `clientes` */



DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `DUI_cliente` VARCHAR(11) NOT NULL,
  `Nom_cliente` VARCHAR(75) DEFAULT NULL,
  `Ape_cliente` VARCHAR(75) DEFAULT NULL,
  `Correo_cliente` VARCHAR(100) DEFAULT NULL,
  `Tel_cliente` VARCHAR(25) DEFAULT NULL,
  `Dir_cliente` BLOB,
  `NIT_cliente` VARCHAR(25) DEFAULT NULL,
  `usuario` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`DUI_cliente`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */



/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `Num_serie` VARCHAR(100) DEFAULT NULL,
  `foto` VARCHAR(200) DEFAULT NULL,
  KEY `Num_serie` (`Num_serie`),
  CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`Num_serie`) REFERENCES `vehiculos` (`Num_serie`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `fotos` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `usuario` VARCHAR(100) DEFAULT NULL,
  `tiempo` VARCHAR(1000) DEFAULT NULL,
  KEY `usuario` (`usuario`),
  CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `login_attempts` */


/*Table structure for table `reservacion` */

DROP TABLE IF EXISTS `reservacion`;

CREATE TABLE `reservacion` (
  `id_reservacion` INT(100) NOT NULL AUTO_INCREMENT,
  `Num_serie` VARCHAR(100) DEFAULT NULL,
  `DUI_cliente` VARCHAR(11) DEFAULT NULL,
  `fecha_reservacion` DATE DEFAULT NULL,
  `fecha_fin_reserv` DATE DEFAULT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `reservacionauto` (`Num_serie`),
  KEY `reservacioncliente` (`DUI_cliente`),
  CONSTRAINT `reservacionauto` FOREIGN KEY (`Num_serie`) REFERENCES `vehiculos` (`Num_serie`),
  CONSTRAINT `reservacioncliente` FOREIGN KEY (`DUI_cliente`) REFERENCES `clientes` (`DUI_cliente`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `reservacion` */


INSERT  INTO `usuario`(`usuario`,`contra`,`tipo_usuario`,`email`) VALUES 
('juanca123','8fc2476dba04231de92077e1c118396e628fb81c1b733074e3c172e2b60a6535f3490019cc47caf63aca12c27c68fb7b439d432a75625064c6dc46e5bd3f5d38','admin','juanithows@gmail.com'),
('usuario','b9b98ac59bfb8b5be83eb88e2c90fc2c3c33e12f5731a1a9b9f208552aa21f19eef3c4ab2a520be2a8d6bc31d53a2cbcead72fdfed42066a595fa0aeeca932a0','cliente','hola@gmail.com');

/*Table structure for table `vehiculos` */

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `Num_serie` VARCHAR(100) NOT NULL,
  `id_marca` INT(250) DEFAULT NULL,
  `modelo` VARCHAR(50) DEFAULT NULL,
  `anio_vehiculo` YEAR(4) DEFAULT NULL,
  `matricula` VARCHAR(45) DEFAULT NULL,
  `kilometraje` INT(100) DEFAULT NULL,
  `transmision` VARCHAR(45) DEFAULT NULL,
  `cilindros` INT(25) DEFAULT NULL,
  `caballos_fuerza` INT(45) DEFAULT NULL,
  `caracteristicas` BLOB,
  `precio_compra` DECIMAL(45,0) DEFAULT NULL,
  `precio_venta` DECIMAL(45,0) DEFAULT NULL,
  `estado` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`Num_serie`),
  KEY `id_marca` (`id_marca`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `vehiculos` */

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` INT(100) NOT NULL AUTO_INCREMENT,
  `Num_serie` VARCHAR(100) DEFAULT NULL,
  `DUI_cliente` VARCHAR(11) DEFAULT NULL,
  `fecha_venta` DATE DEFAULT NULL,
  `cantidad` INT(11) DEFAULT NULL,
  `total_venta` DOUBLE DEFAULT NULL,
  `total_iva` DOUBLE DEFAULT NULL,
  `total_vent_iva` DOUBLE DEFAULT NULL,
  `venta_exito` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `Num_serie` (`Num_serie`),
  KEY `DUI_cliente` (`DUI_cliente`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Num_serie`) REFERENCES `vehiculos` (`Num_serie`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`DUI_cliente`) REFERENCES `clientes` (`DUI_cliente`),
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
