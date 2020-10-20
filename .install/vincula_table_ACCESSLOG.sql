CREATE TABLE IF NOT EXISTS `ACCESSLOG`
(
    `idaccess`        int(11)  NOT NULL,
    `access_datetime` datetime NOT NULL,
    `idusuario`       int(11)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  COLLATE = latin1_spanish_ci;
