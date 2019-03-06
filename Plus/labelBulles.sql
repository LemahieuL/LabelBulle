-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 06 Mars 2019 à 09:07
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetPro`
--
CREATE DATABASE IF NOT EXISTS `projetPro` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetPro`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_manga_tomes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `manga_collection`
--

CREATE TABLE `manga_collection` (
  `id` int(11) NOT NULL,
  `collectionName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `manga_collection`
--

INSERT INTO `manga_collection` (`id`, `collectionName`, `description`, `image`, `author`, `editor`, `id_genre`) VALUES
(3, 'Bleach', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos.Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons... Bleach est l\'oeuvre d\'un mangaka prometteur, Taito Kubo, et le dernier succès des Editions Shueisha. Manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante, Bleach est la nouvelle bonne surprise du manga au pays du Soleil Levant.', '02.jpg', 'Taito Kubo', 'Glénat', 1),
(4, 'One Piece', 'Nous sommes à l\'ère des pirates. Luffy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"One Piece\", un fabuleux trésor. Par mégarde, Luffy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager.\r\nAvec l\'aide de ses précieux amis, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques.', '03.jpg', 'Eiichiro Oda', 'Glénat', 1),
(6, 'Fruits Basket', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais. ', 'fruits_basket_tome_1.jpg', 'Natsuki Takaya', 'DELCOURT', 2),
(15, 'Naruto', 'Naruto est un garçon un peu spécial. Il est toujours tout seul et son caractère fougueux ne l\'aide pas vraiment à se faire apprécier dans son village. Malgré cela, il garde au fond de lui une ambition : celle de devenir un maître Hokage, la plus haute distinction dans l\'ordre des ninjas, et ainsi obtenir la reconnaissance de ses pairs. ', '01.jpg', 'Masashi Kishimoto', 'KANA', 1);

-- --------------------------------------------------------

--
-- Structure de la table `manga_tomes`
--

CREATE TABLE `manga_tomes` (
  `id` int(11) NOT NULL,
  `tomeName` varchar(255) NOT NULL,
  `tomeNumbers` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_manga_collection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `manga_tomes`
--

INSERT INTO `manga_tomes` (`id`, `tomeName`, `tomeNumbers`, `description`, `image`, `price`, `id_manga_collection`) VALUES
(3, 'The Death and the Strawberry ', '1', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos.Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons... Bleach est l\'oeuvre d\'un mangaka prometteur, Taito Kubo, et le dernier succès des Editions Shueisha. Manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante, Bleach est la nouvelle bonne surprise du manga au pays du Soleil Levant.', '02.jpg', '6,90', 3),
(4, 'Goodbye Parakeet, Goodnite my Sista ', '2', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) pourchassant une \"\"âme perdue\"\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies: celle de lycéen ordinaire et celle de chasseur de démons', 'bleach_tome_2.jpg', '6,90', 3),
(5, 'Memories in the rain', '3', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons...\r\nBleach est un manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante.', 'bleach_tome_3.jpg', '6,90', 3),
(6, 'Quincy Archer hates you', '4', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons...\r\nBleach est un manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante.', 'bleach_tome_4.jpg', '6,90', 3),
(7, 'Fruits Basket (tome 1)', '1', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais. ', 'fruits_basket_tome_1.jpg', '6,99', 6),
(8, 'Fruits Basket (tome 2)', '2', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais. ', 'fruits_basket_tome_2.jpg', '6,99', 6),
(9, 'Fruits Basket (tome 3)', '3', 'Tohru vit à présent officiellement avec Shiguré, Yuki et Kyo Soma. Aujourd\'hui se déroule le grand marathon organisé comme chaque année par le lycée de Tohru. Durant la course surgit un autre membre de la famille Soma: il s\'agit de Hatsuharu, venu provoquer Kyô en combat singulier. Mais l\'affrontement tourne vite au règlement de comptes et Tohru ne sait que faire pour les séparer. Kagura Soma, est, elle aussi, venue rencontrer Kyô. A la veille de la Saint-Valentin, quelle proposition Kagura vient-elle faire à celui qu\'elle estime être son futur mari ? Sens de lecture japonais. ', 'fruits_basket_tome_3.jpg', '6,99', 6),
(10, 'Fruits Basket (tome 5)', '5', 'A l\'initiative de Shiguré, Tohru a passé une semaine de vacances de printemps très agréable, en compagnie de Yuki, Kyô et tous les autres, dans une des résidences secondaires de la famille Soma. A la fin des vacances, un jour de pluie, Hatsuharu apparaît soudain, un gros paquet sous le bras. Que porte-t-il si précautionneusement ? C\'est ce que vous découvrirez entre autres choses, en lisant le cinquième tome de cette joyeuse \"comédie de la transformation\". ', 'fruits_basket_tome_5.jpg', '6,99', 6),
(11, 'Fruits Basket (tome 4)', '4', 'La vie au lycée s\'annonce tumultueuse: Monmiji et Hatsuharu, deux autres garçons de la famille Soma, rejoignent Tohru, Yuki et Kyô, qui ont réussi à passer en deuxième année ! Lors de la fête de rentrée, Akito, le chef de la famille Soma, apparaît devant Tohru. Vous allez aussi découvrir Ayamé (le grand frère de Yuki !) dans ce quatrième volume de notre fameuse comédie de la transformation, toujours aussi pleine de rebondissements ! ', 'fruits_basket_tome_4.jpg', '6,99', 6),
(13, 'azerazr', '1', 'azeraze', 'naruto_tome_4.jpg', '6,90', 15);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ranks`
--

INSERT INTO `ranks` (`id`, `name`) VALUES
(1, 'Utilisateur'),
(2, 'Modérateur'),
(3, 'Employé'),
(4, 'Gérant');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Shōnen'),
(2, 'Shōjo'),
(3, 'Seinen');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_ranks` int(11) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNumber` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `mail`, `userName`, `password`, `id_ranks`, `birthDate`, `phoneNumber`) VALUES
(1, 'Lemahieu', 'Luc', 'luc.lemahieu@laposte.net', 'falesace', 'L1610l1993', 4, '1993-10-16', '0630069053'),
(3, 'Lemahie', 'Luc', 'luc.lemahieu@laposte.net', 'falesace', '$2y$10$P4vzwvIKjYvsCBPqaSqFS.cuy3AkvsbKYSU.M7syn0zitrS9KNfRK', 1, NULL, ''),
(4, 'zeraez', 'azer', 'luc.lemahieu@laposte.net', 'Machin', '$2y$10$hSDzaGyLmWTQDrEzMnorIONBLQpbJZIA9es5jhzgUdSIr8Xbr12t.', 1, '1993-04-23', '0679233413'),
(7, 'Lemahieu', 'Luc', '', 'falesace', '$2y$10$lLcOFzCZan8X0NKR4Hp0/ORKa7NvvN1wQdUJFvGo0F47R.XQ594QO', 1, '1970-01-01', ''),
(10, 'Benha', 'Yassine', 'yassine@yassine.fr', 'Yassine', '$2y$10$ZgUt7//aIwglJg41fdXb/eBMwUejgLnFK3N3zFWhj0n32d8pbLhoy', 1, '1997-07-23', '0630069053'),
(11, 'Luc', 'Lemahieu', 'luc.lemahieu1@gmail.com', 'Vyrd', '$2y$10$has4AFzO2MmgEOWf28E5g.QOzBK2o1sy4b.gbt5hpmyoGRnU5DtHm', 1, '1993-10-16', '0630069053'),
(12, 'FAŸ', 'Jeffen', 'meuporG@laposte.net', 'MeuporG', '$2y$10$4lkHXDpidCnJaMlzuFEzre0gM6e5xUhLEAS2YyKZu9IxW3OkwcZU2', 1, '1985-12-18', '0123345550'),
(13, 'Lemahieu', 'Luc', 'luc.lemahieu1@laposte.net', 'Ichigochini', '$2y$10$DpUzYi7eD8pXa5yfsy2pUenV4jwZavdwMnbtUQiEOYwQwbR7VpdxO', 4, '1993-10-16', '0630069053');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_users_FK` (`id_users`),
  ADD KEY `comments_manga_tomes0_FK` (`id_manga_tomes`);

--
-- Index pour la table `manga_collection`
--
ALTER TABLE `manga_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manga_collection_genre_FK` (`id_genre`);

--
-- Index pour la table `manga_tomes`
--
ALTER TABLE `manga_tomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manga_tomes_manga_collection_FK` (`id_manga_collection`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_users_FK` (`id_users`);

--
-- Index pour la table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ranks_FK` (`id_ranks`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `manga_collection`
--
ALTER TABLE `manga_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `manga_tomes`
--
ALTER TABLE `manga_tomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_manga_tomes0_FK` FOREIGN KEY (`id_manga_tomes`) REFERENCES `manga_tomes` (`id`),
  ADD CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `manga_collection`
--
ALTER TABLE `manga_collection`
  ADD CONSTRAINT `manga_collection_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `manga_tomes`
--
ALTER TABLE `manga_tomes`
  ADD CONSTRAINT `manga_tomes_manga_collection_FK` FOREIGN KEY (`id_manga_collection`) REFERENCES `manga_collection` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ranks_FK` FOREIGN KEY (`id_ranks`) REFERENCES `ranks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
