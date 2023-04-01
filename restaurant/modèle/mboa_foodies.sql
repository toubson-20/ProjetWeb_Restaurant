-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 01 avr. 2023 à 18:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mboa_foodies`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Id_client` int(10) UNSIGNED NOT NULL,
  `Id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_client`, `Id_user`) VALUES
(25, 1),
(24, 2),
(30, 12),
(31, 13),
(32, 14),
(33, 15),
(34, 16);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `Id_commande` int(10) UNSIGNED NOT NULL,
  `heure_livraison` time NOT NULL,
  `date_livraison` date NOT NULL,
  `Adresse_livraison` varchar(50) NOT NULL,
  `Id_employe` varchar(50) NOT NULL,
  `Id_client` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id_commande`, `heure_livraison`, `date_livraison`, `Adresse_livraison`, `Id_employe`, `Id_client`) VALUES
(1, '12:39:43', '2023-03-26', '8 rue Mont', '1', 24),
(3, '16:33:29', '2023-03-27', '8 rue M', '1', 25);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_produits`
--

CREATE TABLE `commandes_produits` (
  `id` int(11) NOT NULL,
  `Id_commande` int(10) UNSIGNED NOT NULL,
  `Id_produit` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixUnitaire` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `Id_commande` int(10) UNSIGNED NOT NULL,
  `Id_Produit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `Id_employe` varchar(50) NOT NULL,
  `Id_user` int(10) UNSIGNED DEFAULT NULL,
  `Description` varchar(200) NOT NULL,
  `Img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Id_employe`, `Id_user`, `Description`, `Img`) VALUES
