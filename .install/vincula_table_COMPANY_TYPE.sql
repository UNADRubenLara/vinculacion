
CREATE TABLE `COMPANY_TYPE` (
  `idcompany_type` int(11) NOT NULL,
  `company_type_description` varchar(25) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `COMPANY_TYPE` VALUES
(1, 'Micro'),
(2, 'Mediana'),
(3, 'Grande');
