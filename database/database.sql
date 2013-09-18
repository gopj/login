

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `idPlace` int(11) DEFAULT '1',
  `description` text,
  `dateStart` date DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `dateEnd` date DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `icsConfig` text,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`idEvent`, `title`, `idPlace`, `description`, `dateStart`, `timeStart`, `dateEnd`, `timeEnd`, `icsConfig`, `idUser`) VALUES
(36, 'Reunion academia de software', 2, 'asdasd', '2013-08-31', '18:13:43', '2013-08-31', '18:13:43', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `idPlace` int(11) NOT NULL AUTO_INCREMENT,
  `txt_place` text NOT NULL,
  `reference` varchar(45) NOT NULL,
  PRIMARY KEY (`idPlace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `places`
--

INSERT INTO `places` (`idPlace`, `txt_place`, `reference`) VALUES
(1, 'Paraninfo', 'A lado de unidad Morelos'),
(2, 'Docencia', 'Sala de juntas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `txt_profile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProfile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`idProfile`, `txt_profile`) VALUES
(1, 'Adminisitrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_events`
--

CREATE TABLE IF NOT EXISTS `sub_events` (
  `idSubEvent` int(11) NOT NULL AUTO_INCREMENT,
  `idEvent` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idSubEvent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `sub_events`
--

INSERT INTO `sub_events` (`idSubEvent`, `idEvent`, `date`) VALUES
(25, 35, '0000-00-00'),
(26, 36, '2013-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `idDependencia` int(11) NOT NULL,
  `idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `nombre`, `apellido`, `idDependencia`, `idProfile`) VALUES
(1, 'gopj', '81dc9bdb52d04dc20036dbd8313ed055', 'Jesus', 'Gonzalez', 0, 1),
(2, 'figo', '81dc9bdb52d04dc20036dbd8313ed055', 'Figo', 'Gonzalez', 0, 2),
(3, 'kike', '202cb962ac59075b964b07152d234b70', 'Kike', 'Amezcua', 0, 1);