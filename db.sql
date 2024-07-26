CREATE SCHEMA `alejoVilchesGuia2` ;

CREATE TABLE `alejoVilchesGuia2`.`productos` (
  `Prod_ID` INT NOT NULL AUTO_INCREMENT,
  `Prod_Descripcion` VARCHAR(45) NOT NULL,
  `Prod_Precio` INT NOT NULL,
  `Prod_Codigo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Prod_ID`));


CREATE TABLE `alejoVilchesGuia2`.`rol` (
  `Rol_ID` INT NOT NULL AUTO_INCREMENT,
  `Rol_Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Rol_ID`));


CREATE TABLE `alejoVilchesGuia2`.`usuarios` (
  `Usu_ID` INT NOT NULL AUTO_INCREMENT,
  `Uau_Nombre` VARCHAR(45) NULL,
  `Usu_Rol` INT NULL,
  PRIMARY KEY (`Usu_ID`),
  CONSTRAINT `RolId`
    FOREIGN KEY (`Usu_ID`)
    REFERENCES `alejoVilchesGuia2`.`rol` (`Rol_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


INSERT INTO productos (Prod_ID, Prod_Codigo, Prod_Descripcion, Prod_Precio) VALUES (1, 'RP001', 'Camiseta oficial River Plate 2024', 129.99);
INSERT INTO productos (Prod_ID, Prod_Codigo, Prod_Descripcion, Prod_Precio) VALUES (2, 'RP002', 'Short de entrenamiento River Plate', 59.99);
INSERT INTO productos (Prod_ID, Prod_Codigo, Prod_Descripcion, Prod_Precio) VALUES (3, 'RP003', 'Gorra con escudo de River Plate', 24.99);
INSERT INTO productos (Prod_ID, Prod_Codigo, Prod_Descripcion, Prod_Precio) VALUES (4, 'RP004', 'Buzo de entrenamiento River Plate', 89.99);
INSERT INTO productos (Prod_ID, Prod_Codigo, Prod_Descripcion, Prod_Precio) VALUES (5, 'RP005', 'Botella de agua River Plate', 19.99);