-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pw2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `generique__pays`
--

DROP TABLE IF EXISTS `generique__pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generique__pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `producteur` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generique__pays`
--

LOCK TABLES `generique__pays` WRITE;
/*!40000 ALTER TABLE `generique__pays` DISABLE KEYS */;
INSERT INTO `generique__pays` VALUES (1,'Afghanistan',0),(2,'Afrique du Sud',1),(3,'Albanie',0),(4,'Algérie',0),(5,'Allemagne',1),(6,'Andorre',0),(7,'Angola',0),(8,'Antigua-et-Barbuda',0),(9,'Arabie saoudite',0),(10,'Argentine',1),(11,'Arménie',1),(12,'Australie',1),(13,'Autriche',1),(14,'Azerbaïdjan',0),(15,'Bahamas',0),(16,'Bahreïn',0),(17,'Bangladesh',0),(18,'Barbade',0),(19,'Belgique',0),(20,'Belize',0),(21,'Bénin',0),(22,'Bhoutan',0),(23,'Bélarus',0),(24,'Birmanie',0),(25,'Bolivie',0),(26,'Bosnie-Herzégovine',0),(27,'Botswana',0),(28,'Brésil',1),(29,'Brunei',0),(30,'Bulgarie',1),(31,'Burkina',0),(32,'Burundi',0),(33,'Cambodge',0),(34,'Cameroun',0),(35,'Canada',1),(36,'Cap-Vert',0),(37,'République centrafricaine',0),(38,'Chili',1),(39,'Chine',1),(40,'Chypre',0),(41,'Colombie',0),(42,'Comores',0),(43,'Congo',0),(44,'République démocratique du Congo',0),(45,'Îles Cook',0),(46,'Corée du Nord',0),(47,'Corée du Sud',0),(48,'Costa Rica',0),(49,'Côte d\'Ivoire',0),(50,'Croatie',0),(51,'Cuba',0),(52,'Danemark',0),(53,'Djibouti',0),(54,'République dominicaine',0),(55,'Dominique',0),(56,'Égypte',0),(57,'Émirats arabes unis',0),(58,'Équateur',0),(59,'Érythrée',0),(60,'Espagne',1),(61,'Estonie',0),(62,'Eswatini',0),(63,'États-Unis',1),(64,'Éthiopie',0),(65,'Fidji',0),(66,'Finlande',0),(67,'France',1),(68,'Gabon',0),(69,'Gambie',0),(70,'Géorgie',1),(71,'Ghana',0),(72,'Grèce',1),(73,'Grenade',0),(74,'Guatemala',0),(75,'Guinée',0),(76,'Guinée-Bissau',0),(77,'Guinée équatoriale',0),(78,'Guyana',0),(79,'Haïti',0),(80,'Honduras',0),(81,'Hongrie',1),(82,'Inde',0),(83,'Indonésie',0),(84,'Irak',0),(85,'Iran',0),(86,'Irlande',0),(87,'Islande',0),(88,'Israël',1),(89,'Italie',1),(90,'Jamaïque',0),(91,'Japon',0),(92,'Jordanie',0),(93,'Kazakhstan',0),(94,'Kenya',0),(95,'Kirghizie',0),(96,'Kiribati',0),(97,'Koweït',0),(98,'Laos',0),(99,'Lesotho',0),(100,'Lettonie',0),(101,'Liban',1),(102,'Libéria',0),(103,'Libye',0),(104,'Liechtenstein',0),(105,'Lituanie',0),(106,'Luxembourg',1),(107,'Macédoine du Nord',0),(108,'Madagascar',0),(109,'Malaisie',0),(110,'Malawi',0),(111,'Maldives',0),(112,'Mali',0),(113,'Malte',0),(114,'Maroc',1),(115,'Marshall',0),(116,'Maurice',0),(117,'Mauritanie',0),(118,'Mexique',1),(119,'Micronésie',0),(120,'Moldavie',1),(121,'Monaco',0),(122,'Mongolie',0),(123,'Monténégro',0),(124,'Mozambique',0),(125,'Namibie',0),(126,'Nauru',0),(127,'Népal',0),(128,'Nicaragua',0),(129,'Niger',0),(130,'Nigéria',0),(131,'Niue',0),(132,'Norvège',0),(133,'Nouvelle-Zélande',1),(134,'Oman',0),(135,'Ouganda',0),(136,'Ouzbékistan',0),(137,'Pakistan',0),(138,'Palaos',0),(139,'Palestine',0),(140,'Panama',0),(141,'Papouasie-Nouvelle-Guinée',0),(142,'Paraguay',0),(143,'Pays-Bas',0),(144,'Pérou',0),(145,'Philippines',0),(146,'Pologne',0),(147,'Portugal',1),(148,'Qatar',0),(149,'République tchèque',1),(150,'Roumanie',1),(151,'Royaume-Uni',1),(152,'Russie',0),(153,'Rwanda',0),(154,'Saint-Christophe-et-Niévès',0),(155,'Sainte-Lucie',0),(156,'Saint-Marin',0),(157,'Saint-Vincent-et-les Grenadines',0),(158,'Îles Salomon',0),(159,'Salvador',0),(160,'Samoa',0),(161,'Sao Tomé-et-Principe',0),(162,'Sénégal',0),(163,'Serbie',0),(164,'Seychelles',0),(165,'Sierra Leone',0),(166,'Singapour',0),(167,'Slovaquie',0),(168,'Slovénie',1),(169,'Somalie',0),(170,'Soudan',0),(171,'Soudan du Sud',0),(172,'Sri Lanka',0),(173,'Suède',0),(174,'Suisse',1),(175,'Suriname',0),(176,'Syrie',0),(177,'Tadjikistan',0),(178,'Tanzanie',0),(179,'Tchad',0),(180,'Thaïlande',0),(181,'Timor oriental',0),(182,'Togo',0),(183,'Tonga',0),(184,'Trinité-et-Tobago',0),(185,'Tunisie',0),(186,'Turkménistan',0),(187,'Turquie',1),(188,'Tuvalu',0),(189,'Ukraine',0),(190,'Uruguay',1),(191,'Vanuatu',0),(192,'Vatican',0),(193,'Venezuela',0),(194,'Viêt Nam',0),(195,'Yémen',0),(196,'Zambie',0),(197,'Zimbabwe',0);
/*!40000 ALTER TABLE `generique__pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generique_ordre_tri`
--

DROP TABLE IF EXISTS `generique_ordre_tri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generique_ordre_tri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `champ` varchar(45) NOT NULL,
  `ordre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generique_ordre_tri`
--

LOCK TABLES `generique_ordre_tri` WRITE;
/*!40000 ALTER TABLE `generique_ordre_tri` DISABLE KEYS */;
INSERT INTO `generique_ordre_tri` VALUES (1,'Nom de la bouteille (croissant)','nom_bouteille','asc'),(2,'Nom de la bouteille (décroissant)','nom_bouteille','desc'),(3,'Date d\'achat (croissante)','date_achat','asc'),(4,'Date d\'achat (décroissante)','date_achat','desc'),(5,'Prix (croissant)','prix_bouteille','asc'),(6,'Prix (décroissant)','prix_bouteille','desc'),(7,'Note (croissante)','note','asc'),(8,'Note (décroissante)','note','desc'),(9,'Millésime (croissant)','millesime','asc'),(10,'Millésime (décroissant)','millesime','desc'),(11,'Quantité (croissante)','quantite_bouteille','asc'),(12,'Quantité (décroissante)','quantite_bouteille','desc');
/*!40000 ALTER TABLE `generique_ordre_tri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager__bouteille`
--

DROP TABLE IF EXISTS `usager__bouteille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager__bouteille` (
  `id_bouteille` int(11) NOT NULL AUTO_INCREMENT,
  `id_cellier` int(11) NOT NULL,
  `nom_bouteille` varchar(200) DEFAULT NULL,
  `quantite_bouteille` int(11) DEFAULT NULL,
  `prix_bouteille` varchar(10) DEFAULT NULL,
  `description_bouteille` varchar(200) DEFAULT NULL,
  `image_bouteille` varchar(200) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `garde_jusqua` date DEFAULT NULL,
  `note` varchar(10) DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `millesime` varchar(10) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `code_cup` varchar(200) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `pays_nom` varchar(100) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `region_nom` varchar(100) DEFAULT NULL,
  `type_de_vin_id` int(11) DEFAULT NULL,
  `type_de_vin_nom` varchar(100) DEFAULT NULL,
  `producteur` varchar(200) DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format_id` int(11) DEFAULT NULL,
  `format_nom` varchar(100) DEFAULT NULL,
  `appellation_id` int(11) DEFAULT NULL,
  `appellation_nom` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `designation_nom` varchar(100) DEFAULT NULL,
  `classification_id` int(11) DEFAULT NULL,
  `classification_nom` varchar(100) DEFAULT NULL,
  `cepage_id` int(11) DEFAULT NULL,
  `cepage_nom` varchar(100) DEFAULT NULL,
  `taux_de_sucre_id` int(11) DEFAULT NULL,
  `taux_de_sucre_nom` varchar(100) DEFAULT NULL,
  `degre_alcool_id` int(11) DEFAULT NULL,
  `degre_alcool_nom` varchar(100) DEFAULT NULL,
  `produit_du_quebec_id` int(11) DEFAULT NULL,
  `produit_du_quebec_nom` varchar(100) DEFAULT NULL,
  `biodynamique` tinyint(1) DEFAULT NULL,
  `casher` tinyint(1) DEFAULT NULL,
  `desalcoolise` tinyint(1) DEFAULT NULL,
  `equitable` tinyint(1) DEFAULT NULL,
  `faible_taux_alcool` tinyint(1) DEFAULT NULL,
  `produit_bio` tinyint(1) DEFAULT NULL,
  `vin_nature` tinyint(1) DEFAULT NULL,
  `vin_orange` tinyint(1) DEFAULT NULL,
  `id_vino__bouteille` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bouteille`),
  FULLTEXT KEY `nom_bouteille` (`nom_bouteille`,`millesime`,`pays_nom`,`region_nom`,`type_de_vin_nom`,`format_nom`,`cepage_nom`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager__bouteille`
--

LOCK TABLES `usager__bouteille` WRITE;
/*!40000 ALTER TABLE `usager__bouteille` DISABLE KEYS */;
INSERT INTO `usager__bouteille` VALUES (1,1,'1000 Stories Zinfandel Californie',4,'29.99','Vin rouge | 750 ml | États-Unis','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png','2020-01-16',NULL,'5',NULL,'2016','13584455','00082896001453',13,'États-Unis',45,'Californie',1,'Vin rouge','1000 Stories Vineyards','https://www.saq.com/fr/13584455','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png',5,'750 ml',NULL,NULL,27,'Vin de table (VDT)',13,'Barrel fermented',205,'Zinfandel 100 %',104,'8 g/L',73,'15,5 %',NULL,NULL,0,0,0,0,0,0,0,0,1),(2,1,'1000 Stories Zinfandel Californie',11,'29.99','Vin rouge | 750 ml | États-Unis','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png','2021-02-08',NULL,'6',NULL,'2020','13584455','00082896001453',13,'États-Unis',45,'Californie',1,'Vin rouge','1000 Stories Vineyards','https://www.saq.com/fr/13584455','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png',5,'750 ml',NULL,NULL,27,'Vin de table (VDT)',13,'Barrel fermented',205,'Zinfandel 100 %',104,'8 g/L',73,'15,5 %',NULL,NULL,0,0,0,0,0,0,0,0,2),(4,1,'13th Street Winery Gamay 2019',12,'20.99','Vin rouge | 750 ml | Canada','https://www.saq.com/media/catalog/product/1/2/12705631-1_1582140016.png','2021-04-02',NULL,'8',NULL,'2011','12705631','00895770010010',9,'Arabie saoudite',162,'Ontario, Péninsule du Niagara',1,'Vin rouge','13th Street Winery','https://www.saq.com/fr/12705631','https://www.saq.com/media/catalog/product/1/2/12705631-1_1582140016.png',5,'750 ml',391,'Péninsule du Niagara',35,'Vin de table (VDT)',NULL,NULL,59,'Gamay 100 %',26,'2,4 g/L',20,'12,5 %',NULL,NULL,0,0,0,0,0,0,0,0,4),(6,1,'19 Crimes Cabernet-Sauvignon Limestone Coast',8,'19.99','Vin rouge | 750 ml | Australie','https://www.saq.com/media/catalog/product/1/2/12824197-1_1578411313.png','2021-06-30',NULL,'8',NULL,'2021','12824197','09311220004534',5,'Allemagne',19,'Australie-Méridionale, Barossa Valley',1,'Vin rouge','19 Crimes','https://www.saq.com/fr/12824197','https://www.saq.com/media/catalog/product/1/2/12824197-1_1578411313.png',5,'750 ml',NULL,NULL,27,'Vin de table (VDT)',NULL,NULL,27,'Cabernet-sauvignon 100 %',28,'2,6 g/L',NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,6);
/*!40000 ALTER TABLE `usager__bouteille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager__cellier`
--

DROP TABLE IF EXISTS `usager__cellier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager__cellier` (
  `id_cellier` int(11) NOT NULL AUTO_INCREMENT,
  `id_usager` int(11) NOT NULL,
  `nom_cellier` varchar(100) NOT NULL,
  `description_cellier` text DEFAULT NULL,
  `type_cellier_id` int(11) NOT NULL,
  PRIMARY KEY (`id_cellier`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager__cellier`
--

LOCK TABLES `usager__cellier` WRITE;
/*!40000 ALTER TABLE `usager__cellier` DISABLE KEYS */;
INSERT INTO `usager__cellier` VALUES (1,1,'Cellier 01','Cellier au sous-sol',1),(2,1,'Cellier 02','Frigidaire à vin dans la cuisine',2);
/*!40000 ALTER TABLE `usager__cellier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager__detail`
--

DROP TABLE IF EXISTS `usager__detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager__detail` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `verification_courriel` timestamp NULL DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(100) NOT NULL,
  `date_creation` timestamp NULL DEFAULT NULL,
  `date_modification` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usager_courriel_unique` (`courriel`),
  CONSTRAINT `usager_login_id_foreign` FOREIGN KEY (`id`) REFERENCES `usager__login` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager__detail`
--

LOCK TABLES `usager__detail` WRITE;
/*!40000 ALTER TABLE `usager__detail` DISABLE KEYS */;
INSERT INTO `usager__detail` VALUES (1,'Toto Gingras','123 de la Commune','5145555555','roychristian2013@gmail.com',NULL,'2010-10-10','Montreal','2022-06-10 01:52:43','2022-06-10 01:52:43'),(18,'Toto Gingras','8592 rue de Reims\\r\\n','5148312405','toto@gmail.com',NULL,'2009-08-13','Montréal','2022-06-19 22:27:27','2022-06-19 22:27:27');
/*!40000 ALTER TABLE `usager__detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager__login`
--

DROP TABLE IF EXISTS `usager__login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager__login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `jeton` varchar(255) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT NULL,
  `date_modification` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_utilisateur_unique` (`nom_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager__login`
--

LOCK TABLES `usager__login` WRITE;
/*!40000 ALTER TABLE `usager__login` DISABLE KEYS */;
INSERT INTO `usager__login` VALUES (1,'Test01','$2y$10$b3y8BkSxrLBLOghmDtsTfORqx0pC9MWXgYspV/C15o85YZ6mB2.r2','ad3f2f3ce073a77c3e1cfdbe5fec6572','2022-06-10 01:52:43','2022-06-10 01:52:43'),(18,'Test02','$2y$10$SVoH3gU.NIBr.6f6wUu85OT0nrP1fd/RQ7TdxEmdoGZ3iGihfVyui','14d81b04b7b4fb2baff2464160969975','2022-06-19 22:27:27','2022-06-19 22:27:27');
/*!40000 ALTER TABLE `usager__login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usager__ville`
--

DROP TABLE IF EXISTS `usager__ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usager__ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usager__ville`
--

LOCK TABLES `usager__ville` WRITE;
/*!40000 ALTER TABLE `usager__ville` DISABLE KEYS */;
INSERT INTO `usager__ville` VALUES (1,'Montréal',NULL,NULL);
/*!40000 ALTER TABLE `usager__ville` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__appellation`
--

DROP TABLE IF EXISTS `vino__appellation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__appellation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=650 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__appellation`
--

LOCK TABLES `vino__appellation` WRITE;
/*!40000 ALTER TABLE `vino__appellation` DISABLE KEYS */;
INSERT INTO `vino__appellation` VALUES (1,'A. A. Sottozona Valle Isarco'),(2,'A. A. Sottozona Valle Venosta'),(3,'Abruzzo'),(4,'Aglianico del Taburno/Taburno'),(5,'Aglianico del Vulture'),(6,'Ajaccio'),(7,'Alella'),(8,'Alenquer'),(9,'Alentejo'),(10,'Alexander Valley'),(11,'Alicante'),(12,'Almansa'),(13,'Aloxe-Corton'),(14,'Aloxe-Corton Premier Cru'),(15,'Alsace'),(16,'Alsace Grand Cru'),(17,'Alto Adige/Südtirol'),(18,'Amarone della Valpolicella'),(19,'Anderson Valley'),(20,'Anjou'),(21,'Arbois'),(22,'Arroyo Seco'),(23,'Asti'),(24,'Auxey-Duresses'),(25,'Auxey-Duresses Premier Cru'),(26,'Baden'),(27,'Bairrada'),(28,'Bandol'),(29,'Barbaresco'),(30,'Barbera d\'Alba'),(31,'Barbera d\'Asti'),(32,'Barco Reale di Carmignano'),(33,'Bardolino'),(34,'Barolo'),(35,'Barsac'),(36,'Beamsville Bench'),(37,'Beaujolais'),(38,'Beaujolais Villages'),(39,'Beaumes de Venise'),(40,'Beaune'),(41,'Beaune Premier Cru'),(42,'Beira Interior'),(43,'Beni-M\'Tir'),(44,'Bergerac'),(45,'Bergerac sec'),(46,'Bianco di Custoza'),(47,'Bierzo'),(48,'Biferno'),(49,'Blaye Côtes de Bordeaux'),(50,'Bolgheri'),(51,'Bordeaux'),(52,'Bordeaux clairet'),(53,'Bordeaux Supérieur'),(54,'Bot River'),(55,'Bottelary'),(56,'Bourg / Côtes de Bourg'),(57,'Bourgogne'),(58,'Bourgogne Aligoté'),(59,'Bourgogne Côte Chalonnaise'),(60,'Bourgogne Côte d\'Auxerre'),(61,'Bourgogne Côte d\'Or'),(62,'Bourgogne Épineuil'),(63,'Bourgogne Hautes-Côtes de Beaune'),(64,'Bourgogne Hautes-Côtes de Nuits'),(65,'Bourgogne Montrecul'),(66,'Bourgogne Passe-tout-grains'),(67,'Bourgueil'),(68,'Breede River Valley'),(69,'Breganze'),(70,'Brouilly'),(71,'Brulhois'),(72,'Brunello di Montalcino'),(73,'Bugey'),(74,'Burgenland'),(75,'Buzet'),(76,'Cadillac'),(77,'Cadillac Côtes de Bordeaux'),(78,'Cahors'),(79,'Cairanne'),(80,'Calatayud'),(81,'California Shenandoah Valley'),(82,'Campo de Borja'),(83,'Cannonau di Sardegna'),(84,'Canon Fronsac'),(85,'Carignano del Sulcis'),(86,'Carinena'),(87,'Carmignano'),(88,'Carnuntum'),(89,'Castel del Monte'),(90,'Castel del Monte Rosso Riserva'),(91,'Castelli di Jesi Verdicchio Riserva'),(92,'Castillon Côtes de Bordeaux'),(93,'Catalunya'),(94,'Central Coast'),(95,'Cerasuolo di Vittoria'),(96,'Chablis'),(97,'Chablis Grand Cru'),(98,'Chablis Premier Cru'),(99,'Chacoli de Guetaria'),(100,'Chacoli de Vizcaya'),(101,'Chambertin Grand Cru'),(102,'Chambertin-Clos-de-Bèze Grand Cru'),(103,'Chambolle-Musigny'),(104,'Chambolle-Musigny Premier Cru'),(105,'Chapelle-Chambertin Grand Cru'),(106,'Charmes-Chambertin Grand Cru'),(107,'Chassagne-Montrachet'),(108,'Chassagne-Montrachet Premier Cru'),(109,'Château-Grillet'),(110,'Châteauneuf-du-Pape'),(111,'Chehalem Mountains'),(112,'Chénas'),(113,'Cheverny'),(114,'Chianti'),(115,'Chianti Classico'),(116,'Chianti Colli Fiorentini'),(117,'Chianti Rufina'),(118,'Chimbarongo'),(119,'Chinon'),(120,'Chiroubles'),(121,'Chorey-lès-Beaune'),(122,'Clos de La Roche Grand Cru'),(123,'Clos de Vougeot Grand Cru'),(124,'Clos des Lambrays Grand Cru'),(125,'Coastal Region'),(126,'Colli Berici'),(127,'Colli Bolognesi'),(128,'Colli Euganei'),(129,'Colli Martani'),(130,'Colli Piacentini'),(131,'Colli Tortonesi'),(132,'Collio Goriziano / Collio'),(133,'Collioure'),(134,'Columbia Gorge'),(135,'Columbia Valley'),(136,'Conca de Barbera'),(137,'Condrieu'),(138,'Constantia'),(139,'Contea di Sclafani / Valledolmo-Contea di Sclafani'),(140,'Corbières'),(141,'Cornas'),(142,'Corse Calvi'),(143,'Corton Grand Cru'),(144,'Corton-Charlemagne Grand Cru'),(145,'Cortona'),(146,'Coste della Sesia'),(147,'Costers del Segre'),(148,'Costières de Nîmes'),(149,'Côte de Beaune-Villages'),(150,'Côte de Brouilly'),(151,'Côte Roannaise'),(152,'Côte Rôtie'),(153,'Côte-de-Nuits-Villages'),(154,'Coteaux Bourguignons'),(155,'Coteaux d\'Aix-en-Provence'),(156,'Coteaux d\'Ancenis'),(157,'Coteaux du Layon'),(158,'Coteaux du Vendômois'),(159,'Coteaux Varois en Provence'),(160,'Côtes d\'Auvergne'),(161,'Côtes d\'Auvergne Châteaugay'),(162,'Côtes de Beaune'),(163,'Côtes de Bergerac'),(164,'Côtes de Bordeaux'),(165,'Côtes de Castillon'),(166,'Côtes de Meliton'),(167,'Côtes de Provence'),(168,'Côtes du Jura'),(169,'Côtes du Marmandais'),(170,'Côtes du Rhône'),(171,'Côtes du Rhône Villages'),(172,'Côtes du Rhône Villages Chusclan'),(173,'Côtes du Rhône Villages Plan de Dieu'),(174,'Côtes du Rhône Villages Roaix'),(175,'Côtes du Rhône Villages Sablet'),(176,'Côtes du Rhône Villages Séguret'),(177,'Côtes du Rhône Villages Valréas'),(178,'Côtes du Rhône Villages Visan'),(179,'Côtes du Roussillon'),(180,'Côtes du Roussillon Villages'),(181,'Côtes du Roussillon Villages Caramany'),(182,'Côtes du Roussillon Villages Latour-de-France'),(183,'Côtes du Roussillon Villages Lesquerde'),(184,'Côtes du Roussillon Villages Tautavel'),(185,'Cour-Cheverny'),(186,'Crozes-Hermitage'),(187,'Curtefranca'),(188,'Dâo'),(189,'Delle Venezie'),(190,'Do Tejo'),(191,'Dogliani'),(192,'Dolcetto d\'Alba'),(193,'Douro'),(194,'Dry Creek Valley'),(195,'Duché d\'Uzès'),(196,'Dundee Hills'),(197,'Durbanville'),(198,'Echezeaux Grand Cru'),(199,'Edna Valley'),(200,'Eger'),(201,'El Dorado'),(202,'Elgin'),(203,'Empordà'),(204,'Entre-Deux-Mers'),(205,'Eola -Amity Hills'),(206,'Etna'),(207,'Falerio dei Colli Ascolani ou Faleiro'),(208,'Faro'),(209,'Faugères'),(210,'Fiano di Avellino'),(211,'Fitou'),(212,'Fixin'),(213,'Fixin Premier Cru'),(214,'Fleurie'),(215,'Fort Ross-Seaview'),(216,'Four Mile Creek'),(217,'Francs Côtes de Bordeaux'),(218,'Friuli / Friuli Venezia Giulia'),(219,'Friuli Aquileia'),(220,'Friuli Colli Orientali'),(221,'Friuli Isonzo / Isonzo del Friuli'),(222,'Fronsac'),(223,'Fronton'),(224,'Gaillac'),(225,'Garda'),(226,'Gattinara'),(227,'Gavi / Cortese di Gavi'),(228,'Gevrey-Chambertin'),(229,'Gevrey-Chambertin Premier Cru'),(230,'Gigondas'),(231,'Gioia del Colle'),(232,'Givry'),(233,'Givry Premier Cru'),(234,'Golden Mile Bench'),(235,'Grand Cru Furstentum'),(236,'Grand Cru Geisberg'),(237,'Grand Cru Kaefferkopf'),(238,'Grand Cru Kirchberg'),(239,'Grand Cru Sommerberg'),(240,'Grand-Echezeaux Grand Cru'),(241,'Graves'),(242,'Greco di Tufo'),(243,'Green Valley of Russian River Valley'),(244,'Grignan-les-Adhémar'),(245,'Grignolino d\'Asti'),(246,'Griotte-Chambertin Grand Cru'),(247,'Gutturnio'),(248,'Happy Canyon of Santa Barbara'),(249,'Haut-Médoc'),(250,'Hemel-en-Aarde Valley'),(251,'Hermitage'),(252,'Horse Heaven Hills'),(253,'HOWM'),(254,'Île Pelée'),(255,'Irouleguy'),(256,'Irpinia'),(257,'Isla de Maipo'),(258,'Jasnières'),(259,'Juliénas'),(260,'Jumilla'),(261,'Jurançon'),(262,'Jurançon sec'),(263,'Kamptal'),(264,'Klaasvoogds'),(265,'Knights Valley'),(266,'Kremstal'),(267,'L\'Etoile'),(268,'La Clape'),(269,'La Mancha'),(270,'Lacrima di Morro / Lacrima di Morro d\'Alba'),(271,'Ladoix'),(272,'Ladoix Premier Cru'),(273,'Lalande-de-Pomerol'),(274,'Langhe'),(275,'Languedoc'),(276,'Languedoc Grès de Montpellier'),(277,'Languedoc Montpeyroux'),(278,'Latricières-Chambertin Grand Cru'),(279,'Limoux'),(280,'Lirac'),(281,'Listrac-Médoc'),(282,'Livermore Valley'),(283,'Lodi'),(284,'Lolol'),(285,'Long Island'),(286,'Los Carneros'),(287,'Luberon'),(288,'Lugana'),(289,'Lujan de Cuyo'),(290,'Lussac-Saint-Emilion'),(291,'Mâcon'),(292,'Mâcon Villages'),(293,'Mâcon-Azé'),(294,'Mâcon-Bray'),(295,'Mâcon-Chaintré'),(296,'Mâcon-Cruzille'),(297,'Mâcon-Fuissé'),(298,'Mâcon-Loché'),(299,'Mâcon-Lugny'),(300,'Mâcon-Milly-Lamartine'),(301,'Mâcon-Péronne'),(302,'Mâcon-Pierreclos'),(303,'Mâcon-Verzé'),(304,'Madiran'),(305,'Malmesbury'),(306,'Manchuela'),(307,'Mantinia'),(308,'Maranges Premier Cru'),(309,'Maremma Toscana'),(310,'Margaux'),(311,'Marsannay'),(312,'Maury sec'),(313,'Mazis-Chambertin Grand Cru'),(314,'Mazoyères-Chambertin Grand Cru'),(315,'Médoc'),(316,'Melipilla'),(317,'Mendocino'),(318,'Menetou-Salon'),(319,'Mentrida'),(320,'Mercurey'),(321,'Mercurey Premier Cru'),(322,'Meursault'),(323,'Meursault Premier Cru'),(324,'Minervois'),(325,'Minervois-La Livinière'),(326,'Molise'),(327,'Monferrato'),(328,'Monica di Sardegna'),(329,'Monreale'),(330,'Montagne-Saint-Emilion'),(331,'Montagny'),(332,'Montagny Premier Cru'),(333,'Montecucco'),(334,'Montefalco Sagrantino'),(335,'Montepulciano d\'Abruzzo'),(336,'Monterey'),(337,'Monthélie'),(338,'Montilla-Moriles'),(339,'Montlouis-sur-Loire'),(340,'Montravel'),(341,'Montsant'),(342,'Moon Mountain District Sonoma County'),(343,'Morellino di Scansano'),(344,'Morey-Saint-Denis'),(345,'Morey-Saint-Denis Premier Cru'),(346,'Morgon'),(347,'Moscadello di Montalcino'),(348,'Mosel'),(349,'Moulin-à-Vent'),(350,'Moulis ou Moulis-en-Médoc'),(351,'Mt. Harlan'),(352,'Mt. Veeder'),(353,'Mulchen'),(354,'Muscadet'),(355,'Muscadet Côtes de Grandlieu'),(356,'Muscadet Sèvre et Maine Clisson'),(357,'Muscadet-Sèvre et Maine'),(358,'Musigny Grand Cru'),(359,'Nahe'),(360,'Nancagua'),(361,'Naoussa'),(362,'Napa Valley'),(363,'Navarra'),(364,'Nebbiolo d\'Alba'),(365,'Neuchâtel'),(366,'Neusiedlersee'),(367,'Niagara Escarpment'),(368,'Niagara-on-the-Lake'),(369,'Niederösterreich'),(370,'Nizza'),(371,'North Coast'),(372,'Nuits-Saint-Georges'),(373,'Nuits-Saint-Georges Premier Cru'),(374,'Oak Knoll District of Napa Valley'),(375,'Oakville'),(376,'Obidos'),(377,'Offida'),(378,'Overberg'),(379,'PAARL'),(380,'Pacherenc du Vic-Bilh'),(381,'Pago de Arínzano'),(382,'Pago de Otazu'),(383,'Pago Dominio de Valdepusa'),(384,'Palmela'),(385,'Panquehue'),(386,'Paso Robles'),(387,'Patras'),(388,'Patrimonio'),(389,'Pauillac'),(390,'Penedès'),(391,'Péninsule du Niagara'),(392,'Pernand-Vergelesse Premier Cru'),(393,'Pessac-Léognan'),(394,'Petit Chablis'),(395,'Peumo'),(396,'Pfalz'),(397,'Piave'),(398,'Pic Saint-Loup'),(399,'Picpoul de Pinet'),(400,'Piemonte'),(401,'Pinot nero dell\' Oltrepò Pavese'),(402,'Polkadraai Hills'),(403,'Pomerol'),(404,'Pomino'),(405,'Pommard'),(406,'Pommard Premier Cru'),(407,'Pouilly-Fuissé'),(408,'Pouilly-Fuissé Premier Cru'),(409,'Pouilly-Fumé ou Blanc Fumé de Pouilly'),(410,'Pouilly-Loché'),(411,'Premières Côtes de Blaye'),(412,'Premières Côtes de Bordeaux'),(413,'Primitivo di Manduria'),(414,'Priorat'),(415,'Puente Alto'),(416,'Puisseguin Saint-Emilion'),(417,'Puligny-Montrachet Premier Cru'),(418,'Quarts de Chaume'),(419,'Quincy'),(420,'Rapsani'),(421,'Rasteau'),(422,'Recioto della Valpolicella'),(423,'Recioto di Soave'),(424,'Red Mountain'),(425,'Régnié'),(426,'Requinoa'),(427,'Reuilly'),(428,'Rheingau'),(429,'Rheinhessen'),(430,'Rias Baixas'),(431,'Ribbon Ridge'),(432,'Ribeira Sacra'),(433,'Ribeiro'),(434,'Ribera del Duero'),(435,'Ribera del Jucar'),(436,'Riebeekberg'),(437,'Rioja'),(438,'Rioja Alavesa'),(439,'Rioja Alta'),(440,'Rioja Baja'),(441,'Riviera del Garda Classico'),(442,'Robertson'),(443,'Robola de Céphalonie'),(444,'Roero'),(445,'Romagna'),(446,'Romagna Albana'),(447,'Rosso Conero'),(448,'Rosso di Montalcino'),(449,'Rosso di Montepulciano'),(450,'Rosso Piceno / Piceno'),(451,'Roussette de Savoie'),(452,'Rueda'),(453,'Rully'),(454,'Rully Premier Cru'),(455,'Russian River Valley'),(456,'Rutherford'),(457,'Saint-Amour'),(458,'Saint-Aubin Premier Cru'),(459,'Saint-Bris'),(460,'Saint-Chinian'),(461,'Saint-Emilion'),(462,'Saint-Emilion Grand Cru'),(463,'Saint-Estèphe'),(464,'Saint-Georges-Saint-Emilion'),(465,'Saint-Joseph'),(466,'Saint-Julien'),(467,'Saint-Nicolas-de-Bourgueil'),(468,'Saint-Romain'),(469,'Saint-Véran'),(470,'Sainte-Foy-Bordeaux'),(471,'Salamanca'),(472,'Salice Salentino'),(473,'Sambuca di Sicilia'),(474,'San Fernando'),(475,'San Francisco Bay'),(476,'San Rafael'),(477,'Sancerre'),(478,'Sant\'Antimo'),(479,'Santa Cruz'),(480,'Santa Cruz Mountains'),(481,'Santa Lucia Highlands'),(482,'Santa Maria Valley'),(483,'Santa Ynez Valley'),(484,'Santenay'),(485,'Santenay Premier Cru'),(486,'Santiago'),(487,'Saumur'),(488,'Saumur-Champigny'),(489,'Savennières'),(490,'Savigny-lès-Beaune'),(491,'Savigny-lès-Beaune Premier Cru'),(492,'Sforzato di Valtellina'),(493,'Short Hills Bench'),(494,'Sicilia'),(495,'Sierra de Malaga'),(496,'Sierra Foothills'),(497,'Simonsberg-Paarl'),(498,'Simonsberg-Stellenbosch'),(499,'Snipes Mountain'),(500,'Soave'),(501,'Somontano'),(502,'Sonoma Coast'),(503,'Sonoma Mountain'),(504,'Sonoma Valley'),(505,'Southern Oregon'),(506,'St David\'s Bench'),(507,'St. Helena'),(508,'Stajerska Slovenija'),(509,'Stellenbosch'),(510,'Stormsvlei'),(511,'Suisun Valley'),(512,'Swartland'),(513,'Swellendam'),(514,'Teroldego Rotaliano'),(515,'Terra Alta'),(516,'Terre di Cosenza'),(517,'Thermenregion'),(518,'Tierra de Leon'),(519,'Tokaji'),(520,'Torgiano'),(521,'Toro'),(522,'Torres-Vecras'),(523,'Touraine'),(524,'Touraine Chenonceaux'),(525,'Touraine Mesland'),(526,'Tradouw'),(527,'Trebbiano d\'Abruzzo'),(528,'Trentino'),(529,'Tulbagh'),(530,'Twenty Mile Bench'),(531,'Uclés'),(532,'Utiel-Requena'),(533,'Vacqueyras'),(534,'Val d\'Aoste Chambave'),(535,'Valais'),(536,'Valdeorras'),(537,'Valdepenas'),(538,'Valencia'),(539,'Valle Central'),(540,'Valle d\'Aosta ou Vallée d\'Aoste'),(541,'Valle de Casablanca'),(542,'Valle de la Orotava'),(543,'Valle de Leyda'),(544,'Valle de San Antonio'),(545,'Valle del Aconcagua'),(546,'Valle del Cachapoal'),(547,'Valle del Colchagua'),(548,'Valle del Curico'),(549,'Valle del Elqui'),(550,'Valle del Itata'),(551,'Valle del Limari'),(552,'Valle del Lontué'),(553,'Valle del Maipo'),(554,'Valle del Maule'),(555,'Valle del Rappel'),(556,'Vallée de l\'Okanagan'),(557,'Vallée de la Similkameen'),(558,'Valpolicella'),(559,'Valpolicella Ripasso'),(560,'Valtellina Rosso / Rosso di Valtellina'),(561,'Valtellina Superiore'),(562,'Venezia'),(563,'Ventoux'),(564,'Verdicchio dei Castelli di Jesi'),(565,'Verduno Pelaverga / Verduno'),(566,'Vermentino di Sardegna'),(567,'Vesuvio'),(568,'Vézelay'),(569,'Vienne'),(570,'Vin de Savoie'),(571,'Vin de Savoie Arbin'),(572,'Vin de Savoie Chignin-Bergeron'),(573,'Vin Santo del Chianti Classico'),(574,'Vinemount Ridge'),(575,'Vinho verde'),(576,'Vino Nobile di Montepulciano'),(577,'Vinos de Madrid'),(578,'Viré-Clessé'),(579,'Vittoria'),(580,'Volnay'),(581,'Volnay Premier Cru'),(582,'Volnay-Santenots Premier Cru'),(583,'Voor Paardeberg'),(584,'Vosne-Romanée'),(585,'Vosne-Romanée Premier Cru'),(586,'Vougeot Premier Cru'),(587,'Vouvray'),(588,'Wachau'),(589,'Wagram'),(590,'Wahluke Slope'),(591,'Walker Bay'),(592,'Walla Walla Valley'),(593,'Weinviertel'),(594,'Western Cape'),(595,'Willamette Valley'),(596,'Yakima Valley'),(597,'Yamhill-Carlton'),(598,'Yecla'),(599,'Zitsa'),(600,'Ancient Lakes of Columbia Valley'),(601,'Bianco di Pitigliano'),(602,'Bucelas'),(603,'Cerasuolo d\'Abruzzo'),(604,'Chacoli de Alava'),(605,'Chalk Hill'),(606,'Chevalier-Montrachet Grand Cru'),(607,'Cigales'),(608,'Cirò'),(609,'Clarksburg'),(610,'Colli Bolognesi Pignoletto'),(611,'Colli di Luni'),(612,'Colli Euganei Fior d\'Arancio / Fior d\'Arancio Colli Euganei'),(613,'Colli Maceratesi'),(614,'Côtes du Rhône Villages Laudun'),(615,'Franken'),(616,'Franschhoek Valley'),(617,'Gambellara'),(618,'Grand Cru Wineck-Schlossberg'),(619,'High Valley'),(620,'Languedoc Cabrières'),(621,'Les Baux de Provence'),(622,'Lincoln Lakeshore'),(623,'Mâcon-Charnay-lès-Mâcon'),(624,'Mâcon-Igé'),(625,'Mâcon-La-Roche-Vineuse'),(626,'Malaga'),(627,'Montello-Colli Asolani'),(628,'Moselle Luxembourgeoise'),(629,'Orvieto'),(630,'Pantelleria'),(631,'Pernand-Vergelesses'),(632,'Pouilly-Vinzelles'),(633,'Puligny-Montrachet'),(634,'River Junction'),(635,'Rosé de Loire'),(636,'Saint-Aubin'),(637,'Saint-Mont'),(638,'Saint-Péray'),(639,'Südsteiermark'),(640,'Tavel'),(641,'Touraine Azay-le-Rideau'),(642,'Traisental'),(643,'Tursan'),(644,'Valdadige / Etschtaler'),(645,'Valtenesi'),(646,'Verdicchio di Matelica'),(647,'Vernaccia di San Gimignano'),(648,'Vin de Savoie Apremont'),(649,'Yountville');
/*!40000 ALTER TABLE `vino__appellation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__bouteille`
--

DROP TABLE IF EXISTS `vino__bouteille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__bouteille` (
  `id_bouteille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_bouteille` varchar(200) DEFAULT NULL,
  `image_bouteille` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `code_cup` varchar(200) DEFAULT NULL,
  `pays_id` int(11) NOT NULL,
  `region_id` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `description_bouteille` varchar(200) DEFAULT NULL,
  `producteur` varchar(200) DEFAULT NULL,
  `prix_bouteille` float DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format_id` int(11) DEFAULT NULL,
  `appellation_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `classification_id` int(11) DEFAULT NULL,
  `cepages_id` int(11) DEFAULT NULL,
  `taux_de_sucre_id` int(11) DEFAULT NULL,
  `degre_alcool_id` int(11) DEFAULT NULL,
  `produit_du_quebec_id` int(11) DEFAULT NULL,
  `biodynamique` tinyint(1) DEFAULT NULL,
  `casher` tinyint(1) DEFAULT NULL,
  `desalcoolise` tinyint(1) DEFAULT NULL,
  `equitable` tinyint(1) DEFAULT NULL,
  `faible_taux_alcool` tinyint(1) DEFAULT NULL,
  `produit_bio` tinyint(1) DEFAULT NULL,
  `vin_nature` tinyint(1) DEFAULT NULL,
  `vin_orange` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bouteille`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__bouteille`
--

LOCK TABLES `vino__bouteille` WRITE;
/*!40000 ALTER TABLE `vino__bouteille` DISABLE KEYS */;
INSERT INTO `vino__bouteille` VALUES 
(1,'1000 Stories Zinfandel Californie','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png','13584455','00082896001453',13,'45',1,'Vin rouge | 750 ml | États-Unis','1000 Stories Vineyards',29.99,'https://www.saq.com/fr/13584455','https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png',5,NULL,27,13,205,104,73,NULL,0,0,0,0,0,0,0,0),
(2,'11th Hour Cellars Pinot Noir','https://www.saq.com/media/catalog/product/1/3/13966470-1_1578546924.png','13966470','00684586010501',13,'45',1,'Vin rouge | 750 ml | États-Unis','Ironwood Cellars',17.99,'https://www.saq.com/fr/13966470','https://www.saq.com/media/catalog/product/1/3/13966470-1_1578546924.png',5,NULL,27,NULL,NULL,69,NULL,NULL,0,0,0,0,0,0,0,0),
(3,'13th Street Winery Gamay 2019','https://www.saq.com/media/catalog/product/1/2/12705631-1_1582140016.png','12705631','00895770010010',9,'162',1,'Vin rouge | 750 ml | Canada','13th Street Winery',20.99,'https://www.saq.com/fr/12705631','https://www.saq.com/media/catalog/product/1/2/12705631-1_1582140016.png',5,391,35,NULL,59,26,20,NULL,0,0,0,0,0,0,0,0),
(4,'14 Hands Cabernet-Sauvignon Columbia Valley','https://www.saq.com/media/catalog/product/1/3/13876247-1_1582145731.png','13876247','00088586001895',13,'276',1,'Vin rouge | 750 ml | États-Unis','14 Hands Winery',16.99,'https://www.saq.com/fr/13876247','https://www.saq.com/media/catalog/product/1/3/13876247-1_1582145731.png',5,135,3,NULL,NULL,117,39,NULL,0,0,0,0,0,0,0,0),
(5,'19 Crimes Cabernet-Sauvignon Limestone Coast','https://www.saq.com/media/catalog/product/1/2/12824197-1_1578411313.png','12824197','09311220004534',5,'19',1,'Vin rouge | 750 ml | Australie','19 Crimes',19.99,'https://www.saq.com/fr/12824197','https://www.saq.com/media/catalog/product/1/2/12824197-1_1578411313.png',5,NULL,27,NULL,27,28,NULL,NULL,0,0,0,0,0,0,0,0),
(6,'19 Crimes Shiraz/Grenache/Mataro','https://www.saq.com/media/catalog/product/1/2/12073995-1_1643120137.png','12073995','00012354000995',5,'202',1,'Vin rouge | 750 ml | Australie','19 Crimes',19.99,'https://www.saq.com/fr/12073995','https://www.saq.com/media/catalog/product/1/2/12073995-1_1643120137.png',5,NULL,27,NULL,NULL,28,59,NULL,0,0,0,0,0,0,0,0),
(7,'19 Crimes The Uprising','https://www.saq.com/media/catalog/product/1/4/14715293-1_1615248955.png','14715293','00089819724628',5,'19',1,'Vin rouge | 375 ml | Australie','19 Crimes',9.99,'https://www.saq.com/fr/14715293','https://www.saq.com/media/catalog/product/1/4/14715293-1_1615248955.png',3,NULL,27,NULL,NULL,16,NULL,NULL,0,0,0,0,0,0,0,0),
(8,'19 Crimes The Warden 2017','https://www.saq.com/media/catalog/product/1/3/13846179-1_1578543327.png','13846179','00012354001602',5,'202',1,'Vin rouge | 750 ml | Australie','19 Crimes',30.99,'https://www.saq.com/fr/13846179','https://www.saq.com/media/catalog/product/1/3/13846179-1_1578543327.png',5,NULL,27,NULL,NULL,27,59,NULL,0,0,0,0,0,0,0,0),
(9,'1938 - Depuis Un Esprit D\'exception Puisseguin Saint-Émilion 2016','https://www.saq.com/media/catalog/product/1/1/11655601-1_1634748032.png','11655601','03108210270897',14,'33',1,'Vin rouge | 750 ml | France','Vignerons de Puisseguin',26.99,'https://www.saq.com/fr/11655601','https://www.saq.com/media/catalog/product/1/1/11655601-1_1634748032.png',5,416,1,NULL,NULL,30,39,NULL,0,0,0,0,0,0,0,0),
(10,'3 Badge Leese-Fitch Merlot 2015','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','13523011','00833302002423',13,'45',1,'Vin rouge | 750 ml | États-Unis','3 Badge',18.99,'https://www.saq.com/fr/13523011','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,NULL,27,NULL,NULL,60,39,NULL,0,0,0,0,0,0,0,0),
(11,'3 de Valandraud 2016','https://www.saq.com/media/catalog/product/1/3/13392031-1_1578535218.png','13392031','03380820063896',14,'33',1,'Vin rouge | 750 ml | France','Ets Thunevin',53.99,'https://www.saq.com/fr/13392031','https://www.saq.com/media/catalog/product/1/3/13392031-1_1578535218.png',5,462,1,30,NULL,31,NULL,NULL,0,0,0,0,0,0,0,0),
(12,'3 de Valandraud St-Émilion Grand Cru 2015','https://www.saq.com/media/catalog/product/1/4/14767616-1_1631204434.png','14767616','03380820059639',14,'33',1,'Vin rouge | 750 ml | France','Ets Thunevin',51.99,'https://www.saq.com/fr/14767616','https://www.saq.com/media/catalog/product/1/4/14767616-1_1631204434.png',5,462,1,29,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(13,'4 Kilos Gallinas y Focas 2018','https://www.saq.com/media/catalog/product/1/3/13903479-1_1641851135.png','13903479','08437012946156',12,'111',1,'Vin rouge | 750 ml | Espagne','4 Kilos vinícola s.l.',35.99,'https://www.saq.com/fr/13903479','https://www.saq.com/media/catalog/product/1/3/13903479-1_1641851135.png',5,NULL,31,NULL,98,NULL,NULL,NULL,0,0,0,0,0,1,1,0),
(14,'655 Miles Cabernet Sauvignon Lodi','https://www.saq.com/media/catalog/product/1/4/14139863-1_1578552320.png','14139863','00056049135920',13,'47',1,'Vin rouge | 750 ml | États-Unis','Arterra Wines Canada',15.99,'https://www.saq.com/fr/14139863','https://www.saq.com/media/catalog/product/1/4/14139863-1_1578552320.png',5,NULL,27,NULL,NULL,24,NULL,1,0,0,0,0,0,0,0,0),
(15,'A Mandria di Signadore Patrimonio 2019','https://www.saq.com/media/catalog/product/1/4/14736271-1_1624654560.png','14736271','04000147362715',14,'64',1,'Vin rouge | 750 ml | France','Clos Signadore',42.99,'https://www.saq.com/fr/14736271','https://www.saq.com/media/catalog/product/1/4/14736271-1_1624654560.png',5,388,1,NULL,131,NULL,59,NULL,0,0,0,0,0,1,0,0),
(16,'A Mandria di Signadore Patrimonio 2018','https://www.saq.com/media/catalog/product/1/1/11908161-1_1580629223.png','11908161','03770011450008',14,'64',1,'Vin rouge | 750 ml | France','Clos Signadore',41.99,'https://www.saq.com/fr/11908161','https://www.saq.com/media/catalog/product/1/1/11908161-1_1580629223.png',5,388,1,NULL,131,7,59,NULL,0,0,0,0,0,1,0,0),
(17,'A Occhipinti Rosso Arcaico 2020','https://www.saq.com/media/catalog/product/1/4/14651867-1_1612271137.png','14651867','03683080400198',19,'',1,'Vin rouge | 750 ml | Italie','Andrea Occhipinti',30.99,'https://www.saq.com/fr/14651867','https://www.saq.com/media/catalog/product/1/4/14651867-1_1612271137.png',5,NULL,30,NULL,NULL,5,20,NULL,0,0,0,0,0,0,1,0),
(18,'A thousand Lives Cabernet-Sauvignon Mendoza','https://www.saq.com/media/catalog/product/1/4/14250211-1_1580352616.png','14250211','07791540051395',3,'138',1,'Vin rouge | 750 ml | Argentine','Penaflor SA',10.99,'https://www.saq.com/fr/14250211','https://www.saq.com/media/catalog/product/1/4/14250211-1_1580352616.png',5,NULL,17,NULL,27,117,39,NULL,0,0,0,0,0,0,0,0),
(19,'A.A. Badenhorst The Curator 2020','https://www.saq.com/media/catalog/product/1/2/12819435-1_1589314084.png','12819435','06009800591385',1,'280',1,'Vin rouge | 750 ml | Afrique du Sud','Adi Badenhorst',14.99,'https://www.saq.com/fr/12819435','https://www.saq.com/media/catalog/product/1/2/12819435-1_1589314084.png',5,NULL,37,NULL,NULL,30,39,NULL,0,0,0,0,0,0,0,0),
(20,'Aalto Ribera del Duero 2019','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','14798869','08437003104466',12,'255',1,'Vin rouge | 750 ml | Espagne','Aalto Bodegas y Vinedos SA',72.99,'https://www.saq.com/fr/14798869','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,434,8,NULL,183,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(21,'Abad Dom Bueno Mencia Bierzo Joven 2019','https://www.saq.com/media/catalog/product/1/3/13794129-1_1626143125.png','13794129','08437004041265',12,'91',1,'Vin rouge | 750 ml | Espagne','Bodega del Abad',16.99,'https://www.saq.com/fr/13794129','https://www.saq.com/media/catalog/product/1/3/13794129-1_1626143125.png',5,47,8,36,108,23,NULL,NULL,0,0,0,0,0,0,0,0),
(22,'Abbaye St-Hilaire Les Cerisiers 2019','https://www.saq.com/media/catalog/product/9/1/913558-1_1635862860.png','913558','03496840005393',14,'176',1,'Vin rouge | 750 ml | France','Distilleries et Domaines de Provence',18.99,'https://www.saq.com/fr/913558','https://www.saq.com/media/catalog/product/9/1/913558-1_1635862860.png',5,159,1,NULL,NULL,5,NULL,NULL,0,0,0,0,0,0,0,0),
(23,'Abbia Nova Senza Vandalismi Cesanese del Piglio 2019','https://www.saq.com/media/catalog/product/1/4/14497871-1_1623254467.png','14497871','08051577610002',19,'105',1,'Vin rouge | 750 ml | Italie','Abbia Nova Srl',27.99,'https://www.saq.com/fr/14497871','https://www.saq.com/media/catalog/product/1/4/14497871-1_1623254467.png',5,NULL,NULL,NULL,33,3,39,NULL,0,0,0,0,0,0,1,0),
(24,'Abreu Cappella Rutherford 2012','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','13319141','04000133191411',13,'48',1,'Vin rouge | 750 ml | États-Unis','David Abreu',967.99,'https://www.saq.com/fr/13319141','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,456,3,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(25,'Abreu Las Posadas North Coast 2012','https://www.saq.com/media/catalog/product/1/3/13319096-1_1625772640.png','13319096','04000133190964',13,'48',1,'Vin rouge | 750 ml | États-Unis','David Abreu',967.99,'https://www.saq.com/fr/13319096','https://www.saq.com/media/catalog/product/1/3/13319096-1_1625772640.png',5,253,3,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(26,'Abreu Rothwell Hyde St. Helena 2012','https://www.saq.com/media/catalog/product/1/3/13004633-1_1581375941.png','13004633','04000130046332',13,'48',1,'Vin rouge | 750 ml | États-Unis','David Abreu',254.99,'https://www.saq.com/fr/13004633','https://www.saq.com/media/catalog/product/1/3/13004633-1_1581375941.png',5,507,3,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(27,'Abreu Thorevilos Napa Valley 2012','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','13319168','04000133191688',13,'48',1,'Vin rouge | 750 ml | États-Unis','David Abreu',967.99,'https://www.saq.com/fr/13319168','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,362,3,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(28,'Acumen Bordeaux Blend Mountainside Napa Valley 2015','https://www.saq.com/media/catalog/product/1/4/14043781-1_1578550215.png','14043781','00858374005011',13,'48',1,'Vin rouge | 750 ml | États-Unis','Mountain Peak Vineyards',49.99,'https://www.saq.com/fr/14043781','https://www.saq.com/media/catalog/product/1/4/14043781-1_1578550215.png',5,362,3,NULL,NULL,24,53,NULL,0,0,0,0,0,0,0,0),
(29,'Adaras Calizo Almansa 2020','https://www.saq.com/media/catalog/product/1/4/14134368-1_1578552318.png','14134368','08437006260084',12,'65',1,'Vin rouge | 750 ml | Espagne','Bodegas Almansenas',18.99,'https://www.saq.com/fr/14134368','https://www.saq.com/media/catalog/product/1/4/14134368-1_1578552318.png',5,12,8,NULL,62,7,39,NULL,0,0,0,0,0,1,0,0),
(30,'Adega De Pegões Colheita Seleccionada 2016','https://www.saq.com/media/catalog/product/1/3/13679892-1_1578540618.png','13679892','05603016000153',26,'170',1,'Vin rouge | 750 ml | Portugal','Cooperativa Agricola de Santo Isidro de',18.99,'https://www.saq.com/fr/13679892','https://www.saq.com/media/catalog/product/1/3/13679892-1_1578540618.png',5,384,7,NULL,NULL,69,NULL,NULL,0,0,0,0,0,0,0,0),
(31,'Adega de Penalva Dão','https://www.saq.com/media/catalog/product/1/3/13746485-1_1578541826.png','13746485','05606469000053',26,'68',1,'Vin rouge | 750 ml | Portugal','Adega de Penalva',12.99,'https://www.saq.com/fr/13746485','https://www.saq.com/media/catalog/product/1/3/13746485-1_1578541826.png',5,188,NULL,NULL,NULL,59,20,NULL,0,0,0,0,0,0,0,0),
(32,'AdegaMãe Pinot Noir Lisboa 2018','https://www.saq.com/media/catalog/product/1/3/13568455-1_1634762136.png','13568455','05600209865650',26,'119',1,'Vin rouge | 750 ml | Portugal','AdegaMãe',23.99,'https://www.saq.com/fr/13568455','https://www.saq.com/media/catalog/product/1/3/13568455-1_1634762136.png',5,522,7,NULL,150,26,39,NULL,0,0,0,0,0,0,0,0),
(33,'Aglianico Donnachiara Irpinia 2018','https://www.saq.com/media/catalog/product/1/2/12001852-1_1580658610.png','12001852','00736040019879',19,'52',1,'Vin rouge | 750 ml | Italie','Donnachiara',23.99,'https://www.saq.com/fr/12001852','https://www.saq.com/media/catalog/product/1/2/12001852-1_1580658610.png',5,256,13,NULL,1,1,39,NULL,0,0,0,0,0,0,0,0),
(34,'Agnes Paquet Bourgogne Pinot noir 2019','https://www.saq.com/media/catalog/product/1/1/11510268-1_1580622325.png','11510268','04000115102688',14,'35',1,'Vin rouge | 750 ml | France','Domaine Agnes Paquet',30.99,'https://www.saq.com/fr/11510268','https://www.saq.com/media/catalog/product/1/1/11510268-1_1580622325.png',5,57,1,NULL,150,1,20,NULL,0,0,0,0,0,0,0,0),
(35,'Agostino Wines Uma Mendoza 2021','https://www.saq.com/media/catalog/product/1/4/14501068-1_1614194739.png','14501068','07798079374209',3,'',1,'Vin rouge | 750 ml | Argentine','Finca Agostino Hnos SA',12.99,'https://www.saq.com/fr/14501068','https://www.saq.com/media/catalog/product/1/4/14501068-1_1614194739.png',5,NULL,32,NULL,NULL,28,39,NULL,0,0,0,0,0,0,0,0),
(36,'Agricola Falset-Marca Ètim El Viatge Montsant 2019','https://www.saq.com/media/catalog/product/1/3/13800752-1_1578542425.png','13800752','08428034001701',12,'65',1,'Vin rouge | 750 ml | Espagne','Agricola Falset-Marca',19.99,'https://www.saq.com/fr/13800752','https://www.saq.com/media/catalog/product/1/3/13800752-1_1578542425.png',5,341,8,NULL,NULL,24,59,NULL,0,0,0,0,0,0,0,0),
(37,'Agro Turistica Marella Podere Marella Fiammetta Sangiovese 2018','https://www.saq.com/media/catalog/product/1/3/13675496-1_1578540321.png','13675496','08054934570353',19,'159',1,'Vin rouge | 750 ml | Italie','AGRO TURISTICA MARELLA',24.99,'https://www.saq.com/fr/13675496','https://www.saq.com/media/catalog/product/1/3/13675496-1_1578540321.png',5,NULL,15,NULL,165,7,NULL,NULL,0,0,0,0,0,1,0,0),
(38,'Ah-So Red Navarra','https://www.saq.com/media/catalog/product/1/4/14715445-1_1623705128.png','14715445','08411976124003',12,'245',1,'Vin rouge | 250 ml | Espagne','Ah-So Wines',6.99,'https://www.saq.com/fr/14715445','https://www.saq.com/media/catalog/product/1/4/14715445-1_1623705128.png',2,363,8,36,69,1,59,NULL,0,0,0,0,0,0,0,0),
(39,'Akarua Rua Pinot Noir 2021','https://www.saq.com/media/catalog/product/1/2/12205100-1_1650453034.png','12205100','09421008300564',25,'204',1,'Vin rouge | 750 ml | Nouvelle-Zélande','Bannockburn Heights Ltd. Winery',28.99,'https://www.saq.com/fr/12205100','https://www.saq.com/media/catalog/product/1/2/12205100-1_1650453034.png',5,NULL,27,NULL,150,7,NULL,NULL,0,0,0,0,0,0,0,0),
(40,'Al di là del Fiume Dagamo Colli Bolognesi 2020','https://www.saq.com/media/catalog/product/1/4/14460331-1_1590004537.png','14460331','08053306620009',19,'74',1,'Vin rouge | 750 ml | Italie','Al di là del Fiume',32.99,'https://www.saq.com/fr/14460331','https://www.saq.com/media/catalog/product/1/4/14460331-1_1590004537.png',5,127,13,NULL,19,8,NULL,NULL,1,0,0,0,0,1,1,0),
(41,'Alain Brumont Madiran Tour Bouscassé 2019','https://www.saq.com/media/catalog/product/1/2/12284303-1_1639701932.png','12284303','03372220000199',14,'223',1,'Vin rouge | 750 ml | France','Alain Brumont',18.99,'https://www.saq.com/fr/12284303','https://www.saq.com/media/catalog/product/1/2/12284303-1_1639701932.png',5,304,1,NULL,NULL,5,39,NULL,0,0,0,0,0,0,0,0),
(42,'Alain Lorieux Chinon Expression 2018','https://www.saq.com/media/catalog/product/8/7/873257-1_1629320456.png','873257','03760089874103',14,'254',1,'Vin rouge | 750 ml | France','Pascal et Alain Lorieux',19.99,'https://www.saq.com/fr/873257','https://www.saq.com/media/catalog/product/8/7/873257-1_1629320456.png',5,119,1,NULL,25,23,20,NULL,0,0,0,0,0,0,0,0),
(43,'Alamos Seleccion Malbec Mendoza 2018','https://www.saq.com/media/catalog/product/1/1/11015726-1_1580611518.png','11015726','00085000018200',3,'138',1,'Vin rouge | 750 ml | Argentine','Alamos',17.99,'https://www.saq.com/fr/11015726','https://www.saq.com/media/catalog/product/1/1/11015726-1_1580611518.png',5,NULL,17,NULL,NULL,49,NULL,NULL,0,0,0,0,0,0,0,0),
(44,'Albert Bichot Beaujolais Villages Mr No Sulfite','https://www.saq.com/media/catalog/product/1/4/14879546-1_1642691742.png','14879546','00087113110529',14,'30',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',15.99,'https://www.saq.com/fr/14879546','https://www.saq.com/media/catalog/product/1/4/14879546-1_1642691742.png',5,38,1,NULL,59,5,NULL,NULL,0,0,0,0,0,0,1,0),
(45,'Albert Bichot Bourgogne Vieilles Vignes','https://www.saq.com/media/catalog/product/1/0/10667474-1_1639503350.png','10667474','00087113110918',14,'35',1,'Vin rouge | 750 ml | France','Albert Bichot',22.99,'https://www.saq.com/fr/10667474','https://www.saq.com/media/catalog/product/1/0/10667474-1_1639503350.png',5,57,1,NULL,NULL,30,20,NULL,0,0,0,0,0,0,0,0),
(46,'Albert Bichot Chambolle Musigny Premier Cru Les Sentiers 2017','https://www.saq.com/media/catalog/product/1/4/14207918-1_1578553820.png','14207918','04000142079182',14,'39',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',133.99,'https://www.saq.com/fr/14207918','https://www.saq.com/media/catalog/product/1/4/14207918-1_1578553820.png',5,104,1,NULL,150,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(47,'Albert Bichot Domaine Adélie Mercurey Premier Cru Champs Martin 2019','https://www.saq.com/media/catalog/product/1/4/14571710-1_1644852637.png','14571710','04000145717104',14,'37',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',66.99,'https://www.saq.com/fr/14571710','https://www.saq.com/media/catalog/product/1/4/14571710-1_1644852637.png',5,321,1,NULL,150,NULL,39,NULL,0,0,0,0,0,1,0,0),
(48,'Albert Bichot Domaine du Clos Frantin Vosne Romanée Premier Cru Les Malconsorts 2017','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','14124590','04000141245908',14,'39',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',228.99,'https://www.saq.com/fr/14124590','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,585,1,NULL,150,NULL,NULL,NULL,0,0,0,0,0,1,0,0),
(49,'Albert Bichot Domaine du Pavillon Aloxe-Corton 2018','https://www.saq.com/media/catalog/product/1/4/14123845-1_1578552027.png','14123845','00087113110147',14,'38',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',77.99,'https://www.saq.com/fr/14123845','https://www.saq.com/media/catalog/product/1/4/14123845-1_1578552027.png',5,13,1,NULL,150,NULL,39,NULL,0,0,0,0,0,1,0,0),
(50,'Albert Bichot Domaine du Pavillon Pommard Premier cru Les Rugiens 2018','https://www.saq.com/media/catalog/product/1/4/14571744-1_1612365932.png','14571744','04000145717449',14,'38',1,'Vin rouge | 750 ml | France','Maison Albert Bichot',152.99,'https://www.saq.com/fr/14571744','https://www.saq.com/media/catalog/product/1/4/14571744-1_1612365932.png',5,406,1,NULL,150,NULL,39,NULL,0,0,0,0,0,1,0,0),
(4662,'14 Hands Pinot Grigio Columbia Valley','https://www.saq.com/media/catalog/product/1/3/13876271-1_1578544517.png','13876271','00088586005725',13,'276',2,'Vin blanc | 750 ml | États-Unis','14 Hands Winery',14.99,'https://www.saq.com/fr/13876271','https://www.saq.com/media/catalog/product/1/3/13876271-1_1578544517.png',5,135,3,NULL,NULL,73,NULL,NULL,0,0,0,0,0,0,0,0),
(4663,'14 Hands Pinot Gris Columbia Valley 2015','https://www.saq.com/media/catalog/product/1/3/13299881-1_1578444011.png','13299881','00088586005374',13,'276',2,'Vin blanc | 750 ml | États-Unis','14 Hands Winery',20.99,'https://www.saq.com/fr/13299881','https://www.saq.com/media/catalog/product/1/3/13299881-1_1578444011.png',5,135,3,NULL,NULL,80,NULL,NULL,0,0,0,0,0,0,0,0),
(4664,'19 Crimes Chardonnay South Eastern Australia','https://www.saq.com/media/catalog/product/1/4/14715306-1_1617037846.png','14715306','00089819724611',5,'202',2,'Vin blanc | 375 ml | Australie','19 Crimes',9.99,'https://www.saq.com/fr/14715306','https://www.saq.com/media/catalog/product/1/4/14715306-1_1617037846.png',3,NULL,27,NULL,35,106,39,NULL,0,0,0,0,0,0,0,0),
(4665,'19 Crimes Hard Chard','https://www.saq.com/media/catalog/product/1/3/13624710-1_1578539419.png','13624710','00012354001947',5,'202',2,'Vin blanc | 750 ml | Australie','19 Crimes',18.99,'https://www.saq.com/fr/13624710','https://www.saq.com/media/catalog/product/1/3/13624710-1_1578539419.png',5,NULL,27,NULL,35,9,NULL,NULL,0,0,0,0,0,0,0,0),
(4666,'50 Degree Riesling Trocken Rheingau 2018','https://www.saq.com/media/catalog/product/1/4/14434336-1_1595256048.png','14434336','04007730315905',2,'185',2,'Vin blanc | 750 ml | Allemagne','Henkell & Co.',17.99,'https://www.saq.com/fr/14434336','https://www.saq.com/media/catalog/product/1/4/14434336-1_1595256048.png',5,428,22,NULL,156,104,NULL,NULL,0,0,0,0,0,0,0,0),
(4667,'50th Parallel Estate Pinot Gris 2018','https://www.saq.com/media/catalog/product/1/3/13962479-1_1578546918.png','13962479','00626990130246',9,'59',2,'Vin blanc | 750 ml | Canada','50th Parallel Estate',29.99,'https://www.saq.com/fr/13962479','https://www.saq.com/media/catalog/product/1/3/13962479-1_1578546918.png',5,556,35,21,148,122,39,NULL,0,0,0,0,0,0,0,0),
(4668,'A to Z Pinot Gris Willamette Valley 2016','https://www.saq.com/media/catalog/product/1/1/11334057-1_1580616023.png','11334057','00892931000149',13,'163',2,'Vin blanc | 750 ml | États-Unis','A to Z Wineworks',23.99,'https://www.saq.com/fr/11334057','https://www.saq.com/media/catalog/product/1/1/11334057-1_1580616023.png',5,NULL,27,NULL,148,73,39,NULL,0,0,0,0,0,0,0,0),
(4669,'A&D Wines Monologo Arinto p24 2021','https://www.saq.com/media/catalog/product/1/4/14296666-1_1580258418.png','14296666','05605829000610',26,'275',2,'Vin blanc | 750 ml | Portugal','A&D Wines',18.99,'https://www.saq.com/fr/14296666','https://www.saq.com/media/catalog/product/1/4/14296666-1_1580258418.png',5,575,NULL,NULL,12,56,NULL,NULL,0,0,0,0,0,1,0,0),
(4670,'A&D Wines Singular Vinho Verde 2018','https://www.saq.com/media/catalog/product/1/4/14296674-1_1582736706.png','14296674','05605829000443',26,'275',2,'Vin blanc | 750 ml | Portugal','A&D Wines',22.99,'https://www.saq.com/fr/14296674','https://www.saq.com/media/catalog/product/1/4/14296674-1_1582736706.png',5,575,NULL,NULL,NULL,44,NULL,NULL,0,0,0,0,0,0,0,0),
(4671,'A.A. Badenhorst The Curator 2020','https://www.saq.com/media/catalog/product/1/2/12889126-1_1578413412.png','12889126','00899109002080',1,'280',2,'Vin blanc | 750 ml | Afrique du Sud','Adi Badenhorst',14.99,'https://www.saq.com/fr/12889126','https://www.saq.com/media/catalog/product/1/2/12889126-1_1578413412.png',5,305,37,NULL,NULL,42,NULL,NULL,0,0,0,0,0,0,0,0),
(4672,'A.J. Adam Dhroner Riesling Trocken Mosel 2018','https://www.saq.com/media/catalog/product/1/4/14216101-1_1578554119.png','14216101','04000142161016',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',32.99,'https://www.saq.com/fr/14216101','https://www.saq.com/media/catalog/product/1/4/14216101-1_1578554119.png',5,348,22,NULL,156,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4673,'A.J. Adam Hofberg Kabinett Mosel 2020','https://www.saq.com/media/catalog/product/1/4/14216128-1_1578554119.png','14216128','04000142161283',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',30.99,'https://www.saq.com/fr/14216128','https://www.saq.com/media/catalog/product/1/4/14216128-1_1578554119.png',5,348,20,37,156,NULL,NULL,NULL,0,0,0,0,1,0,0,0),
(4674,'A.J. Adam Hofberg Von Den Terrassen Mosel 2018','https://www.saq.com/media/catalog/product/1/4/14216144-1_1581086708.png','14216144','04000142161443',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',43.99,'https://www.saq.com/fr/14216144','https://www.saq.com/media/catalog/product/1/4/14216144-1_1581086708.png',5,348,22,NULL,156,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4675,'A.J. Adam Im Pfarrgarten Riesling Feinherb Gutswein Mosel 2020','https://www.saq.com/media/catalog/product/1/4/14216110-1_1578554119.png','14216110','04000142161108',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',23.99,'https://www.saq.com/fr/14216110','https://www.saq.com/media/catalog/product/1/4/14216110-1_1578554119.png',5,348,22,32,156,35,NULL,NULL,0,0,0,0,0,0,0,0),
(4676,'A.J. Adam, Hofberg Auslese 2019','https://www.saq.com/media/catalog/product/1/4/14216152-1_1581087311.png','14216152','04000142161528',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',52.99,'https://www.saq.com/fr/14216152','https://www.saq.com/media/catalog/product/1/4/14216152-1_1581087311.png',5,348,20,12,156,NULL,88,NULL,0,0,0,0,0,0,0,0),
(4677,'A.J. Adam, Hofberg Spatlese 2018','https://www.saq.com/media/catalog/product/1/4/14216136-1_1578554119.png','14216136','04000142161368',2,'144',2,'Vin blanc | 750 ml | Allemagne','Weingut A. J. Adam',41.99,'https://www.saq.com/fr/14216136','https://www.saq.com/media/catalog/product/1/4/14216136-1_1578554119.png',5,348,20,48,156,NULL,NULL,NULL,0,0,0,0,1,0,0,0),
(4678,'Abbaye de Valmagne Languedoc Portalis 2020','https://www.saq.com/media/catalog/product/1/4/14717002-1_1622473243.png','14717002','03760209090222',14,'93',2,'Vin blanc | 750 ml | France','Abbaye de Valmagne',21.99,'https://www.saq.com/fr/14717002','https://www.saq.com/media/catalog/product/1/4/14717002-1_1622473243.png',5,275,1,NULL,NULL,2,NULL,NULL,0,0,0,0,0,1,0,0),
(4679,'Abbazia Di Novacella Praepositus Kerner Alto Adige Valle Isarco 2017','https://www.saq.com/media/catalog/product/1/4/14035466-1_1578549912.png','14035466','08025300058003',19,'236',2,'Vin blanc | 750 ml | Italie','Abbazia di Novacella',37.99,'https://www.saq.com/fr/14035466','https://www.saq.com/media/catalog/product/1/4/14035466-1_1578549912.png',5,1,13,NULL,84,NULL,45,NULL,0,0,0,0,0,0,0,0),
(4680,'Abbots & Delaunay Primo Vinum 2020','https://www.saq.com/media/catalog/product/1/4/14910030-1_1646337368.png','14910030','03760011573807',14,'',2,'Vin blanc | 750 ml | France','Badet Clément et Cie SA',18.99,'https://www.saq.com/fr/14910030','https://www.saq.com/media/catalog/product/1/4/14910030-1_1646337368.png',5,NULL,24,NULL,NULL,22,20,NULL,0,0,0,0,0,0,0,1),
(4681,'Adega de Pegões Colheita Seleccionada IGP Peninsula de Setubal','https://www.saq.com/media/catalog/product/1/0/10838801-1_1640276466.png','10838801','05603016000160',26,'171',2,'Vin blanc | 750 ml | Portugal','Cooperativa Agricola de Santo Isidro de',13.99,'https://www.saq.com/fr/10838801','https://www.saq.com/media/catalog/product/1/0/10838801-1_1640276466.png',5,NULL,29,NULL,NULL,48,NULL,NULL,0,0,0,0,0,0,0,0),
(4682,'Adega de Penalva Dão 2021','https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png','12728904','05606469000015',26,'67',2,'Vin blanc | 750 ml | Portugal','Adega de Penalva',12.99,'https://www.saq.com/fr/12728904','https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png',5,188,7,NULL,NULL,8,20,NULL,0,0,0,0,0,0,0,0),
(4683,'Adega de Penalva Maceration pelliculaire Dão 2021','https://www.saq.com/media/catalog/product/1/3/13844317-1_1578543322.png','13844317','05606469001258',26,'67',2,'Vin blanc | 750 ml | Portugal','Adega de Penalva',22.99,'https://www.saq.com/fr/13844317','https://www.saq.com/media/catalog/product/1/3/13844317-1_1578543322.png',5,188,7,NULL,NULL,2,20,NULL,0,0,0,0,0,0,0,1),
(4684,'AdegaMãe Dory IGP Lisboa 2020','https://www.saq.com/media/catalog/product/1/3/13626344-1_1645022732.png','13626344','05600209865421',26,'120',2,'Vin blanc | 750 ml | Portugal','AdegaMãe',15.99,'https://www.saq.com/fr/13626344','https://www.saq.com/media/catalog/product/1/3/13626344-1_1645022732.png',5,NULL,29,NULL,NULL,2,NULL,NULL,0,0,0,0,0,0,0,0),
(4685,'Adegas Valminor Serra da Estrella 2020','https://www.saq.com/media/catalog/product/1/3/13566652-1_1578537620.png','13566652','08437000221197',12,'91',2,'Vin blanc | 750 ml | Espagne','Adegas Valminor SL',16.99,'https://www.saq.com/fr/13566652','https://www.saq.com/media/catalog/product/1/3/13566652-1_1578537620.png',5,430,8,NULL,3,31,20,NULL,0,0,0,0,0,0,0,0),
(4686,'Adi Badenhorst Papegaai Western Cape 2019','https://www.saq.com/media/catalog/product/1/4/14686613-1_1619088917.png','14686613','06009800591132',1,'282',2,'Vin blanc | 750 ml | Afrique du Sud','Adi Badenhorst',22.99,'https://www.saq.com/fr/14686613','https://www.saq.com/media/catalog/product/1/4/14686613-1_1619088917.png',5,594,37,NULL,NULL,7,20,NULL,0,0,0,0,0,0,0,0),
(4687,'Agora du Château des Places Graves Agora 2018','https://www.saq.com/media/catalog/product/1/3/13822441-1_1631847315.png','13822441','03760061752245',14,'33',2,'Vin blanc | 750 ml | France','EARL Vignobles Reynaud',37.99,'https://www.saq.com/fr/13822441','https://www.saq.com/media/catalog/product/1/3/13822441-1_1631847315.png',5,241,1,25,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4688,'Ah-So Navarra','https://www.saq.com/media/catalog/product/1/4/14715437-1_1623705128.png','14715437','08411976324007',12,'245',2,'Vin blanc | 250 ml | Espagne','Ah-So Wines',5.99,'https://www.saq.com/fr/14715437','https://www.saq.com/media/catalog/product/1/4/14715437-1_1623705128.png',2,363,8,36,NULL,1,20,NULL,0,0,0,0,0,1,0,0),
(4689,'Akrathos Winery Oros 2019','https://www.saq.com/media/catalog/product/1/4/14923308-1_1644432337.png','14923308','05214001071012',16,'126',2,'Vin blanc | 750 ml | Grèce','Akrathos Winery',27.99,'https://www.saq.com/fr/14923308','https://www.saq.com/media/catalog/product/1/4/14923308-1_1644432337.png',5,NULL,18,NULL,NULL,NULL,39,NULL,0,0,0,0,0,0,0,0),
(4690,'Alain Brumont La Gascogne','https://www.saq.com/media/catalog/product/1/3/13950347-1_1605819950.png','13950347','03372224000249',14,'219',2,'Vin blanc | 3 L | France','S.A. Vignobles Brumont',47.99,'https://www.saq.com/fr/13950347','https://www.saq.com/media/catalog/product/1/3/13950347-1_1605819950.png',10,NULL,2,NULL,NULL,5,20,NULL,0,0,0,0,0,0,0,0),
(4691,'Alain Jaume Côtes du Rhône Grand Veneur 2019','https://www.saq.com/media/catalog/product/1/4/14205357-1_1604349331.png','14205357','03760009240612',14,'257',2,'Vin blanc | 750 ml | France','Vignobles Alain Jaume & Fils',18.99,'https://www.saq.com/fr/14205357','https://www.saq.com/media/catalog/product/1/4/14205357-1_1604349331.png',5,170,1,NULL,NULL,1,NULL,NULL,0,0,0,0,0,1,0,0),
(4692,'Alain Jaume Domaine Grand Veneur Châteauneuf-du-Pape Le Miocène 2019','https://www.saq.com/media/catalog/product/9/6/967034-1_1580618710.png','967034','03760009320031',14,'257',2,'Vin blanc | 750 ml | France','Domaine Grand Veneur',46.99,'https://www.saq.com/fr/967034','https://www.saq.com/media/catalog/product/9/6/967034-1_1580618710.png',5,110,1,NULL,NULL,2,NULL,NULL,0,0,0,0,0,1,0,0),
(4693,'Alain Mathias Chablis 2019','https://www.saq.com/media/catalog/product/1/4/14170131-1_1583955447.png','14170131','03760093142816',14,'36',2,'Vin blanc | 750 ml | France','Maison Mathias',33.99,'https://www.saq.com/fr/14170131','https://www.saq.com/media/catalog/product/1/4/14170131-1_1583955447.png',5,96,1,NULL,35,23,25,NULL,0,0,0,0,0,0,0,0),
(4694,'Alamos Chardonnay Mendoza 2019','https://www.saq.com/media/catalog/product/4/6/467969-1_1580601326.png','467969','00085000018187',3,'138',2,'Vin blanc | 750 ml | Argentine','Alamos',16.99,'https://www.saq.com/fr/467969','https://www.saq.com/media/catalog/product/4/6/467969-1_1580601326.png',5,NULL,17,NULL,35,5,39,NULL,0,0,0,0,0,0,0,0),
(4695,'Alastro Planeta Sicilia 2021','https://www.saq.com/media/catalog/product/1/4/14475242-1_1592505014.png','14475242','08020735061000',19,'199',2,'Vin blanc | 750 ml | Italie','Planeta SAS',20.99,'https://www.saq.com/fr/14475242','https://www.saq.com/media/catalog/product/1/4/14475242-1_1592505014.png',5,494,13,NULL,NULL,4,20,NULL,0,0,0,0,0,0,0,0),
(4696,'Albarino Pazo de Senorans Rias Baixas 2020','https://www.saq.com/media/catalog/product/8/9/898411-1_1580607317.png','898411','08437003160004',12,'91',2,'Vin blanc | 750 ml | Espagne','Pazo de Senorans',24.99,'https://www.saq.com/fr/898411','https://www.saq.com/media/catalog/product/8/9/898411-1_1580607317.png',5,430,8,NULL,3,26,39,NULL,0,0,0,0,0,0,0,0),
(4697,'Albente Feudi di San Gregorio','https://www.saq.com/media/catalog/product/1/4/14228356-1_1578554417.png','14228356','08022888310011',19,'',2,'Vin blanc | 750 ml | Italie','Feudi di San Gregorio Az. Agr. SPA',14.99,'https://www.saq.com/fr/14228356','https://www.saq.com/media/catalog/product/1/4/14228356-1_1578554417.png',5,NULL,30,NULL,50,42,20,NULL,0,0,0,0,0,0,0,0),
(4698,'Albert Bichot Bourgogne Aligoté','https://www.saq.com/media/catalog/product/1/3/130724-1_1581313221.png','130724','00087113111205',14,'35',2,'Vin blanc | 750 ml | France','Albert Bichot',19.99,'https://www.saq.com/fr/130724','https://www.saq.com/media/catalog/product/1/3/130724-1_1581313221.png',5,58,1,NULL,NULL,3,12,NULL,0,0,0,0,0,0,0,0),
(4699,'Albert Bichot Bourgogne Secret de Famille 2018','https://www.saq.com/media/catalog/product/1/2/12848279-1_1578411915.png','12848279','00087113112592',14,'35',2,'Vin blanc | 750 ml | France','Albert Bichot',27.99,'https://www.saq.com/fr/12848279','https://www.saq.com/media/catalog/product/1/2/12848279-1_1578411915.png',5,61,1,NULL,35,27,20,NULL,0,0,0,0,0,0,0,0),
(4700,'Albert Bichot Chablis','https://www.saq.com/media/catalog/product/2/7/27102-1_1606338315.png','27102','00087113121808',14,'36',2,'Vin blanc | 375 ml | France','Albert Bichot',17.99,'https://www.saq.com/fr/27102','https://www.saq.com/media/catalog/product/2/7/27102-1_1606338315.png',3,96,1,NULL,35,5,NULL,NULL,0,0,0,0,0,0,0,0),
(4701,'Albert Bichot Chablis','https://www.saq.com/media/catalog/product/1/7/17897-1_1632161744.png','17897','00087113111809',14,'36',2,'Vin blanc | 750 ml | France','Albert Bichot',29.99,'https://www.saq.com/fr/17897','https://www.saq.com/media/catalog/product/1/7/17897-1_1632161744.png',5,96,1,NULL,35,25,NULL,NULL,0,0,0,0,0,0,0,0),
(4702,'Albert Bichot Chardonnay Vieilles Vignes','https://www.saq.com/media/catalog/product/1/0/10845357-1_1580609113.png','10845357','00087113111359',14,'35',2,'Vin blanc | 750 ml | France','Albert Bichot',21.99,'https://www.saq.com/fr/10845357','https://www.saq.com/media/catalog/product/1/0/10845357-1_1580609113.png',5,57,1,NULL,NULL,23,20,NULL,0,0,0,0,0,0,0,0),
(4703,'Albert Bichot Domaine du Pavillon Meursault 2019','https://www.saq.com/media/catalog/product/1/2/12497667-1_1636493737.png','12497667','00087113113513',14,'38',2,'Vin blanc | 750 ml | France','Maison Albert Bichot',99.99,'https://www.saq.com/fr/12497667','https://www.saq.com/media/catalog/product/1/2/12497667-1_1636493737.png',5,322,1,NULL,35,NULL,NULL,NULL,0,0,0,0,0,1,0,0),
(4704,'Albert Bichot Domaine Long-Depaquit Chablis Grand Cru Les Vaudesirs 2019','https://www.saq.com/media/catalog/product/1/4/14796206-1_1636736167.png','14796206','04000147962069',14,'36',2,'Vin blanc | 750 ml | France','Albert Bichot',104.99,'https://www.saq.com/fr/14796206','https://www.saq.com/media/catalog/product/1/4/14796206-1_1636736167.png',5,97,1,NULL,35,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4705,'Albert Bichot Domaine Long-Depaquit Chablis Premier Cru Les Beugnons 2019','https://www.saq.com/media/catalog/product/1/4/14571293-1_1610652317.png','14571293','04000145712932',14,'36',2,'Vin blanc | 750 ml | France','Maison Albert Bichot',67.99,'https://www.saq.com/fr/14571293','https://www.saq.com/media/catalog/product/1/4/14571293-1_1610652317.png',5,98,1,NULL,35,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4706,'Albert Bichot Pouilly-Fuissé','https://www.saq.com/media/catalog/product/2/2/22871-1_1580591726.png','22871','00087113114305',14,'40',2,'Vin blanc | 750 ml | France','Albert Bichot',31.99,'https://www.saq.com/fr/22871','https://www.saq.com/media/catalog/product/2/2/22871-1_1580591726.png',5,407,1,NULL,35,29,32,NULL,0,0,0,0,0,0,0,0),
(4707,'Albert Bichot Puligny Montrachet Premier Cru Les Perrières 2018','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','14571681','04000145716817',14,'38',2,'Vin blanc | 750 ml | France','Maison Albert Bichot',144.99,'https://www.saq.com/fr/14571681','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,417,1,NULL,35,NULL,39,NULL,0,0,0,0,0,0,0,0),
(4708,'Albert Grivault Bourgogne 2019','https://www.saq.com/media/catalog/product/1/4/14581387-1_1605810339.png','14581387','03700308800070',14,'35',2,'Vin blanc | 750 ml | France','SC Domaine Albert Grivault',48.99,'https://www.saq.com/fr/14581387','https://www.saq.com/media/catalog/product/1/4/14581387-1_1605810339.png',5,57,1,NULL,35,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(4709,'Albert Grivault Bourgogne 2017','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','14151993','04000141519931',14,'35',2,'Vin blanc | 750 ml | France','SC Domaine Albert Grivault',45.99,'https://www.saq.com/fr/14151993','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,57,1,NULL,35,NULL,20,NULL,0,0,0,0,0,0,0,0),
(4710,'Albert Mann Gewurztraminer 2020','https://www.saq.com/media/catalog/product/1/1/11967735-1_1633362623.png','11967735','03485978210014',14,'10',2,'Vin blanc | 750 ml | France','Domaine Albert Mann',33.99,'https://www.saq.com/fr/11967735','https://www.saq.com/media/catalog/product/1/1/11967735-1_1633362623.png',5,15,1,NULL,63,20,NULL,NULL,1,0,0,0,0,1,0,0),
(4711,'Albert Mann Riesling Grand Cru Furstentum 2018','https://www.saq.com/media/wysiwyg/placeholder/category/06.png','14526011','03485975197318',14,'10',2,'Vin blanc | 750 ml | France','Domaine Albert Mann',92.99,'https://www.saq.com/fr/14526011','https://www.saq.com/media/wysiwyg/placeholder/category/06.png',5,235,1,NULL,156,NULL,NULL,NULL,1,0,0,0,0,0,0,0),
(7163,'Aire de Protos Cigales 2020','https://www.saq.com/media/catalog/product/1/4/14453730-1_1588617319.png','14453730','08420342002623',12,'255',3,'Vin rosé | 750 ml | Espagne','Protos Bodega Ribiera Duero de Penafiel srl',19.99,'https://www.saq.com/fr/14453730','https://www.saq.com/media/catalog/product/1/4/14453730-1_1588617319.png',5,607,8,36,NULL,1,20,NULL,0,0,0,0,0,0,0,0),
(7164,'AIX Coteaux d\'Aix en Provence 2021','https://www.saq.com/media/catalog/product/1/3/13465114-1_1627484465.png','13465114','03333441111125',14,'176',3,'Vin rosé | 750 ml | France','Domaine de la Grande Séouve',20.99,'https://www.saq.com/fr/13465114','https://www.saq.com/media/catalog/product/1/3/13465114-1_1627484465.png',5,155,1,NULL,NULL,6,NULL,NULL,0,0,0,0,0,0,0,0),
(7165,'Angels & Cowboys Sonoma Valley 2021','https://www.saq.com/media/catalog/product/1/3/13030495-1_1581312616.png','13030495','00040232096716',13,'48',3,'Vin rosé | 750 ml | États-Unis','Cannonball Wine Company',23.99,'https://www.saq.com/fr/13030495','https://www.saq.com/media/catalog/product/1/3/13030495-1_1581312616.png',5,504,3,NULL,NULL,47,25,NULL,0,0,0,0,0,0,0,0),
(7166,'Apoco Rosé Grenache Cinsault 2020','https://www.saq.com/media/catalog/product/1/4/14713001-1_1623705128.png','14713001','00628250939903',14,'',3,'Vin rosé | 250 ml | France','Groupe Triani',6.99,'https://www.saq.com/fr/14713001','https://www.saq.com/media/catalog/product/1/4/14713001-1_1623705128.png',2,NULL,24,NULL,NULL,5,10,1,0,0,0,0,0,0,0,0),
(7167,'Astica Rosé','https://www.saq.com/media/catalog/product/1/0/10385565-1_1580596807.png','10385565','07790240090291',3,'',3,'Vin rosé | 750 ml | Argentine','Bodegas Trapiche',10.99,'https://www.saq.com/fr/10385565','https://www.saq.com/media/catalog/product/1/0/10385565-1_1580596807.png',5,NULL,32,NULL,NULL,70,20,NULL,0,0,0,0,0,0,0,0),
(7168,'Attems Ramato Pinot Grigio 2019','https://www.saq.com/media/catalog/product/1/3/13736092-1_1578541516.png','13736092','08007425212089',19,'81',3,'Vin rosé | 750 ml | Italie','Marchesi de Frescobaldi',20.99,'https://www.saq.com/fr/13736092','https://www.saq.com/media/catalog/product/1/3/13736092-1_1578541516.png',5,218,NULL,NULL,147,48,20,NULL,0,0,0,0,0,0,0,0),
(7169,'Azienda Vinicola Umani Ronchi Centovie Colli Aprutini 2020','https://www.saq.com/media/catalog/product/1/4/14676079-1_1621436766.png','14676079','08032853721926',19,'284',3,'Vin rosé | 750 ml | Italie','Azienda Vinicola Umani Ronchi SPA',19.99,'https://www.saq.com/fr/14676079','https://www.saq.com/media/catalog/product/1/4/14676079-1_1621436766.png',5,NULL,15,NULL,112,68,NULL,NULL,0,0,0,0,0,1,0,0),
(7170,'Barefoot Pink Moscato','https://www.saq.com/media/catalog/product/1/3/13567241-1_1578537625.png','13567241','00085000020456',13,'45',3,'Vin rosé | 750 ml | États-Unis','Barefoot Cellars',10.99,'https://www.saq.com/fr/13567241','https://www.saq.com/media/catalog/product/1/3/13567241-1_1578537625.png',5,NULL,27,NULL,NULL,90,NULL,NULL,0,0,0,0,1,0,0,0),
(7171,'Baron Herzog White Zinfandel 2020','https://www.saq.com/media/catalog/product/1/0/10348334-1_1622473240.png','10348334','00087752002544',13,'45',3,'Vin rosé | 750 ml | États-Unis','Baron Herzog Wine Cellars Co.',13.99,'https://www.saq.com/fr/10348334','https://www.saq.com/media/catalog/product/1/0/10348334-1_1622473240.png',5,NULL,27,NULL,NULL,134,NULL,NULL,0,1,0,0,0,0,0,0),
(7172,'Barton & Guestier Côtes-de-Provence Tourmaline 2020','https://www.saq.com/media/catalog/product/1/4/14718582-1_1626728732.png','14718582','03035131115832',14,'176',3,'Vin rosé | 750 ml | France','Barton & Guestier',23.99,'https://www.saq.com/fr/14718582','https://www.saq.com/media/catalog/product/1/4/14718582-1_1626728732.png',5,167,1,NULL,NULL,1,20,NULL,0,0,0,0,0,0,0,0),
(7173,'Barton & Guestier Cuvée Spéciale','https://www.saq.com/media/catalog/product/1/3/13567356-1_1578537626.png','13567356','03035131121642',14,'',3,'Vin rosé | 750 ml | France','Barton & Guestier',11.99,'https://www.saq.com/fr/13567356','https://www.saq.com/media/catalog/product/1/3/13567356-1_1578537626.png',5,NULL,24,NULL,NULL,11,NULL,NULL,0,0,0,0,0,0,0,0),
(7174,'Beringer Main & Vine White Zinfandel','https://www.saq.com/media/catalog/product/1/0/10845808-1_1580609114.png','10845808','00089819006526',13,'45',3,'Vin rosé | 750 ml | États-Unis','Beringer Vineyards',11.99,'https://www.saq.com/fr/10845808','https://www.saq.com/media/catalog/product/1/0/10845808-1_1580609114.png',5,NULL,27,NULL,NULL,132,NULL,NULL,0,0,0,0,0,0,0,0),
(7175,'Bernard Magrez Bleu de Mer 2020','https://www.saq.com/media/catalog/product/1/4/14451101-1_1639001457.png','14451101','03760127872146',14,'101',3,'Vin rosé | 750 ml | France','Bernard Magrez',19.99,'https://www.saq.com/fr/14451101','https://www.saq.com/media/catalog/product/1/4/14451101-1_1639001457.png',5,NULL,2,NULL,NULL,7,NULL,NULL,0,0,0,0,0,1,0,0),
(7176,'Bodega Villa d\'Orta Rosado 2021','https://www.saq.com/media/catalog/product/1/3/13211851-1_1578442510.png','13211851','08437008674094',12,'245',3,'Vin rosé | 750 ml | Espagne','Bodega Villa d\'Orta',17.99,'https://www.saq.com/fr/13211851','https://www.saq.com/media/catalog/product/1/3/13211851-1_1578442510.png',5,501,8,36,27,4,NULL,NULL,0,0,0,0,0,1,0,0),
(7177,'Bodegas Valdemar Conde Valdemar 2021','https://www.saq.com/media/catalog/product/1/2/12217821-1_1651581629.png','12217821','00086891085784',12,'245',3,'Vin rosé | 750 ml | Espagne','Bodegas Valdemar SA',14.99,'https://www.saq.com/fr/12217821','https://www.saq.com/media/catalog/product/1/2/12217821-1_1651581629.png',5,440,9,36,NULL,1,20,NULL,0,0,0,0,0,0,0,0),
(7178,'Bodegas Volver Actea 2021','https://www.saq.com/media/catalog/product/1/4/14396659-1_1583333408.png','14396659','00843655572887',12,'108',3,'Vin rosé | 750 ml | Espagne','Bodegas Volver',11.99,'https://www.saq.com/fr/14396659','https://www.saq.com/media/catalog/product/1/4/14396659-1_1583333408.png',5,NULL,31,NULL,183,25,20,NULL,0,0,0,0,0,0,0,0),
(7179,'Bonny Doon Vineyard Vin Gris de Cigare 2021','https://www.saq.com/media/catalog/product/1/0/10262979-1_1623868205.png','10262979','00769434104219',13,'45',3,'Vin rosé | 750 ml | États-Unis','Bonny Doon Vineyard',19.99,'https://www.saq.com/fr/10262979','https://www.saq.com/media/catalog/product/1/0/10262979-1_1623868205.png',5,NULL,3,NULL,NULL,1,39,NULL,0,0,0,0,0,0,0,0),
(7180,'Borsao Seleccion Campo de Borja','https://www.saq.com/media/catalog/product/1/0/10754201-1_1620319844.png','10754201','08412423120739',12,'245',3,'Vin rosé | 750 ml | Espagne','Bodegas Borsao SA',13.99,'https://www.saq.com/fr/10754201','https://www.saq.com/media/catalog/product/1/0/10754201-1_1620319844.png',5,82,8,NULL,NULL,2,NULL,NULL,0,0,0,0,0,0,0,0),
(7181,'C\'est La Vie! Syrah-Grenache','https://www.saq.com/media/catalog/product/1/1/11073918-1_1639503352.png','11073918','00087113115258',14,'101',3,'Vin rosé | 750 ml | France','Albert Bichot',13.99,'https://www.saq.com/fr/11073918','https://www.saq.com/media/catalog/product/1/1/11073918-1_1639503352.png',5,NULL,2,NULL,NULL,4,25,NULL,0,0,0,0,0,0,0,0),
(7182,'Cademusa Terre Siciliane 2020','https://www.saq.com/media/catalog/product/1/3/13566943-1_1620249349.png','13566943','08033765252041',19,'201',3,'Vin rosé | 750 ml | Italie','Cantine Ermes',11.99,'https://www.saq.com/fr/13566943','https://www.saq.com/media/catalog/product/1/3/13566943-1_1620249349.png',5,NULL,15,NULL,NULL,59,20,NULL,0,0,0,0,0,1,0,0),
(7183,'Calmel & Joseph Villa Blanche Grenache Pays d\'Oc 2020','https://www.saq.com/media/catalog/product/1/4/14408648-1_1590503719.png','14408648','03760044791186',14,'101',3,'Vin rosé | 750 ml | France','Calmel & Joseph',17.99,'https://www.saq.com/fr/14408648','https://www.saq.com/media/catalog/product/1/4/14408648-1_1590503719.png',5,NULL,2,NULL,69,1,20,NULL,0,0,0,0,0,1,0,0),
(7184,'Cantina Lavis Pinot Grigio Delle Venezie 2019','https://www.saq.com/media/catalog/product/1/4/14493248-1_1592578818.png','14493248','08006031392802',19,'262',3,'Vin rosé | 1,5 L | Italie','Cantina Lavis',25.99,'https://www.saq.com/fr/14493248','https://www.saq.com/media/catalog/product/1/4/14493248-1_1592578818.png',7,189,13,NULL,147,30,NULL,NULL,0,0,0,0,0,0,0,0),
(7185,'Carone Bin 33 2014','https://www.saq.com/media/catalog/product/1/2/12564006-1_1578346513.png','12564006','01627843122981',9,'179',3,'Vin rosé | 750 ml | Canada','Les Entreprises Carone SENC',17.99,'https://www.saq.com/fr/12564006','https://www.saq.com/media/catalog/product/1/2/12564006-1_1578346513.png',5,NULL,27,NULL,NULL,48,NULL,2,0,0,0,0,0,0,0,0),
(7186,'Carrelot des Amants','https://www.saq.com/media/catalog/product/6/2/620682-1_1580603429.png','620682','03586610000304',14,'222',3,'Vin rosé | 750 ml | France','Les Vignerons du Brulhois Cave de Donzac',12.99,'https://www.saq.com/fr/620682','https://www.saq.com/media/catalog/product/6/2/620682-1_1580603429.png',5,71,1,NULL,NULL,1,20,NULL,0,0,0,0,0,0,0,0),
(7187,'Casa Santos Lima Bons-Ventos 2020','https://www.saq.com/media/catalog/product/1/2/12221151-1_1590068407.png','12221151','05604424162006',26,'120',3,'Vin rosé | 750 ml | Portugal','Casa Santos Lima-Companhia das Vinhas SA',11.99,'https://www.saq.com/fr/12221151','https://www.saq.com/media/catalog/product/1/2/12221151-1_1590068407.png',5,NULL,29,NULL,NULL,98,20,NULL,0,0,0,0,0,0,0,0),
(7188,'Casa Santos Lima-Companhia Das Vinhas Blend Lisboa 2021','https://www.saq.com/media/catalog/product/1/4/14676095-1_1615248954.png','14676095','05604424429031',26,'120',3,'Vin rosé | 750 ml | Portugal','Casa Santos Lima-Companhia das Vinhas SA',11.99,'https://www.saq.com/fr/14676095','https://www.saq.com/media/catalog/product/1/4/14676095-1_1615248954.png',5,NULL,29,NULL,NULL,99,20,NULL,0,0,0,0,0,0,0,0),
(7189,'Caves d\'Esclans Rock Angel Côtes de Provence 2018','https://www.saq.com/media/catalog/product/1/4/14089675-1_1578551156.png','14089675','03760167973353',14,'176',3,'Vin rosé | 1,5 L | France','Château d\'Esclans',94.99,'https://www.saq.com/fr/14089675','https://www.saq.com/media/catalog/product/1/4/14089675-1_1578551156.png',7,167,1,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0),
(7190,'Cazal Viel Vieilles Vignes','https://www.saq.com/media/catalog/product/1/0/10510354-1_1648581047.png','10510354','03357781000000',14,'',3,'Vin rosé | 750 ml | France','Laurent Miquel SAS',13.99,'https://www.saq.com/fr/10510354','https://www.saq.com/media/catalog/product/1/0/10510354-1_1648581047.png',5,NULL,24,NULL,NULL,1,NULL,NULL,0,0,0,0,0,0,0,0),
(7191,'Cellier Des Dauphins Prestige','https://www.saq.com/media/catalog/product/1/4/14037728-1_1653485433.png','14037728','03179077542472',14,'214',3,'Vin rosé | 250 ml | France','Cellier des Dauphins',4.99,'https://www.saq.com/fr/14037728','https://www.saq.com/media/catalog/product/1/4/14037728-1_1653485433.png',2,NULL,2,NULL,NULL,7,20,NULL,0,0,0,0,0,0,0,0),
(7192,'Charles & Charles Columbia Valley 2018','https://www.saq.com/media/catalog/product/1/3/13189017-1_1586875215.png','13189017','00856622001105',13,'276',3,'Vin rosé | 750 ml | États-Unis','Charles & Charles',17.99,'https://www.saq.com/fr/13189017','https://www.saq.com/media/catalog/product/1/3/13189017-1_1586875215.png',5,135,3,NULL,NULL,24,25,NULL,0,0,0,0,0,0,0,0),
(7193,'Château Beaulieu','https://www.saq.com/media/catalog/product/1/2/12221628-1_1643315150.png','12221628','03604894772370',14,'176',3,'Vin rosé | 750 ml | France','Château Gassier',17.99,'https://www.saq.com/fr/12221628','https://www.saq.com/media/catalog/product/1/2/12221628-1_1643315150.png',5,155,1,NULL,NULL,6,20,NULL,0,0,0,0,0,0,0,0),
(7194,'Château Bellevue La Forêt','https://www.saq.com/media/catalog/product/2/1/219840-1_1632166239.png','219840','03461730000048',14,'222',3,'Vin rosé | 750 ml | France','Château Bellevue la Forêt',15.99,'https://www.saq.com/fr/219840','https://www.saq.com/media/catalog/product/2/1/219840-1_1632166239.png',5,223,1,NULL,NULL,68,20,NULL,0,0,0,0,0,0,0,0),
(7195,'Château Cambon Beaujolais 2020','https://www.saq.com/media/catalog/product/1/2/12798611-1_1578410718.png','12798611','02000123551128',14,'30',3,'Vin rosé | 750 ml | France','Château Cambon',26.99,'https://www.saq.com/fr/12798611','https://www.saq.com/media/catalog/product/1/2/12798611-1_1578410718.png',5,37,1,NULL,59,8,NULL,NULL,0,0,0,0,0,0,0,0),
(7196,'Château D\'Aquéria Tavel 2019','https://www.saq.com/media/catalog/product/1/3/13964061-1_1602601327.png','13964061','03481661065756',14,'257',3,'Vin rosé | 750 ml | France','SCA Jean Olivier',24.99,'https://www.saq.com/fr/13964061','https://www.saq.com/media/catalog/product/1/3/13964061-1_1602601327.png',5,640,1,NULL,NULL,22,NULL,NULL,0,0,0,0,0,0,0,0),
(7197,'Château d\'Esclans Côtes de Provence Whispering Angel 2021','https://www.saq.com/media/catalog/product/1/1/11416984-1_1580617811.png','11416984','03666140002532',14,'176',3,'Vin rosé | 750 ml | France','Château d\'Esclans',26.99,'https://www.saq.com/fr/11416984','https://www.saq.com/media/catalog/product/1/1/11416984-1_1580617811.png',5,167,1,NULL,NULL,1,39,NULL,0,0,0,0,0,0,0,0),
(7198,'Château de Cartes Vin Gris 2021','https://www.saq.com/media/catalog/product/1/4/14559358-1_1594231230.png','14559358','00799705518223',9,'178',3,'Vin rosé | 750 ml | Canada','Château de Cartes, Vignoble et Cidrerie inc.',22.99,'https://www.saq.com/fr/14559358','https://www.saq.com/media/catalog/product/1/4/14559358-1_1594231230.png',5,NULL,18,NULL,NULL,44,7,2,0,0,0,0,0,0,0,0),
(7199,'Château de l\'Escarelle Coteaux Varois en Provence 2021','https://www.saq.com/media/catalog/product/1/4/14678373-1_1615897244.png','14678373','03543217170786',14,'176',3,'Vin rosé | 750 ml | France','Château de l\'Escarelle',19.99,'https://www.saq.com/fr/14678373','https://www.saq.com/media/catalog/product/1/4/14678373-1_1615897244.png',5,159,1,NULL,NULL,3,NULL,NULL,0,0,0,0,0,1,0,0),
(7200,'Château de Lancyre 2021','https://www.saq.com/media/catalog/product/1/0/10263841-1_1580595016.png','10263841','03437500000051',14,'93',3,'Vin rosé | 750 ml | France','MM Durand et Valentin',18.99,'https://www.saq.com/fr/10263841','https://www.saq.com/media/catalog/product/1/0/10263841-1_1580595016.png',5,275,1,NULL,NULL,1,39,NULL,0,0,0,0,0,0,0,0),
(7201,'Château de Miraval Côtes de Provence 2020','https://www.saq.com/media/catalog/product/1/2/12996255-1_1578435614.png','12996255','00631471000703',14,'176',3,'Vin rosé | 1,5 L | France','Perrin et Fils SA',47.99,'https://www.saq.com/fr/12996255','https://www.saq.com/media/catalog/product/1/2/12996255-1_1578435614.png',7,167,1,NULL,NULL,2,NULL,NULL,0,0,0,0,0,0,0,0),
(7202,'Château de Roquefort Corail 2020','https://www.saq.com/media/catalog/product/1/3/13532145-1_1578537309.png','13532145','03552712430103',14,'176',3,'Vin rosé | 750 ml | France','Raimond de Villeneuve Flayosc',24.99,'https://www.saq.com/fr/13532145','https://www.saq.com/media/catalog/product/1/3/13532145-1_1578537309.png',5,167,1,NULL,NULL,4,20,NULL,0,0,0,0,0,1,0,0),
(7203,'Château des Sarrins Côtes De Provence Grande Cuvée 2017','https://www.saq.com/media/catalog/product/1/3/13514836-1_1578537011.png','13514836','03590667901750',14,'176',3,'Vin rosé | 750 ml | France','Domaine des Sarrins',26.99,'https://www.saq.com/fr/13514836','https://www.saq.com/media/catalog/product/1/3/13514836-1_1578537011.png',5,167,1,NULL,NULL,1,39,NULL,0,0,0,0,0,1,0,0),
(7204,'Château Font Freye Côtes de Provence La Gordonne 2020','https://www.saq.com/media/catalog/product/1/3/13384832-1_1626281424.png','13384832','03142709606002',14,'176',3,'Vin rosé | 750 ml | France','Domaines Listel SA',18.99,'https://www.saq.com/fr/13384832','https://www.saq.com/media/catalog/product/1/3/13384832-1_1626281424.png',5,167,1,NULL,NULL,30,NULL,NULL,0,0,0,0,0,0,0,0),
(7205,'Château Grand Escalion Costières de Nîmes 2021','https://www.saq.com/media/catalog/product/1/2/12843128-1_1627509337.png','12843128','03142920029185',14,'258',3,'Vin rosé | 750 ml | France','Gabriel Meffre & Cie',17.99,'https://www.saq.com/fr/12843128','https://www.saq.com/media/catalog/product/1/2/12843128-1_1627509337.png',5,148,1,NULL,NULL,1,39,NULL,0,0,0,0,0,0,0,0),
(7206,'Château Hermitage Saint-Martin Grande Cuvée Enzo 2020','https://www.saq.com/media/catalog/product/1/4/14681628-1_1620658551.png','14681628','03332380312754',14,'176',3,'Vin rosé | 750 ml | France','Château Hermitage Saint-Martin',27.99,'https://www.saq.com/fr/14681628','https://www.saq.com/media/catalog/product/1/4/14681628-1_1620658551.png',5,167,1,NULL,NULL,3,20,NULL,0,0,0,0,0,1,0,0),
(7207,'Château Kefraya Les Bretèches 2021','https://www.saq.com/media/catalog/product/1/4/14030631-1_1651516239.png','14030631','05281004041212',20,'248',3,'Vin rosé | 750 ml | Liban','Château Kefraya',15.99,'https://www.saq.com/fr/14030631','https://www.saq.com/media/catalog/product/1/4/14030631-1_1651516239.png',5,NULL,27,NULL,NULL,1,NULL,NULL,0,0,0,0,0,0,0,0),
(7208,'Château La Lieue Coteaux Varois en Provence 2021','https://www.saq.com/media/catalog/product/1/1/11687021-1_1580625914.png','11687021','03760015200020',14,'176',3,'Vin rosé | 750 ml | France','Famille Vial',19.99,'https://www.saq.com/fr/11687021','https://www.saq.com/media/catalog/product/1/1/11687021-1_1580625914.png',5,159,1,NULL,NULL,1,NULL,NULL,0,0,0,0,0,1,0,0),
(7209,'Château la Martinette Rollier de la Martinette 2021','https://www.saq.com/media/catalog/product/1/3/13448699-1_1578535815.png','13448699','03760046710475',14,'176',3,'Vin rosé | 750 ml | France','SCEA La Martinette',21.99,'https://www.saq.com/fr/13448699','https://www.saq.com/media/catalog/product/1/3/13448699-1_1578535815.png',5,167,1,NULL,NULL,1,39,NULL,0,0,0,0,0,1,0,0),
(7210,'Château Pesquié Terrasses Ventoux 2020','https://www.saq.com/media/catalog/product/1/4/14678226-1_1618934460.png','14678226','03760149590639',14,'258',3,'Vin rosé | 750 ml | France','SCEA Château Pesquié',19.99,'https://www.saq.com/fr/14678226','https://www.saq.com/media/catalog/product/1/4/14678226-1_1618934460.png',5,563,1,NULL,NULL,1,20,NULL,0,0,0,0,0,1,0,0),
(7211,'Château Pradeaux Bandol 2020','https://www.saq.com/media/catalog/product/1/3/13711240-1_1595278815.png','13711240','03760104357529',14,'176',3,'Vin rosé | 750 ml | France','Château Pradeaux EARL',30.99,'https://www.saq.com/fr/13711240','https://www.saq.com/media/catalog/product/1/3/13711240-1_1595278815.png',5,28,1,NULL,NULL,7,NULL,NULL,0,0,0,0,0,0,0,0),
(7212,'Château Puech-Haut Argali Pays d\'Oc 2021','https://www.saq.com/media/catalog/product/1/1/11629891-1_1629731138.png','11629891','03521211842205',14,'101',3,'Vin rosé | 750 ml | France','SCEA château Puech-Haut',22.99,'https://www.saq.com/fr/11629891','https://www.saq.com/media/catalog/product/1/1/11629891-1_1629731138.png',5,NULL,2,NULL,NULL,6,NULL,NULL,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `vino__bouteille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__cepage`
--

DROP TABLE IF EXISTS `vino__cepage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__cepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__cepage`
--

LOCK TABLES `vino__cepage` WRITE;
/*!40000 ALTER TABLE `vino__cepage` DISABLE KEYS */;
INSERT INTO `vino__cepage` VALUES (1,'Aglianico 100 %'),(2,'Albana 100 %'),(3,'Albarino 100 %'),(4,'Aleatico 100 %'),(5,'Alfrocheiro 100 %'),(6,'Alicante Nero 100 %'),(7,'Aligoté 100 %'),(8,'Altesse 100 %'),(9,'Alvarinho 100 %'),(10,'Antao vaz 100 %'),(11,'Aragonez 100 %'),(12,'Arinto 100 %'),(13,'Arneis 100 %'),(14,'Assyrtiko 100 %'),(15,'Autre (s) cépage (s) 100 %'),(16,'Avesso 100 %'),(17,'Baco noir 100 %'),(18,'Baga 100 %'),(19,'Barbera 100 %'),(20,'Blaufränkisch 100 %'),(21,'Bobal 100 %'),(22,'Bonarda 100 %'),(23,'Caberlot 100 %'),(24,'Cabernet 100 %'),(25,'Cabernet franc 100 %'),(26,'Cabernet franc 15 %'),(27,'Cabernet-sauvignon 100 %'),(28,'Cabernet-sauvignon 15 %'),(29,'Carignan 100 %'),(30,'Carmenère 100 %'),(31,'Carricante 100 %'),(32,'Castelao 100 %'),(33,'Cesanese 100 %'),(34,'Chardonnay'),(35,'Chardonnay 100 %'),(36,'Chasselas 100 %'),(37,'Chenin blanc 100 %'),(38,'Ciliegiolo 100 %'),(39,'Cinsault 100 %'),(40,'Concord 100 %'),(41,'Cortese 100 %'),(42,'Corvina 100 %'),(43,'Corvina 70 %'),(44,'Dabouki 100 %'),(45,'De Chaunac 100 %'),(46,'Debina 100 %'),(47,'Dolcetto 100 %'),(48,'Durif 100 %'),(49,'El País 100 %'),(50,'Falanghina 100 %'),(51,'Feteasca Neagra 100 %'),(52,'Fiano 100 %'),(53,'Frappato 100 %'),(54,'Friulano 100 %'),(55,'Frontenac 100 %'),(56,'Frontenac blanc 100 %'),(57,'Fumé blanc 100 %'),(58,'Furmint 100 %'),(59,'Gamay 100 %'),(60,'Garganega 100 %'),(61,'Garnacha Peluda N 100 %'),(62,'Garnacha tintorera 100 %'),(63,'Gewurztraminer 100 %'),(64,'Godello 100 %'),(65,'Graciano 100 %'),(66,'Grecanico 100 %'),(67,'Grechetto 100 %'),(68,'Greco bianco 100 %'),(69,'Grenache 100 %'),(70,'Grenache blanc 100 %'),(71,'Grenache gris 100 %'),(72,'Grignolino 100 %'),(73,'Grillo 100 %'),(74,'Grolleau 100 %'),(75,'Groppello 100 %'),(76,'Gros manseng 100 %'),(77,'Groslot 100 %'),(78,'Grüner veltliner 100 %'),(79,'Hondarrabi Zuri 100 %'),(80,'Jacquère 100 %'),(81,'Kalavryta 100 %'),(82,'Kangun 100 %'),(83,'Kékfrancos 100 %'),(84,'Kerner 100 %'),(85,'Kotsifali 100 %'),(86,'Lacrima 100 %'),(87,'Lagrein 100 %'),(88,'Listán Negro 100 %'),(89,'Loureiro 100 %'),(90,'Lucie Kuhlmann 100 %'),(91,'Macabeo 100 %'),(92,'Magliocco 100 %'),(93,'Malagousia 100 %'),(94,'Malbec'),(95,'Malbec 100 %'),(96,'Malvar 100 %'),(97,'Malvoisie 100 %'),(98,'Manto Negro 100 %'),(99,'Manzoni bianco 100 %'),(100,'Maréchal Foch 100 %'),(101,'Marquette 100 %'),(102,'Marsanne 100 %'),(103,'Marselan 100 %'),(104,'Mataro 100 %'),(105,'Mauzac 100 %'),(106,'Mavrodaphné 100 %'),(107,'Melon de Bourgogne (Muscadet) 100 %'),(108,'Mencía 100 %'),(109,'Merlot 100 %'),(110,'Monastrell 100 %'),(111,'Mondeuse 100 %'),(112,'Montepulciano 100 %'),(113,'Moscato 100 %'),(114,'Moscato giallo 100 %'),(115,'Moschophilero 100 %'),(116,'Mourvèdre 100 %'),(117,'Mtsvane Qvevri (blanc) 100 %'),(118,'Müller-thurgau 100 %'),(119,'Muscadelle 100 %'),(120,'Muscadet 100 %'),(121,'Muscat'),(122,'Muscat 100 %'),(123,'Muscat d\'Alexandrie 100 %'),(124,'Muscat noir 100 %'),(125,'Nebbiolo 100 %'),(126,'Négrette 100 %'),(127,'Negroamaro 100 %'),(128,'Nerello Mascalese 100 %'),(129,'Nero d\'Avola 100 %'),(130,'Nero di Troia 100 %'),(131,'Nielluccio 100 %'),(132,'Nocera 100 %'),(133,'Nosiola 100 %'),(134,'Oküzgözü 100 %'),(135,'Pampanuto B 100 %'),(136,'Parellada 100 %'),(137,'Pecorino 100 %'),(138,'Pedro Ximenez 100 %'),(139,'Pelaverga Piccolo 100 %'),(140,'Perricone 100 %'),(141,'Petit manseng 100 %'),(142,'Petit verdot 100 %'),(143,'Petite sirah 100 %'),(144,'Picpoul 100 %'),(145,'Pineau d\'Aunis 100 %'),(146,'Pinot blanc 100 %'),(147,'Pinot grigio 100 %'),(148,'Pinot gris 100 %'),(149,'Pinot noir'),(150,'Pinot noir 100 %'),(151,'Pinotage 100 %'),(152,'Poulsard 100 %'),(153,'Primitivo 100 %'),(154,'Ribolla gialla 100 %'),(155,'Riesling'),(156,'Riesling 100 %'),(157,'Robola 100 %'),(158,'Roditis 100 %'),(159,'Rolle 100 %'),(160,'Romorantin 100 %'),(161,'Roussanne 100 %'),(162,'Sagrantino 100 %'),(163,'Saint-Laurent 100 %'),(164,'Samsó 100 %'),(165,'Sangiovese 100 %'),(166,'Sangiovese grosso 100 %'),(167,'Saperavi 100 %'),(168,'Sauvignon blanc 100 %'),(169,'Savagnin 100 %'),(170,'Savatiano 100 %'),(171,'Schiava 100 %'),(172,'Schioppettino 100 %'),(173,'Sémillon 100 %'),(174,'Seyval 100 %'),(175,'Shiraz 100 %'),(176,'Shiraz 88 %'),(177,'Spätburgunder 100 %'),(178,'St-Pépin 100 %'),(179,'Sylvaner 100 %'),(180,'Syrah'),(181,'Syrah 100 %'),(182,'Tannat 100 %'),(183,'Tempranillo 100 %'),(184,'Tempranillo Blanco 100 %'),(185,'Teroldego 100 %'),(186,'Timorasso 100 %'),(187,'Tinta de Toro 100 %'),(188,'Touriga nacional 100 %'),(189,'Trebbiano 100 %'),(190,'Trebbiano d\'abruzzo 100 %'),(191,'Trebbiano di lugana 100 %'),(192,'Trousseau 100 %'),(193,'Valdiguié 100 %'),(194,'Vandal-Cliche 100 %'),(195,'Verdejo 100 %'),(196,'Verdicchio 100 %'),(197,'Vermentino 100 %'),(198,'Vidal 100 %'),(199,'Viognier 100 %'),(200,'Viura 100 %'),(201,'Weissburgunder 100 %'),(202,'Xarel-lo 100 %'),(203,'Xinomavro 100 %'),(204,'Zibibbo 100 %'),(205,'Zinfandel 100 %'),(206,'Zweigelt 100 %'),(207,'Asproudi 100 %'),(208,'Biancu gentile 100 %'),(209,'Bombino Bianco 100 %'),(210,'Catarratto 100 %'),(211,'Encruzado 100 %'),(212,'Frontenac Gris 100 %'),(213,'Irsay oliver 100 %'),(214,'Kisi 100 %'),(215,'Kydonitsa 100 %'),(216,'Louise Swenson 100 %'),(217,'Maccabeu 100 %'),(218,'Malvasia fina 100 %'),(219,'Malvasia Istriana 100 %'),(220,'Malvasia Petra 100 %'),(221,'Merseguera 100 %'),(222,'Moscatel 100 %'),(223,'Muscat à petits grains 100 %'),(224,'Passerina 100 %'),(225,'Pecorello 100 %'),(226,'Pigato 100 %'),(227,'Pignoletto 100 %'),(228,'Pinot auxerrois 100 %'),(229,'Pionnier 100 %'),(230,'Refosco 100 %'),(231,'Ribona 100 %'),(232,'Riesling renano 100 %'),(233,'Rkatsiteli B 100 %'),(234,'Sainte-Croix 100 %'),(235,'Sangioveto 100 %'),(236,'Sauvignon blanc 46 %'),(237,'Sauvignon blanc 80 %'),(238,'Sauvignon gris 100 %'),(239,'Seyval Noir 100 %'),(240,'Tamaioasa romaneasa 100 %'),(241,'Terret 100 %'),(242,'Torrontes 100 %'),(243,'Traminer 100 %'),(244,'Treixadura B 100 %'),(245,'Vernaccia di San Gimignano 100 %'),(246,'Vespaiolo 100 %'),(247,'Vilana 100 %'),(248,'Vitovska 100 %'),(249,'Zinfandel 79 %, Muscat 15 %, Grenache 6 %');
/*!40000 ALTER TABLE `vino__cepage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__classification`
--

DROP TABLE IF EXISTS `vino__classification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__classification`
--

LOCK TABLES `vino__classification` WRITE;
/*!40000 ALTER TABLE `vino__classification` DISABLE KEYS */;
INSERT INTO `vino__classification` VALUES (1,'1er cru'),(2,'1er cru classé'),(3,'1er grand cru classé'),(4,'1er grand cru classé a'),(5,'1er grand cru classé b'),(6,'2e cru classé'),(7,'3e cru classé'),(8,'5 puttonyos'),(9,'5e cru classé'),(10,'Amabile'),(11,'Amarone'),(12,'Auslese'),(13,'Barrel fermented'),(14,'Bertinoro secco'),(15,'Classico'),(16,'Classico riserva'),(17,'Classico superiore'),(18,'Crianza'),(19,'Cru bourgeois'),(20,'Cru classé de Graves'),(21,'Estate bottled'),(22,'Estate bottled - embotellado en origen'),(23,'Estate wine'),(24,'Federspiel'),(25,'Fermenté en barrique'),(26,'Gran reserva'),(27,'Gran Selezione'),(28,'Gran vino'),(29,'Grand cru'),(30,'Grand cru classé'),(31,'Grosses Gewächs'),(32,'Gutswein'),(33,'Invecchiato'),(34,'Issu d\'une sélection de grains nobles'),(35,'Issu du passerillage'),(36,'Joven'),(37,'Kabinett'),(38,'Mention d\'âge'),(39,'Millesimato'),(40,'Passito'),(41,'Reserva'),(42,'Reserva special'),(43,'Reserve'),(44,'Riserva'),(45,'Scelto'),(46,'Selection'),(47,'Single vineyard'),(48,'Spätlese'),(49,'Superiore'),(50,'Vendanges tardives'),(51,'Vin du Québec certifié'),(52,'Vino santo'),(53,'Chiaretto'),(54,'Chiaretto classico'),(55,'Sélections de grains nobles'),(56,'Smaragd');
/*!40000 ALTER TABLE `vino__classification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__degre_alcool`
--

DROP TABLE IF EXISTS `vino__degre_alcool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__degre_alcool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `valeur` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__degre_alcool`
--

LOCK TABLES `vino__degre_alcool` WRITE;
/*!40000 ALTER TABLE `vino__degre_alcool` DISABLE KEYS */;
INSERT INTO `vino__degre_alcool` VALUES (1,'0,1 %',0.1),(2,'0,3 %',0.3),(3,'0,33 %',0.33),(4,'0,4 %',0.4),(5,'0,5 %',0.5),(6,'10 %',10),(7,'10,5 %',10.5),(8,'10,7 %',10.7),(9,'11 %',11),(10,'11,5 %',11.5),(11,'11,78 %',11.78),(12,'11,8 %',11.8),(13,'12 %',12),(14,'12,05 %',12.05),(15,'12,15 %',12.15),(16,'12,2 %',12.2),(17,'12,25 %',12.25),(18,'12,3 %',12.3),(19,'12,4 %',12.4),(20,'12,5 %',12.5),(21,'12,51 %',12.51),(22,'12,6 %',12.6),(23,'12,66 %',12.66),(24,'12,7 %',12.7),(25,'12,8 %',12.8),(26,'12,9 %',12.9),(27,'13 %',13),(28,'13,1 %',13.1),(29,'13,2 %',13.2),(30,'13,22 %',13.22),(31,'13,26 %',13.26),(32,'13,3 %',13.3),(33,'13,34 %',13.34),(34,'13,38 %',13.38),(35,'13,4 %',13.4),(36,'13,44 %',13.44),(37,'13,45 %',13.45),(38,'13,48 %',13.48),(39,'13,5 %',13.5),(40,'13,6 %',13.6),(41,'13,65 %',13.65),(42,'13,69 %',13.69),(43,'13,7 %',13.7),(44,'13,75 %',13.75),(45,'13,8 %',13.8),(46,'13,84 %',13.84),(47,'13,9 %',13.9),(48,'13,95 %',13.95),(49,'14 %',14),(50,'14,04 %',14.04),(51,'14,1 %',14.1),(52,'14,13 %',14.13),(53,'14,2 %',14.2),(54,'14,22 %',14.22),(55,'14,25 %',14.25),(56,'14,3 %',14.3),(57,'14,4 %',14.4),(58,'14,45 %',14.45),(59,'14,5 %',14.5),(60,'14,6 %',14.6),(61,'14,65 %',14.65),(62,'14,7 %',14.7),(63,'14,75 %',14.75),(64,'14,8 %',14.8),(65,'14,9 %',14.9),(66,'14,95 %',14.95),(67,'15 %',15),(68,'15,1 %',15.1),(69,'15,2 %',15.2),(70,'15,3 %',15.3),(71,'15,4 %',15.4),(72,'15,47 %',15.47),(73,'15,5 %',15.5),(74,'15,55 %',15.55),(75,'15,6 %',15.6),(76,'15,7 %',15.7),(77,'15,8 %',15.8),(78,'15,9 %',15.9),(79,'15,98 %',15.98),(80,'16 %',16),(81,'16,1 %',16.1),(82,'16,3 %',16.3),(83,'16,5 %',16.5),(84,'16,7 %',16.7),(85,'17 %',17),(86,'5 %',5),(87,'6 %',6),(88,'7,5 %',7.5),(89,'8 %',8),(90,'8,5 %',8.5),(91,'9 %',9),(92,'9,5 %',9.5),(93,'0 %',0),(95,'10,2 %',10.2),(96,'10,8 %',10.8),(97,'10,9 %',10.9),(99,'11,2 %',11.2),(100,'11,4 %',11.4),(101,'11,6 %',11.6),(102,'11,7 %',11.7),(103,'11,9 %',11.9),(105,'12,1 %',12.1),(106,'12,48 %',12.48),(107,'12,65 %',12.65),(108,'12,95 %',12.95),(110,'13,16 %',13.16),(111,'13,25 %',13.25),(112,'13,86 %',13.86),(118,'7 %',7),(121,'9,6 %',9.6),(122,'9,96 %',9.96);
/*!40000 ALTER TABLE `vino__degre_alcool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__designation`
--

DROP TABLE IF EXISTS `vino__designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__designation`
--

LOCK TABLES `vino__designation` WRITE;
/*!40000 ALTER TABLE `vino__designation` DISABLE KEYS */;
INSERT INTO `vino__designation` VALUES (1,'(AOC/AOP) Appellation origine controlée/protégée'),(2,'(VDP/IGP) Vin de pays/Indication géographique protégée'),(3,'American Viticultural Areas (AVA)'),(4,'Appellation origine controlée (AOC)'),(5,'Appellation Origine Garantie'),(6,'Appellation origine protégée (AOP)'),(7,'Denominação de origem controlada (DOC)'),(8,'Denominación de origen (DO)'),(9,'Denominación de origen calificada (DOCa)'),(10,'Dénomination origine (DOC)'),(11,'Denominazione di origine controllata e garantita (DOCG)'),(12,'Districtus Austriae Controllatus (DAC)'),(13,'DOP/DOC Denominazione di orgine controllata / protetta'),(14,'Epitrapezios inos (VDT)'),(15,'IGP/IGT Indicazione Geografica protetta / tipica'),(16,'Indicaçäo de procedência'),(17,'Indication géographique (IG)'),(18,'Indication géographique protégée (IGP)'),(19,'Landwein'),(20,'QmP ou Prädikatswein'),(21,'Qualitätswein'),(22,'Qualitatswein bestimmter Anbaugebiete (QbA)'),(23,'Vin Communauté Européenne (VCE)'),(24,'Vin de France'),(25,'Vin de pays (VDP)'),(26,'Vin de qualité supérieure'),(27,'Vin de table (VDT)'),(28,'Vinho de mesa'),(29,'Vinho regional'),(30,'Vino da tavola'),(31,'Vino de la tierra'),(32,'Vino de mesa'),(33,'Vino de pago'),(34,'Vinos calidad preferente (VCP)'),(35,'Vintners quality alliance (VQA)'),(36,'Wein (VDT)'),(37,'Wine of origin (WO)'),(38,'Prädikatswein');
/*!40000 ALTER TABLE `vino__designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__format`
--

DROP TABLE IF EXISTS `vino__format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `valeur_ml` float NOT NULL,
  `valeur_litre` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__format`
--

LOCK TABLES `vino__format` WRITE;
/*!40000 ALTER TABLE `vino__format` DISABLE KEYS */;
INSERT INTO `vino__format` VALUES (1,'200 ml',200,0.2),(2,'250 ml',250,0.25),(3,'375 ml',375,0.375),(4,'500 ml',500,0.5),(5,'750 ml',750,0.75),(6,'1 L',1000,1),(7,'1,5 L',1500,1.5),(8,'2 L',2000,2),(9,'2,25 L',2250,2.25),(10,'3 L',3000,3),(11,'4 L',4000,4),(12,'5 L',5000,5),(13,'6 L',6000,6);
/*!40000 ALTER TABLE `vino__format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__produit_du_quebec`
--

DROP TABLE IF EXISTS `vino__produit_du_quebec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__produit_du_quebec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__produit_du_quebec`
--

LOCK TABLES `vino__produit_du_quebec` WRITE;
/*!40000 ALTER TABLE `vino__produit_du_quebec` DISABLE KEYS */;
INSERT INTO `vino__produit_du_quebec` VALUES (1,'Embouteillé au Québec'),(2,'Origine Québec');
/*!40000 ALTER TABLE `vino__produit_du_quebec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__region`
--

DROP TABLE IF EXISTS `vino__region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__region`
--

LOCK TABLES `vino__region` WRITE;
/*!40000 ALTER TABLE `vino__region` DISABLE KEYS */;
INSERT INTO `vino__region` VALUES (1,'Abruzzes'),(2,'Abruzzes, Colline Pescaresi'),(3,'Abruzzes, Del Vastese / Histonium'),(4,'Abruzzes, Terre di Chieti'),(5,'Aconcagua, Valle de Casablanca'),(6,'Aconcagua, Valle de San Antonio'),(7,'Aconcagua, Valle del Aconcagua'),(8,'Alentejo'),(9,'Alentejo, Alentajano'),(10,'Alsace'),(11,'Andalousie'),(12,'Aquitaine-Charentes, Atlantique'),(13,'Aquitaine-Charentes, Périgord'),(14,'Australie'),(15,'Australie Occidentale, Great Southern'),(16,'Australie Occidentale, Margaret River'),(17,'Australie-Méridionale'),(18,'Australie-Méridionale, Adelaide Hills'),(19,'Australie-Méridionale, Barossa Valley'),(20,'Australie-Méridionale, Clare Valley'),(21,'Australie-Méridionale, Coonawarra'),(22,'Australie-Méridionale, Langhorne Creek'),(23,'Australie-Méridionale, McLaren Vale'),(24,'Australie-Méridionale, Riverland'),(25,'Australie-Méridionale, Southern Fleurieu'),(26,'Baden'),(27,'Bairrada'),(28,'Basilicate'),(29,'Basse-Autriche (Niederösterreich)'),(30,'Beaujolais'),(31,'Beira Interior'),(32,'Bergland'),(33,'Bordeaux'),(34,'Bourgogne'),(35,'Bourgogne, Bourgogne'),(36,'Bourgogne, Chablis et Grand Auxerrois'),(37,'Bourgogne, Côte Chalonnaise/Côte du Couchois'),(38,'Bourgogne, Côte de Beaune'),(39,'Bourgogne, Côte de Nuits'),(40,'Bourgogne, Mâconnais'),(41,'Buenos Aires, Chapadmalal'),(42,'Burgenland'),(43,'Calabre'),(44,'Calabre, Calabria'),(45,'Californie'),(46,'Californie, Central Coast'),(47,'Californie, Inland Valleys'),(48,'Californie, North Coast'),(49,'Californie, Santa Barbara'),(50,'Californie, Sierra Foothills'),(51,'Campanha (Fronteira)'),(52,'Campanie'),(53,'Campanie, Pompeiano'),(54,'Canelones, Juancio'),(55,'Canelones, Las Violetas'),(56,'Canelones, Progreso'),(57,'Centre-Ouest, Val de Loire'),(58,'Colombie-Britannique'),(59,'Colombie-Britannique, Vallée de l\'Okanagan'),(60,'Colombie-Britannique, Vallée de la Similkameen'),(61,'Coquimbo, Valle del Choapa'),(62,'Coquimbo, Valle del Elqui'),(63,'Coquimbo, Valle del Limari'),(64,'Corse'),(65,'Côte Méditerranéenne'),(66,'Crète, Crète'),(67,'Dâo E Lafôes'),(68,'Dâo E Lafôes, Terras do Dâo'),(69,'Dealu Mare'),(70,'Del Sur, Valle del Bio Bio'),(71,'Del Sur, Valle del Itata'),(72,'der Mosel'),(73,'Émilie-Romagne'),(74,'Émilie-Romagne, Emilia'),(75,'Émilie-Romagne, Rubicone'),(76,'Epirus'),(77,'Epirus, Ioannina'),(78,'Frioul-Vénétie Julienne'),(79,'Frioul-Vénétie Julienne, Delle Venezie'),(80,'Frioul-Vénétie Julienne, Trevenezie'),(81,'Frioul-Vénétie Julienne, Venezia Giulia'),(82,'Galilée (Galil)'),(83,'Galilée (Galil), Galilee'),(84,'Galilée (Galil), Golan Heights'),(85,'Galilée (Galil), Upper Galilee'),(86,'Helan Mountains (Ningxia)'),(87,'Îles Ioniennes'),(88,'Judean Hills, Jerusalem'),(89,'Judean Hills, Judean Hills'),(90,'Jura'),(91,'L\'Espagne Verte'),(92,'La Rioja, Famatina'),(93,'Languedoc-Roussillon'),(94,'Languedoc-Roussillon, Aude'),(95,'Languedoc-Roussillon, Cévennes'),(96,'Languedoc-Roussillon, Coteaux du Pont du Gard'),(97,'Languedoc-Roussillon, Côtes Catalanes'),(98,'Languedoc-Roussillon, Côtes de Thongue'),(99,'Languedoc-Roussillon, Gard'),(100,'Languedoc-Roussillon, Pays d\'Hérault'),(101,'Languedoc-Roussillon, Pays d\'Oc'),(102,'Languedoc-Roussillon, Pyrénée-Orientale'),(103,'Languedoc-Roussillon, Sable de Camargue'),(104,'Languedoc-Roussillon, Saint-Guilhem-le-Désert'),(105,'Latium'),(106,'Latium, Lazio'),(107,'Le Plateau (Meseta)'),(108,'Le Plateau (Meseta), Castilla'),(109,'Le Plateau (Meseta), Extremadura'),(110,'Les Iles'),(111,'Les Iles, Mallorca'),(112,'Les Marches'),(113,'Les Marches, Marche'),(114,'Les Pouilles'),(115,'Les Pouilles, Daunia'),(116,'Les Pouilles, Puglia'),(117,'Les Pouilles, Salento'),(118,'Les Pouilles, Tarantino'),(119,'Lisboa'),(120,'Lisboa, Lisboa'),(121,'Lombardie'),(122,'Lombardie, Provincia di Pavia'),(123,'Lombardie, Sebino'),(124,'Macédoine'),(125,'Macédoine, Florina'),(126,'Macédoine, Halkidiki'),(127,'Macédoine, Imathia'),(128,'Macédoine, Kavala'),(129,'Macédoine, Macédoine'),(130,'Macédoine, Thessaloniki'),(131,'Maldonado'),(132,'Mendoza'),(133,'Mendoza, Agrelo'),(134,'Mendoza, Barrancas'),(135,'Mendoza, La Consulta'),(136,'Mendoza, Lujan de Cuyo'),(137,'Mendoza, Maipu'),(138,'Mendoza, Mendoza'),(139,'Mendoza, Rivadavia'),(140,'Mendoza, San Carlos'),(141,'Mendoza, Tupungato - Valle de Tupungato'),(142,'Mendoza, Valle de Uco'),(143,'Molise'),(144,'Mosel'),(145,'Nahe'),(146,'Neuchâtel'),(147,'New-York'),(148,'Nord-Est, Franche-Comté'),(149,'North Island, Hawkes Bay'),(150,'North Island, Martinborough'),(151,'North Island, Wairarapa'),(152,'Northern Hungary'),(153,'Nouvelle-Écosse'),(154,'Nouvelle-Galles du Sud'),(155,'Nouvelle-Galles du Sud, Hastings River'),(156,'Nouvelle-Galles du Sud, Riverina'),(157,'Ombrie'),(158,'Ombrie, Narni'),(159,'Ombrie, Umbria'),(160,'Ontario'),(161,'Ontario, Île Pelée'),(162,'Ontario, Péninsule du Niagara'),(163,'Oregon'),(164,'Patagonia'),(165,'Paysandu'),(166,'Peloponnèse'),(167,'Peloponnèse, Achaia'),(168,'Peloponnèse, Korinthos'),(169,'Peloponnèse, Peloponnese'),(170,'Péninsule de Setúbal'),(171,'Péninsule de Setúbal, Péninsule de Setúbal'),(172,'Pfalz'),(173,'Piémont'),(174,'Porto/Douro'),(175,'Primorska'),(176,'Provence'),(177,'Québec, Basses-Laurentides'),(178,'Québec, Cantons de l\'Est'),(179,'Québec, Lanaudière'),(180,'Québec, Montérégie'),(181,'Québec, Outaouais'),(182,'Québec, Région de Québec'),(183,'Recas'),(184,'Rhein'),(185,'Rheingau'),(186,'Rheinhessen'),(187,'Rheinischer'),(188,'Rivera, Cerro Chapeu'),(189,'Salta, Cafayate - Valle de Cafayate'),(190,'Salta, Salta'),(191,'Samarie (Shomron), Mont Carmel'),(192,'Samarie (Shomron), Samarie (Shomron)'),(193,'Samson, Judean Foothills'),(194,'San Juan, San Juan'),(195,'San Juan, Valle del Pedernal'),(196,'Sardaigne'),(197,'Sardaigne, Isola dei Nuraghi'),(198,'Savoie et Bugey'),(199,'Sicile'),(200,'Sicile, Avola'),(201,'Sicile, Terre Siciliane'),(202,'South Eastern Australia'),(203,'South Island, Canterbury/Waipara valley'),(204,'South Island, Central Otago'),(205,'South Island, Marlborough'),(206,'South Island, Nelson'),(207,'Stefan Voda'),(208,'Steirerland'),(209,'Sterea Ellada / Centre /Ile d\'Eubee, Attiki (Attica)'),(210,'Sterea Ellada / Centre /Ile d\'Eubee, Sterea Ellada/Centre/ile Eubee'),(211,'Styrie (Steiermark)'),(212,'Sud-Est, Ardèche'),(213,'Sud-Est, Collines Rhodaniennes'),(214,'Sud-Est, Méditerranée'),(215,'Sud-Est, Pays des Bouches-du-Rhône'),(216,'Sud-Est, Var'),(217,'Sud-Est, Vaucluse'),(218,'Sud-Ouest, Comté-Tolosan'),(219,'Sud-Ouest, Côtes de Gascogne'),(220,'Sud-Ouest, Côtes du Tarn'),(221,'Sud-Ouest, Dordogne/Bergerac'),(222,'Sud-Ouest, Garonne et Lot'),(223,'Sud-Ouest, Pyrénées/Gascogne'),(224,'Tasmanie, Tasmania'),(225,'Tejo'),(226,'Tejo, Tejo'),(227,'Thessalia'),(228,'Thessalia, Karditsa'),(229,'Thrace, Avdira'),(230,'Thracian Valley'),(231,'Tokai'),(232,'Toscane'),(233,'Toscane, Alta Valle della Greve'),(234,'Toscane, Costa Toscana'),(235,'Toscane, Toscana'),(236,'Trentin Haut-Adige'),(237,'Trentin Haut-Adige, Vigneti delle Dolomiti'),(238,'Valais'),(239,'Valle Central, Valle Central'),(240,'Valle Central, Valle del Curico'),(241,'Valle Central, Valle del Maipo'),(242,'Valle Central, Valle del Maule'),(243,'Valle Central, Valle del Rapel'),(244,'Vallée d\'Aoste'),(245,'Vallée de l\'Ebre'),(246,'Vallée de l\'Ebre, Ribera del Queiles'),(247,'Vallée de l\'Ebre, Val de Jalon'),(248,'Vallée de la Bekaa'),(249,'Vallée de la Loire'),(250,'Vallée de la Loire, Centre Loire'),(251,'Vallée de la Loire, L\'Anjou et le Saumurois'),(252,'Vallée de la Loire, L\'Auvergne'),(253,'Vallée de la Loire, Le Pays Nantais et la Vendée'),(254,'Vallée de la Loire, Touraine'),(255,'Vallée du Duero'),(256,'Vallée du Duero, Castilla y León'),(257,'Vallée du Rhône, Rhône méridional'),(258,'Vallée du Rhône, Rhône satellites'),(259,'Vallée du Rhône, Rhône septentrional'),(260,'Valles Calchaquíes, Valles Calchaquíes'),(261,'Vénétie'),(262,'Vénétie, Delle Venezie'),(263,'Vénétie, Trevenezie'),(264,'Vénétie, Veneto'),(265,'Vénétie, Verona / Provincia di Verona / Veronese'),(266,'Vénétie, Vigneti delle Dolomiti'),(267,'Victoria, Bendigo'),(268,'Victoria, Geelong'),(269,'Victoria, Macedon Ranges'),(270,'Victoria, Mornington Peninsula'),(271,'Victoria, Pyrenees'),(272,'Victoria, Strathbogie Ranges'),(273,'Victoria, Yarra Valley'),(274,'Vinho Verde'),(275,'Vinho Verde, Minho'),(276,'Washington'),(277,'Weinland'),(278,'Western Cape, Breede River Valley'),(279,'Western Cape, Cape South Coast'),(280,'Western Cape, Coastal Region'),(281,'Western Cape, Klein-Karoo'),(282,'Western Cape, Western Cape'),(283,'Yunnan'),(284,'Abruzzes, Colli Aprutini'),(285,'Abruzzes, Colline Teatine'),(286,'Australie Occidentale'),(287,'Australie-Méridionale, Adelaide Plains'),(288,'Australie-Méridionale, Eden Valley'),(289,'Calabre, Val di Neto'),(290,'Campanie, Campania'),(291,'Cluj-Naoica'),(292,'Franken'),(293,'Judean Hills, Gush Etzion'),(294,'Latium, Civitella d\'Agliano'),(295,'Ligurie'),(296,'Ligurie, Terrazze dell\'Imperiese'),(297,'Lombardie, Alpi Retiche'),(298,'Macédoine, Kozani'),(299,'Mendoza, Santa Rosa'),(300,'Moravia'),(301,'Neckar'),(302,'North Island, Auckland'),(303,'North Island, Gisborne'),(304,'North Island, Kemeu'),(305,'Nouvelle-Galles du Sud, Orange'),(306,'Peloponnèse, Arkadia'),(307,'Québec'),(308,'Sardaigne, Romangia'),(309,'Sterea Ellada / Centre /Ile d\'Eubee, Evia'),(310,'Sterea Ellada / Centre /Ile d\'Eubee, Viotia'),(311,'Sud-Est, Île de Beauté'),(312,'Sud-Ouest, Côtes du Lot'),(313,'Thessalia, Thessalia'),(314,'Western Cape');
/*!40000 ALTER TABLE `vino__region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__taux_de_sucre`
--

DROP TABLE IF EXISTS `vino__taux_de_sucre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__taux_de_sucre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `valeur` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__taux_de_sucre`
--

LOCK TABLES `vino__taux_de_sucre` WRITE;
/*!40000 ALTER TABLE `vino__taux_de_sucre` DISABLE KEYS */;
INSERT INTO `vino__taux_de_sucre` VALUES (1,'1,2 g/L',1.2),(2,'1,3 g/L',1.3),(3,'1,4 g/L',1.4),(4,'1,5 g/L',1.5),(5,'1,6 g/L',1.6),(6,'1,7 g/L',1.7),(7,'1,8 g/L',1.8),(8,'1,9 g/L',1.9),(9,'10 g/L',10),(10,'11 g/L',11),(11,'12 g/L',12),(12,'120 g/L',120),(13,'13 g/L',13),(14,'14 g/L',14),(15,'140 g/L',140),(16,'15 g/L',15),(17,'150 g/L',150),(18,'17 g/L',17),(19,'170 g/L',170),(20,'18 g/L',18),(21,'19 g/L',19),(22,'2 g/L',2),(23,'2,1 g/L',2.1),(24,'2,2 g/L',2.2),(25,'2,3 g/L',2.3),(26,'2,4 g/L',2.4),(27,'2,5 g/L',2.5),(28,'2,6 g/L',2.6),(29,'2,7 g/L',2.7),(30,'2,8 g/L',2.8),(31,'2,9 g/L',2.9),(32,'21 g/L',21),(33,'23 g/L',23),(34,'24 g/L',24),(35,'26 g/L',26),(36,'27 g/L',27),(37,'270 g/L',270),(38,'28 g/L',28),(39,'29 g/L',29),(40,'3 g/L',3),(41,'3,1 g/L',3.1),(42,'3,2 g/L',3.2),(43,'3,3 g/L',3.3),(44,'3,4 g/L',3.4),(45,'3,5 g/L',3.5),(46,'3,6 g/L',3.6),(47,'3,7 g/L',3.7),(48,'3,8 g/L',3.8),(49,'3,9 g/L',3.9),(50,'37 g/L',37),(51,'38 g/L',38),(52,'39 g/L',39),(53,'4 g/L',4),(54,'4,1 g/L',4.1),(55,'4,2 g/L',4.2),(56,'4,3 g/L',4.3),(57,'4,4 g/L',4.4),(58,'4,5 g/L',4.5),(59,'4,6 g/L',4.6),(60,'4,7 g/L',4.7),(61,'4,8 g/L',4.8),(62,'4,9 g/L',4.9),(63,'43 g/L',43),(64,'47 g/L',47),(65,'48 g/L',48),(66,'49 g/L',49),(67,'5 g/L',5),(68,'5,1 g/L',5.1),(69,'5,2 g/L',5.2),(70,'5,3 g/L',5.3),(71,'5,4 g/L',5.4),(72,'5,5 g/L',5.5),(73,'5,6 g/L',5.6),(74,'5,7 g/L',5.7),(75,'5,8 g/L',5.8),(76,'5,9 g/L',5.9),(77,'51 g/L',51),(78,'53 g/L',53),(79,'59 g/L',59),(80,'6 g/L',6),(81,'6,1 g/L',6.1),(82,'6,2 g/L',6.2),(83,'6,3 g/L',6.3),(84,'6,4 g/L',6.4),(85,'6,5 g/L',6.5),(86,'6,6 g/L',6.6),(87,'6,7 g/L',6.7),(88,'6,8 g/L',6.8),(89,'6,9 g/L',6.9),(90,'62 g/L',62),(91,'68 g/L',68),(92,'69 g/L',69),(93,'7 g/L',7),(94,'7,1 g/L',7.1),(95,'7,2 g/L',7.2),(96,'7,3 g/L',7.3),(97,'7,4 g/L',7.4),(98,'7,5 g/L',7.5),(99,'7,6 g/L',7.6),(100,'7,7 g/L',7.7),(101,'7,8 g/L',7.8),(102,'7,9 g/L',7.9),(103,'71 g/L',71),(104,'8 g/L',8),(105,'8,1 g/L',8.1),(106,'8,2 g/L',8.2),(107,'8,3 g/L',8.3),(108,'8,4 g/L',8.4),(109,'8,5 g/L',8.5),(110,'8,6 g/L',8.6),(111,'8,7 g/L',8.7),(112,'8,8 g/L',8.8),(113,'8,9 g/L',8.9),(114,'9 g/L',9),(115,'9,1 g/L',9.1),(116,'9,2 g/L',9.2),(117,'9,3 g/L',9.3),(118,'9,4 g/L',9.4),(119,'9,5 g/L',9.5),(120,'9,6 g/L',9.6),(121,'9,8 g/L',9.8),(122,'9,9 g/L',9.9),(123,'92 g/L',92),(124,'98 g/L',98),(127,'60 g/L',60),(128,'110 g/L',110),(129,'130 g/L',130),(130,'22 g/L',22),(131,'240 g/L',240),(132,'30 g/L',30),(133,'32 g/L',32),(134,'34 g/L',34),(135,'35 g/L',35),(136,'40 g/L',40),(137,'41 g/L',41),(138,'42 g/L',42),(139,'46 g/L',46),(140,'50 g/L',50),(141,'52 g/L',52),(142,'55 g/L',55),(143,'72 g/L',72),(144,'85 g/L',85),(145,'9,7 g/L',9.7),(146,'91,4 g/L',91.4),(147,'96 g/L',96),(148,'25 g/L',25);
/*!40000 ALTER TABLE `vino__taux_de_sucre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__type`
--

DROP TABLE IF EXISTS `vino__type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__type`
--

LOCK TABLES `vino__type` WRITE;
/*!40000 ALTER TABLE `vino__type` DISABLE KEYS */;
INSERT INTO `vino__type` VALUES (1,'Vin rouge'),(2,'Vin blanc'),(3,'Vin rosé');
/*!40000 ALTER TABLE `vino__type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vino__type_cellier`
--

DROP TABLE IF EXISTS `vino__type_cellier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vino__type_cellier` (
  `id_type_cellier` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_cellier` varchar(100) NOT NULL,
  `nom_commun_type_cellier` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_type_cellier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vino__type_cellier`
--

LOCK TABLES `vino__type_cellier` WRITE;
/*!40000 ALTER TABLE `vino__type_cellier` DISABLE KEYS */;
INSERT INTO `vino__type_cellier` VALUES (1,'cave à vin','cellier'),(2,'réfrigérateur','frigo');
/*!40000 ALTER TABLE `vino__type_cellier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-21 11:38:29
