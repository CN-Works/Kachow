-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour passionessence
CREATE DATABASE IF NOT EXISTS `passionessence` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `passionessence`;

-- Listage de la structure de table passionessence. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `label` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.category : ~4 rows (environ)
INSERT INTO `category` (`id_category`, `label`, `description`, `image`) VALUES
	(1, 'Essai', 'Essais de véhicules par les membres initiés', 'https://d1gymyavdvyjgt.cloudfront.net/drive/images/uploads/headers/ws_cropper/1_0x0_790x520_0x520_become_a_better_driver.jpg'),
	(2, 'Pilotage', 'Conseils et partage d\'expérience autour du pilotage', 'https://agorasports.fr/wp-content/uploads/2022/03/devenir-pilote-automobile.jpg'),
	(3, 'Retours / Avis', 'Conseils et avis concernant des modèles automobile', 'https://www.rejoindre-plus-que-pro.fr/wp-content/uploads/2020/10/shutterstock_259169738-scaled-1.jpg'),
	(4, 'Questions', 'Posez diverses questions au membres du forum', 'https://sommeilenfant.reseau-morphee.fr/wp-content/uploads/sites/5/2018/10/questions-ados.jpg');

-- Listage de la structure de table passionessence. posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id_posts` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  `topic_id` int DEFAULT NULL,
  PRIMARY KEY (`id_posts`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `topic_id` (`topic_id`) USING BTREE,
  CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.posts : ~5 rows (environ)
INSERT INTO `posts` (`id_posts`, `content`, `creationdate`, `user_id`, `topic_id`) VALUES
	(1, 'J\'aime bien les clio 3 phase 2 d\'avant 2012, ça arrache sur l\'autoroute dans le 68', '2023-06-28 09:47:30', 2, 1),
	(2, 'C\'est vrai qu\'elle sont bien celle là, surtout en diesel', '2023-06-28 09:51:45', 1, 1),
	(3, 'J\'ai entendu quelqu\'un dire sur youtube qu\'on peut mettre de l\'eau dans l\'essence, je veux faire des économies', '2023-06-28 09:54:23', 3, 2),
	(4, 'Je viens d\'en mettre dans le réservoir, je vais tester ça. A toute à l\'heure !', '2023-06-28 09:56:44', 3, 2),
	(5, 'Moi j\'aime pas, elle est blanche et le blanc c\'est oppressant.', '2023-06-28 09:57:32', 3, 1);

-- Listage de la structure de table passionessence. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `creationdate` datetime NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.topic : ~4 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `description`, `banner`, `status`, `creationdate`, `user_id`, `category_id`) VALUES
	(1, 'Clio 3 Phase 2', 'J\'adore ma Clio', 'https://ag-cdn-production.azureedge.net/produits/images/2cd53a82-915b-4127-af63-cd262caea230_800.jpg', 0, '2023-06-28 09:48:31', 2, 3),
	(2, 'Mettre de l\'eau dans son moteur', 'Mettre de l\'eau dans le réservoir', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7i5EkWDOVMefXn9v8PD3WyMjtq9ihlSkeZg', 0, '2023-06-28 09:53:24', 3, 4),
	(3, 'Achat Mercedes CLS63 AMG', 'J\'aimerais acheter un cls63, avez vous des conseils ?', 'https://www.turbo.fr/sites/default/files/styles/article_690x405/public/migration/image_parse/4924690.jpg', 0, '2023-06-29 11:41:15', 5, 4),
	(4, 'Ma climatisation ne marche pas !', 'Il fait chaud et ça ne refroidis pas.', 'https://www.iceshop.fr/guide/wp-content/uploads/2021/10/climatisations.jpeg', 0, '2023-06-30 09:11:24', 4, 3);

-- Listage de la structure de table passionessence. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `creationdate` datetime NOT NULL,
  `profileimage` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.user : ~5 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `password`, `description`, `role`, `creationdate`, `profileimage`) VALUES
	(1, 'Quentin12', '123456', 'J\'aime les animaux surtout mon chat', 'user', '2023-06-28 09:39:51', NULL),
	(2, 'Maxoms68', '0', 'J\'aime voyager, possède une clio 3 phase 2', 'user', '2023-06-28 09:41:23', NULL),
	(3, 'ArnodePHP', '0', 'Je fais du coivoiturage, mais attention c\'est pas gratuit', 'user', '2023-06-28 09:41:48', NULL),
	(4, 'Madinax', 'russia', 'Je parle russe', 'user', '2023-06-28 09:42:55', NULL),
	(5, 'Vic-Thor', '0', 'J\'aime bien les bmw, mais je préfère dacia.', 'admin', '2023-06-29 11:35:49', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
