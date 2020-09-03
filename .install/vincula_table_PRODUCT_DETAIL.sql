
CREATE TABLE `PRODUCT_DETAIL` (
  `idproduct_detail` int(11) NOT NULL,
  `idbranch` int(6) NOT NULL,
  `product_detail` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `idusuario` int(11) NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
