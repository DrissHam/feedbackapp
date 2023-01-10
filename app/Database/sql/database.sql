DROP DATABASE IF EXISTS feedbackapp;


CREATE DATABASE feedbackapp;
USE feedbackapp;



DROP TABLE IF EXISTS `compagny`;

CREATE TABLE `compagnys` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "",
  `compagny_name` varchar(255) NOT NULL COMMENT "",
  `address` varchar(255) NOT NULL COMMENT "",
  `postal_code` int(5) NOT NULL COMMENT "",
  `city` varchar(55) NOT NULL COMMENT "",
  `snapchat` varchar(55) DEFAULT NULL COMMENT "",
  `instagram` varchar(55) DEFAULT NULL COMMENT "",
  `facebook` varchar(55) DEFAULT NULL COMMENT "",
  `twitter` varchar(55) DEFAULT NULL COMMENT "",
  `email` varchar(55) NOT NULL COMMENT "",
  `password` varchar(255) NOT NULL COMMENT "",
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT "",
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "",
  `status` enum('new','valid','blocked') NOT NULL COMMENT "", 
  `token` varchar(255) NOT NULL COMMENT ""
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "",
  `status` enum('new','to-treat','treated') NOT NULL COMMENT "nouveau message, message à traiter et message traité OK",
  `satisfaction` boolean NOT NULL COMMENT "boolean TRUE = client satisfait / FALSE = client insatisfait",
  `comeback` boolean NOT NULL COMMENT "boolean TRUE = client envisage de revenir FALSE = envisage de ne pas revenir",
  `remark` varchar(255) DEFAULT NULL COMMENT "message textuels permettant d'expliquer la satisfaction/l'insatisfacction",
  `name` varchar(255) DEFAULT NULL COMMENT "",
  `email` varchar(55) DEFAULT NULL COMMENT "",
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT "",
  `adress_ip` varchar(255) NOT NULL COMMENT "",
  `id_compagny`int(11) NOT NULL COMMENT "clé etrangere FROM table compagny",
  FOREIGN KEY(id_compagny) REFERENCES compagny(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Constraints for table `messages`
--


-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

--
-- Table structure for table `responnse`
--

DROP TABLE IF EXISTS `responnse`;

CREATE TABLE `responnse` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "",
  `responnse` varchar(255) NOT NULL COMMENT "",
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "",
  `id_messages` int(11) NOT NULL COMMENT "clé etrangére FROM table messages",
  FOREIGN KEY(id_messages) REFERENCES messages(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




  -- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;

CREATE TABLE `search` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "",
  `recherche` varchar(255) NOT NULL COMMENT "",
  `adress_ip` varchar(255) NOT NULL COMMENT "",
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT ""
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `asministrator`
--
DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator` (
  `id`int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT "",
  `email` varchar(55) NOT NULL COMMENT "",
  `password`varchar(255) NOT NULL COMMENT ""
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

