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
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.category : ~5 rows (environ)
INSERT INTO `category` (`id_category`, `label`, `description`, `image`) VALUES
	(1, 'Essai', 'Essais de véhicules par les membres initiés', 'https://d1gymyavdvyjgt.cloudfront.net/drive/images/uploads/headers/ws_cropper/1_0x0_790x520_0x520_become_a_better_driver.jpg'),
	(2, 'Pilotage', 'Conseils et partage d\'expérience autour du pilotage', 'https://agorasports.fr/wp-content/uploads/2022/03/devenir-pilote-automobile.jpg'),
	(3, 'Retours & avis', 'Conseils et avis concernant des modèles automobile', 'https://www.rejoindre-plus-que-pro.fr/wp-content/uploads/2020/10/shutterstock_259169738-scaled-1.jpg'),
	(4, 'Questions', 'Posez diverses questions au membres du forum', 'https://sommeilenfant.reseau-morphee.fr/wp-content/uploads/sites/5/2018/10/questions-ados.jpg'),
	(8, 'Photos / Arts', 'D&eacute;posez vos meilleurs clich&eacute;s de votre v&eacute;hicule. Amis car-spotter, d&eacute;foulez-vous et montrez votre talent !', 'https://d2hucwwplm5rxi.cloudfront.net/wp-content/uploads/2021/12/02124045/Tips-for-shooting-professional-car-photography-b-02-12-1024x640.jpg');

