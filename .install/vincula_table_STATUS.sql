
CREATE TABLE `STATUS` (
  `idstatus` int(11) NOT NULL,
  `status_description` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `STATUS` VALUES
(1, 'Activo'),
(2, 'Inactivo');
