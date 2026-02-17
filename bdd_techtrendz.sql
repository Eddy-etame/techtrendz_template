-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 sep. 2023 à 15:56
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `keyce_techtrendz_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `content`, `image`) VALUES
(1, 1, 'Introduction à HTML5 et CSS3', 'Les dernières versions de HTML5 et CSS3 apportent de nouvelles balises sémantiques et des propriétés pour créer des interfaces modernes et accessibles.', NULL),
(2, 1, 'JavaScript : les bases du langage', 'Découvrez les fondamentaux de JavaScript : variables, fonctions, boucles et la manipulation du DOM pour dynamiser vos pages web.', NULL),
(3, 1, 'Node.js pour le développement backend', 'Node.js permet d\'utiliser JavaScript côté serveur. Idéal pour construire des API REST et des applications temps réel.', NULL),
(4, 1, 'Les frameworks CSS : Bootstrap vs Tailwind', 'Comparaison des deux frameworks CSS les plus populaires pour accélérer le développement d\'interfaces responsive.', NULL),
(5, 1, 'Comprendre les requêtes HTTP', 'GET, POST, PUT, DELETE : comment fonctionnent les méthodes HTTP et quand les utiliser dans vos applications web.', NULL),
(6, 1, 'Sécuriser son site avec HTTPS', 'Le protocole HTTPS et les certificats SSL sont indispensables pour protéger les données échangées entre le client et le serveur.', NULL),
(7, 1, 'Les bases de données relationnelles', 'MySQL, PostgreSQL : structure des tables, clés étrangères et requêtes SQL pour stocker vos données efficacement.', NULL),
(8, 1, 'API REST : conception et bonnes pratiques', 'Comment concevoir une API RESTful : ressources, verbes HTTP, codes de statut et versioning.', NULL),
(9, 1, 'WebSockets et temps réel', 'Les WebSockets permettent une communication bidirectionnelle instantanée entre le navigateur et le serveur.', NULL),
(10, 1, 'Optimisation des performances web', 'Techniques pour améliorer le temps de chargement : cache, compression, lazy loading et minification.', NULL),
(11, 1, 'Accessibilité web (a11y)', 'Rendre un site accessible à tous : balises ARIA, contraste des couleurs, navigation au clavier.', NULL),
(12, 1, 'Gestion des formulaires en PHP', 'Validation, sanitization et protection CSRF : les bonnes pratiques pour traiter les données utilisateur.', NULL),
(13, 1, 'Les sessions et les cookies', 'Comment gérer l\'état de connexion et les préférences utilisateur avec les sessions PHP et les cookies.', NULL),
(14, 1, 'Upload de fichiers sécurisé', 'Accepter des uploads tout en protégeant le serveur : types autorisés, taille limite et nommage sécurisé.', NULL),
(15, 1, 'Introduction à Symfony', 'Le framework PHP Symfony offre une structure robuste pour développer des applications web professionnelles.', NULL),
(16, 1, 'Laravel : le framework PHP moderne', 'Laravel simplifie le développement avec son ORM Eloquent, son système de routing et son écosystème.', NULL),
(17, 1, 'Vue.js : le framework progressif', 'Vue.js permet d\'enrichir progressivement vos pages avec des composants réactifs et une courbe d\'apprentissage douce.', NULL),
(18, 1, 'React : composants et hooks', 'Construire des interfaces avec des composants réutilisables et la gestion d\'état avec les hooks React.', NULL),
(19, 1, 'TypeScript pour JavaScript typé', 'TypeScript ajoute le typage statique à JavaScript pour détecter les erreurs avant l\'exécution.', NULL),
(20, 1, 'Docker pour le développement web', 'Conteneuriser votre environnement de développement pour une configuration reproductible et portable.', NULL),
(21, 1, 'Git : workflow et bonnes pratiques', 'Branches, merge, rebase : organiser le travail d\'équipe avec Git et GitHub ou GitLab.', NULL),
(22, 1, 'Tests unitaires en PHP', 'PHPUnit permet de tester vos fonctions et classes pour garantir la stabilité de votre code.', NULL),
(23, 1, 'CI/CD avec GitHub Actions', 'Automatiser les tests et le déploiement à chaque push avec les pipelines GitHub Actions.', NULL),
(24, 1, 'Responsive design : mobile first', 'Concevoir d\'abord pour mobile puis adapter au desktop pour une expérience optimale sur tous les écrans.', NULL),
(25, 1, 'SEO : les fondamentaux', 'Balises meta, structure des URLs, sitemap : optimiser votre site pour les moteurs de recherche.', NULL),
(26, 2, 'Flutter : développement cross-platform', 'Flutter utilise Dart pour créer des applications iOS et Android à partir d\'un seul code source.', NULL),
(27, 2, 'React Native en pratique', 'Développer des apps mobiles natives avec React et JavaScript, en partageant du code avec le web.', NULL),
(28, 2, 'Les notifications push mobiles', 'Envoyer des notifications aux utilisateurs même quand l\'application n\'est pas ouverte.', NULL),
(29, 2, 'Stockage local sur mobile', 'AsyncStorage, SharedPreferences : persister les données sur l\'appareil de l\'utilisateur.', NULL),
(30, 2, 'Géolocalisation dans les apps', 'Utiliser l\'API Geolocation pour afficher la position de l\'utilisateur et proposer des services contextuels.', NULL),
(31, 2, 'PWA : Progressive Web Apps', 'Transformer un site web en application installable avec un manifest et un service worker.', NULL),
(32, 2, 'Performance des apps mobiles', 'Réduire le temps de chargement et la consommation de batterie pour une expérience fluide.', NULL),
(33, 2, 'Design Material et Human Interface', 'Respecter les guidelines Material Design (Android) et Human Interface (iOS) pour des apps cohérentes.', NULL),
(34, 2, 'Kotlin pour Android', 'Kotlin est le langage recommandé par Google pour le développement d\'applications Android.', NULL),
(35, 2, 'Swift et SwiftUI', 'Découvrir Swift et SwiftUI pour créer des interfaces iOS modernes avec une syntaxe déclarative.', NULL),
(36, 2, 'Expo : React Native simplifié', 'Expo fournit des outils et des services pour développer et déployer des apps React Native plus facilement.', NULL),
(37, 2, 'Tests sur émulateurs et appareils', 'Configurer des émulateurs et utiliser des services de test cloud pour valider vos apps sur différents devices.', NULL),
(38, 2, 'Publication sur les stores', 'Préparer et soumettre votre application sur le Google Play Store et l\'App Store.', NULL),
(39, 2, 'Monétisation : in-app purchases', 'Intégrer des achats in-app et des abonnements pour monétiser votre application mobile.', NULL),
(40, 2, 'Analytics et suivi des utilisateurs', 'Mesurer l\'engagement et les parcours utilisateur avec Firebase Analytics ou des outils tiers.', NULL),
(41, 2, 'Accessibilité mobile', 'VoiceOver, TalkBack : rendre vos applications accessibles aux utilisateurs malvoyants.', NULL),
(42, 2, 'Mise à jour et versioning', 'Gérer les mises à jour de votre app et informer les utilisateurs des nouvelles fonctionnalités.', NULL),
(43, 3, 'Introduction à Docker', 'Les conteneurs Docker isolent vos applications et leurs dépendances pour un déploiement cohérent.', NULL),
(44, 3, 'Kubernetes : orchestration de conteneurs', 'Kubernetes gère le déploiement, la mise à l\'échelle et la haute disponibilité de vos conteneurs.', NULL),
(45, 3, 'CI/CD avec Jenkins', 'Automatiser la construction, les tests et le déploiement avec des pipelines Jenkins.', NULL),
(46, 3, 'Monitoring avec Prometheus', 'Collecter des métriques et surveiller la santé de vos applications et infrastructures.', NULL),
(47, 3, 'Logs centralisés avec ELK', 'Elasticsearch, Logstash et Kibana pour centraliser et analyser les logs de vos services.', NULL),
(48, 3, 'Infrastructure as Code avec Terraform', 'Définir et provisionner votre infrastructure cloud avec des fichiers de configuration versionnés.', NULL),
(49, 3, 'Ansible pour l\'automatisation', 'Automatiser la configuration des serveurs et le déploiement avec des playbooks Ansible.', NULL),
(50, 1, 'PHP ou Python ?', 'Le choix entre PHP et Python dépend de votre projet. PHP reste le pilier du web avec WordPress, Laravel ou Symfony. Il est optimisé pour le serveur web et possède une vaste documentation. Python, avec Django ou Flask, excelle dans les projets data science, automatisation et API. Sa syntaxe claire le rend accessible aux débutants. Pour un site web classique, PHP est souvent plus rapide à déployer. Pour des traitements de données ou du machine learning, Python s\'impose. Les deux langages sont matures et disposent de communautés actives.', '1-php-vs-python.jpg'),
(51, 2, 'React Native : Quelles différences par rapport à React', 'React Native réutilise la logique de React mais cible le mobile natif au lieu du navigateur. Les composants ne sont plus des div ou span mais des View, Text ou Image qui se compilent en éléments natifs iOS et Android. Le style utilise un sous-ensemble de CSS via StyleSheet. Pas de DOM : le rendu passe par le bridge qui communique avec les threads natifs. Les performances sont proches du natif pour l\'UI. React Native permet de partager jusqu\'à 80% du code entre web et mobile, tout en gardant le look and feel natif de chaque plateforme.', '2-react-vs-react-native.jpg'),
(52, 3, 'Les meilleurs outils DevOps', 'Docker standardise le packaging des applications. Kubernetes orchestre les conteneurs à grande échelle. Jenkins et GitHub Actions automatisent les pipelines CI/CD. Terraform provisionne l\'infrastructure en code. Prometheus et Grafana surveillent les métriques. ELK ou Loki centralisent les logs. Ansible ou Chef gèrent la configuration des serveurs. Ces outils forment une chaîne complète : du commit au déploiement en production, avec surveillance et rollback en cas de problème. L\'objectif est de livrer plus souvent, plus sûrement.', '3-devops.png');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Développement Web'),
(2, 'Développement Mobile'),
(3, 'DevOps');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(3, 'admin@test.com', '$2y$10$iwpzJ3Q2im1Ci80YkplP7.nzh5hYay.GRYR7mLkwpqJ5F3rPYVkqC', 'Admin', 'Admin', 'admin'),
(4, 'user@test.com', '$2y$10$iwpzJ3Q2im1Ci80YkplP7.nzh5hYay.GRYR7mLkwpqJ5F3rPYVkqC', 'John', 'Doe', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