-- Listage de la structure de table passionessence. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  `topic_id` int DEFAULT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `topic_id` (`topic_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.post : ~46 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationdate`, `user_id`, `topic_id`) VALUES
	(1, 'J\'aime bien les clio 3 phase 2 d\'avant 2012, ça arrache sur l\'autoroute dans le 68', '2023-06-28 09:47:30', 2, 1),
	(2, 'C\'est vrai qu\'elle sont bien celle là, surtout en diesel', '2023-06-28 09:51:45', 1, 1),
	(3, 'J\'ai entendu quelqu\'un dire sur youtube qu\'on peut mettre de l\'eau dans l\'essence, je veux faire des économies', '2023-06-28 09:54:23', 3, 2),
	(4, 'Je viens d\'en mettre dans le réservoir, je vais tester ça. A toute à l\'heure !', '2023-06-28 09:56:44', 3, 2),
	(5, 'Moi j\'aime pas, elle est blanche et le blanc c\'est oppressant.', '2023-06-28 09:57:32', 3, 1),
	(6, 'BMW blyat', '2023-07-10 21:07:41', 5, 6),
	(7, 'J\'adore les formule 1 !', '2023-07-10 22:57:24', 4, 9),
	(8, 'Bravo Victor, tu es trop fort !', '2023-07-10 23:00:22', 6, 9),
	(9, 'C\'est gentil, merci Clyde !', '2023-07-10 23:00:51', 5, 9),
	(13, 'Salut Arnode !\r\nJe suis pas certains que &ccedil;a soit une tr&egrave;s bonne id&eacute;e, l&#039;eau est incompressible et dispos&eacute; dans ton moteur peux le faire &quot;exploser&quot;.\r\nDonc retire &ccedil;a vite de ton r&eacute;servoir avant que &ccedil;a brise tes bielles et tes pistons !', '2023-07-10 22:16:28', 5, 2),
	(14, 'Arnode ?', '2023-07-10 22:16:55', 5, 2),
	(15, 'Tu vas bien ? rien de cass&eacute; ?', '2023-07-10 22:17:20', 5, 2),
	(16, 'J&#039;adore cette voiture !\r\nElle est puissante, &eacute;l&eacute;gante, spacieuse et luxueuse.\r\nLe bruit du V8 qui ronronne est un bonheur pour les oreilles et j&#039;aimerais vraiment pouvoir l&#039;entendre tout les matins.', '2023-07-10 22:20:51', 5, 3),
	(17, 'Elle est magnifique cette voiture !', '2023-07-10 22:49:34', 2, 3),
	(18, 'Wow trop styl&eacute; le voiture !', '2023-07-10 22:51:44', 6, 3),
	(19, 'Appuie fort et &ccedil;a devrait marcher, sur ma polo &ccedil;a marche comme &ccedil;&agrave;.', '2023-07-10 22:52:22', 1, 7),
	(20, 'Je fais pareil sur ma picasso et &ccedil;a marche bien', '2023-07-10 22:52:38', 4, 7),
	(21, 'Je crois que c&#039;est fini pour le moteur', '2023-07-10 22:54:16', 6, 2),
	(22, 'Oui c&#039;est vrai que BMW c&#039;est bonne voiture mais je pr&eacute;f&egrave;re Audi et Lamborghini', '2023-07-10 22:55:02', 6, 6),
	(23, 'Moi j&#039;aime bien les clio 3 phase 2, je sais pas si je l&#039;ai d&eacute;j&agrave; dit ?', '2023-07-10 22:55:26', 2, 6),
	(24, 'Frimeur !', '2023-07-10 22:56:02', 3, 6),
	(25, 'Pouet pouet !', '2023-07-10 23:18:10', 4, 5),
	(26, 'Toi quentin tu aimes camions hein ?', '2023-07-10 23:18:28', 6, 5),
	(27, 'Oui Arnode, j&#039;aime le voiture puissance ! #albanie', '2023-07-10 23:21:01', 6, 6),
	(28, 'Tu as essay&eacute; de d&eacute;brancher et rebrancher la batterie ? Sur un coup de chance &ccedil;a peut marcher, qui sait !', '2023-07-10 23:44:20', 3, 10),
	(29, 'Oui effectivement j&#039;ai d&eacute;j&agrave; essay&eacute; mais &ccedil;a a re-grill&eacute; de nouveau.', '2023-07-10 23:44:52', 7, 10),
	(30, 'C&#039;est pour dormir l&agrave;-dedans ? je connais pas le concept', '2023-07-10 23:45:49', 6, 10),
	(31, 'Oui Clyde c&#039;est comme une maison dans une camionnette, tu peux l&#039;am&eacute;nager et y vivre plus ou moins longtemps. Les fran&ccedil;ais partent g&eacute;n&eacute;ralement en vacance avec pendant la p&eacute;riode d&#039;&eacute;t&eacute;.', '2023-07-10 23:46:55', 4, 10),
	(32, 'J&#039;adore les camions c&#039;est ma passion depuis que je suis petit, j&#039;ai &eacute;tudi&eacute; la m&eacute;canique poids lourd au coll&egrave;ge.', '2023-07-10 23:48:31', 1, 5),
	(33, 'Bonsoir Madinax ! Pense &agrave; aller voir un garagiste pour qu&#039;il te change le gaz de ta climatisation. Cela va te permettre de profiter de la clim&#039; de nouveau !', '2023-07-10 23:50:32', 5, 4),
	(34, 'J&#039;ai fait &ccedil;a sur mon camping car et &ccedil;a fonctionne tr&egrave;s bien, je te le confirme Madinax !', '2023-07-10 23:50:58', 7, 4),
	(35, 'Moi j&#039;habite en montagne et je vais bien, pense &agrave; te rafraichir naturellement si tu le peux.', '2023-07-10 23:51:41', 3, 4),
	(36, 'Elle est trop belle ma voiture !', '2023-07-11 00:00:13', 4, 8),
	(37, 'J&#039;aime pas trop la couleur, le blanc c&#039;est oppressant.', '2023-07-11 00:00:38', 3, 8),
	(38, 'Pour une voiture de ville, c&#039;est largement suffisant. Les enfants doivent avoir de la place derri&egrave;re quand ils sont &agrave; plusieurs.', '2023-07-11 00:01:34', 7, 8),
	(39, 'Moi avec ma clio, je trouve que c&#039;est bien comme voiture mais je pr&eacute;f&egrave;re encore et toujours ma clio 3 phase 2 diesel.', '2023-07-11 00:02:21', 2, 8),
	(40, 'Audi RS3 c&#039;est plus rapide sur l&#039;autoroute, si tu veux on fait la course apr&egrave;s les cours en pr&eacute;sentiel !', '2023-07-11 00:03:31', 6, 1),
	(41, 'C&#039;est interdit sur route ouverte Clyde, si tu le fais et que je te vois.. je vais devoir appeler les autorit&eacute;s locales.', '2023-07-11 00:04:19', 3, 1),
	(42, 'Oui alors c&#039;est un petit peu plus compliqu&eacute; que &ccedil;a...', '2023-07-11 21:56:08', 5, 7),
	(48, 'Effectivement, c&#039;est joli le design !', '2023-07-12 00:07:04', 2, 12),
	(49, 'Je suis d&#039;accord, c&#039;est tr&egrave;s important sur tout sur un site internet !\r\nPassionEssence est une r&eacute;f&eacute;rence dans le milieu. #L&egrave;cheBottes', '2023-07-12 00:08:24', 5, 12),
	(50, 'Malgr&eacute; ce que l&#039;on pourrait croire, la vitesse de pointe n&#039;est absolument pas impact&eacute; par le nouveau kit a&eacute;ro&#039; cr&eacute;e par le constructeur. C&#039;est bluffant en terme de puissance.', '2023-07-12 07:00:44', 5, 14),
	(51, 'C&#039;est le voiture avec DRS ?', '2023-07-12 07:00:59', 6, 14),
	(52, 'C&#039;est &ccedil;a, elle a un syst&egrave;me de DRS sur l&#039;aileron arri&egrave;re qui peut &ecirc;tre activ&eacute; en ligne droite pour gagner en performance en ligne droite.', '2023-07-12 07:02:00', 5, 14),
	(55, 'Je sais pas mais je pense pas', '2023-07-13 07:49:32', 3, 16),
	(56, 'Pas certain, oui', '2023-07-13 07:49:46', 1, 16);

