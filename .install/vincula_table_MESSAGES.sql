
CREATE TABLE IF NOT EXISTS `MESSAGES` (
  `idmessage` int(11) NOT NULL,
  `messaje_datetime` datetime NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `success` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
