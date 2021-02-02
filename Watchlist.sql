-- create database


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


drop schema IF EXISTS `Watchlist`;

-- -----------------------------------------------------
-- Schema Watchlist
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Watchlist
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Watchlist` DEFAULT CHARACTER SET utf8 ;
USE `Watchlist` ;


-- -----------------------------------------------------
-- Table `Watchlist`.`GebruikersAccounts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`GebruikersAccounts` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`GebruikersAccounts` (
  `gebruikersAccountId` INT NOT NULL AUTO_INCREMENT,
  `emailadres` VARCHAR(45) NOT NULL,
  `paswoord` VARBINARY(255) NOT NULL,
  PRIMARY KEY (`gebruikersAccountId`),
  UNIQUE INDEX `emailadres_UNIQUE` (`emailadres` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Watchlist`.`Personen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`Personen` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`Personen` (
  `persoonId` INT NOT NULL AUTO_INCREMENT,
  `voornaam` VARCHAR(45) NOT NULL,
  `familienaam` VARCHAR(45) NOT NULL,
  `gebruikersAccountId` INT NOT NULL,
  `favorietGenre` VARCHAR(150) NOT NULL,
  `favorietFilm` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`persoonId`),
  CONSTRAINT `fk_NatuurlijkePersonen_Gebruikersnamen1`
    FOREIGN KEY (`gebruikersAccountId`)
    REFERENCES `Watchlist`.`GebruikersAccounts` (`gebruikersAccountId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Watchlist`.`Categorieen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`Categorieen` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`Categorieen` (
  `categorieId` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categorieId`)) 
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`Productions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`Productions` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`Productions` (
  `productionId` INT NOT NULL AUTO_INCREMENT,
  `director` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`productionId`))
ENGINE = InnoDB; 

-- -----------------------------------------------------
-- Table `Watchlist`.`Films`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`Films` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`Films` (
  `filmId` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  `jaar` YEAR NOT NULL,
  `duurtijd` VARCHAR (10) NOT NULL,
  `hoofdacteur` VARCHAR(45) NOT NULL,
  `hoofdactrice` VARCHAR (45) NOT NULL,
  `gezien` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`filmId`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`FilmCategorieen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`FilmCategorieen` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`FilmCategorieen` (
  `categorieId` INT NOT NULL,
  `filmId` INT NOT NULL,
  PRIMARY KEY (`categorieId`, `filmId`),
  INDEX `fk_FilmCategorieen_Film1_idx` (`FilmId` ASC),
  CONSTRAINT `fk_FilmCategorieen_Categorieen1`
    FOREIGN KEY (`categorieId`)
    REFERENCES `Watchlist`.`Categorieen` (`categorieId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmCategorieen_Film1`
    FOREIGN KEY (`filmId`)
    REFERENCES `Watchlist`.`Films` (`filmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`FilmProductions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`FilmProductions` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`FilmProductions` (
  `productionId` INT NOT NULL,
  `filmId` INT NOT NULL,
  PRIMARY KEY (`productionId`, `filmId`),
  INDEX `fk_FilmProductions_Film1_idx` (`FilmId` ASC),
  CONSTRAINT `fk_FilmProductions_Productions1`
    FOREIGN KEY (`productionId`)
    REFERENCES `Watchlist`.`Productions` (`productionId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FilmProductions_Film1`
    FOREIGN KEY (`filmId`)
    REFERENCES `Watchlist`.`Films` (`filmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`Reviews`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`Reviews` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`Reviews` (
  `ReviewId` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  `score` INT NOT NULL,
  `commentaar` VARCHAR(255) NULL,
  `datum` YEAR NOT NULL,
  `filmId` INT NOT NULL,
  PRIMARY KEY (`ReviewId`),
  INDEX `fk_Reviews_Films1_idx` (`filmId` ASC),
  CONSTRAINT `fk_Reviews_Films1`
    FOREIGN KEY (`filmId`)
    REFERENCES `Watchlist`.`Films` (`filmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`VeelgesteldeVragenFilms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`VeelgesteldeVragenFilms` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`VeelgesteldeVragenFilms` (
  `veelgesteldeVragenFilmId` INT NOT NULL AUTO_INCREMENT,
  `filmId` INT NOT NULL,
  `vraag` VARCHAR(255) NOT NULL,
  `antwoord` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`veelgesteldeVragenFilmId`),
  INDEX `fk_VeelgesteldeVragenFilms_Films1_idx` (`FilmId` ASC),
  CONSTRAINT `fk_VeelgesteldeVragenFilms_Films1`
    FOREIGN KEY (`FilmId`)
    REFERENCES `Watchlist`.`Films` (`filmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Watchlist`.`ChatGesprekken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`ChatGesprekken` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`ChatGesprekken` (
  `chatGesprekId` INT NOT NULL AUTO_INCREMENT,
  `gebruikersAccountId` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`chatGesprekId`),
  INDEX `fk_ChatGesprekken_GebruikersAccounts1_idx` (`gebruikersAccountId` ASC),
  CONSTRAINT `fk_ChatGesprekken_GebruikersAccounts1`
    FOREIGN KEY (`gebruikersAccountId`)
    REFERENCES `Watchlist`.`GebruikersAccounts` (`gebruikersAccountId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Watchlist`.`ChatgesprekLijnen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`ChatgesprekLijnen` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`ChatgesprekLijnen` (
  `chatgesprekLijnId` INT NOT NULL AUTO_INCREMENT,
  `chatGesprekId` INT NOT NULL,
  `bericht` VARCHAR(255) NOT NULL,
  `tijdstip` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gebruikersAccountId` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`chatgesprekLijnId`),
  INDEX `fk_ChatgesprekLijnen_ChatGesprekken1_idx` (`chatGesprekId` ASC),
  INDEX `fk_ChatgesprekLijnen_GebruikersAccounts1_idx` (`gebruikersAccountId` ASC),
  CONSTRAINT `fk_ChatgesprekLijnen_ChatGesprekken1`
    FOREIGN KEY (`chatGesprekId`)
    REFERENCES `Watchlist`.`ChatGesprekken` (`chatGesprekId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ChatgesprekLijnen_GebruikersAccounts1`
    FOREIGN KEY (`gebruikersAccountId`)
    REFERENCES `Watchlist`.`GebruikersAccounts` (`gebruikersAccountId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Watchlist`.`WishListItems`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Watchlist`.`WishListItems` ;

CREATE TABLE IF NOT EXISTS `Watchlist`.`WishListItems` (
  `wishListItemId` INT NOT NULL AUTO_INCREMENT,
  `filmId` INT NOT NULL,
  `gebruikersAccountId` INT NOT NULL,
  `aanvraagDatum` DATE NOT NULL,
  `reden` VARCHAR (45) NOT NULL,
  PRIMARY KEY (`wishListItemId`, `gebruikersAccountId`),
  INDEX `fk_WishListItems_Films1_idx` (`filmId` ASC),
  INDEX `fk_WishListItems_GebruikersAccounts1_idx` (`gebruikersAccountId` ASC),
  CONSTRAINT `fk_WishListItems_Films1`
    FOREIGN KEY (`filmId`)
    REFERENCES `Wishlist`.`Films` (`filmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_WishListItems_GebruikersAccounts1`
    FOREIGN KEY (`gebruikersAccountId`)
    REFERENCES `Wishlist`.`GebruikersAccounts` (`gebruikersAccountId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- gebruikers en rechten

-- gebruikers
drop user if exists 'DBAdmingebruiker'@'%';
drop user if exists 'gebruiker'@'%';

create user 'DBAdmingebruiker'@'%' identified by 'DBAdmin';
create user 'gebruiker'@'%' identified by 'Paswoord';

-- rechten
GRANT ALL PRIVILEGES ON Watchlist.* TO 'DBAdmingebruiker'@'%';

GRANT SELECT ON Watchlist.GebruikersAccounts TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.GebruikersAccounts TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.Personen TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.Personen TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.Productions TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.Productions TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.Categorieen TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.Categorieen TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.Films TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.Films TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.FilmCategorieen TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.FilmCategorieen TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.FilmProductions TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.FilmProductions TO 'gebruiker'@'%';

GRANT SELECT, INSERT, UPDATE, DELETE ON Watchlist.Reviews TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.VeelgesteldeVragenFilms TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.VeelgesteldeVragenFilms TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.ChatGesprekken TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.ChatGesprekken TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.ChatgesprekLijnen TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.ChatgesprekLijnen TO 'gebruiker'@'%';

GRANT SELECT ON Watchlist.WishListItems TO 'gebruiker'@'%';
GRANT INSERT, UPDATE, DELETE ON Watchlist.WishListItems TO 'gebruiker'@'%';

-- vaste data
use Watchlist;


-- anonieme gebruikersaccount
insert into `Watchlist`.`GebruikersAccounts` (gebruikersAccountId, emailadres, paswoord) 
values (0, 'anoniemePersoon@watchlist.com','');


-- films, vragen, klanten .....

use watchlist;

insert into categorieen (categorieId, naam) 
values 
(1, 'Triller'),
(2, 'Action'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Fantasy'),
(6, 'Horror'),
(7, 'Mistery'),
(8, 'Romance'),
(9, 'Adventure'),
(10, 'Science Fiction'),
(11,'Animation');

insert into productions (productionId, director) 
values 
(1, 'Touchstone Pictures'),
(2, 'Warner Bros'),
(3, 'Mandalay Entertainment'),
(4, 'Universal Pictures'),
(5, 'Colombia Pictures'),
(6, 'DNA Films'),
(7, 'Miramax'),
(8, 'Revolution Studios'),
(9, 'Imagine Entertainment'),
(10,'Pixar Animation Studios'),
(11,'Nasser Group'),
(12,'MGM'),
(13,'DIA Productions GmbH & Co. KG'),
(14,'Twentieth century Fox'),
(15,'Paramount Pictures'),
(16,'Motion International'),
(17,'Morgan Creek Entertainment'),
(18,'New Line Cinema'),
(19,'CBS Films'),
(20,'Walt Disney');

insert into films (filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien) 
values
(1,'10 things i hate about you',1999,'1.37','Heath Ledger','Julia Stiles',1),
(2,'13 ghosts',2001,'1.31','Tony Shalhoub','Shannon Elizabeth', 1),
(3,'13 going on 30',2004,'1.38','Mark Ruffalo','Jennifer Garner',1),
(4,'2 fast 2 furious',2003,'1.47','Paul Walker','Eva Mendes',1),
(5,'28 days',2000,'1.43','Viggo Mortensen','Sandra Bullock',1),
(6,'28 days later',2002,'1.53','Cillian Murphy','Naomie Harris',1),
(7,'40 days 40 nights',2002,'1.36','Josh Hartnett', 'Shannyn Sossamon',1),
(8,'50 first dates',2004,'1.39','Adam Sandler','Drew Barrymore',1),
(9,'7 years in tibet',1997,'2.16','Brad Pitt','David Thewlis',1),
(10,'8 mile',2002,1.50,'Eminem','Brittany Murphy',1),
(11,'A Bug’s life',1998,1.35,'Kevin Spacey','Hayden Panettiere',1),
(12,'A cinderella story',2004,1.35,'Chad Michael Murray','Hilary Duff',1),
(13,'A father’s choice',2000,1.36,'Peter Strauss','Michelle Trachtenberg',1),
(14,'A few good men',1992,2.18,'Tom Cruise','Demi Moore',1),
(15,'A guy thing',2003,1.41,'Jason Lee','Julia Stiles',1),
(16,'A knight’s tale',2001,2.12,'Heath Ledger', 'Shannyn Sossamon',1),
(17,'A man apart',2003,1.49,'Vin Diesel','Larenz Tate',1),
(18,'A murder of crows',1998,1.42,'Cuba Gooding Jr','Tom Berenger',1),
(19,'A walk in the clouds',1995,1.42,'Keanu Reeves','Aitana Sánchez-Gijón',1),
(20,'Abandon',2002,1.39,'Benjamin Bratt','Katie Holmes',1),
(21,'Ace Ventura: Pet Detective',1994,1.26,'Jim Carrey','Courtney Cox',1),
(22,'Addicted to love',1997,1.40,'Matthew Broderick','Meg Ryan',1),
(23,'After the sunset',2004,1.37,'Pierce Brosnan','Salma Hayek',1),
(24,'Faster',2010,1.38,'Dwayne Johnson','Billy Bob Thornton',1),
(25, 'Aladdin', 1992, '1.30', 'Robin Williams', 'Linda Larkin', 1),
(26, 'De Wraak van Jafar', 1994, '1.09', 'Jonathan Freeman', 'Linda Larkin', 1),
(27, 'Along Came a spider', 2001, '1.44', 'Morgan Freeman', 'Monica Potter', 1);


insert into filmcategorieen (filmid, categorieId) 
values 
(1,3),
(2,6),
(3,8),
(4,2),
(5,4),
(6,6),
(7,3),
(8,8),
(9,9),
(10,4),
(11,11),
(12,3),
(13,4),
(14,4),
(15,3),
(16,9),
(17,2),
(18,1),
(19,8),
(20,4),
(21,3),
(22,3),
(23,2),
(24,2),
(25,11),
(26,11),
(27,1);

insert into filmproductions (filmid, productionId) 
values 
(1,1),
(2,2),
(3,8),
(4,4),
(5,5),
(6,6),
(7,7),
(8,5),
(9,3),
(10,9),
(11,10),
(12,2),
(13,11),
(14,5),
(15,12),
(16,5),
(17,13),
(18,16),
(19,14),
(20,15),
(21,17),
(22,2),
(23,18),
(24,19),
(25,20),
(26,20),
(27,15);

insert into reviews(ReviewId, nickname, score, commentaar, datum, filmId) 
values 
(1,'Casey',5,'Zeer mooie film',2020, 8),
(2,'Casey',3,'Een beetje langdradig',2020,9),
(3,'Casey',4,'Jeugdsentiment',2020,4),
(4,'Casey',4,'Maar wel met Brad Pitt',2020,9),
(5,'casey', 5, 'Zeer grappig', 2020, 21);


insert into veelgesteldevragenfilms (veelgesteldevragenfilmid, filmid, vraag, antwoord) 
values 
(49,1, 'Is dit een tiener film?', 'Geschikt voor alle leeftijden.'),
(50,6, 'Vanaf welke leeftijd kan je kijken?', 'Vanaf 16 jaar');

insert into gebruikersaccounts (gebruikersAccountId, emailadres, paswoord) 
values 
(1, 'eerste.klant@bestaatniet.be','KlantVanWatchlist'),
(2, 'tweede.klant@bestaatniet.be','KlantVanWatchlist');

insert into personen (persoonid, voornaam, familienaam, gebruikersAccountId) 
values 
(1, 'Eerste', 'Klant', 1),
(2, 'Tweede', 'Klant', 2);
