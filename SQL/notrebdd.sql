-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour clickandcollect
CREATE DATABASE IF NOT EXISTS `clickandcollect` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `clickandcollect`;

-- Listage de la structure de la table clickandcollect. t_admins
CREATE TABLE IF NOT EXISTS `t_admins` (
  `Identifiant` varchar(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  UNIQUE KEY `Identifiant` (`Identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table clickandcollect.t_admins : ~1 rows (environ)
/*!40000 ALTER TABLE `t_admins` DISABLE KEYS */;
INSERT INTO `t_admins` (`Identifiant`, `MDP`) VALUES
	('admin', 'admin');
/*!40000 ALTER TABLE `t_admins` ENABLE KEYS */;

-- Listage de la structure de la table clickandcollect. t_clients
CREATE TABLE IF NOT EXISTS `t_clients` (
  `Id_client` int(11) NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `adresse_client` varchar(50) DEFAULT NULL,
  `telephonie_client` varchar(15) DEFAULT NULL,
  `email_client` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_client`),
  UNIQUE KEY `Identifiant` (`Identifiant`),
  UNIQUE KEY `email_client` (`email_client`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Listage des données de la table clickandcollect.t_clients : ~1 rows (environ)
/*!40000 ALTER TABLE `t_clients` DISABLE KEYS */;
INSERT INTO `t_clients` (`Id_client`, `Identifiant`, `MDP`, `nom_client`, `prenom_client`, `adresse_client`, `telephonie_client`, `email_client`) VALUES
	(1, 'testt', 'test', 'test', 'test', 'un endroit sur terre', 'un numero', 'unmail@gmail.com');
/*!40000 ALTER TABLE `t_clients` ENABLE KEYS */;

-- Listage de la structure de la table clickandcollect. t_commandes
CREATE TABLE IF NOT EXISTS `t_commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `total_commande` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_commande`),
  KEY `FK_commande_client` (`id_client`),
  CONSTRAINT `FK_commande_client` FOREIGN KEY (`id_client`) REFERENCES `t_clients` (`Id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table clickandcollect.t_commandes : ~0 rows (environ)
/*!40000 ALTER TABLE `t_commandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_commandes` ENABLE KEYS */;

-- Listage de la structure de la table clickandcollect. t_produits
CREATE TABLE IF NOT EXISTS `t_produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL DEFAULT '',
  `prix_produit` float DEFAULT '0',
  `poid_produit` float DEFAULT '0',
  `description_produit` text,
  `stock_produit` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `nom_produit` (`nom_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table clickandcollect.t_produits : ~0 rows (environ)
/*!40000 ALTER TABLE `t_produits` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_produits` ENABLE KEYS */;

-- Listage de la structure de la table clickandcollect. t_produits_commande
CREATE TABLE IF NOT EXISTS `t_produits_commande` (
  `Id_commande` int(11) NOT NULL,
  `Id_produit` int(11) NOT NULL,
  `quantitee_commande` float NOT NULL DEFAULT '0',
  KEY `FK_p_d_commande` (`Id_commande`),
  KEY `FK_p_d_produit` (`Id_produit`),
  CONSTRAINT `FK_p_d_commande` FOREIGN KEY (`Id_commande`) REFERENCES `t_commandes` (`id_commande`),
  CONSTRAINT `FK_p_d_produit` FOREIGN KEY (`Id_produit`) REFERENCES `t_produits` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table clickandcollect.t_produits_commande : ~0 rows (environ)
/*!40000 ALTER TABLE `t_produits_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_produits_commande` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
