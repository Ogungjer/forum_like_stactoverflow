-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 04 jan. 2021 à 10:31
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `proje_lw`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_création` datetime NOT NULL,
  `ordre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `titre`, `date_création`, `ordre`) VALUES
(1, 'HTML', '2020-11-18 18:02:05', 1),
(2, 'CSS', '2020-11-18 18:02:05', 2),
(3, 'PHP', '2020-11-18 18:02:05', 3),
(4, 'JAVASCRIPT', '2020-11-18 18:02:05', 4);

-- --------------------------------------------------------

--
-- Structure de la table `questions_reponses`
--

CREATE TABLE `questions_reponses` (
  `id` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contenu` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions_reponses`
--

INSERT INTO `questions_reponses` (`id`, `titre`, `contenu`) VALUES
(1, 'L\'education en afrique ', 'Les pays dans lesquels le BICE intervient sont principalement situés en Afrique de l\'ouest et du centre. Dans cette région, habitée par quelque 534 millions de personnes, dont la moitié sont des enfants, les droits de l’enfant ont connu des progrès notables depuis 30 ans. À titre d’exemple : la mortalité infantile chez les moins de 5 ans a drastiquement chuté, de 199 à 97 pour 1 000, durant la période. Néanmoins, ce taux reste le plus élevé du globe…\r\n\r\nLe sort des enfants les plus vulnérables demeure en effet critique. Et nombre de leurs droits ne sont pas respectés. Si le contexte est propre à chaque pays, on retrouve néanmoins des facteurs communs à cette fragilité : des défaillances graves des États auprès de leur population, une pauvreté endémique, une instabilité politique et sociale, un climat de violence généralisé, des inégalités persistantes entre les sexes. Sans oublier, depuis quelques temps, la nette progression des catastrophes naturelles et sanitaires.\r\n\r\n'),
(2, 'Population jeune, synonyme de main-d’œuvre', 'Si de nombreuses régions dans le monde souffrent d’un vieillissement notable de leur population, c’est tout à fait le contraire en Afrique. En effet, le continent dispose d’une population relativement jeune. Plus de 60 % des Africains ont moins de 25 ans, si les pays développés n’en comptent que 27 % et le reste des pays en développement 44 %.\r\n\r\nLe continent constitue donc une source de main-d’œuvre considérable pour faire tourner son économie. En suivant des formations adéquates, ces jeunes constituent un potentiel énorme pour les investisseurs qui n’auront plus à importer de la main-d’œuvre, mais pourront donner du travail à la population locale.'),
(3, 'Excellente faisabilité des projets', 'Créer des projets est beaucoup plus facile en Afrique qu’ailleurs dans le monde. À titre d’exemple, vous pouvez trouver un business rentable à lancer avec moins de 500 € en Afrique. Si vous disposez de fonds limités, l’astuce est de débuter dans des secteurs accessibles et prioritaires avant de diversifier et se lancer dans des activités plus complexes.\r\n\r\nL’agriculture et l’agroalimentaire demeurent des secteurs clés en Afrique. Les gouvernements des pays africains adoptent une politique d’autosuffisance alimentaire afin de limiter l’importation en produits de première nécessité, notamment le riz. Les autorités encouragent, donc, les nouveaux investisseurs qui souhaitent œuvrer dans ce domaine, même avec peu de moyens financiers entre les mains.');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int NOT NULL,
  `id_forum` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `id_forum`, `titre`, `contenu`, `date_creation`, `id_user`) VALUES
