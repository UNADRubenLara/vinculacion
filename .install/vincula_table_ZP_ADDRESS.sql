
CREATE TABLE IF NOT EXISTS `ZP_ADDRESS` (
  `idADDRESS` int(11) NOT NULL,
  `C_CODIGO` int(11) DEFAULT NULL,
  `C_NOMBRE` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `D_TIPOASENTAMIENTO` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `D_MUNICIPIO` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `D_ESTADO` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `D_CIUDAD` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `ZP_ADDRESS` VALUES
(145421, 99999, 'Indefinido o Fuera de México', 'Indefinido o Fuera de Méx', 'Indefinido o Fuera de México', 'Indefinido o Fuera de México', 'Indefinido o Fuera de México');
