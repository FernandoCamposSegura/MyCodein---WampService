-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-05-2023 a las 14:32:09
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mycodein`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidences`
--

DROP TABLE IF EXISTS `incidences`;
CREATE TABLE IF NOT EXISTS `incidences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `descrip` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `state` enum('Unanswered','Pending','Resolved') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Unanswered',
  `user_id` int DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidences`
--

INSERT INTO `incidences` (`id`, `title`, `descrip`, `state`, `user_id`, `language_id`) VALUES
(18, 'Variables Java', '¿Cómo puedo declarar una variable en Java? ¿Cuáles son las reglas para nombrar variables en Java?', 'Resolved', 18, 4),
(19, 'Interfaces graficas en Java', '¿Cómo puedo crear interfaces gráficas de usuario en Java? ¿Qué herramientas o bibliotecas puedo usar para crear interfaces gráficas de usuario en Java?', 'Pending', 18, 4),
(21, 'Consumir API', 'No se como puedo consumir una API con JavaScript', 'Unanswered', 25, 2),
(22, 'EFECTO LOADING MODERNO', '¿Como puedo crear un efecto loading moderno para mi página?', 'Resolved', 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'CSS'),
(2, 'Javascript'),
(3, 'HTML'),
(4, 'Java'),
(5, 'Python');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `user_id` int NOT NULL,
  `incidence_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `incidence_id` (`incidence_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `description`, `user_id`, `incidence_id`) VALUES
(37, 'Para crear interfaces gráficas de usuario en Java, se puede utilizar la biblioteca de Swing o la biblioteca de JavaFX. Estas bibliotecas proporcionan un conjunto de clases y componentes para crear interfaces gráficas de usuario.', 18, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(6, 'carlo', 'carlo@test.com', '$2y$10$PfEnKyj9ptgCPm9Yzf4EUOor4PV1paHuSMmPmkrBKyp5Q.DAaqafy', 'USER'),
(10, 'nando', 'nando@test.com', '$2y$10$LufAhpAew0opxC6wfWDHDO/rhnalJ3x3Y.fcl7DZjgmOXIJcsk10.', 'USER'),
(11, 'javi', 'javi@admin.com', '$2y$10$7sWMNMUgM7rAFDrqZnHf5e1qfog1.O.Nwka6HINykKn3vTY0lOTuu', 'USER'),
(13, 'marilopez10', 'campos@gmail.com', '$2y$10$8dFz7qXrR2D1VhKzpxmLZe0k/8FCXNzlw2cjTBJoKCRWadb5Rx/SC', 'USER'),
(15, 'fer', 'fer@test.com', '$2y$10$ILGI27k8JjNcRPbpFAr/MuY82fyr8Q3q0DcBt.PoOjvXQoWJBLnu2', 'USER'),
(16, 'fer', 'f@test.com', '$2y$10$05xLdPUycvxawSjYlpUyiukPKalpnPzKk2l4qVUHPn8BEoSpcn4Sq', 'USER'),
(17, 'Fer', 'test1@test.com', '$2y$10$8b2pdxx9Y7kyujcMhZj/Pev5ITFcyQK9rUJSRePM0gGllcYidIN2y', 'USER'),
(18, 'nandito1999', 'campos@test.com', '$2y$10$FNaPZnIwYdeBeTs3klSOCultb7SPQE2Oin8V11UouK/J91vC7zG/m', 'USER'),
(19, 'ana1988', 'ana@test.com', '$2y$10$FnxAgIVhu5x7kOX9hYPEAO0LYpIeq0rkIPOLvofdkQVAkTB.DDZne', 'ADMIN'),
(23, 'marilopez10', 'a26236@svalero.com', '$2y$10$GDM6OFgE9mT9cbi.3idowOna8nJYPe0STx4xFmtOtXPWfYu6d30p6', 'USER'),
(25, 'fer1987', 'test@test.com', '$2y$10$9urEJ5tIcu4S8zZdZELCie.zYpCjV4ZTKanyz4/3vlQH1qL5an5ti', 'USER');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidences`
--
ALTER TABLE `incidences`
  ADD CONSTRAINT `incidences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidences_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`incidence_id`) REFERENCES `incidences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
