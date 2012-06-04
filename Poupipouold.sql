-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 08 Mai 2012 à 13:45
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Poupipou`
--

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
  `id_cd` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `cd`
--


-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emetteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `signalement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `commentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum_categorie`
--

CREATE TABLE IF NOT EXISTS `forum_categorie` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cat_ordre` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_ordre` (`cat_ordre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `forum_categorie`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum_forum`
--

CREATE TABLE IF NOT EXISTS `forum_forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_last_post_id` int(11) NOT NULL,
  `forum_topic` mediumint(8) NOT NULL,
  `forum_post` mediumint(8) NOT NULL,
  `auth_view` tinyint(4) NOT NULL,
  `auth_post` tinyint(4) NOT NULL,
  `auth_topic` tinyint(4) NOT NULL,
  `auth_annonce` tinyint(4) NOT NULL,
  `auth_modo` tinyint(4) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `forum_forum`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum_membres`
--

CREATE TABLE IF NOT EXISTS `forum_membres` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_pseudo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_mdp` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_msn` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_siteweb` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_signature` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_localisation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_inscrit` int(11) NOT NULL,
  `membre_derniere_visite` int(11) NOT NULL,
  `membre_rang` tinyint(4) DEFAULT '2',
  `membre_post` int(11) NOT NULL,
  PRIMARY KEY (`membre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `forum_membres`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

CREATE TABLE IF NOT EXISTS `forum_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_createur` int(11) NOT NULL,
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `post_time` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_forum_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `forum_post`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_createur` int(11) NOT NULL,
  `topic_vu` mediumint(8) NOT NULL,
  `topic_time` int(11) NOT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_last_post` int(11) NOT NULL,
  `topic_first_post` int(11) NOT NULL,
  `topic_post` mediumint(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_last_post` (`topic_last_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `forum_topic`
--


-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mail`
--


-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pays` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `pays`
--


-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id_resto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_resto` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `date_creation` date NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `proprietaire` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_cd` int(11) NOT NULL,
  `id_rue` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `note` int(4) DEFAULT NULL,
  `prix_moyen` int(11) NOT NULL,
  `caracteristiques` varchar(30) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `carte` text,
  `resume` text NOT NULL,
  `infos` text NOT NULL,
  `nb_place_reservable` int(11) DEFAULT NULL,
  `nb_place reservee` int(11) DEFAULT NULL,
  `nb_commentaire` int(11) NOT NULL,
  `photos` text,
  `validation_moderateur` tinyint(1) NOT NULL,
  `signalement` int(11) NOT NULL,
  PRIMARY KEY (`id_resto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`id_resto`, `nom_resto`, `telephone`, `mail`, `date_creation`, `adresse`, `proprietaire`, `id_pays`, `id_ville`, `id_cd`, `id_rue`, `id_type`, `note`, `prix_moyen`, `caracteristiques`, `description`, `carte`, `resume`, `infos`, `nb_place_reservable`, `nb_place reservee`, `nb_commentaire`, `photos`, `validation_moderateur`, `signalement`) VALUES
(1, 'Test 1', 1234, 'azrt@azert', '2012-04-04', '0 av 0', 0, 1, 75000, 0, 0, 10, 15, 25, 'test', '<div class=''tag_title''>Présentation</div>Jeu de Paume au XVII&egrave;me si&egrave;cle, imprimerie au XVII&egrave;me puis c&eacute;l&egrave;bre cabaret, tenu par Jean Marie Rivi&egrave;re, l''Alcazar a &eacute;t&eacute; repris en novembre 1998 par Sir ', '<h4 class=''menus''>Menus midi semaine&nbsp;: </h4>20&euro; - E/P ou P/D 27&euro; - E/P/D 33&euro;<br /><h4 class=''menus''>Menus midi week-end&nbsp;: </h4>E/P/D 33&euro;<br /><h4 class=''menus''>Menus soir semaine&nbsp;: </h4>E/P/D 40&euro;<br /><h4 class=''menus''>Menus soir week-end&nbsp;: </h4>E/P/D 40&euro;<br /><h4 class=''menus''>Prix à la carte (entrée+plat+dessert)&nbsp;: </h4>45&euro;<br /><br /></td><td class=''c''><h3>Le Chef vous suggère**</h3><h4 class=''sub_titles first''>Entrées</h4><p>Foie gras de canard, chutney de pommes  - 15&euro;</p><p>Gaspacho et gambas en tempura - 13&euro;</p><p>Saumon d&rsquo;Ecosse fum&eacute; maison, cr&ecirc;pe parmentier, cr&egrave;me fra&icirc;che  - 12&euro;</p><h4 class=''sub_titles''>Plats</h4><p>Grand tataki de saumon au sel fum&eacute; et gingembre - 20&euro;</p><p>Effiloch&eacute;e de raie, betterave, sauce ravigote  - 23&euro;</p><p>Epaule d''agneau confite aux herbes, caviar d''aubergine - 26&euro;</p><h4 class=''sub_titles''>Desserts</h4><p>Moelleux mi-cuit au chocolat - 11&euro;</p><p>Vacherin framboise et r&eacute;glisse - 11&euro;</p><p>Tarte au citron - 11&euro;</p><div class=''tag_title''>Mots-cl&eacute;s</div>', '<div class=''tag_title''>Presentation</div><p class=''description''>In&eacute;dit, du 3 f&eacute;vrier au 30 avril 2012, le restaurant l&rsquo;Alcazar accueille le restaurant &eacute;ph&eacute;m&egrave;re de l&rsquo;&eacute;mission TOP CHEF&nbsp;! <br />\r\n<br />\r\nUne dizaine de candidats embl&eacute;matiques des saisons 1 et 2 - dont Romain Tischenko, St&eacute;phanie Le Quellec, Tiffany Depardieu - et les nouveaux talents de la saison 3, s&rsquo;invitent dans la cuisine du restaurant L&rsquo;Alcazar, aux c&ocirc;t&eacute;s de la brigade en place, pour vous proposer leurs plats &agrave; travers un menu TOP CHEF. L&rsquo;occasion r&ecirc;v&eacute;e de vous r&eacute;galer des prouesses culinaires de vos candidats<span id=''more_desc_hidden''>... <span class=''nolink'' href=''#'' id=''see_more_desc''>Lire la suite</span></span><span id=''more_desc_shown''> pr&eacute;f&eacute;r&eacute;s&nbsp;! <br />\r\n<br />\r\nJeu de Paume au XVII&egrave;me si&egrave;cle, imprimerie au XVII&egrave;me puis c&eacute;l&egrave;bre cabaret, tenu par Jean Marie Rivi&egrave;re, l''Alcazar a &eacute;t&eacute; repris en novembre 1998 par Sir Terence Conran qui le transforme en brasserie contemporaine et lounge bar. <br />\r\n<br />\r\nL''Alcazar fait la part belle &agrave; la cuisine de traditions. Celle qui ravive des go&ucirc;ts oubli&eacute;s tout en gardant une pointe d''originalit&eacute;. <br />\r\n', '', NULL, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rue`
--

CREATE TABLE IF NOT EXISTS `rue` (
  `id_rue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rue` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `rue`
--


-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `type`
--


-- --------------------------------------------------------

--
-- Structure de la table `type_util`
--

CREATE TABLE IF NOT EXISTS `type_util` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `type_util`
--


-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `civilite` enum('Mr','Mme','Mlle') NOT NULL,
  `mail` varchar(30) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `nb_commentaire` int(11) DEFAULT NULL,
  `nb_signalement` int(11) NOT NULL,
  `restaurant` text,
  `favoris` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `utilisateur`
--


-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `id_pays` int(11) NOT NULL,
  `id_cp` int(5) NOT NULL,
  `nom_ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `ville`
--

