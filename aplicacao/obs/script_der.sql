-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema heroku_63a3468900c5497
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema heroku_63a3468900c5497
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `heroku_63a3468900c5497` DEFAULT CHARACTER SET utf8 ;
USE `heroku_63a3468900c5497` ;

-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tbparada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tbparada` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tbparada` (
  `IDPARADA` INT(11) NOT NULL,
  `DESCR` VARCHAR(100) NOT NULL DEFAULT '',
  `LATITUDE` DECIMAL(10,8) NOT NULL DEFAULT '0.00000000',
  `LONGITUDE` DECIMAL(11,8) NOT NULL DEFAULT '0.00000000',
  `BAIRRO` VARCHAR(45) NULL,
  `REFERENCIA` VARCHAR(80) NULL,
  PRIMARY KEY (`IDPARADA`),
  INDEX `idx_ID` USING BTREE (`IDPARADA`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tbusuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tbusuario` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tbusuario` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(150) NOT NULL,
  `SEXO` CHAR(1) NOT NULL,
  `EMAIL` VARCHAR(100) NOT NULL,
  `SENHA` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `idx_ID` USING BTREE (`ID`))
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tbveiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tbveiculo` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tbveiculo` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `DESCR` VARCHAR(45) NOT NULL,
  `LOTACAO` INT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tbrota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tbrota` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tbrota` (
  `IDROTA` INT NOT NULL AUTO_INCREMENT,
  `DESCR` VARCHAR(45) NULL,
  PRIMARY KEY (`IDROTA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tb_parada_rota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tb_parada_rota` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tb_parada_rota` (
  `IDPARADA` INT(11) NOT NULL,
  `IDROTA` INT NOT NULL,
  `SEQUENCIA` INT NULL,
  PRIMARY KEY (`IDPARADA`, `IDROTA`),
  INDEX `fk_tbparada_has_tbrota_tbrota1_idx` (`IDROTA` ASC) ,
  INDEX `fk_tbparada_has_tbrota_tbparada_idx` (`IDPARADA` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tbdiariobordo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tbdiariobordo` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tbdiariobordo` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `IDROTA` INT NOT NULL,
  `ID_USUARIO` INT(11) NOT NULL,
  `ID_VEICULO` INT NOT NULL,
  `STATUS` INT NULL,
  `DT_SOLICITACAO` DATETIME NOT NULL,
  `DT_EMBARQUE` DATETIME NULL,
  `DT_DESEMBARQUE` DATETIME NULL,
  `IDPARADA_EMB` INT(11) NOT NULL,
  `IDPARADA_DES` INT(11) NOT NULL,
  PRIMARY KEY (`ID`, `IDROTA`, `ID_USUARIO`, `ID_VEICULO`, `IDPARADA_EMB`, `IDPARADA_DES`),
  INDEX `fk_tbdiariobordo_tbrota1_idx` (`IDROTA` ASC) ,
  INDEX `fk_tbdiariobordo_tbusuario1_idx` (`ID_USUARIO` ASC) ,
  INDEX `fk_tbdiariobordo_tbveiculo1_idx` (`ID_VEICULO` ASC) ,
  INDEX `fk_tbdiariobordo_tbparada1_idx` (`IDPARADA_EMB` ASC) ,
  INDEX `fk_tbdiariobordo_tbparada2_idx` (`IDPARADA_DES` ASC) ,
  CONSTRAINT `fk_tbdiariobordo_tbrota1`
    FOREIGN KEY (`IDROTA`)
    REFERENCES `heroku_63a3468900c5497`.`tbrota` (`IDROTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdiariobordo_tbusuario1`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `heroku_63a3468900c5497`.`tbusuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdiariobordo_tbveiculo1`
    FOREIGN KEY (`ID_VEICULO`)
    REFERENCES `heroku_63a3468900c5497`.`tbveiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdiariobordo_tbparada1`
    FOREIGN KEY (`IDPARADA_EMB`)
    REFERENCES `heroku_63a3468900c5497`.`tbparada` (`IDPARADA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdiariobordo_tbparada2`
    FOREIGN KEY (`IDPARADA_DES`)
    REFERENCES `heroku_63a3468900c5497`.`tbparada` (`IDPARADA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_63a3468900c5497`.`tb_veiculo_rota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heroku_63a3468900c5497`.`tb_veiculo_rota` ;

CREATE TABLE IF NOT EXISTS `heroku_63a3468900c5497`.`tb_veiculo_rota` (
  `tbveiculo_ID` INT NOT NULL,
  `tbrota_IDROTA` INT NOT NULL,
  PRIMARY KEY (`tbveiculo_ID`, `tbrota_IDROTA`),
  INDEX `fk_tbveiculo_has_tbrota_tbrota1_idx` (`tbrota_IDROTA` ASC) ,
  INDEX `fk_tbveiculo_has_tbrota_tbveiculo1_idx` (`tbveiculo_ID` ASC) ,
  CONSTRAINT `fk_tbveiculo_has_tbrota_tbveiculo1`
    FOREIGN KEY (`tbveiculo_ID`)
    REFERENCES `heroku_63a3468900c5497`.`tbveiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbveiculo_has_tbrota_tbrota1`
    FOREIGN KEY (`tbrota_IDROTA`)
    REFERENCES `heroku_63a3468900c5497`.`tbrota` (`IDROTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
