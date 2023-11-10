-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 01:04:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapterNumber` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapterNumber`, `name`, `description`, `season_id`) VALUES
(11, 1, 'The National Anthem', 'Prime Minister Michael Callow faces a shocking dilemma when Princess Susannah, a much-loved member of the royal family, is kidnapped and the kidnapper forces Callow to commit direct, no-deception suicide in exchange for the princess life.', 7),
(12, 2, '15 Million Merits', 'A world where people earn merit by exercising to generate energy; merits are used to buy food, toiletries and skip unwanted advertisements. In this environment, people aspire to improve their lives by using their talents.', 7),
(13, 3, 'The Entire History of You', 'In the near future, everyone will have access to a memory implant that records everything humans do, see and hear.', 7),
(14, 4, 'Be right back', 'After learning about a new service that allows people to contact the dead, a lonely and grieving Martha connects with her late boyfriend.', 8),
(15, 5, 'White Bear', 'Victoria wakes up and can not remember anything about her life. All the people she meets refuse to communicate with her while some people try to kill her.', 8),
(16, 6, 'The Waldo Moment', 'A failed comedian who voices a cartoon bear is dragged into politics when executives want the bear to run for office.', 8),
(17, 7, 'White Christmas', 'At a remote base isolated by snow, two men tell several stories about the havoc caused by technology during Christmas.', 9),
(18, 8, 'Playtesting', 'An American traveler who is short of money signs up to be a tester for a new video game system. He will soon discover that fiction is sometimes too real.', 9),
(19, 9, 'Shut up and dance', 'A virus has infected your computer and now you face a terrible decision: either follow the orders sent to you by SMS or your most intimate secrets will come to light.', 9),
(20, 10, 'Saint Junipero', 'California coast, 1987. A shy young woman and a happy, outgoing girl seal a very strong bond, which seems to defy the laws of time and space.', 9),
(21, 11, 'The science of a kill', 'After his first battle with an elusive enemy, a soldier begins to experience strange sensations and strange technical glitches.', 10),
(22, 12, 'Hated in the Nation', 'A journalist dies involved in controversy on social networks. While investigating, a veteran police officer and her technology-savvy disciple discover something terrifying.', 10),
(23, 13, 'USS Callister', 'Commander Robert Daly leads his crew with wisdom and courage, but a new recruit will discover that not everything is as it seems on the USS Callister.', 10),
(24, 14, 'Arkangel', 'A single mother concerned about her daughters safety decides to implant a high-tech device that monitors her location. And many other things.', 11),
(25, 15, 'Crocodile', 'Mia is an architect who must keep a terrible secret while an insurance investigator examines the memories of witnesses to an accident.', 11),
(26, 16, 'Hang to the DJ', 'When Frank and Amy meet through a dating program that puts an expiration date on relationships, they soon begin to question the logic of the system.', 11),
(27, 17, 'Metalhead', 'In an abandoned warehouse, some scavengers in search of supplies encounter an implacable enemy. If they want to survive, they must escape through an inhospitable wasteland.', 11),
(28, 18, 'Black Museum', 'A young woman discovers a museum on the highway that contains supposedly authentic criminological objects... and that offers a disturbing main attraction.', 12),
(29, 19, 'Striking Vipers', 'Two college friends meet again in the virtual reality version of their favorite video game and their late nights together bring unexpected consequences.', 12),
(30, 20, 'Smithereens', 'A London rideshare driver sparks an international crisis when he kidnaps a worker for a social media company.', 12),
(31, 21, 'Rachel, Jake and Ashley too', 'A lonely teenager becomes obsessed with a robotic doll inspired by Ashley O, a pop star. Meanwhile, the singers life begins to go off the rails.', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE `season` (
  `season_id` int(11) NOT NULL,
  `seasonNumber` int(11) NOT NULL,
  `releaseYear` int(11) NOT NULL,
  `director` varchar(250) NOT NULL,
  `recordingCity` varchar(250) NOT NULL,
  `categoryGenre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`season_id`, `seasonNumber`, `releaseYear`, `director`, `recordingCity`, `categoryGenre`) VALUES
(7, 1, 2011, 'Charlie Brooker', 'Liverpool, United Kingdom', 'Futurism, fiction'),
(8, 2, 2013, 'Philipe Collins', 'London, United Kingdom', 'Drama, Futurism'),
(9, 3, 2016, 'Philipe Collins', 'Mánchester, United Kingdom', 'Fiction, futurism, thriller'),
(10, 4, 2017, 'Katerine Olsen', 'London, United Kingdom', 'Futurism, drama, romance'),
(11, 5, 2020, 'Philipe Collins', 'Edimburgo, United Kingdom', 'Futurism, drama, thriller'),
(12, 6, 2022, 'Noah Windsor', 'Sheffield, United Kingdom', 'Fiction, horror, futurism');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`) VALUES
(1, 'webadmin', '$2y$10$dK7Fj//V.gdvp/5ooK9aUeboP4TRHd/LqxtSYf1ITHc31Cgl6X87e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD UNIQUE KEY `chapterNumber` (`chapterNumber`),
  ADD KEY `season_id` (`season_id`);

--
-- Indices de la tabla `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_id`),
  ADD UNIQUE KEY `seasonNumber` (`seasonNumber`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `season`
--
ALTER TABLE `season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`season_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
