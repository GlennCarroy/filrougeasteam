-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 07 mars 2018 à 15:27
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `filrougeasteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteurs` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id`, `titre`, `contenu`, `auteurs`, `date_ajout`) VALUES
(1, 'Les journées citoyennes', 'Les journées citoyennes sont destinées à d''anciens participants du projet Do It. Elles nous permettent d''aller à la rencontre d''associations belges et de prendre le temps de mieux identifier nos moteurs d''engagement. Violette nous livre son témoignage sur sa première journée :\r\n\"Aujourd''hui, j''ai pu découvrir une autre facette de DBA mais aussi de mon pays, enfin de Bruxelles. J''ai vu des personnes très chaleureuses s''occuper de réfugiés et qui m''ont énormément touchée. Je me suis posé 1001 questions sur ce que je voulais faire plus tard parce que ces personnes m''ont donné envie de me lancer dans des projets comme ceux-là, qui offrent du savoir-vivre, de la réflexion, de nouveaux projets. A cette journée, j''ai appris beaucoup de choses sur moi, sur la société. S''il y a un an, je me suis engagée dans un projet pour partir dans un autre pays découvrir une façon de vivre et mieux comprendre les inégalités, c''était pour mieux revenir en Belgique avec des valeurs et des projets pour ma vie. Après mon Do It, j''ai aussi envie de \"voyager\" dans mon propre pays, de découvrir les inégalités qui existent ici, voir comment ça fonctionne et pourquoi. C''est fou de se dire qu''à même pas 50km de moi se trouvent des gens qui vivent avec énormément de difficultés alors que ce sont des gens intelligents et plein de ressources, avec qui on a énormément à partager et à apprendre. C''est ça que j''ai compris aujourd''hui. J''ai envie de rencontrer plus de gens comme ça, de partager ma vie avec eux et d''écouter leurs histoires. Je pense que, des fois, il n''est pas nécessaire de voyager pour rencontrer une autre culture. Au fond, juste en rencontrant des gens, je peux faire le tour du monde. Merci ...\"', 'Georges Henry', '2017-02-11 06:25:29'),
(2, 'FSM MONTREAL : Le jour de nos ateliers !', 'Cette fois, nous étions les acteurs de notre journée. Et nous avons pu partager avec d''autres nos projets ED.\r\nAu Forum, les associations et ONG présentes tiennent chacune \r\nà leur tour des ateliers. Des centaines d’ateliers sont ici organisés chaque \r\njour, sur tous les thèmes, dans toutes les langues.\r\n\r\nC’était notre jour aujourd’hui.\r\n\r\nLe matin, nous avons tenu notre atelier sur le projet Do it \r\net les séjours d’immersion. Témoignages de Valentine et Fayrouz à l’appui ainsi \r\nque 2 vidéos, nous avons clôturé celui-ci par une table ronde intéressante sur \r\nles résultats d’un tel projet. Une petite dizaine de personnes y a assisté.\r\n\r\nL’après-midi, nous avons tenu un atelier sur le plaidoyer \r\npour l’éducation à la citoyenneté auprès des jeunes. Avec notre toute nouvelle \r\nvidéo à l’appui, nous avons ensuite eu de très chouettes débats en 2 tables et \r\nune quinzaine de personnes, canadiens, burkinabè, ivoiriennes, marocaines. Très \r\nchouette.\r\n\r\nDans l’ensemble, le Forum a attiré moins de gens que prévu. L’engouement \r\ndes Canadiens cette année n’a pas été comparable à celui des Tunisiens l’an \r\npassé nous disent Bernard et Lahcen. Nous avons surtout été marqués par le peu \r\nde présence africaine … Visas non délivrés, coût du vol … Un Forum Social \r\nMondial sans trop d’Africains, un peu bizarre quand même …\r\n\r\nNous avons pour notre part beaucoup appris, rencontré foule \r\nde chouettes personnes, de beaux projets, établis de nouveaux contacts, \r\nvalorisé surtout nos actions, notre approche d’éducation, interpellé les gens \r\nsur notre pari de l’éducation à la citoyenneté des jeunes, fait connaître et \r\nrenforcé notre réseau.\r\n\r\nDe quoi donner des idées et de l’énergie pour la suite …  \r\n\r\nCe soir, c’était relâche avec un souper sympa sur la place \r\ndes arts, long espace piétonnier, au centre de Montréal et un premier bilan très \r\npositif du séjour.\r\n\r\nDemain, ce sera le début des retours, Vincent, puis JU, puis \r\nles autres samedi soir.\r\n\r\nOn pense bien à vous,\r\n\r\n', 'L’équipe FSM', '2016-08-06 20:18:25'),
(3, 'Do It 2018 : let''s go!', 'Près de 360 jeunes motivés ont participé aux premiers weekends du projet Do It 2018 qui s''annonce déjà haut en couleur\r\n\r\n\r\nLe mois de novembre touche à sa fin et compte déjà deux belles réussites en matière de formation : les week-ends couleurs. Durant ces journées, les jeunes participants ont eu l''occasion de se rencontrer, de faire connaissance avec l''équipe encadrante et d''explorer quelques thématiques dont beaucoup ont déjà pu tirer des enseignements : \r\n\r\n\r\n\r\n\"Vraiment très envie de poursuivre car après m''être un peu ouverte à ces réalités, je veux aller plus loin pour trouver ensuite des solutions, des pistes d''actions. Plus j''avance, plus cette formation me semble essentielle et enrichissante autant pour l''immersion que pour toute ma vie\"\r\n\r\n\r\n\r\n\"Une amie qui avait participé au weekend précédent (celui du 11-12 novembre) m''avait dit que c''était le meilleur weekend de sa vie. J''étais donc super enthousiaste à l''idée de venir au weekend... et je n''ai pas été déçue! En effet, c''était vraiment super chouette de déjà nous plonger un peu dans une ambiance africaine, avec le pain et le fromage à partager, le fait qu''on soit assis par terre avec le groupe, l''unique petit sac qu''on pouvait prendre pour aller à l''auberge de jeunesse, etc. Les activités m''ont vraiment plu, car c''est vrai qu''on n''a pas souvent l''occasion de parler en profondeur sur des sujets comme le féministe, les inégalités entre les pays du Nord et du Sud, les stéréotypes,... Bref, ce weekend était juste trop trop chouette et j''en garderai plein de bons souvenirs!!\"\r\n\r\n\r\n\r\nMerci à tous ces jeunes et leurs parents pour leur confiance.\r\n\r\nUne chose à dire : vivement la suite!   \r\n\r\n', 'Chantal Delcourt', '2017-11-29 17:16:29'),
(4, '20km de Bruxelles, soyez sportif et solidaire avec DBA !', 'Depuis 6 ans déjà, DBA participe aux 20km de Bruxelles au profit de l''action Sahel Vert.\r\nAlors si vous aussi vous avez envie d''ajouter une dimension humaine et solidaire à votre défi sportif, rejoignez l''équipe DBA le dimanche 29 mai prochain!\r\n\r\nPour vous inscrire, remplissez le formulaire (lien ci dessous) et payez votre inscription pour le vendredi 04 mars au plus tard.\r\nhttp://goo.gl/forms/KSt98yLxXe\r\n\r\nNous étions 200 l''année passée, combien serons-nous cette année?\r\n\r\nAu plaisir de relever ce beau défi avec vous,\r\n\r\nL''équipe DBA\r\n\r\nOuvert à tous, n''hésitez pas à diffuser...', 'Hélène Lafleur', '2016-02-01 07:31:47'),
(5, 'Move with Africa', 'Initiée par La Libre Belgique, cette action de sensibilisation à l''interculturalité et la citoyenneté mondiale est destinée aux professeurs et aux élèves du 3e degré de l''enseignement secondaire (5e, 6e et 7e), quelle que soit la forme d''enseignement et de réseau dont ils sont issus. Cette opération est soutenue par le ministère de l''Enseignement de la Fédération Wallonie-Bruxelles et de la Coopération au Développement (SPF Affaires étrangères). \r\n\r\nEn lançant Move with Africa, La Libre a souhaité avant tout sensibiliser un maximum de jeunes de tous horizons et de toutes origines à la problématique des relations Nord-Sud. \r\n\r\n200 jeunes et leurs professeurs s''engagent chaque année dans ce projet qu''ils mènent mènent en partenariat avec l''une des ONG engagée dans le projet, les emmène dans un pays d''Afrique lors des congés de détente ou de printemps (en fonction de la destination). \r\n\r\nDBA fait partie des ONG partenaires de ce projet depuis 2013. \r\n', 'Marine', '2018-03-05 00:00:00'),
(6, 'L’immersion : le point de départ de toute une vie ?', 'S’immerger 17-18 jours dans d''autres réalités est une expérience de vie qui laisse rarement insensible.  \r\n\r\nMais que faire une fois rentré(e) ? Comment répondre à ces questions qui se bousculent dans nos têtes ? Comment partager notre vécu avec d’autres ? Comment prolonger notre engagement ?\r\n\r\nDBA t’encourage à ne pas fermer la porte, à ne pas laisser ce projet tomber aux oubliettes, mais au contraire, à l’utiliser comme un tremplin pour continuer à réfléchir et à agir, à poursuivre ton engagement en faveur d’un monde plus juste et plus solidaire. \r\n\r\n', 'Marine', '2018-03-05 00:00:00'),
(7, 'DES PROJETS FAVORISANT UNE\r\nTRANSITION AGROECOLOGIQUE', 'E n 2016, DBA et ses partenaires ont\r\npoursuivi leur mobilisation pour promouvoir\r\nl’autonomisation des agriculteurs\r\net agricultrices afi n qu’ils vivent\r\ndignement de leur travail dans un environnement\r\ndurable. Vous pouvez découvrir le\r\nbilan des actions menées dans le nouveau\r\nrapport Sahel Vert.\r\nAu BURKINA FASO, Asmade et DBA ont\r\nmis en place une ferme agroécologique\r\ndans la commune de Saaba sur un site de\r\n7 ha qui proposent des formations pratiques\r\naux jeunes agriculteurs : des fosses\r\nfumières pour le compost, la production\r\nde biopesticides, des associations culturales,\r\nde nouveaux outils adaptés aux\r\ntechniques de SRI, etc. Toutes ces actions\r\npermettent une production bien plus saine\r\npour les villageois comme pour les acheteurs\r\net restaure sur\r\nle long terme la fertilité\r\ndes sols !\r\nAu BÉNIN, l’association\r\nvillageoise de\r\ncommercialisation\r\nd’Allahé a permis à\r\nleurs membres d’augmenter\r\nleurs revenus\r\net à fournir le marché local en riz\r\nalors qu’auparavant cette cé-\r\nréale n’était pas produite dans\r\ncette commune.\r\nEn INDE, nous poursuivons\r\nnotre appui à la ferme agroé-\r\ncologique de « Bharati Trust »\r\net soutenons la mise en place\r\nd’une petite ferme auprès de\r\nnotre partenaire 4S. ■', 'Berta Gielge', '2017-03-15 15:31:25');

-- --------------------------------------------------------

--
-- Structure de la table `articles_has_categories`
--

CREATE TABLE `articles_has_categories` (
  `id` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles_has_categories`
