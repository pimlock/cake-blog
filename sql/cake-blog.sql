SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `pm_cakeblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `pm_cakeblog` ;

-- -----------------------------------------------------
-- Table `pm_cakeblog`.`posts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pm_cakeblog`.`posts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `intro` VARCHAR(300) NOT NULL DEFAULT '' ,
  `body` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pm_cakeblog`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pm_cakeblog`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(50) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pm_cakeblog`.`posts`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pm_cakeblog`;
INSERT INTO `pm_cakeblog`.`posts` (`id`, `title`, `intro`, `body`, `created`, `modified`) VALUES (NULL, 'Second', 'Lorem Ipsum', 'Cupcake ipsum dolor sit amet. Oat cake I love chupa chups chupa chups brownie I love tiramisu. Bonbon pudding muffin marzipan soufflé. Lemon drops cake chocolate bar bonbon topping jelly-o. Carrot cake cupcake brownie chocolate bar cupcake chocolate cake caramels muffin brownie. Pie sweet roll ice cream carrot cake sugar plum cake toffee cotton candy carrot cake. Topping chocolate biscuit bonbon lollipop. Chocolate halvah bear claw dessert jelly beans wafer ice cream. Donut cookie macaroon carrot cake sesame snaps gingerbread. I love applicake jelly. Caramels bear claw bonbon marshmallow jelly-o. Chupa chups powder sweet roll toffee faworki danish. Tiramisu marzipan tiramisu jelly beans dragée tart wafer.', '2011-12-08 11:01:00', NULL);
INSERT INTO `pm_cakeblog`.`posts` (`id`, `title`, `intro`, `body`, `created`, `modified`) VALUES (NULL, 'First', 'This is the first post', 'Yeah! We\'re gonna rule the blogging world!!!111oneone!!!', '2011-12-08 10:00:00', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `pm_cakeblog`.`users`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `pm_cakeblog`;
INSERT INTO `pm_cakeblog`.`users` (`id`, `username`, `password`, `created`, `modified`) VALUES (NULL, 'admin', 'f14f6c36d6695c739233f6bba29b2dd555fb0d78', 'NOW()', NULL);

COMMIT;
