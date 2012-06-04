-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 03 Juin 2012 à 17:58
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
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `id_resto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id`, `pseudo`, `message`, `id_resto`) VALUES
(1, 'Caca', 'ZoÃ©', 22),
(22, 'aaaa', 'aaaaaa', 21),
(23, 'bbb', 'bbb', 21),
(24, 'AZERTYUIOP', 'aaaa', 22);

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
-- Structure de la table `livreor`
--

CREATE TABLE IF NOT EXISTS `livreor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `texte` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `livreor`
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
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `timestamp`, `img`) VALUES
(19, 'Chez ClÃ©ment', '        Un fameux restaurant !', 1337260060, '1.jpg'),
(20, 'Fouquet''s', 'Pas mal !', 1337260225, '2.jpg'),
(21, 'LÃ©on', 'De Bruxelles', 1337260257, '3.jpg'),
(22, 'CrÃ©perie Josselin', '<p>\r\n	On a test&eacute; !&nbsp;</p>\r\n', 1337260296, '4.jpg'),
(23, 'Vin & MarÃ©e', '        A voir.        ', 1337260335, '5.jpg');

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
  `description` text NOT NULL,
  `date_creation` bigint(20) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
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
  `carte` text,
  `contenu` text NOT NULL,
  `infos` text NOT NULL,
  `nb_place_reservable` int(11) DEFAULT NULL,
  `nb_place reservee` int(11) DEFAULT NULL,
  `nb_commentaire` int(11) NOT NULL,
  `photos` text,
  `validation_moderateur` tinyint(1) NOT NULL,
  `signalement` int(11) NOT NULL,
  PRIMARY KEY (`id_resto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483647 ;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`id_resto`, `nom_resto`, `description`, `date_creation`, `telephone`, `mail`, `adresse`, `proprietaire`, `id_pays`, `id_ville`, `id_cd`, `id_rue`, `id_type`, `note`, `prix_moyen`, `caracteristiques`, `carte`, `contenu`, `infos`, `nb_place_reservable`, `nb_place reservee`, `nb_commentaire`, `photos`, `validation_moderateur`, `signalement`) VALUES
