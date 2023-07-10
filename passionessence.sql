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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.category : ~4 rows (environ)
INSERT INTO `category` (`id_category`, `label`, `description`, `image`) VALUES
	(1, 'Essai', 'Essais de véhicules par les membres initiés', 'https://d1gymyavdvyjgt.cloudfront.net/drive/images/uploads/headers/ws_cropper/1_0x0_790x520_0x520_become_a_better_driver.jpg'),
	(2, 'Pilotage', 'Conseils et partage d\'expérience autour du pilotage', 'https://agorasports.fr/wp-content/uploads/2022/03/devenir-pilote-automobile.jpg'),
	(3, 'Retours & Avis', 'Conseils et avis concernant des modèles automobile', 'https://www.rejoindre-plus-que-pro.fr/wp-content/uploads/2020/10/shutterstock_259169738-scaled-1.jpg'),
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.topic : ~7 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `description`, `banner`, `status`, `creationdate`, `user_id`, `category_id`) VALUES
	(1, 'Clio 3 Phase 2', 'J\'adore ma Clio', 'https://ag-cdn-production.azureedge.net/produits/images/2cd53a82-915b-4127-af63-cd262caea230_800.jpg', 0, '2023-06-28 09:48:31', 2, 3),
	(2, 'Mettre de l\'eau dans son moteur', 'Mettre de l\'eau dans le réservoir', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7i5EkWDOVMefXn9v8PD3WyMjtq9ihlSkeZg', 0, '2023-06-28 09:53:24', 3, 4),
	(3, 'Achat Mercedes CLS63 AMG', 'J\'aimerais acheter un cls63, avez vous des conseils ?', 'https://wallpapercave.com/wp/wp10422056.jpg', 0, '2023-06-29 11:41:15', 5, 4),
	(4, 'Ma climatisation ne marche pas !', 'Il fait chaud et ça ne refroidis pas.', 'https://www.iceshop.fr/guide/wp-content/uploads/2021/10/climatisations.jpeg', 0, '2023-06-30 09:11:24', 4, 4),
	(5, 'Camion ! (Pouet pouet)', 'J\'aime bien les camion et je trouve ça cool parce ce que ça crache du mazout', 'https://cdnb.artstation.com/p/assets/images/images/042/735/085/large/viraj-shinde-optimus-prime-front-1.jpg?1635304942', 0, '2023-07-06 09:32:35', 1, 3),
	(6, 'Je conduis rs3', 'J\'ai pas le permis mais j\'ai le danger', 'https://cdn.motor1.com/images/mgl/PzRxX/s1/1x1/audi-rs3-sportback-top-speed-video.webp', 0, '2023-07-06 09:43:23', 6, 1),
	(7, 'Comment freiner efficacement ?', 'J\'aimerais apprendre à freiner plus "fort" sur distance plus courte, avez vous des conseils ?', 'https://grimmermotors.co.nz/wp-content/uploads/2018/03/braking.jpg', 0, '2023-07-09 16:38:00', 5, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.user : ~6 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `password`, `description`, `role`, `creationdate`, `profileimage`) VALUES
	(1, 'Quentin12', '0', 'J\'aime les animaux surtout mon chat', 'user', '2023-06-28 09:39:51', 'https://avatars.githubusercontent.com/u/68738931'),
	(2, 'Maxoms68', '0', 'J\'aime voyager, possède une clio 3 phase 2', 'user', '2023-06-28 09:41:23', 'https://avatars.githubusercontent.com/u/120190748'),
	(3, 'ArnodePHP', '0', 'Je fais du coivoiturage, mais attention c\'est pas gratuit', 'user', '2023-06-28 09:41:48', 'https://media.licdn.com/dms/image/D4D03AQErVCoqVYpyhQ/profile-displayphoto-shrink_400_400/0/1678805462857?e=1694044800&v=beta&t=JzRc_v8x9I576BA-oLBVdk9w6D2YfSKMyKc2HUeuHWw'),
	(4, 'Madinax', '0', 'Je parle russe', 'user', '2023-06-28 09:42:55', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Vladimir_Putin_September_5%2C_2022_%28cropped%29.jpg/330px-Vladimir_Putin_September_5%2C_2022_%28cropped%29.jpg'),
	(5, 'Vic-Thor', '0', 'J\'aime bien les bmw, mais je préfère dacia.', 'admin', '2023-06-29 11:35:49', 'https://avatars.githubusercontent.com/u/92865037'),
	(6, 'ClydeRSLambo', '0', 'J\'aime bien Lamborghini mais si tu dis dus mal, attention', 'user', '2023-07-06 09:38:37', 'https://media.licdn.com/dms/image/D4E03AQFE9QZ8RDbjzA/profile-displayphoto-shrink_400_400/0/1686556306140?e=1694044800&v=beta&t=R-cFjjsE1xJIutrFW0D4-SPIEYAdheUsAdvmy0VpgZ8');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
