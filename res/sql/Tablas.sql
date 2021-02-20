CREATE DATABASE IF NOT EXISTS `sistama_oda`;

CREATE TABLE IF NOT EXISTS `tabla_de_prueba` (
	`valor_n` INT NOT NULL,
	`valor_s` VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `temas` (
`id_tema` INT NOT NULL AUTO_INCREMENT,
`nombre_tema` VARCHAR(50) NOT NULL,
PRIMARY KEY(`id_tema`)
);

CREATE TABLE IF NOT EXISTS `lecciones` (
	`id_leccion` INT NOT NULL AUTO_INCREMENT,
	`nombre_leccion` VARCHAR(200) NOT NULL,
	`contenido_leccion` TEXT NOT NULL,
	PRIMARY KEY(`id_leccion`)

);
