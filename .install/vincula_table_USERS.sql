CREATE TABLE IF NOT EXISTS `USERS`
(
    `idusuario`            int(11)                        NOT NULL,
    `username`             varchar(45) CHARACTER SET utf8 NOT NULL,
    `hidentext`            varchar(60) CHARACTER SET utf8 NOT NULL,
    `address_street`       varchar(80) CHARACTER SET utf8 NOT NULL,
    `phone`                varchar(45) CHARACTER SET utf8 NOT NULL,
    `mail`                 varchar(45) CHARACTER SET utf8 NOT NULL,
    `fullname`             varchar(90) CHARACTER SET utf8 NOT NULL,
    `rfc`                  varchar(16) CHARACTER SET utf8 NOT NULL,
    `rol`                  int(11)                        NOT NULL,
    `branch`               int(11)                        NOT NULL,
    `companytype`          int(11)                        NOT NULL,
    `status`               int(11)                        NOT NULL,
    `ZP_ADDRESS_idADDRESS` int(11)                        NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  COLLATE = latin1_spanish_ci;
