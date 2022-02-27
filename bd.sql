/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - crudproyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crudproyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crudproyecto`;

/*Table structure for table `doc_documento` */

DROP TABLE IF EXISTS `doc_documento`;

CREATE TABLE `doc_documento` (
  `DOC_ID` int(3) NOT NULL AUTO_INCREMENT,
  `DOC_NOMBRE` varchar(60) DEFAULT NULL,
  `DOC_CODIGO` varchar(100) DEFAULT NULL,
  `DOC_CONTENIDO` varchar(4000) DEFAULT NULL,
  `DOC_ID_TIPO` varchar(255) NOT NULL,
  `DOC_ID_PROCESO` varchar(255) NOT NULL,
  PRIMARY KEY (`DOC_ID`),
  KEY `FK_tipo` (`DOC_ID_TIPO`),
  KEY `FK_proceso` (`DOC_ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `doc_documento` */

insert  into `doc_documento`(`DOC_ID`,`DOC_NOMBRE`,`DOC_CODIGO`,`DOC_CONTENIDO`,`DOC_ID_TIPO`,`DOC_ID_PROCESO`) values 
(1,'INSTRUCTIVO DE DESARROLLO','INS-ING-1','texto grande con el contenido del documento','1','1'),
(2,'DESARROLADOR WEB','ING-INS-768fd436-9788-11ec-afe2-d4c9ef7c2df7','probando','2','2');

/*Table structure for table `login_usuarios` */

DROP TABLE IF EXISTS `login_usuarios`;

CREATE TABLE `login_usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `login_usuarios` */

insert  into `login_usuarios`(`id`,`USUARIO`,`PASSWORD`) values 
(9,'1234791503','$2y$10$0c1NRJZN0wD0TuTx5mwgQuQFZ0dD8RDwxlwndczdHmHyy5uvfEIMK'),
(10,'12345','$2y$10$f3M/okXcCgT8S74TVxdoQ.bDW7aYbzgk9i629laEEiW/gIWnQLekK');

/*Table structure for table `pro_proceso` */

DROP TABLE IF EXISTS `pro_proceso`;

CREATE TABLE `pro_proceso` (
  `PRO_ID` int(3) NOT NULL,
  `PRO_PREFIJO` varchar(20) DEFAULT NULL,
  `PRO_NOMBRE` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pro_proceso` */

insert  into `pro_proceso`(`PRO_ID`,`PRO_PREFIJO`,`PRO_NOMBRE`) values 
(1,'Ingeneria','ING'),
(2,'Tecnologo','TEG'),
(3,'Tecnico','TEC'),
(4,'Doctorado','DOC');

/*Table structure for table `tip_tipo_doc` */

DROP TABLE IF EXISTS `tip_tipo_doc`;

CREATE TABLE `tip_tipo_doc` (
  `TIP_ID` int(3) NOT NULL,
  `TIP_NOMBRE` varchar(60) DEFAULT NULL,
  `TIP_PREFIJO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TIP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tip_tipo_doc` */

insert  into `tip_tipo_doc`(`TIP_ID`,`TIP_NOMBRE`,`TIP_PREFIJO`) values 
(1,'Instructivo','INS'),
(2,'Seguimiento','SEG'),
(3,'No seguimiento','NOS'),
(4,'Explicacion','EXP');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