--

INSERT INTO `articles_has_categories` (`id`, `id_articles`, `id_categories`) VALUES
(1, 1, 2),
(2, 1, 7),
(3, 2, 3),
(4, 3, 3),
(5, 4, 2),
(6, 5, 3),
(7, 5, 1),
(8, 6, 3),
(9, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories_liste`
--

CREATE TABLE `categories_liste` (
  `categorie_id` int(11) NOT NULL,
  `categorie_nom` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories_liste`
--

INSERT INTO `categories_liste` (`categorie_id`, `categorie_nom`) VALUES
(1, 'Environnement'),
(2, 'Solidarité'),
(3, 'Projets'),
(7, 'Enseignement');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(4, 'marine', '$2y$10$MV/DL.RuOUcshDvSHj0MAuYzavFgE60508.g7H7NXPkagAtfNrPDS', '2018-03-06 12:18:30'),
(5, 'marine2', '$2y$10$PR2rxGgPh5/Fw5hOxEh...pRIGUvOSIgTuC2.sc0DrFBHyB6hC34u', '2018-03-06 13:37:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `articles_has_categories`
--
ALTER TABLE `articles_has_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_liste`
--
ALTER TABLE `categories_liste`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `articles_has_categories`
--
ALTER TABLE `articles_has_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categories_liste`
--
ALTER TABLE `categories_liste`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