(0, 'Test 1', '        azert', 0, 1234, 'azrt@azert', '0 av 0', 0, 1, 75000, 0, 0, 10, 15, 25, 'test', '<h4 class=''menus''>Menus midi semaine&nbsp;: </h4>20&euro; - E/P ou P/D 27&euro; - E/P/D 33&euro;<br /><h4 class=''menus''>Menus midi week-end&nbsp;: </h4>E/P/D 33&euro;<br /><h4 class=''menus''>Menus soir semaine&nbsp;: </h4>E/P/D 40&euro;<br /><h4 class=''menus''>Menus soir week-end&nbsp;: </h4>E/P/D 40&euro;<br /><h4 class=''menus''>Prix à la carte (entrée+plat+dessert)&nbsp;: </h4>45&euro;<br /><br /></td><td class=''c''><h3>Le Chef vous suggère**</h3><h4 class=''sub_titles first''>Entrées</h4><p>Foie gras de canard, chutney de pommes  - 15&euro;</p><p>Gaspacho et gambas en tempura - 13&euro;</p><p>Saumon d&rsquo;Ecosse fum&eacute; maison, cr&ecirc;pe parmentier, cr&egrave;me fra&icirc;che  - 12&euro;</p><h4 class=''sub_titles''>Plats</h4><p>Grand tataki de saumon au sel fum&eacute; et gingembre - 20&euro;</p><p>Effiloch&eacute;e de raie, betterave, sauce ravigote  - 23&euro;</p><p>Epaule d''agneau confite aux herbes, caviar d''aubergine - 26&euro;</p><h4 class=''sub_titles''>Desserts</h4><p>Moelleux mi-cuit au chocolat - 11&euro;</p><p>Vacherin framboise et r&eacute;glisse - 11&euro;</p><p>Tarte au citron - 11&euro;</p><div class=''tag_title''>Mots-cl&eacute;s</div>', '                <div class=''tag_title''>Presentation</div><p class=''description''>Inédit, du 3 février au 30 avril 2012, le restaurant l’Alcazar accueille le restaurant éphémère de l’émission TOP CHEF ! <br />\r\n<br />\r\nUne dizaine de candidats emblématiques des saisons 1 et 2 - dont Romain Tischenko, Stéphanie Le Quellec, Tiffany Depardieu - et les nouveaux talents de la saison 3, s’invitent dans la cuisine du restaurant L’Alcazar, aux côtés de la brigade en place, pour vous proposer leurs plats à travers un menu TOP CHEF. L’occasion rêvée de vous régaler des prouesses culinaires de vos candidats<span id=''more_desc_hidden''>... <span class=''nolink'' href=''#'' id=''see_more_desc''>Lire la suite</span></span><span id=''more_desc_shown''> préférés ! <br />\r\n<br />\r\nJeu de Paume au XVIIème siècle, imprimerie au XVIIème puis célèbre cabaret, tenu par Jean Marie Rivière, l''Alcazar a été repris en novembre 1998 par Sir Terence Conran qui le transforme en brasserie contemporaine et lounge bar. <br />\r\n<br />\r\nL''Alcazar fait la part belle à la cuisine de traditions. Celle qui ravive des goûts oubliés tout en gardant une pointe d''originalité. <br />\r\n                ', '', NULL, NULL, 0, NULL, 0, 0),
(2147483647, 'azertyuyiop^$', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, NULL, 0, '', NULL, '', '', NULL, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant2`
--

CREATE TABLE IF NOT EXISTS `restaurant2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `adresse` text NOT NULL,
  `pays` varchar(11) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `codepostal` int(5) NOT NULL,
  `ville` varchar(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `caracs` text NOT NULL,
  `description` text NOT NULL,
  `nourriture` text NOT NULL,
  `prixmoyen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `restaurant2`
--

INSERT INTO `restaurant2` (`id`, `titre`, `contenu`, `timestamp`, `adresse`, `pays`, `tel`, `mail`, `codepostal`, `ville`, `type`, `caracs`, `description`, `nourriture`, `prixmoyen`) VALUES
(22, 'Le bleu', '<p>\r\n	&nbsp;</p>\r\n<h1>\r\n	<img alt="" src="http://a.cksource.com/c/1/inc/img/demo-little-red.jpg" style="margin-left: 10px; margin-right: 10px; float: left; width: 120px; height: 168px; " />Little Red Riding Hood</h1>\r\n<p>\r\n	&quot;<b>Little Red Riding Hood</b>&quot; is a famous&nbsp;<a href="http://en.wikipedia.org/wiki/Fairy_tale" title="Fairy tale">fairy tale</a>&nbsp;about a young girl&#39;s encounter with a wolf. The story has been changed considerably in its history and subject to numerous modern adaptations and readings.</p>\r\n<table align="right" border="1" cellpadding="1" cellspacing="1" style="width: 200px; ">\r\n	<caption>\r\n		<strong>International Names</strong></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				Chinese</td>\r\n			<td>\r\n				<i>å°ç´…å¸½</i></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Italian</td>\r\n			<td>\r\n				<i>Cappuccetto Rosso</i></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Spanish</td>\r\n			<td>\r\n				<i>Caperucita Roja</i></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	The version most widely known today is based on the&nbsp;<a href="http://en.wikipedia.org/wiki/Brothers_Grimm" title="Brothers Grimm">Brothers Grimm</a>&nbsp;variant. It is about a girl called Little Red Riding Hood, after the red&nbsp;<a href="http://en.wikipedia.org/wiki/Hood_%28headgear%29" title="Hood (headgear)">hooded</a>&nbsp;<a href="http://en.wikipedia.org/wiki/Cape" title="Cape">cape</a>&nbsp;or&nbsp;<a href="http://en.wikipedia.org/wiki/Cloak" title="Cloak">cloak</a>&nbsp;she wears. The girl walks through the woods to deliver food to her sick grandmother.</p>\r\n<p>\r\n	A wolf wants to eat the girl but is afraid to do so in public. He approaches the girl, and she na&iuml;vely tells him where she is going. He suggests the girl pick some flowers, which she does. In the meantime, he goes to the grandmother&#39;s house and gains entry by pretending to be the girl. He swallows the grandmother whole, and waits for the girl, disguised as the grandmother.</p>\r\n<p>\r\n	When the girl arrives, she notices he looks very strange to be her grandma. In most retellings, this eventually culminates with Little Red Riding Hood saying, &quot;My, what big teeth you have!&quot;<br />\r\n	To which the wolf replies, &quot;The better to eat you with,&quot; and swallows her whole, too.</p>\r\n<p>\r\n	A&nbsp;<a href="http://en.wikipedia.org/wiki/Hunter" title="Hunter">hunter</a>, however, comes to the rescue and cuts the wolf open. Little Red Riding Hood and her grandmother emerge unharmed. They fill the wolf&#39;s body with heavy stones, which drown him when he falls into a well. Other versions of the story have had the grandmother shut in the closet instead of eaten, and some have Little Red Riding Hood saved by the hunter as the wolf advances on her rather than after she is eaten.</p>\r\n<p>\r\n	The tale makes the clearest contrast between the safe world of the village and the dangers of the&nbsp;<a href="http://en.wikipedia.org/wiki/Enchanted_forest" title="Enchanted forest">forest</a>, conventional antitheses that are essentially medieval, though no written versions are as old as that.</p>\r\n', 1338474160, '28 Rue N D des Champs', 'france', 987654324, 'aaaa@aaaaa', 75006, 'Paris', 'Grand restaurant', 'Schtroumpf, bleu, petit', '<p>\r\n	<img alt="" src="http://www.bowlingdemillau.fr/carte_restaurant_4.JPG" style="width: 605px; height: 856px; " /></p>\r\n', 'Bonne', 100),
(20, 'Lalalala', '<p>\r\n	&nbsp;</p>\r\n<div class="tag_title" style="font-weight: bold; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; ">\r\n	Pr&eacute;sentation</div>\r\n<p class="description" style="padding-top: 0px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; ">\r\n	&diams;Poussez les portes du restaurant Mood et laissez-vous porter par <strong>l&rsquo;atmosph&egrave;re </strong>chaleureuse et reposante du lieu. Avec son d&eacute;cor sobre, design et raffin&eacute;, cet &eacute;tablissement est un r&eacute;el havre de paix.<br />\r\n	<br />\r\n	Id&eacute;al pour vos repas <em>d&rsquo;affaires</em>, entre amis ou en t&ecirc;te &agrave; t&ecirc;te, vous y d&eacute;gusterez une cuisine fran&ccedil;aise cr&eacute;ative d&eacute;clin&eacute;e sur une carte riche et vari&eacute;e. La formule Brunch du dimanche midi permet de se retrouver en famille ou entre amis autour d&rsquo;une profusion de mets d&eacute;licieux tout en offrant aux enfants<span id="more_desc_hidden">...<img alt="laugh" height="20" src="http://localhost/a/A/ckeditor/plugins/smiley/images/teeth_smile.gif" title="laugh" width="20" /></span></p>\r\n', 1338472549, '0', '0', 0, '0', 0, '0', '0', '0', '0', '0', 0),
(21, 'Test', '<p>\r\n	&nbsp;</p>\r\n<h1>\r\n	<img alt="" src="http://a.cksource.com/c/1/inc/img/demo-little-red.jpg" style="margin-left: 10px; margin-right: 10px; float: left; width: 120px; height: 168px; " />Little Red Riding Hood</h1>\r\n<p>\r\n	&quot;<b>Little Red Riding Hood</b>&quot; is a famous&nbsp;<a href="http://en.wikipedia.org/wiki/Fairy_tale" title="Fairy tale">fairy tale</a>&nbsp;about a young girl&#39;s encounter with a wolf. The story has been changed considerably in its history and subject to numerous modern adaptations and readings.</p>\r\n<table align="right" border="1" cellpadding="1" cellspacing="1" style="width: 200px; ">\r\n	<caption>\r\n		<strong>International Names</strong></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				Chinese</td>\r\n			<td>\r\n				<i>å°ç´…å¸½</i></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Italian</td>\r\n			<td>\r\n				<i>Cappuccetto Rosso</i></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Spanish</td>\r\n			<td>\r\n				<i>Caperucita Roja</i></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	The version most widely known today is based on the&nbsp;<a href="http://en.wikipedia.org/wiki/Brothers_Grimm" title="Brothers Grimm">Brothers Grimm</a>&nbsp;variant. It is about a girl called Little Red Riding Hood, after the red&nbsp;<a href="http://en.wikipedia.org/wiki/Hood_%28headgear%29" title="Hood (headgear)">hooded</a>&nbsp;<a href="http://en.wikipedia.org/wiki/Cape" title="Cape">cape</a>&nbsp;or&nbsp;<a href="http://en.wikipedia.org/wiki/Cloak" title="Cloak">cloak</a>&nbsp;she wears. The girl walks through the woods to deliver food to her sick grandmother.</p>\r\n<p>\r\n	A wolf wants to eat the girl but is afraid to do so in public. He approaches the girl, and she na&iuml;vely tells him where she is going. He suggests the girl pick some flowers, which she does. In the meantime, he goes to the grandmother&#39;s house and gains entry by pretending to be the girl. He swallows the grandmother whole, and waits for the girl, disguised as the grandmother.</p>\r\n<p>\r\n	When the girl arrives, she notices he looks very strange to be her grandma. In most retellings, this eventually culminates with Little Red Riding Hood saying, &quot;My, what big teeth you have!&quot;<br />\r\n	To which the wolf replies, &quot;The better to eat you with,&quot; and swallows her whole, too.</p>\r\n<p>\r\n	A&nbsp;<a href="http://en.wikipedia.org/wiki/Hunter" title="Hunter">hunter</a>, however, comes to the rescue and cuts the wolf open. Little Red Riding Hood and her grandmother emerge unharmed. They fill the wolf&#39;s body with heavy stones, which drown him when he falls into a well. Other versions of the story have had the grandmother shut in the closet instead of eaten, and some have Little Red Riding Hood saved by the hunter as the wolf advances on her rather than after she is eaten.</p>\r\n<p>\r\n	The tale makes the clearest contrast between the safe world of the village and the dangers of the&nbsp;<a href="http://en.wikipedia.org/wiki/Enchanted_forest" title="Enchanted forest">forest</a>, conventional antitheses that are essentially medieval, though no written versions are as old as that.</p>\r\n', 1338473279, '0', 'Pays', 0, '0', 0, '0', 'TypeRestaurant', '0', '<h1 style="text-align: justify; ">\r\n	<cite><span style="font-family:comic sans ms,cursive;"><span style="color:#ff0000;"><span style="background-color:#d3d3d3;">Du fromage,</span></span></span></cite></h1>\r\n<h1 style="text-align: justify; ">\r\n	<cite><span style="font-family:comic sans ms,cursive;"><span style="color:#ff0000;"><span style="background-color:#d3d3d3;">Des salaaades</span></span></span></cite></h1>\r\n<h1 style="text-align: justify; ">\r\n	<cite><span style="font-family:comic sans ms,cursive;"><span style="color:#ff0000;"><span style="background-color:#d3d3d3;">Et du bon miam miam</span></span></span></cite></h1>\r\n', '0', 0);

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
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`contenu`) VALUES
('aaaaa'),
('blabala'),
('<p>\r\n	<span style="color:#ff0000;">Test 1</span></p>\r\n');

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

