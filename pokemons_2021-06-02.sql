# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: pokemons
# Generation Time: 2021-06-02 13:26:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pokedex
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pokedex`;

CREATE TABLE `pokedex` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `type` int(11) unsigned NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `ability` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `pokedex_ibfk_1` FOREIGN KEY (`type`) REFERENCES `types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pokedex` WRITE;
/*!40000 ALTER TABLE `pokedex` DISABLE KEYS */;

INSERT INTO `pokedex` (`id`, `name`, `type`, `height`, `weight`, `ability`)
VALUES
	(1,'bulbasaur',4,1,8,'overgrow'),
	(2,'ivysaur',4,2,15,'overgrow'),
	(3,'venusaur',4,4,115,'overgrow'),
	(4,'charmander',2,0.6,8.5,'blaze'),
	(5,'charmeleon',2,1.1,19,'blaze'),
	(6,'charizard',2,1.7,90.5,'blaze'),
	(7,'squirtle',3,0.5,9,'torrent'),
	(8,'wartortle',3,1,22.5,'torrent'),
	(9,'blastoise',3,1.6,85.5,'torrent'),
	(10,'caterpie',12,0.3,2.9,'shield dust'),
	(11,'metapod',12,0.7,9.9,'shed skin'),
	(12,'butterfree',12,1.1,32,'compound eyes'),
	(13,'weedle',12,0.3,3.2,'shield dust'),
	(14,'kakuna',12,0.6,10,'shed skin'),
	(15,'beedrill',12,1,29.5,'swarm'),
	(16,'pidgey',1,0.3,1.8,'keen eye'),
	(17,'pidgeotto',1,1.1,30,'keen eye'),
	(18,'pidgeot',1,1.5,39.5,'keen eye');

/*!40000 ALTER TABLE `pokedex` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pokemon_type` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `pokemon_type`)
VALUES
	(1,'normal'),
	(2,'fire'),
	(3,'water'),
	(4,'grass'),
	(5,'electric'),
	(6,'ice'),
	(7,'fighting'),
	(8,'poison'),
	(9,'ground'),
	(10,'flying'),
	(11,'psychic'),
	(12,'bug'),
	(13,'rock'),
	(14,'ghost'),
	(15,'dark'),
	(16,'dragon'),
	(17,'steel'),
	(18,'fairy');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
