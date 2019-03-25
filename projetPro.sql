-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mars 2019 à 11:36
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetpro`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_manga_tomes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_FK` (`id_users`),
  KEY `comments_manga_tomes0_FK` (`id_manga_tomes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `manga_collection`
--

DROP TABLE IF EXISTS `manga_collection`;
CREATE TABLE IF NOT EXISTS `manga_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collectionName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `id_genre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_collection_genre_FK` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `manga_collection`
--

INSERT INTO `manga_collection` (`id`, `collectionName`, `description`, `image`, `author`, `editor`, `id_genre`) VALUES
(3, 'Bleach', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos.Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons... Bleach est l\'oeuvre d\'un mangaka prometteur, Taito Kubo, et le dernier succès des Editions Shueisha. Manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante, Bleach est la nouvelle bonne surprise du manga au pays du Soleil Levant.', '02.jpg', 'Taito Kubo', 'Glénat', 1),
(4, 'One Piece', 'Nous sommes à l\'ère des pirates. Luffy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"One Piece\", un fabuleux trésor. Par mégarde, Luffy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager.\r\nAvec l\'aide de ses précieux amis, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques.', '03.jpg', 'Eiichiro Oda', 'Glénat', 1),
(15, 'Naruto', 'Naruto est un garçon un peu spécial. Il est toujours tout seul et son caractère fougueux ne l\'aide pas vraiment à se faire apprécier dans son village. Malgré cela, il garde au fond de lui une ambition : celle de devenir un maître Hokage, la plus haute distinction dans l\'ordre des ninjas, et ainsi obtenir la reconnaissance de ses pairs. ', '01.jpg', 'Masashi Kishimoto', 'KANA', 1),
(19, 'My Hero Academia', 'Dans un monde où 80% de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\r\nFace à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', 'my_hero_academia_tome_1.jpg', 'Kôhei Horikoshi', 'KI-OON', 1),
(20, 'Fruits Basket ', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais.', 'fruits_basket_tome_1.jpg', 'Natsuki Takaya', 'DELCOURT', 2),
(21, 'So Charming ! ', 'Depuis toute petite, Nonaka rêve d\'avoir un amoureux. Arrivée au lycée, elle n\'a toujours pas de petit copain. Elle décide d\'enchaîner les soirées, commence un petit boulot, tente de rencontrer des garçons mais rien n\'y fait.\r\nEn réalité, elle a fait la connaissance de quelqu\'un : il s\'appelle Naoya et il devient son confident. Mais n\'y-a-t ‘il vraiment que de l\'amitié entre eux ? Il semblerait que Nonaka ne sache pas vraiment ce que c\'est qu\'être amoureuse. Elle va devoir partir à la conquête de ce sentiment avant de pouvoir franchir le pas.', 'so_charming!_tome_1.jpg', 'Kazune Kawahara', 'KANA', 2),
(22, 'Crush on You ! ', 'Otowa Tatsushi sort d’une triste rupture. Alors qu’elle s’était beaucoup investie émotionnellement, son petit ami a préféré mettre fin à leur relation afin de garder sa liberté. Depuis, elle se tient à l’écart des garçons.\r\nMais le destin joue parfois des tours inattendus. Elle va se rapprocher de Narazaki, plutôt beau garçon, mais très franc et manquant un peu de finesse. Les ennuis peuvent commencer', 'crush_on_you!_tome_1.jpg', 'Chihiro Kawakami', 'SOLEIL MANGA', 2),
(23, 'Riku-Do : La Rage aux Poings ', 'riku Azami est un jeune garçon dont la vie est placée sous le signe de la tragédie. Son père avec qui il vivait vient de se pendre et le jeune homme en profite pour lui rendre tous les coups que son géniteur lui avait donnés.\r\nIl demande alors à sa mère de vivre avec elle, mais ce qu\'il ignore c\'est qu\'elle vit avec un dealer violent et sadique. Voyant sa mère maltraitée, il essaie de s\'interposer et lui envoie un direct du droit comme Kyozuke lui a appris.\r\nIl saisit ensuite un cendrier et tue son assaillant. riku demande à Kyozukede de lui enseigner la boxe a n de pouvoir défendre ceux qu\'il aime. Kyozuke refuse et l\'envoie chez Shinji Baba son ancien entraîneur de boxe.\r\nShinji accepte de l\'entraîner car il décèle du potentiel chez riku. Quelques années plus tard, riku, continue à s\'entraîner et s\'apprête à passer l\'examen pour obtenir sa licence de boxe professionnelle', 'riku_do_tome_1.jpg', 'Toshimitsu Matsubara', 'Kazé', 3),
(24, 'Sun-Ken Rock ', 'Un paumé se retrouve à la tête d\'un gang. Et en plus, il est amoureux d\'une fliquette à tomber par terre. Ca promet !\r\nken, un jeune japonais, débarque à Séoul avec un seul but : devenir agent de police comme Yumin, la fille qu\'il aime. Mais c\'est loin d\'être gagné ! Alors qu\'il pleure son désespoir au comptoir d\'une gargote, des mafieux agressent le patron. Le sang de ken ne fait qu\'un tour et les coups de poings volent ! Impressionné par sa performance, le boss d\'un gang de quartier fait tout pour l\'enrôler, quitte à en faire le chef ! Baston, jolies femmes et costards de marque : pour ken, c\'est le début d\'une nouvelle vie mouvementée et pleine d\'humour ! ', 'sun_ken_rock_tome_1.jpg', 'Boichi', 'DOKI DOKI', 3);

-- --------------------------------------------------------

--
-- Structure de la table `manga_tomes`
--

DROP TABLE IF EXISTS `manga_tomes`;
CREATE TABLE IF NOT EXISTS `manga_tomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tomeName` varchar(255) NOT NULL,
  `tomeNumbers` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_manga_collection` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_tomes_manga_collection_FK` (`id_manga_collection`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `manga_tomes`
--

INSERT INTO `manga_tomes` (`id`, `tomeName`, `tomeNumbers`, `description`, `image`, `price`, `id_manga_collection`) VALUES
(3, 'The Death and the Strawberry ', '1', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos.Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons... Bleach est l\'oeuvre d\'un mangaka prometteur, Taito Kubo, et le dernier succès des Editions Shueisha. Manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante, Bleach est la nouvelle bonne surprise du manga au pays du Soleil Levant.', '02.jpg', '6,90', 3),
(4, 'Goodbye Parakeet, Goodnite my Sista ', '2', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) pourchassant une \"\"âme perdue\"\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies: celle de lycéen ordinaire et celle de chasseur de démons', 'bleach_tome_2.jpg', '6,90', 3),
(5, 'Memories in the rain', '3', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons...\r\nBleach est un manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante.', 'bleach_tome_3.jpg', '6,90', 3),
(6, 'Quincy Archer hates you', '4', 'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une \"âme perdue\", un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons...\r\nBleach est un manga d\'action au rythme trépidant, au graphisme soigné et à l\'intrigue palpitante.', 'bleach_tome_4.jpg', '6,90', 3),
(12, 'Naruto (tome 1)', '1', 'naruto est un garçon un peu spécial. Il est toujours tout seul et son caractère fougueux ne l\'aide pas vraiment à se faire apprécier dans son village. Malgré cela, il garde au fond de lui une ambition : celle de devenir un maître Hokage, la plus haute distinction dans l\'ordre des ninjas, et ainsi obtenir la reconnaissance de ses pairs. ', '01.jpg', '3.00', 15),
(13, 'Naruto (tome 2)', '2', 'Sasuke, Sakura et naruto passent un test dont le but est de s\'emparer de clochettes que détient le professeur Kakashi. Il leur fait bien réaliser leur infériorité et leur manque d\'expérience et finit par leur annoncer qu\'ils n\'ont aucune chance de devenir ninjas. ', 'naruto_tome_2.jpg', '3.00', 15),
(14, 'Naruto (tome 3)', '3', 'En compagnie de Sasuke et de Sakura, naruto, le pire garnement de l\'école des ninjas du village caché de Konoha, réussit avec brio le test de survie imposé par maître Kakashi. A présent, les trois jeunes gens forment une vraie équipe, mais ils ne sont encore que des ninjas de rang inférieur.', 'naruto_tome_3.jpg', '3.00', 15),
(15, 'Naruto (tome 4)', '4', 'Sasuke s\'effondre après avoir voulu protéger naruto ! Déclenché à la fois par la rage et la tristesse, un étrange bouleversement se produit en naruto. Haku est alors subitement balayé par le point rageur de naruto ! ', 'naruto_tome_4.jpg', '6.85', 15),
(16, 'Naruto (tome 5)', '5', 'En compagnie de Sasuke et de Sakura, naruto, le pire garnement de l\'école des Ninjas du village caché de Konoha, poursuit son apprentissage. A présent qu\'ils forment une équipe d\'apprentis Ninjas, les trois jeunes gens accomplissent différentes missions.\r\nAinsi, ils sont chargés de la protection de Tazuna, un artisan spécialisé dans la construction des ponts. Cette mission se solde par la mort de Zabuza et de Naku. Mais naruto et ses compagnons accomplissent leur travail et rentrent sains et saufs au village caché de Konoha. ', 'naruto_tome_5.jpg', '6.85', 15),
(17, 'Naruto (tome 6)', '6', 'En compagnie de Sasuke et de Sakura, naruto, le pire garnement de l\'école des Ninjas du village caché de Konoha, poursuit son apprentissage. A présent qu\'ils forment une équipe d\'apprentis ninjas, les trois jeunes gens accomplissent différentes missions.\r\nAinsi, ils ont été chargés de la protection de Tazuna, un artisan spécialisé dans la construction des ponts. Cette mission s\'est soldée par la mort de Zabuza et de Naku, des ninjas hors la loi. Mais naruto et ses compagnons ont accompli leur travail, et ils sont rentrés sains et saufs au village caché de Konoha. ', 'naruto_tome_6.jpg', '6.85', 15),
(18, 'À l\'Aube d\'une Grande Aventure', '1', 'Nous sommes à l\'ère des pirates. Lufy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"one Pierce\", un fabuleux trésor. Par mégarde, Lufy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques. ', '03.jpg', '6.90', 4),
(19, 'Luffy Versus la Bande à Baggy !!', '2', 'Luffy fait la connaissance de Nami, une ravissante jeune fille maîtrisant la navigation. Seulement, Nami déteste les pirates et refuse d\'entrer dans son équipage. Pire, elle fait prisonnier Luffy, pour le livrer au terrible... Baggy le clown ! ', 'one_piece_tome_2.jpg', '6.90', 4),
(20, 'Une Vérité qui Blesse', '3', 'Nous sommes à l\'ère des pirates. Lufy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"one Pierce\", un fabuleux trésor. Par mégarde, Lufy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques. ', 'one_piece_tome_3.jpg', '6.90', 4),
(21, 'Attaque au Clair de Lune', '4', 'Nous sommes à l\'ère des pirates. Lufy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"one Pierce\", un fabuleux trésor. Par mégarde, Lufy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques. ', 'one_piece_tome_4.jpg', '6.90', 4),
(22, 'Pour Qui Sonne le Glas', '5', 'Nous sommes à l\'ère des pirates. Lufy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"one Pierce\", un fabuleux trésor. Par mégarde, Lufy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques. ', 'one_piece_tome_5.jpg', '6.90', 4),
(23, 'Le Serment', '6', 'Nous sommes à l\'ère des pirates. Lufy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"one Pierce\", un fabuleux trésor. Par mégarde, Lufy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques', 'one_piece_tome_6.jpg', '6.90', 4),
(24, 'Izuku Midoriya : Les Origines ', '1', 'Dans un monde où 80% de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\r\nFace à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', 'my_hero_academia_tome_1.jpg', '6.60', 19),
(25, 'Déchaîne-Toi Maudit Nerd ! ', '2', 'Dans un monde où 80 % de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\r\nFace à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', 'my_hero_academia_tome_2.jpg', '6.60', 19),
(26, 'All Might ', '3', 'Dans un monde où 80% de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\r\nFace à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20% qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', 'my_hero_academia_tome_3.jpg', '6.60', 19),
(27, 'Celui qui Avait Tout ', '4', 'Dans un monde où 80% de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\r\nFace à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20% qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', 'my_hero_academia_tome_4.jpg', '6.60', 19),
(28, 'Shoto Todoroki : Les Origines ', '5', 'Et c\'est parti pour la troisième épreuve du championnat ! Les 16 élèves encore en lice vont s\'affronter lors d\'un tournoi sans merci...\r\nConfronté à un alter de contrôle mental, Deku parvient à gagner son premier duel en activant le One for All dans deux de ses doigts avant d\'envoyer son adversaire hors du ring !\r\nMais le prochain match s\'annonce ardu, car son opposant n\'est autre que Shoto, et le jeune garçon est bien décidé à l\'emporter. De son côté, Ochaco s\'apprête à se mesurer à Katsuki... Le combat promet d\'être explosif !', 'my_hero_academia_tome_5.jpg', '6.60', 19),
(29, 'Frémissements ', '6', 'Profondément frustré en voyant que Shoto refuse de se battre à fond, Izuku ne peut pas s\'empêcher de le pousser à utiliser ses flammes... Sa détermination et ses paroles parviennent à toucher son adversaire, qui, l\'espace d\'un instant, oublie sa rancune contre son père pour se donner à 100 % !\r\nMais le jeune garçon doute encore, et le tournoi s\'achève sur une victoire écrasante de Katsuki. À présent, c\'est un challenge d\'un tout autre genre qui attend les seconde A : trouver leur futur nom de héros !', 'my_hero_academia_tome_6.jpg', '6.60', 19),
(30, 'Fruits Basket (tome 1)', '1', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais. ', 'fruits_basket_tome_1.jpg', '6.60', 20),
(31, 'Fruits Basket (tome 2)', '2', 'Avez-vous déjà entendu parler de la triste histoire de l\'exclusion du chat des douze signes du zodiaque chinois et cela à cause de la fourberie du rat ? Torou Honda la connaît depuis toujours. Aujourd\'hui, Torou l\'orpheline a seize ans et a choisi de vivre de manière totalement indépendante dans une grande tente au milieu d\'un terrain en friche. Mais ce terrain appartient à la famille voisine Sôma. En fait, tous les membres de la famille Sôma ont été maudits et se transforment en l\'un des douze animaux du zodiaque chinois (plus le chat !) à chaque fois qu\'ils sont trop fatigués, ou qu\'ils sont approchés de trop près par une personne à percer leur secret sans l\'avoir magiquement oublié. Après mûres réflexions, les Sôma permettent donc à Torou de vivre chez eux. Mais la cohabitation ne sera pas de tout repos. Sens de lecture japonais. ', 'fruits_basket_tome_2.jpg', '6.60', 20),
(32, 'Fruits Basket (tome 3)', '3', 'Tohru vit à présent officiellement avec Shiguré, Yuki et Kyo Soma. Aujourd\'hui se déroule le grand marathon organisé comme chaque année par le lycée de Tohru. Durant la course surgit un autre membre de la famille Soma: il s\'agit de Hatsuharu, venu provoquer Kyô en combat singulier. Mais l\'affrontement tourne vite au règlement de comptes et Tohru ne sait que faire pour les séparer. Kagura Soma, est, elle aussi, venue rencontrer Kyô. A la veille de la Saint-Valentin, quelle proposition Kagura vient-elle faire à celui qu\'elle estime être son futur mari ? Sens de lecture japonais. ', 'fruits_basket_tome_3.jpg', '6.60', 20),
(33, 'Fruits Basket (tome 4)', '4', 'La vie au lycée s\'annonce tumultueuse: Monmiji et Hatsuharu, deux autres garçons de la famille Soma, rejoignent Tohru, Yuki et Kyô, qui ont réussi à passer en deuxième année ! Lors de la fête de rentrée, Akito, le chef de la famille Soma, apparaît devant Tohru. Vous allez aussi découvrir Ayamé (le grand frère de Yuki !) dans ce quatrième volume de notre fameuse comédie de la transformation, toujours aussi pleine de rebondissements ! ', 'fruits_basket_tome_4.jpg', '6.60', 20),
(34, 'Fruits Basket (tome 5)', '5', 'A l\'initiative de Shiguré, Tohru a passé une semaine de vacances de printemps très agréable, en compagnie de Yuki, Kyô et tous les autres, dans une des résidences secondaires de la famille Soma. A la fin des vacances, un jour de pluie, Hatsuharu apparaît soudain, un gros paquet sous le bras. Que porte-t-il si précautionneusement ? C\'est ce que vous découvrirez entre autres choses, en lisant le cinquième tome de cette joyeuse \"comédie de la transformation\". ', 'fruits_basket_tome_5.jpg', '6.60', 20),
(35, 'So Charming ! (tome 1)', '1', 'Depuis toute petite, Nonaka rêve d\'avoir un amoureux. Arrivée au lycée, elle n\'a toujours pas de petit copain. Elle décide d\'enchaîner les soirées, commence un petit boulot, tente de rencontrer des garçons mais rien n\'y fait.\r\nEn réalité, elle a fait la connaissance de quelqu\'un : il s\'appelle Naoya et il devient son confident. Mais n\'y-a-t ‘il vraiment que de l\'amitié entre eux ? Il semblerait que Nonaka ne sache pas vraiment ce que c\'est qu\'être amoureuse. Elle va devoir partir à la conquête de ce sentiment avant de pouvoir franchir le pas.', 'so_charming!_tome_1.jpg', '6.85', 21),
(36, 'So Charming ! (tome 2)', '2', 'Nonoka s\'est beaucoup rapprochée de Naoya Kiriyama, qui accepte de faire des sorties avec elle parce qu\'il n\'a rien d\'autre à faire. C\'est là que l\'amie d\'enfance et ex-petite amie de Naoya, Eriha, fait son apparition ! Eriha questionne Nonoka sur Naoya, ce qui agace Nonoka. Une chose est sûre, son « ami » prend de plus en plus de place dans son coeur. Mais elle ne semble pas encore avoir vu en lui son petit ami so charming..', 'so_charming!_tome_2.jpg', '6.85', 21),
(37, 'So Charming ! (tome 3)', '3', 'Le rêve de Nonoka est d’aller voir les illuminations féériques du compte à rebours du nouvel an avec son petit ami. Mais sa motivation pour trouver un petit ami a baissé depuis le mois de mai. Elle réalise que c’est parce qu’elle est tombée amoureuse de Naoya Kiriyama.\r\nC’est alors que Naoya voit Nonoka en compagnie de Shôhei Suzuki et lui assène un : « Tu es libre de voir qui tu veux ».', 'so_charming!_tome_3.jpg', '6.85', 21),
(38, 'So Charming ! (tome 4)', '4', 'Nonoka n\'avait pas réussi à trouver le bon moment pour faire sa déclaration à Naoya. Mais ce dernier lui remet des places spéciales couples pour qu\'elle aille voir les illuminations du compte a rebours avec Shôhei !!\r\nA la veille de réaliser son rêve d\'aller voir les illuminations, va-t-elle trouver son petit ami so charming ? ', 'so_charming!_tome_4.jpg', '6.85', 21),
(39, 'So Charming ! (tome 5)', '5', 'Nonoka n\'avait pas réussi à trouver le bon moment pour faire sa déclaration à Naoya. Mais ce dernier lui remet des places spéciales couples pour qu\'elle aille voir les illuminations du compte a rebours avec Shôhei !!\r\nA la veille de réaliser son rêve d\'aller voir les illuminations, va-t-elle trouver son petit ami so charming ? ', 'so_charming!_tome_5.jpg', '6.85', 21),
(40, 'Crush on You ! (tome 1)', '1', 'Otowa Tatsushi sort d’une triste rupture. Alors qu’elle s’était beaucoup investie émotionnellement, son petit ami a préféré mettre fin à leur relation afin de garder sa liberté. Depuis, elle se tient à l’écart des garçons.\r\nMais le destin joue parfois des tours inattendus. Elle va se rapprocher de Narazaki, plutôt beau garçon, mais très franc et manquant un peu de finesse. Les ennuis peuvent commencer…', 'crush_on_you!_tome_1.jpg', '6.99', 22),
(41, 'Crush on You ! (tome 2)', '2', 'Alors qu’ils apprennent à mieux se connaître, l’ex petit ami Ryûya leur fait clairement comprendre qu’il n’est pas d’accord !?\r\nIl mêle également sa copine Luna à son jeu bizarre et une drôle de relation à quatre se met en place !! ', 'crush_on_you!_tome_2.jpg', '6.99', 22),
(42, 'Crush on You ! (tome 3)', '3', 'Tsumugi se retrouve bien embêtée après avoir voulu aider l’ex de Ryûya, Luna... ? Et en plus l’ancienne petite ami du grand frère de Tatsushi se rapproche subitement de ce dernier !?\r\nUn élément vient perturber dangereusement nos deux couples !!! ', 'crush_on_you!_tome_3.jpg', '6.99', 22),
(43, 'Crush on You ! (tome 4)', '4', 'L’ex de Tsumugi, Ryûya, s’arrange pour que Mahiro s’acharne sur Tatsushi, le petit frère de son ex décédé, et ainsi séparer nos deux amoureux... ?\r\nTatsushi a du mal à maîtriser Mahiro, qu’il considère un peu comme de la famille... De son côté, Tsumugi essaie de comprendre ce qui se trame et laisse entrer Ryûya chez elle... !?\r\nCette fois, leur couple est vraiment en danger !! ', 'crush_on_you!_tome_4.jpg', '6.99', 22),
(44, 'Crush on You ! (tome 5)', '5', 'Juste avant de passer en 2ème année, Tatsushi et Tsumugi se rapprochent encore un peu plus. De son côté, Luna n’arrive pas à se défaire de Ryûya et continue à le voir quand il en a envie...\r\nC’est alors qu’une tentative de viol se produit au karaoké où travaille Mahiro ! Et la victime n’est autre que... !?', 'crush_on_you!_tome_5.jpg', '6.99', 22),
(45, 'Riku-Do : La Rage aux Poings (tome 1)', '1', 'riku Azami est un jeune garçon dont la vie est placée sous le signe de la tragédie. Son père avec qui il vivait vient de se pendre et le jeune homme en profite pour lui rendre tous les coups que son géniteur lui avait donnés.\r\nIl demande alors à sa mère de vivre avec elle, mais ce qu\'il ignore c\'est qu\'elle vit avec un dealer violent et sadique. Voyant sa mère maltraitée, il essaie de s\'interposer et lui envoie un direct du droit comme Kyozuke lui a appris.\r\nIl saisit ensuite un cendrier et tue son assaillant. riku demande à Kyozukede de lui enseigner la boxe a n de pouvoir défendre ceux qu\'il aime. Kyozuke refuse et l\'envoie chez Shinji Baba son ancien entraîneur de boxe.\r\nShinji accepte de l\'entraîner car il décèle du potentiel chez riku. Quelques années plus tard, riku, continue à s\'entraîner et s\'apprête à passer l\'examen pour obtenir sa licence de boxe professionnelle.', 'riku_do_tome_1.jpg', '7.99', 23),
(46, 'Riku-Do : La Rage aux Poings (tome 2)', '2', 'riku, désormais boxeur professionnel, s\'apprête à livrer le premier combat officiel de sa carrière.\r\nDe l\'autre côté du ring se tient Kikuchi, un ancien poids welter qui souhaite rendre fier son fils venu l\'encourager.\r\nMais face à cet amour filial qui lui a cruellement fait défaut, difficile de garder son sang-froid ! D\'autant que ce n\'est pas un seul adversaire qu\'il doit affronter, mais bien une famille...', 'riku_do_tome_2.jpg', '7.99', 23),
(47, 'Riku-Do : La Rage aux Poings (tome 3)', '3', 'riku, désormais boxeur professionnel, s\'apprête à livrer le premier combat officiel de sa carrière.\r\nDe l\'autre côté du ring se tient Kikuchi, un ancien poids welter qui souhaite rendre fier son fils venu l\'encourager.\r\nMais face à cet amour filial qui lui a cruellement fait défaut, difficile de garder son sang-froid ! D\'autant que ce n\'est pas un seul adversaire qu\'il doit affronter, mais bien une famille...', 'riku_do_tome_3.jpg', '7.99', 23),
(48, 'Riku-Do : La Rage aux Poings (tome 4)', '4', 'Dans ce premier tour du East Japan Rookie King, riku affronte Tsuwabuki, un ancien kick-boxer que Tokorozawa a secrètement entraîné.\r\nPour la première fois de sa jeune carrière, riku est en sérieuse difficulté et même envoyé au tapis ! Parviendra-t-il à trouver la faille et faire plier cet adversaire aussi endurci physiquement que mentalement ?', 'riku_do_tome_4.jpg', '7.99', 23),
(49, 'Riku-Do : La Rage aux Poings (tome 5)', '5', 'Sorti vainqueur de son combat contre Tsuwabuki, riku doit désormais affronter le redoutable Hyôdô.\r\nFils de boxeur professionnel et doté de capacités hors du commun, ce dernier évolue dans le monde de la boxe comme un poisson dans l\'eau.\r\nFace à un adversaire aussi avantagé, riku parviendra-t-il à surmonter ses faiblesses pour remporter le East Rookie King ? ', 'riku_do_tome_5.jpg', '7.99', 23),
(50, 'Sun-Ken Rock (tome 1)', '1', 'Un paumé se retrouve à la tête d\'un gang. Et en plus, il est amoureux d\'une fliquette à tomber par terre. Ca promet !\r\nken, un jeune japonais, débarque à Séoul avec un seul but : devenir agent de police comme Yumin, la fille qu\'il aime. Mais c\'est loin d\'être gagné ! Alors qu\'il pleure son désespoir au comptoir d\'une gargote, des mafieux agressent le patron. Le sang de ken ne fait qu\'un tour et les coups de poings volent ! Impressionné par sa performance, le boss d\'un gang de quartier fait tout pour l\'enrôler, quitte à en faire le chef ! Baston, jolies femmes et costards de marque : pour ken, c\'est le début d\'une nouvelle vie mouvementée et pleine d\'humour ! ', 'sun_ken_rock_tome_1.jpg', '7.50', 24),
(51, 'Sun-Ken Rock (tome 2)', '2', 'ken Kitano a débarqué en Corée afin de retrouver Yumin, la fille dont il est amoureux et qui a rejoint les rangs de la police de Séoul. Un jour, sans le vouloir, il se retrouve propulsé à la tête d\'un gang de quartier. Alors que la vie semble à nouveau lui sourire, ken n\'hésite pas à s\'en prendre à une bande de mafieux afin de sauver Miss Yoo, la serveuse du Dabang qu\'il fréquente habituellement. ', 'sun_ken_rock_tome_2.jpg', '7.50', 24),
(52, 'Sun-Ken Rock (tome 3)', '3', 'Un paumé se retrouve à la tête d\'un gang. Et en plus, il est amoureux d\'une fliquette à tomber par terre.\r\nDébarqué en Corée pour retrouver sa bien-aimée, ken se retrouve propulsé chef de gang. En voulant aider la serveuse de leur dabang préféré, ken et sa bande se frottent à la mafia locale et subissent une défaite qui leur fait prendre conscience de leurs limites. Les cinq compères se retirent dans un temple situé sur le mont Ji-Ri afin de suivre un entraînement draconien ! Un manga choc servi par un graphisme percutant ! ', 'sun_ken_rock_tome_3.jpg', '7.50', 24),
(53, 'Sun-Ken Rock (tome 4)', '4', 'Un paumé se retrouve à la tête d\'un gang. Et en plus, il est amoureux d\'une fliquette à tomber par terre. Ca promet !\r\nDébarqué en Corée pour retrouver sa bien-aimée, ken se retrouve propulsé chef de gang. S\'érigeant en défenseur des opprimés, il défie la mafia locale. Après un entraînement draconien sur le mont Ji-Ri, ken et sa bande retrouvent Séoul et règlent son compte au terrible groupe Gal-Ki. Devenu le nouveau patron du quartier, ken tombe par hasard sur Yumin, la fliquette de son co eur, qui lui dévoile sa vraie nature. ', 'sun_ken_rock_tome_4.jpg', '7.50', 24),
(54, 'Sun-Ken Rock (tome 5)', '5', 'Après avoir laminé le groupe Gal-Ki, le gang qui tyrannisait et exploitait le petit peuple de Yeong Deung Po, ken et sa bande deviennent les protecteurs officiels du quartier. Cette fois, ils se retrouvent mêlés à un différend opposant le groupe Fine et un casino. Les aventures de notre jeune japonais paumé devenu boss d\'un gang coréén continuent de plus belle dans ce 5ème volume fracassant ! ', 'sun_ken_rock_tome_5.jpg', '7.50', 24);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_users_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ranks`
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

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Shōnen'),
(2, 'Shōjo'),
(3, 'Seinen');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_ranks` int(11) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNumber` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_ranks_FK` (`id_ranks`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `mail`, `userName`, `password`, `id_ranks`, `birthDate`, `phoneNumber`) VALUES
(10, 'Benha', 'Yassine', 'yassine@yassine.fr', 'Yassine', '$2y$10$ZgUt7//aIwglJg41fdXb/eBMwUejgLnFK3N3zFWhj0n32d8pbLhoy', 1, '1997-07-23', '0630069053'),
(11, 'Luc', 'Lemahieu', 'luc.lemahieu1@gmail.com', 'Vyrd', '$2y$10$has4AFzO2MmgEOWf28E5g.QOzBK2o1sy4b.gbt5hpmyoGRnU5DtHm', 1, '1993-10-16', '0630069053'),
(12, 'FAŸ', 'Jeffen', 'meuporG@laposte.net', 'MeuporG', '$2y$10$4lkHXDpidCnJaMlzuFEzre0gM6e5xUhLEAS2YyKZu9IxW3OkwcZU2', 1, '1985-12-18', '0123345550'),
(13, 'Lemahieu', 'Luc', 'luc.lemahieu1@laposte.net', 'Ichigochini', '$2y$10$DpUzYi7eD8pXa5yfsy2pUenV4jwZavdwMnbtUQiEOYwQwbR7VpdxO', 4, '1993-10-16', '0630069053'),
(14, 'Lemahieu', 'Luc', 'luc.lemahieu@laposte.net', 'falesace', '$2y$10$hRLukRCGuaGcUEx6hHB.DuDA4h3tLL4oAp2ytKZ31Ih6sg/lSaXKa', 1, '1993-10-16', ''),
(15, 'Lemahieu', 'Eric', 'Eric.quelquechose@noob.fr', 'Eric', '$2y$10$cSapSyp.84khWs.3zDK9Q.DX0omoHyEYj5Ytu5FnfyJI.xDJkZEPK', 1, '1970-01-01', '');

--
-- Contraintes pour les tables déchargées
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
