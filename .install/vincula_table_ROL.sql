
CREATE TABLE `ROL` (
  `idperfiles` int(11) NOT NULL,
  `perfiltype` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `ROL` VALUES
(1, 'Administrador'),
(2, 'Usuario');