('1', 2, 'Chef fondateur, d\'origine camerounaise', './view/images/images/SR20181114-594.jpg'),
('2', 3, 'Chef-adjoint, d\'origine camerounaise', './view/images/images/PORTRAIT-CHEF-ANTO_150dpi.jpg'),
('3', 4, 'Chef-novice, d\'origine camerounaise\n', './view/images/images/21512937-beaux-mâles-chef-d-afro-spaghetti-présentant-dans-la-cuisine.webp');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `Id_Produit` int(10) UNSIGNED NOT NULL,
  `Nom_produit` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Prix` double DEFAULT NULL,
  `Img` varchar(500) NOT NULL,
  `MenuJour` tinyint(1) NOT NULL,
  `Type_plat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Id_Produit`, `Nom_produit`, `Description`, `Prix`, `Img`, `MenuJour`, `Type_plat`) VALUES
(1, 'Salade Mix', 'Salade à base de carottes, de courgettes, de choux', 6, '../images/images/recette-de-carottes-rapees-686834.webp', 0, 'entree'),
(2, 'Macédoine', 'Salade macédoine revisitée, à base de saveurs came', 8, './view/images/images/macédoine.jpg', 0, 'entree'),
(3, 'Salade d\'avocat', 'Salade d\'avocat, à base de d\'avocats, de crudités,', 7, './view/images/images/saladeAvocat.jpeg', 0, 'entree'),
(4, 'Jus de gingembre', 'Jus frais à base de gingembre et de sucre.', 2, './view/images/images/Jus-de-gingembre-au-Thermomix-pour-booster-ses-defenses-immunitaires.jpg', 0, 'boisson'),
(5, 'Jus de baobab', 'Jus frais à base de baobab (fruit local)', 2, './view/images/images/jus-de-bouye-683x1024.jpg', 0, 'boisson'),
(6, 'Foléré', 'Jus frais à base de feuilles d\'hibiscus séché et d', 2, './view/images/images/hqdefault.jpg', 0, 'boisson'),
(7, 'Arachides et maïs grillés', 'Assortiment sec d\'arachides(cacahouettes) et de ma', 1, './view/images/images/130450648_1827286124104364_8805508746038609812_n_2.jpg', 0, 'aperitif'),
(8, 'Poulet braisé', 'À base de poulet mariné, braisé à la flamme. ', 15, './view/images/images/08242b_49a1d8cd7346474e8a370a56f2d340cf~mv2.jpg', 0, 'plat'),
(9, 'Poisson braisé', 'À base de poisson mariné et braisé à la flamme. ', 12, './view/images/images/maxresdefault2.jpg', 0, 'plat'),
(10, 'Ndolé', 'À base de feuilles de légumes amères, de cacahuète', 15, '../images/images/Ndole.jpg', 1, 'plat'),
(11, 'Poulet Directeur General', 'À base de poulet mijoté avec des légumes et des pl', 16, './view/images/images/POULET-DG-FROM-CAMEROON.jpg', 1, 'plat'),
(12, 'Eru', 'À base de feuilles de légumes africains appelées \"', 18, './view/images/images/D8231C2B-FF8E-4ECF-9E25-FE07F21C589F.jpg', 1, 'plat'),
(13, 'Soya', 'À base de viande grillées et marinées, généralemen', 13, './view/images/images/D8231C2B-FF8E-4ECF-9E25-FE07F21C589F.jpeg', 1, 'plat'),
(14, 'Taro sauce jaune', 'À base de taro (légume-racine riche en amidon) , e', 20, './view/images/images/maxresdefault.jpg', 0, 'plat'),
(15, 'Pilé de pomme', 'À base de pomme de terre, d\'haricots noire ou roug', 12, './view/images/images/Le-Pile-de-Pommes-de-Terre-1.jpg', 0, 'plat'),
(16, 'Porc sauté', 'À base de porc en ragout avec des légumes et d\'épi', 17, './view/images/images/cuba-saute-de-porc-a-la-papaye-57.640x480.jpg', 0, 'plat'),
(17, 'Salade de fruits', 'Salade constitué d\'un assemblage de fruits exotiqu', 4, './view/images/images/5015_6_2015-05-166_570fois400_big_post.jpg', 0, 'dessert'),
(18, 'Fondant au chocolat', 'Fondant au chocolot classique fait à base de choco', 3, './view/images/images/fondant-au-chocolat.jpg', 0, 'dessert'),
(19, 'Tiramisu', 'Tiramissu au caco du cameroun et au café', 5, './view/images/images/rs_tiramisu_1x1.jpg', 0, 'dessert'),
(20, 'Gateau nature', 'Classique', 1, './view/images/images/79738_w1024h1024c1cx1944cy2592.jpg', 0, 'dessert');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `Id_table` int(10) UNSIGNED NOT NULL,
  `Id_client` int(10) UNSIGNED NOT NULL,
  `Heure_resa` time NOT NULL,
  `Date_resa` date NOT NULL,
  `Nb_personnes` int(11) NOT NULL,
  `Emplacement` varchar(50) NOT NULL,
  `Occasion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`Id_table`, `Id_client`, `Heure_resa`, `Date_resa`, `Nb_personnes`, `Emplacement`, `Occasion`) VALUES
(11, 24, '13:24:00', '2023-03-13', 4, 'Interieur', 'Anniversaire'),
(12, 24, '23:13:26', '2023-03-10', 4, 'Interieur', 'Mariage'),
(13, 30, '17:43:00', '2023-03-31', 5, 'Interieur', 'Marriage'),
(21, 30, '18:07:00', '2023-03-24', 4, 'Interieur', 'Anniversaire');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `Id_Statistiques` int(10) UNSIGNED NOT NULL,
  `Nombre_tables_resa` bigint(20) DEFAULT NULL,
  `Nombre_commandes` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `table_reserver`
--

