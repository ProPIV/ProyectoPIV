SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectopiv`
--

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'Colombia'),
(2, 'Mexico');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_pais` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`, `id_pais`) VALUES
(1, 'Valle', 1),
(2, 'Chihuahua', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `municipio` (
  `id_municipio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_departamento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_municipio`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'Cali', 1),
(2, 'Jalisco', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `sede` (
  `id_sede` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_sede` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_municipio` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `sede` (`id_sede`, `nombre_sede`, `id_municipio`) VALUES
(1, 'Norte', 1),
(2, 'Sur', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_sede` int(10) unsigned NOT NULL,
  `id_proveedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `id_sede`, `id_proveedor`) VALUES
(1, 'Carvajal', 1, 1),
(2, 'Colombina', 2, 2);


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `cuenta` (
  `id_cuenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cuenta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(10) unsigned NOT NULL,
  `id_permiso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `cuenta` (`id_cuenta`, `nombre_cuenta`,  `id_empresa`, `id_permiso`) VALUES
(1, 'carvajal@carvajal.com', 1, 1),
(2, 'colombina@colombina.com', 2, 1);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `permiso` (
  `id_permiso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_permiso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `permiso` (`id_permiso`, `nombre_permiso`) VALUES
(1, 'admin'),
(2, 'limitado');


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `soporte` (
  `id_soporte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_soporte` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_cuenta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_soporte`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `soporte` (`id_soporte`, `nombre_soporte`, `contraseña`, `id_cuenta`) VALUES
(1, 'Cuenta bloqueada', 'abc123', 1),
(2, 'Red inestable', 'abc123', 2);


-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `usuario_soporte` (
  `id_usuario_soporte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario_soporte` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_soporte` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario_soporte`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `usuario_soporte` (`id_usuario_soporte`, `nombre_usuario_soporte`, `id_soporte`) VALUES
(1, 'Carlos', 1),
(2, 'Alejandro', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `unidad_organizacional` (
  `id_unidad_organizacional` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_unidad_organizacional` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_unidad_organizacional`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `unidad_organizacional` (`id_unidad_organizacional`, `nombre_unidad_organizacional`, `id_empresa`) VALUES
(1, 'Juridico', 1),
(2, 'Financiero', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `proceso` (
  `id_proceso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_proceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proceso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `proceso` (`id_proceso`, `nombre_proceso`) VALUES
(1, 'Penal'),
(2, 'Tesoreria');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(20) unsigned NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `proveedor` (`id_proveedor`, `nombre_proveedor`, `telefono`, `direccion`) VALUES
(1, 'Manuelita',3239685948,'av 6 8-56'),
(2, 'Providencia',3105496404,'cra 31 8-32');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `contrato` (
  `id_contrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleado` int(10) unsigned NOT NULL,
  `fecha_ini` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_contrato` int(10) unsigned NOT NULL,
  `id_proveedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `contrato` (`id_contrato`, `id_empleado`, `fecha_ini`, `fecha_fin`, `id_tipo_contrato`, `id_proveedor`) VALUES
(1, 1, '01-01-2020', '0', 1, 0),
(2, 2, '01-01-2020', '01-01-2021', 2, 0);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `tipo_contrato` (
  `id_tipo_contrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_tipo_contrato` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_contrato`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `tipo_contrato` (`id_tipo_contrato`, `nombre_tipo_contrato`) VALUES
(1, 'indefinido'),
(2, 'temporal');



-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empleado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(20) unsigned NOT NULL,
  `id_unidad_organizacional` int(10) unsigned NOT NULL,
  `id_rol` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `empleado` (`id_empleado`, `tipo_documento`, `nombre_empleado`, `apellido`, `direccion`, `telefono`, `id_unidad_organizacional`, `id_rol`) VALUES
(1, 'cedula', 'Sebastian', 'Gutierrez', 'cll 5a 5-45', '3121234567', 1, 1),
(2, 'cedula', 'Erick', 'Cuellar', 'cll 6 45-33', '3109876543', 2, 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_proceso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=377 ;


INSERT INTO `rol` (`id_rol`, `nombre_rol`, `id_proceso`) VALUES
(1, 'Abogado', 1),
(2, 'Tesorero corporativo', 2);


-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