-- Listage de la structure de table passionessence. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `creationdate` datetime NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.topic : ~13 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `description`, `banner`, `status`, `creationdate`, `user_id`, `category_id`) VALUES
	(1, 'Clio 3 Phase 2', 'J\'adore ma Clio', 'https://ag-cdn-production.azureedge.net/produits/images/2cd53a82-915b-4127-af63-cd262caea230_800.jpg', 0, '2023-06-28 09:48:31', 2, 3),
	(2, 'Mettre de l\'eau dans son moteur', 'Mettre de l\'eau dans le réservoir', 'https://www.ekurhuleni.gov.za/wp-content/uploads/2021/10/drinking-glass-water.jpg', 0, '2023-06-28 09:53:24', 3, 4),
	(3, 'Achat Mercedes CLS63 AMG', 'J\'aimerais acheter un cls63, avez vous des conseils ?', 'https://wallpapercave.com/wp/wp10422056.jpg', 0, '2023-06-29 11:41:15', 5, 4),
	(4, 'Ma climatisation ne marche pas !', 'Il fait chaud et ça ne refroidis pas.', 'https://static.cotemaison.fr/medias_8904/w_1024,h_445,c_crop,x_0,y_167/w_640,h_360,c_fill,g_north/v1474535381/climatisation-nos-astuces-pour-une-maison-fraiche_4559310.jpg', 0, '2023-06-30 09:11:24', 4, 4),
	(5, 'Camion ! (Pouet pouet)', 'J\'aime bien les camion et je trouve ça cool parce ce que ça crache du mazout', 'https://cdnb.artstation.com/p/assets/images/images/042/735/085/large/viraj-shinde-optimus-prime-front-1.jpg?1635304942', 0, '2023-07-06 09:32:35', 1, 3),
	(6, 'Je conduis rs3', 'J\'ai pas le permis mais j\'ai le danger', 'https://auto-live.fr/wp-content/uploads/2021/07/Nouvelle-Audi-RS-3-6.jpeg', 0, '2023-07-06 09:43:23', 6, 1),
	(7, 'Comment freiner efficacement ?', 'J\'aimerais apprendre à freiner plus "fort" sur distance plus courte, avez vous des conseils ?', 'https://grimmermotors.co.nz/wp-content/uploads/2018/03/braking.jpg', 0, '2023-07-09 16:38:00', 5, 2),
	(8, 'Conduite C3 Picasso', 'J\'ai conduis cette voiture pour me balader et aller faire les courses. C\'était bien et j\'ai de l\'espace à l\'intérieur et dans le coffre.', 'https://www.tuningblog.eu/wp-content/uploads/2014/12/Sondermodell-Citroen-C3-Picasso-Carlsson-Tuning-1.jpg', 0, '2023-07-10 16:46:32', 4, 1),
	(9, 'Conseils Formule Renault 2.0', 'J\'ai conduit une formule renault 2L récemment et je vais vous donner quelques conseils à propos de la maniabilité de la voiture !', 'https://www.guillaumedarding.fr/images/DSC_0109.jpg', 0, '2023-07-10 16:51:46', 5, 2),
	(10, 'Aide Camping-car', 'Bonjour jai un problème électronique avec mon véhicule et j\'aimerais le résoudre. J\'ai un mini chauffe-eau qui grille quand je le branche sur la batterie 12v du camping car, des solutions ?', 'https://projets.cotemaison.fr/uploads/projects/5651/project_3401045937119fe524e_pic_1.JPG', 0, '2023-07-11 01:42:52', 7, 4),
	(12, 'J&#039;aime le design', 'Je trouve &ccedil;a inspirant et beau, mais le blanc c&#039;est une couleur oppressante !', 'https://macquebec.com/wp-content/uploads/2017/08/Screen-Shot-2017-08-31-at-8.58.10-AM.png', 0, '2023-07-12 00:06:18', 3, 8),
	(14, 'Test de la GT3 RS 2023', 'Essai sur route et piste de la derni&egrave;re Porsche 911 GT3 RS, elle a beaucoup d&#039;appui a&eacute;rodynamique en virage lent et rapide.', 'https://media.ed.edmunds-media.com/porsche/911/2023/ns/2023_porsche_911_r34_ns_621224_1600.jpg', 0, '2023-07-12 06:56:37', 5, 1),
	(16, 'Une voiture volante existe ?', 'J&#039;aimerais savoir une voiture volante peut &ecirc;tre cr&eacute;er comme dans retour vers le futur.', 'https://www.usinenouvelle.com/mediatheque/8/5/9/000599958_896x598_c.jpg', 0, '2023-07-13 07:49:13', 17, 4);

