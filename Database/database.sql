CREATE DATABASE IF NOT EXISTS `pruebas_sena` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `pruebas_sena`;


/* tabla de personas */
CREATE TABLE `personas` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`primer_nombre` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`segundo_nombre` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`primer_apellido` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`segundo_apellido` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`documento` INT(10) NOT NULL,
	`id_tipo_documento` INT(10) NOT NULL,
	`id_sexo` INT(10) NOT NULL,
	`id_grupo_sanguineo` INT(10) NOT NULL,
	`id_factor_sanguineo` INT(10) NOT NULL,
	`fecha_nacimiento` DATE NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `documento` (`documento`) USING BTREE,
	INDEX `FK_personas_grupo_sanguineo` (`id_grupo_sanguineo`) USING BTREE,
	INDEX `id_factor_sanguineo` (`id_factor_sanguineo`) USING BTREE,
	INDEX `id_tipo_documento` (`id_tipo_documento`) USING BTREE,
	INDEX `id_sexo` (`id_sexo`) USING BTREE,
	CONSTRAINT `FK_personas_grupo_sanguineo` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupo_sanguineo` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `id_factor_sanguineo` FOREIGN KEY (`id_factor_sanguineo`) REFERENCES `factor_sanguineo` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `id_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `id_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;



/* tabla de tipo_documento */
CREATE TABLE `tipo_documento` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`tipo_documento` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
;



/*tabla de sexo*/
CREATE TABLE `sexo` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`sexo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;


/* tabla de grupo_sanguineo */
CREATE TABLE `grupo_sanguineo` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`tipo_grupo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;


/* tabla de factor_sanguineo */
CREATE TABLE `factor_sanguineo` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`tipo_factor` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;


/* tabla de programa formacion  */
CREATE TABLE `programa_formacion` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre_programa` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;



/*tabla aprendices*/
CREATE TABLE `aprendices` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_persona` INT(10) NOT NULL,
	`id_formacion` INT(10) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id_persona` (`id_persona`) USING BTREE,
	INDEX `id_formacion` (`id_formacion`) USING BTREE,
	CONSTRAINT `id_formacion` FOREIGN KEY (`id_formacion`) REFERENCES `programa_formacion` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;

