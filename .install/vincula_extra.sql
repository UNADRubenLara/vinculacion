ALTER TABLE `ACCESSLOG`
    ADD PRIMARY KEY (`idaccess`, `idusuario`),
    ADD KEY `fk_ACCESOS_USUARIOS1` (`idusuario`);

ALTER TABLE `BRANCH`
    ADD PRIMARY KEY (`branch_code`);

ALTER TABLE `COMPANY_TYPE`
    ADD PRIMARY KEY (`idcompany_type`);

ALTER TABLE `MESSAGES`
    ADD PRIMARY KEY (`idmessage`, `idproducto`, `idcliente`),
    ADD KEY `fk_VINCULACIONES_DETALLEPRODUCTO1_idx` (`idproducto`),
    ADD KEY `fk_VINCULACIONES_USUARIOS1_idx` (`idcliente`);

ALTER TABLE `PRODUCT_DETAIL`
    ADD PRIMARY KEY (`idproduct_detail`, `idusuario`),
    ADD KEY `fk_DETALLEPRODUCTO_USUARIOS1_idx` (`idusuario`),
    ADD KEY `idbranch` (`idbranch`);

ALTER TABLE `ROL`
    ADD PRIMARY KEY (`idperfiles`);

ALTER TABLE `STATUS`
    ADD PRIMARY KEY (`idstatus`);

ALTER TABLE `USERS`
    ADD PRIMARY KEY (`idusuario`, `branch`, `companytype`, `rol`, `status`, `ZP_ADDRESS_idADDRESS`),
    ADD UNIQUE KEY `username_UNIQUE` (`username`),
    ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
    ADD KEY `fk_USUARIOS_RAMAS1_idx` (`branch`),
    ADD KEY `fk_USUARIOS_CLASIFICACIONEMPRESA1_idx` (`companytype`),
    ADD KEY `fk_USERS_STATUS1_idx` (`status`),
    ADD KEY `fk_USUARIOS_PERFILES1` (`rol`),
    ADD KEY `fk_USERS_ZP_ADDRESS1_idx` (`ZP_ADDRESS_idADDRESS`);

ALTER TABLE `ZP_ADDRESS`
    ADD PRIMARY KEY (`idADDRESS`);


ALTER TABLE `MESSAGES`
    MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `PRODUCT_DETAIL`
    MODIFY `idproduct_detail` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `USERS`
    MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `ACCESSLOG`
    MODIFY `idaccess` int(11) NOT NULL AUTO_INCREMENT,
    ADD CONSTRAINT `fk_ACCESOS_USUARIOS1` FOREIGN KEY (`idusuario`) REFERENCES `USERS` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `MESSAGES`
    ADD CONSTRAINT `fk_VINCULACIONES_DETALLEPRODUCTO1` FOREIGN KEY (`idproducto`) REFERENCES `PRODUCT_DETAIL` (`idproduct_detail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_VINCULACIONES_USUARIOS1` FOREIGN KEY (`idcliente`) REFERENCES `USERS` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `PRODUCT_DETAIL`
    ADD CONSTRAINT `fk_DETALLEPRODUCTO_USUARIOS1` FOREIGN KEY (`idusuario`) REFERENCES `USERS` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `USERS`
    ADD CONSTRAINT `fk_USERS_STATUS1` FOREIGN KEY (`status`) REFERENCES `STATUS` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_USERS_ZP_ADDRESS1` FOREIGN KEY (`ZP_ADDRESS_idADDRESS`) REFERENCES `ZP_ADDRESS` (`idADDRESS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_USUARIOS_CLASIFICACIONEMPRESA1` FOREIGN KEY (`companytype`) REFERENCES `COMPANY_TYPE` (`idcompany_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_USUARIOS_PERFILES1` FOREIGN KEY (`rol`) REFERENCES `ROL` (`idperfiles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_USUARIOS_RAMAS1` FOREIGN KEY (`branch`) REFERENCES `BRANCH` (`branch_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;
