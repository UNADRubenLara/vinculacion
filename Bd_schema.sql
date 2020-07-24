/*
BD-vinculacion
*/
DROP DATABASE IF EXISTS vinculacion;

CREATE DATABASE IF NOT EXISTS vinculacion;

USE vinculacion;

/*Tabla Status*/
CREATE TABLE status(
	idestatus INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	estatus VARCHAR(20) NOT NULL
);


/*Tabla-usuarios -> idUsuario > nombreUsuario, tipoUsuario, contrasena, estatus*/
CREATE TABLE users(

	iduser INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(80) UNIQUE NOT NULL,
	fullname VARCHAR(100) NOT NULL,
	pass CHAR(32) NOT NULL,
	role ENUM('Admin', 'User') NOT NULL
);


CREATE TABLE `vinculacion`.`empresas` ( `Idempresa` INT NOT NULL AUTO_INCREMENT , `rfc` VARCHAR(13) NOT NULL , `correo` VARCHAR(100) NOT NULL , `telefono` INT(20) NOT NULL , `zip` INT NOT NULL , `direccion` VARCHAR(100) NOT NULL , `nombre` VARCHAR(100) NOT NULL , PRIMARY KEY (`Idempresa `)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;


INSERT INTO `users` (`iduser`, `username`, `fullname`, `pass`, `role`) VALUES 
(NULL, 'Admin', 'Administrador', '12345', 'Admin');

INSERT INTO status (idestatus, estatus) VALUES
	(1, 'Activo'),
	(2, 'Suspendido'),
	(3, 'Cancelado');