(1, 1, 'Media queries', 'Le media queries désigne un module, une spécification CSS3, qui permet d\'adapter le contenu d\'une page Internet à des conditions particulières. La plupart du temps, il est mis à contribution pour modifier l\'affichage d\'une page Web, selon la hauteur et la largeur de l\'écran utilisé pour la navigation (écran d\'ordinateur, écran de smartphone, écran de tablette numérique, etc.).\r\n\r\n', '2020-11-19 15:32:09', 1),
(2, 1, 'Selecteur css', 'Un sélecteur CSS est un mot-clef qui permet de désigner une catégorie d\'éléments de la page éventuellement de nature différente ou une relation entre deux éléments. On pourra par exemple sélectionner tous les titres de niveau 2 dans le menu, ou encore tous les éléments que l\'on a marqués comme étant en rouge.', '2020-11-17 15:32:09', 1),
(3, 1, 'Margin', 'La propriété margin définit la taille des marges sur les quatre côtés de l\'élément. C\'est une propriété raccourcie qui permet de manipuler les autres propriétés de marges : margin-top , margin-right , margin-bottom et margin-left .', '2020-11-20 15:40:25', 1),
(4, 2, 'Toggle de Jquery', 'La méthode toggle () attache deux ou plusieurs fonctions pour basculer entre l\'événement de clic pour les éléments sélectionnés.\r\n\r\nLorsque vous cliquez sur un élément, la première fonction spécifiée se déclenche, lorsque vous cliquez à nouveau, la deuxième fonction se déclenche, et ainsi de suite.', '2020-11-19 15:42:55', 1),
(5, 2, '$titre', '$contenu', '2020-12-24 05:05:11', 2),
(6, 2, 'new', 'MERCI JÉSUS', '2020-12-24 05:08:35', 2),
(7, 2, 'MERCI', 'PAPA', '2020-12-24 05:32:08', 2),
(8, 1, 'MERCI', 'PAPA', '2020-12-24 05:33:22', 2),
(13, 2, 'Pers&eacute;vere', 'malgr&eacute; les obstacles', '2020-12-24 05:48:54', 2),
(22, 2, 'Pers&eacute;vere', 'ghqsvh&egrave;&eacute;', '2020-12-24 05:57:57', 2),
(23, 2, 'Pers&eacute;vere', 'ghqsvh&egrave;&eacute;', '2020-12-24 05:59:52', 2),
(24, 1, 'Pers&eacute;vere', '&egrave;&eacute;tdcucu', '2020-12-24 06:37:48', 2),
(25, 3, 'whcjhj', 'hvjvjvjvcjcjhvjgvjvjvvjvjvjvjvjvjvjvjvjjv', '2021-01-04 01:12:44', 2);

-- --------------------------------------------------------

--
-- Structure de la table `topic_reponse`
--

CREATE TABLE `topic_reponse` (
  `id` int NOT NULL,
  `id_topic` int NOT NULL,
  `id_user` int NOT NULL,
  `réponse_user` text NOT NULL,
  `date_réponse` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `topic_reponse`
--

INSERT INTO `topic_reponse` (`id`, `id_topic`, `id_user`, `réponse_user`, `date_réponse`) VALUES
(1, 1, 1, 'Réponse 1', '2020-11-23 20:09:49'),
(2, 1, 2, 'Bonne question', '2020-11-23 21:00:49'),
(3, 2, 2, 'Parfait', '2020-11-18 20:09:49'),
(4, 1, 1, 'C\'est cozy', '2020-11-24 20:11:49'),
(5, 2, 1, 'C\'est Merveilleux ce que DIEU fait!', '2020-11-23 20:18:11'),
(6, 2, 1, 'gvdhfbxfbfgb', '2020-12-28 01:06:25'),
(7, 2, 1, 'gvdhfbxfbfgb', '2020-12-28 01:12:44'),
(8, 2, 1, 'df d', '2020-12-28 01:14:20'),
(9, 2, 1, 'df d', '2020-12-28 01:16:18'),
(10, 2, 1, '', '2020-12-28 01:16:22'),
(11, 2, 1, 'fc', '2020-12-28 01:17:04'),
(12, 2, 1, 'fc', '2020-12-28 01:17:55'),
(13, 2, 1, 'fc', '2020-12-28 01:18:55'),
(14, 2, 1, 'bcghcjgc', '2020-12-28 07:37:39'),
(15, 2, 1, '', '2020-12-28 07:38:51'),
(16, 2, 1, '', '2020-12-28 07:44:11'),
(17, 2, 1, 'hgchcjhcj', '2020-12-28 07:46:44'),
(18, 2, 1, 'MERCI MON DIEU', '2020-12-28 07:47:52'),
(19, 2, 1, 'g', '2020-12-28 08:00:37'),
(20, 2, 1, 'ytvgcytcyghiytfjhiyfjkh', '2021-01-03 22:32:07'),
(21, 2, 1, 'wkzkdbkxbek', '2021-01-03 23:04:45'),
(22, 2, 16, 'jfjfjfyhjvjhvbj', '2021-01-04 01:54:52'),
(23, 2, 16, 'dydlktdktftygfvjnvn', '2021-01-04 01:55:01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Fabunmi', 'Solomone Oluwaseyi', 'directeur@gmail.com', 'ttyicitcyctyocoyco'),
(2, 'Ogungbemi', 'Jeremie', 'jermiedegaribaldi@gmail.com', 'sedxsez(sxere');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_recovery_asked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password_recovery_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `password_recovery_asked_date`, `password_recovery_token`) VALUES
(15, 'jean', 'jeremaye03@gmail.com', '9347b28dfc161f777097025fe0c07f4243fa4b8bb682f3886d58ee27e1c23954', '2020-12-25 15:44:03', NULL),
(16, 'projet', 'oladimejihappy@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2021-01-04 02:45:02', 'NDI51L3wZavdPrFtQYuC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions_reponses`
--
ALTER TABLE `questions_reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic_reponse`
--
ALTER TABLE `topic_reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `questions_reponses`
--
ALTER TABLE `questions_reponses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `topic_reponse`
--
ALTER TABLE `topic_reponse`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
