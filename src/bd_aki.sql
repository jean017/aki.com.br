-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aki
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aki
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aki` DEFAULT CHARACTER SET utf8 ;
USE `aki` ;

-- -----------------------------------------------------
-- Table `aki`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aki`.`categoria` (
  `idcategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `aki`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aki`.`usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `aki`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aki`.`empresa` (
  `idempresa` INT(11) NOT NULL AUTO_INCREMENT,
  `razao_social` VARCHAR(50) NOT NULL,
  `fantasia` VARCHAR(50) NULL DEFAULT NULL,
  `telefone` VARCHAR(15) NULL DEFAULT NULL,
  `info_add` VARCHAR(200) NULL DEFAULT NULL,
  `cnpj` VARCHAR(18) NULL DEFAULT NULL,
  `fkcategoria` INT(11) NULL DEFAULT NULL,
  `lagradouro` VARCHAR(50) NULL DEFAULT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `bairro` VARCHAR(50) NULL DEFAULT NULL,
  `cep` VARCHAR(9) NULL DEFAULT NULL,
  `uf` VARCHAR(2) NULL DEFAULT NULL,
  `cidade` VARCHAR(70) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `fkusuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idempresa`),
  INDEX `fkcategoria_idx` (`fkcategoria` ASC),
  INDEX `fkusuario_idx` (`fkusuario` ASC),
  CONSTRAINT `fkcategoria`
    FOREIGN KEY (`fkcategoria`)
    REFERENCES `aki`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkusuario`
    FOREIGN KEY (`fkusuario`)
    REFERENCES `aki`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `aki`.`classificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aki`.`classificacao` (
  `idclassificacao` INT(11) NOT NULL AUTO_INCREMENT,
  `classificacao` VARCHAR(50) NULL DEFAULT NULL,
  `empresa` INT(11) NOT NULL,
  PRIMARY KEY (`idclassificacao`),
  INDEX `empresa_idx` (`empresa` ASC),
  CONSTRAINT `empresaTemClassificacao`
    FOREIGN KEY (`empresa`)
    REFERENCES `aki`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `aki`.`imagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aki`.`imagem` (
  `idimagem` INT(11) NOT NULL AUTO_INCREMENT,
  `imagem` LONGBLOB NULL DEFAULT NULL,
  `fkempresa` INT(11) NULL DEFAULT NULL,
  `nome` VARCHAR(200) NULL DEFAULT NULL,
  `tipo` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`idimagem`),
  INDEX `fkempresa_idx` (`fkempresa` ASC),
  CONSTRAINT `empresa`
    FOREIGN KEY (`fkempresa`)
    REFERENCES `aki`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