-- Listage de la structure de table passionessence. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `creationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profileimage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table passionessence.user : ~10 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `password`, `description`, `role`, `creationdate`, `profileimage`) VALUES
	(1, 'Quentin12', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'J\'aime les animaux surtout mon chat', 'user', '2023-06-28 09:39:51', 'https://avatars.githubusercontent.com/u/68738931'),
	(2, 'Maxoms68', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'J\'aime voyager, possède une clio 3 phase 2', 'user', '2023-06-28 09:41:23', 'https://media.discordapp.net/attachments/891954403861491713/1127945550692622377/image.png'),
	(3, 'ArnodePHP', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'Je fais du coivoiturage, mais attention c\'est pas gratuit', 'user', '2023-06-28 09:41:48', 'https://media.licdn.com/dms/image/D4D03AQErVCoqVYpyhQ/profile-displayphoto-shrink_400_400/0/1678805462857?e=1694044800&v=beta&t=JzRc_v8x9I576BA-oLBVdk9w6D2YfSKMyKc2HUeuHWw'),
	(4, 'Madinax', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'Je parle russe', 'user', '2023-06-28 09:42:55', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Vladimir_Putin_September_5%2C_2022_%28cropped%29.jpg/330px-Vladimir_Putin_September_5%2C_2022_%28cropped%29.jpg'),
	(5, 'Vic-Thor', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'J\'aime bien les bmw, mais je préfère dacia.', 'admin', '2023-06-29 11:35:49', 'https://avatars.githubusercontent.com/u/92865037'),
	(6, 'ClydeRSLambo', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'J\'aime bien Lamborghini mais si tu dis dus mal, attention', 'user', '2023-07-06 09:38:37', 'https://media.licdn.com/dms/image/D4E03AQFE9QZ8RDbjzA/profile-displayphoto-shrink_400_400/0/1686556306140?e=1694044800&v=beta&t=R-cFjjsE1xJIutrFW0D4-SPIEYAdheUsAdvmy0VpgZ8'),
	(7, 'Benjy', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'J\'aime cuisiner de bons plats pour mes amis.', 'user', '2023-07-11 01:39:53', 'https://media.licdn.com/dms/image/D4E35AQFANSWVJHvNUw/profile-framedphoto-shrink_400_400/0/1678800995662?e=1689638400&v=beta&t=BBK6CyYrEsBgC0qLMzIqck5Exp2tOZqK1Qpqv7VLGNc'),
	(8, 'Kevon', '$2y$10$gjAKSCN5AmWpXBh6hoJeIOFTn.uWoxV37kmTkw3Ar9RCA4CeuvPti', 'Pas de description', 'user', '2023-07-12 14:44:00', 'https://avatars.githubusercontent.com/u/127909706'),
	(17, 'KevinKotlet', '$2y$10$DCaLb8r7b9Ez1eBKLlu5YO58efslzr5Kf4x5V2CxYwgEphqglY.4a', 'Pas de description.', 'user', '2023-07-13 07:48:01', 'https://www.crockpot-romania.ro/assets/files/thumb/1145x600x1/recipe/fdb_1564490989_cotlet-de-porc-aromat-la-slow-cooker-crock-pot-4.jpg'),
	(18, 'PolandDu29', '$2y$10$X1xVLGw8SUJH/nep1FMgGOr3eE2m7lkZ6t8L.vAaz4cMxsBT6oQI.', 'Pas de description.', 'user', '2023-07-13 09:16:47', 'https://www.crockpot-romania.ro/assets/files/thumb/1145x600x1/recipe/fdb_1564490989_cotlet-de-porc-aromat-la-slow-cooker-crock-pot-4.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
