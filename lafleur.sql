-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 mai 2023 à 07:10
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `idProduit` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`id`),
  KEY `Appartenir_T_COMMANDE1_FK` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idProduit` int(11) NOT NULL,
  `idPannier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idPannier`),
  KEY `Contenir_T_PANNIER1_FK` (`idPannier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

DROP TABLE IF EXISTS `t_categorie`;
CREATE TABLE IF NOT EXISTS `t_categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`idCategorie`, `libelle`) VALUES
(1, 'rosier'),
(2, 'plante massif'),
(3, 'bulbe'),
(4, 'arbre'),
(5, 'cactus');

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

DROP TABLE IF EXISTS `t_commande`;
CREATE TABLE IF NOT EXISTS `t_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `T_COMMANDE_T_USER0_FK` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_pannier`
--

DROP TABLE IF EXISTS `t_pannier`;
CREATE TABLE IF NOT EXISTS `t_pannier` (
  `idPannier` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idPannier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_pannier`
--

INSERT INTO `t_pannier` (`idPannier`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

DROP TABLE IF EXISTS `t_produit`;
CREATE TABLE IF NOT EXISTS `t_produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `T_PRODUIT_T_CATEGORIE0_FK` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_produit`
--

INSERT INTO `t_produit` (`idProduit`, `Designation`, `prix`, `Stock`, `Description`, `Image`, `idCategorie`) VALUES
(1, 'La rose grimpant Pierre de Ronsard', 9.99, 155, 'C\'est un rosier grimpant à grandes fleurs très doubles ayant la forme des roses anciennes, globuleuses, d\'une couleur formant un dégradé du rose carminé central au rose délicat de l\'extérieur.', 'roseGrimpantPierreDeRonsard.png', 1),
(2, 'hortensia', 19.99, 586, 'L\'Hortensia est un arbuste à fleurs incontournable qui nous ravit au jardin de sa longue floraison, de juin à septembre ou octobre.', 'hortensia.png', 2),
(3, 'le Coeur de Marie', 29.99, 5786, 'Le Coeur de Marie est une plante vivace, qui a des fleurs roses et blanches en forme de cœur. Elle peut atteindre 120 cm de haut et 45 cm de large.', 'coeurDeMarie.png', 3),
(4, 'Tulipe triomphe \'Jan Reus\'', 14.99, 369, 'La Tulipe Triomphe \'Jan Reus\' est recherchée pour son élégance et sa vivacité. Cette tulipe majestueuse à corolle étroite offre des pétales rouge bordeaux velouté s’associant à merveille avec des coloris lilas et orangé.', 'tulipeJanReus.png', 3),
(5, 'Tulipe Triomphe \'Barcelona\'', 16.99, 153, 'La Tulipe Triomphe Barcelona est intéressante pour son coloris très tendance.', 'tulipeBarcelona.png', 3),
(6, 'Tulipe simple tardive \'Reine de la Nuit\'', 9.99, 200, 'La Tulipe Simple tardive \'Reine de la Nuit\' est sans doute la meilleure et la plus sombre des tulipes dites \'noires\'', 'tulipeReineDeLaNuit.png', 3),
(7, 'Tulipe à fleur de lis \'White Triumphator\'', 19.99, 526, 'La Tulipe Fleur de Lis White Triumphator est une superbe variété ancienne, datant de 1942, toujours appréciée pour ses longues fleurs effilées d\'un blanc immaculé, dont l\'élégance est incontestable en bouquets comme dans les massifs.', 'tulipeWhiteTriumphator.png', 3),
(8, 'la Pivoine', 10.99, 257, 'Les pivoines sont connues par une quarantaine d\'espèces de plantes vivaces, herbacées, ou arbustives.', 'pivioine.png', 3),
(9, 'l\'Iris d\'Allemagne', 10.99, 321, 'L’Iris d’Allemagne est une plante vivace de la famille des Iridacées, qui a des fleurs colorées et parfumées avec une barbe sur les pétales. Elle peut atteindre 120 cm de haut et a un rhizome horizontal qui se ramifie.', 'irisAllemagne.png', 3),
(10, 'le Dahlia', 13.99, 0, 'Le Dahlia est une plante vivace de la famille des Astéracées, originaire du Mexique et d’Amérique centrale. Ses fleurs sont composées et peuvent être blanches, jaunes, rouges ou violettes.', 'dahlia.png', 3),
(11, 'la Campanule italienne', 19.99, 53, 'La Campanule italienne est une autre appellation de la Campanula isophylla, une plante vivace originaire des falaises et des murailles calcaires d’Italie.', 'campanule.png', 2),
(12, 'Fleur de sakura', 40.99, 25, 'La fleur de sakura est la fleur du cerisier ornemental du Japon, qui appartient au genre Prunus. Elle est de couleur rose ou blanche et a cinq pétales.', 'sakura.png', 4),
(13, 'Le narcisse', 9.99, 436, 'Le narcisse est une plante bulbeuse qui appartient à la famille des amaryllidacées. Il existe de nombreuses espèces et variétés de narcisse, qui se distinguent par la couleur et la forme de leurs fleurs.', 'narcisse.png', 3),
(14, 'Heliconia', 34.99, 87, 'L’Heliconia est une plante à fleur qui appartient à la famille des Heliconiacées, qui ne comprend qu’un seul genre.', 'heliconia.png', 2),
(15, 'L\'Hibiscus', 60.99, 96, 'Les fleurs sont généralement grandes et colorées, avec une forme de trompette et cinq pétales. Elles peuvent être roses, rouges, oranges, blanches ou jaunes.', 'hibiscus.png', 3),
(16, 'Anémone', 12.99, 79, 'L’anémone de terre est une plante à fleur qui appartient à la famille des Renonculacées. Elle se présente sous forme de bulbe ou de rhizome et produit des fleurs simples ou doubles, souvent rouges, bleues ou blanches.', 'anemone.png', 3),
(17, 'Jacinthe ', 25.99, 468, 'La jacinthe est une plante à bulbe qui appartient à la famille des Hyacinthacées. Elle est originaire de Méditerranée orientale. Elle produit des fleurs en forme de clochettes, simples ou doubles, aux couleurs variées et très parfumées.', 'jacinthe.png', 3),
(18, 'Schlumbergera ', 30.99, 50, 'Le schlumbergera est un genre de cactus sans épines qui compte six à neuf espèces originaires des montagnes côtières du sud-est du Brésil.', 'schlumbergera.png', 5),
(19, 'Abutilon ', 20.99, 487, 'L’abutilon est un grand genre de plantes à fleurs de la famille des Malvacées. Il est réparti dans les régions tropicales et subtropicales des Amériques, d’Afrique, d’Asie et d’Australie.', 'abutilon.png', 2),
(20, 'Aconit ', 10.99, 428, 'L’aconit est un nom commun qui désigne plusieurs espèces de plantes herbacées vivaces de la famille des Renonculacées.', 'aconit.png', 2),
(21, 'Aisamco ', 20.99, 359, 'Ces jolies plantes succulentes sont un excellent moyen de conserver l’apparence de plantes fraîches à la maison, mais sans l’inquiétude de trop arroser et de l’eau.', 'Aisamco.png', 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codePostale` varchar(100) DEFAULT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `idPannier` int(11) NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `solde` float DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `T_USER_T_PANNIER0_AK` (`idPannier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`email`, `nom`, `prenom`, `adresse`, `ville`, `codePostale`, `motDePasse`, `idPannier`, `admin`, `solde`) VALUES
('aldupont@lafleur.fr', 'dupont', 'alex', '31 rue des petits chats ', 'orléans', '45000', 'f137a20ccb25e169019fc623d79c7f67e9c076ad', 1, 1, 0),
('dylheur@gmail.com', 'lheur', 'dylan', '8 rue des fleurs', 'paris', '75000', 'be9a318c4a9fee13aa5da57dcfc1f68a111442fb', 2, NULL, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_T_COMMANDE1_FK` FOREIGN KEY (`id`) REFERENCES `t_commande` (`id`),
  ADD CONSTRAINT `Appartenir_T_PRODUIT0_FK` FOREIGN KEY (`idProduit`) REFERENCES `t_produit` (`idProduit`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `Contenir_T_PANNIER1_FK` FOREIGN KEY (`idPannier`) REFERENCES `t_pannier` (`idPannier`),
  ADD CONSTRAINT `Contenir_T_PRODUIT0_FK` FOREIGN KEY (`idProduit`) REFERENCES `t_produit` (`idProduit`);

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `T_COMMANDE_T_USER0_FK` FOREIGN KEY (`email`) REFERENCES `t_user` (`email`);

--
-- Contraintes pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD CONSTRAINT `T_PRODUIT_T_CATEGORIE0_FK` FOREIGN KEY (`idCategorie`) REFERENCES `t_categorie` (`idCategorie`);

--
-- Contraintes pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `T_USER_T_PANNIER0_FK` FOREIGN KEY (`idPannier`) REFERENCES `t_pannier` (`idPannier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