CREATE TABLE `table_reserver` (
  `Id_table` int(10) UNSIGNED NOT NULL,
  `Id_client` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_reserver`
--

INSERT INTO `table_reserver` (`Id_table`, `Id_client`) VALUES
(11, 24),
(12, 25),
(13, 30),
(21, 30);

-- --------------------------------------------------------

--
-- Structure de la table `table_restaurant`
--

CREATE TABLE `table_restaurant` (
  `Id_table` int(11) NOT NULL,
  `Nb_places` int(11) NOT NULL,
  `Emplacement` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_restaurant`
--

INSERT INTO `table_restaurant` (`Id_table`, `Nb_places`, `Emplacement`) VALUES
(1, 7, 'Exterieur'),
(2, 7, 'Interieur'),
(3, 10, 'Exterieur'),
(4, 9, 'Exterieur'),
(5, 7, 'Exterieur'),
(9, 4, 'Interieur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_user` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `preNom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_user`, `login`, `mdp`, `role`, `nom`, `preNom`) VALUES
(1, 'toubiouf7@gmail.com', 'Azerty@71320', '', 'toubs', 'yvan'),
(2, 'gumballtoubson@gmail.com', 'azerty78', 'admin', 'TOUBSON', 'Gumball'),
(3, 'pennyngombe@gmail.com', 'azerty789', 'admin', 'NGOMBE', 'Penny'),
(4, 'darwindonfack@gmail.com', 'azerty789', 'admin', 'DONFACK', 'Darwin'),
(12, 'tototata@gmail.com', 'Azerty123=', '', 'Tata', 'TOTO'),
(13, 'mboudajr@yahoo.fr', '$2y$10$dw5FtYxA3G.CkFGpNB7JHuHEwnvWxOfshiZTMXSN3Wz', '', 'Mbouda', 'Jr'),
(14, 'aa@gmail.com', '$2y$10$5H/UtU9Ver5MqvfwX41m5OoGj8ipi1mUYN5XRAbE4wW', '', 'bb', 'aa'),
(15, 'toto@gmail.com', 'Toto1234+', 'client', 'toto', 'toto'),
(16, 'tata@gmail.com', '$2y$10$PAjttKF5EX9G2HaUKyaXiO.IyjAlrZa4VNNzgvbnnAhUCC25Ztb9u', 'client', 'tata', 'tata');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id_client`),
  ADD UNIQUE KEY `Id_user` (`Id_user`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id_commande`),
  ADD KEY `Id_employe` (`Id_employe`),
  ADD KEY `Id_client` (`Id_client`);

--
-- Index pour la table `commandes_produits`
--
ALTER TABLE `commandes_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_commande` (`Id_commande`),
  ADD KEY `Id_produit` (`Id_produit`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`Id_commande`,`Id_Produit`),
  ADD KEY `Id_Produit` (`Id_Produit`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`Id_employe`),
  ADD UNIQUE KEY `Id_user` (`Id_user`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`Id_Produit`),
  ADD UNIQUE KEY `Nom_produit` (`Nom_produit`),
  ADD UNIQUE KEY `Description` (`Description`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`Id_table`),
  ADD KEY `Id_client` (`Id_client`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`Id_Statistiques`);

--
-- Index pour la table `table_reserver`
--
ALTER TABLE `table_reserver`
  ADD PRIMARY KEY (`Id_table`),
  ADD KEY `Id_client` (`Id_client`);

--
-- Index pour la table `table_restaurant`
--
ALTER TABLE `table_restaurant`
  ADD PRIMARY KEY (`Id_table`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id_commande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commandes_produits`
--
ALTER TABLE `commandes_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `Id_Produit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `Id_Statistiques` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `table_reserver`
--
ALTER TABLE `table_reserver`
  MODIFY `Id_table` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `table_restaurant`
--
ALTER TABLE `table_restaurant`
  MODIFY `Id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id_user`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Id_employe`) REFERENCES `employe` (`Id_employe`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`);

--
-- Contraintes pour la table `commandes_produits`
--
ALTER TABLE `commandes_produits`
  ADD CONSTRAINT `commandes_produits_ibfk_1` FOREIGN KEY (`Id_commande`) REFERENCES `commande` (`Id_commande`),
  ADD CONSTRAINT `commandes_produits_ibfk_2` FOREIGN KEY (`Id_produit`) REFERENCES `produit` (`Id_Produit`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`Id_commande`) REFERENCES `commande` (`Id_commande`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`Id_Produit`) REFERENCES `produit` (`Id_Produit`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id_user`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`Id_table`) REFERENCES `table_reserver` (`Id_table`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`),
  ADD CONSTRAINT `reserver_ibfk_3` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`);

--
-- Contraintes pour la table `table_reserver`
--
ALTER TABLE `table_reserver`
  ADD CONSTRAINT `table_reserver_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
