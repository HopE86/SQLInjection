SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `diary` ;
CREATE SCHEMA IF NOT EXISTS `diary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `diary` ;

-- -----------------------------------------------------
-- Table `diary`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `diary`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diary`.`entry`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `diary`.`entry` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text` VARCHAR(400) NOT NULL ,
  `user_id` INT NOT NULL ,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entry_user_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_entry_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `diary`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `diary`.`loginLog`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `diary`.`loginLog` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `date` DATETIME NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_loginLog_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_loginLog_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `diary`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
