-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2013 a las 03:33:59
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'no_profile.png',
  `rank` set('0','1','2') NOT NULL DEFAULT '0',
  `lastacces` int(11) NOT NULL,
  `registerdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_messages`
--

CREATE TABLE IF NOT EXISTS `users_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toM` int(11) NOT NULL,
  `form` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `raed` set('0','1') NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_status`
--

CREATE TABLE IF NOT EXISTS `users_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `colour` set('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
