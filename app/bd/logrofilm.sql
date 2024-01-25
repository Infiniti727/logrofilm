-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2024 a las 16:43:43
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
-- Base de datos: `logrofilm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_peli` int(11) NOT NULL,
  `comentario` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `id_usuario`, `id_peli`, `comentario`) VALUES
(5, 1, 12, 'buena peli'),
(6, 1, 11, 'Prueba'),
(7, 2, 11, 'prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `id_fa` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_esp` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` mediumtext NOT NULL,
  `año` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `casting` mediumtext NOT NULL,
  `directores` mediumtext NOT NULL,
  `generos` longtext NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `id_fa`, `nombre`, `nombre_esp`, `descripcion`, `imagen`, `año`, `duracion`, `casting`, `directores`, `generos`, `rating`) VALUES
(2, 484144, 'La sociedad de la nieve', 'La sociedad de la nieve', 'En 1972, el vuelo 571 de la Fuerza Aérea Uruguaya, fletado para llevar a un equipo de rugby a Chile, se estrella en un glaciar en el corazón de los Andes. Solo 29 de sus 45 pasajeros sobreviven al accidente. Atrapados en uno de los entornos más inaccesibles y hostiles del planeta, se ven obligados a recurrir a medidas extremas para mantenerse con vida.', 'http://localhost/logrofilm/public/img/484144.png', 2023, 144, '', 'J.A. Bayona', 'Drama,Aventuras,Basado en hechos reales,Supervivencia,Naturaleza,Años 70,Zonas frías/polares,Escenario único', 0),
(3, 835259, 'Cars', 'Cars', 'El aspirante a campeón de carreras Rayo McQueen parece que está a punto de conseguir el éxito, la fama y todo lo que había soñado, hasta que por error toma un desvío inesperado en la polvorienta y solitaria Ruta 66. Su actitud arrogante se desvanece cuando llega a una pequeña comunidad olvidada que le enseña las cosas importantes de la vida que había olvidado.', 'http://localhost/logrofilm/public/img/835259.png', 2006, 116, '', 'John Lasseter', 'Animación,Comedia,Aventuras,Coches/Automovilismo,Cine familiar,Deporte,Vida rural (Norteamérica),Pixar', 0),
(4, 783406, 'The SpongeBob Squarepants Movie', 'Bob Esponja: La película', 'Hay problemas en Fondo Bikini: la corona del Rey Neptuno ha desaparecido y las sospechas recaen en el Sr. Cangrejo. Junto a Patricio, su mejor amigo, Bob Esponja marcha a la peligrosa Ciudad Concha para rescatar la corona de Neptuno y salvar al Sr. Cangrejo.', 'http://localhost/logrofilm/public/img/783406.png', 2004, 83, '', 'Stephen Hillenburg,Mark Osborne', 'Animación,Comedia,Fantástico,Aventuras,Infantil,Cine familiar,Aventuras marinas,Comedia absurda', 0),
(5, 992586, 'Split', 'Múltiple', 'A pesar de que Kevin (James McAvoy) le ha demostrado a su psiquiatra de confianza, la Dra. Fletcher (Betty Buckley), que posee 23 personalidades diferentes, aún queda una por emerger, decidida a dominar a todas las demás. Obligado a raptar a tres chicas adolescentes encabezadas por la decidida y observadora Casey (Anya Taylor-Joy), Kevin lucha por sobrevivir contra todas sus personalidades y la gente que le rodea, a medida que las paredes de sus compartimentos mentales se derrumban.', 'http://localhost/logrofilm/public/img/992586.png', 2016, 116, '', 'M. Night Shyamalan', 'Thriller,Intriga,Thriller psicológico,Secuestros / Desapariciones', 0),
(6, 494558, 'Shrek', 'Shrek', 'Hace mucho tiempo, en una lejanísima ciénaga, vivía un feroz ogro llamado Shrek. De repente, un día, su soledad se ve interrumpida por una invasión de sorprendentes personajes. Hay ratoncitos ciegos en su comida, un enorme y malísimo lobo en su cama, tres cerditos sin hogar y otros seres que han sido deportados de su tierra por el malvado Lord Farquaad. Para salvar su territorio, Shrek hace un pacto con Farquaad y emprende viaje para conseguir que la bella princesa Fiona acceda a ser la novia del Lord. En tan importante misión le acompaña un divertido burro, dispuesto a hacer cualquier cosa por Shrek: todo, menos guardar silencio.', 'http://localhost/logrofilm/public/img/494558.png', 2001, 87, '', 'Andrew Adamson,Vicky Jenson', 'Animación,Comedia,Fantástico,Aventuras,Parodia,Cuentos,Fantasía medieval,Dragones', 0),
(7, 166270, 'Five Nights at Freddys', 'Five Nights at Freddys', 'Un hombre comienza un trabajo como guardia de seguridad nocturno en el restaurante Freddy Fazbears Pizza, donde descubre que los animatrónicos se mueven por la noche y matan a cualquiera que vean. Adaptación de la exitosa saga de videojuegos homónima creada en 2014 por Scott Cawthon.', 'http://localhost/logrofilm/public/img/166270.png', 2023, 110, '', 'Emma Tammi', 'Terror,Fantástico,Muñecos,Monstruos,Videojuego', 0),
(8, 336365, 'Maindo Gêmu (Mind Game)', 'Mind Game', '\"Mind Game\" es un surrealista cóctel audiovisual, catálogo de cuantas técnicas de animación existen a día de hoy (desde el \"stop motion\" hasta la infografía poligonal, pasando por la caricaturización extrema o la imagen real manipulada). El film narra la historia de Nishi, quien conoce en un tren a Myon, la mujer de sus sueños. Myon y su hermana invitan a Nishi a su restaurante, donde encontrará la muerte cortesía de unos asesinos que venían a cobrar las deudas de Myon. Cuando Nishi muere y va al cielo, desafía el poder de los dioses y decide regresar a la Tierra. Al volver es devorado por una ballena y será en su interior donde Nishi conocerá a un hombre que lleva ahí mas de 30 años.', 'http://localhost/logrofilm/public/img/336365.png', 2004, 105, '', 'Masaaki Yuasa', 'Animación,Fantástico,Comedia,Aventuras,Surrealismo,Animación para adultos,Manga,Película de culto', 0),
(9, 495730, 'Top Secret!', 'Top Secret!', 'La famosa estrella del rock americano Nick Rivers (Val Kilmer) llega a Alemania Oriental para presentarse a un importante festival cultural. Pero este hecho forma parte de un plan para distraer la atención del mundo exterior sobre lo que está sucediendo realmente: el Alto Mando de Alemania Oriental, encabezado por el general Streck, se propone reunir nuevamente las dos Alemanias bajo un sólo Gobierno. Pronto Nick se verá envuelto en la operación ayudando a la resistencia francesa.', 'http://localhost/logrofilm/public/img/495730.png', 1984, 90, '', 'Jim Abrahams,David Zucker,Jerry Zucker', 'Comedia,Comedia absurda,Parodia,Música,Espionaje,Película de culto', 0),
(10, 520063, 'The Hunger Games', 'Los juegos del hambre', 'Lo que en el pasado fueron los Estados Unidos, ahora es una nación llamada Panem; un imponente Capitolio ejerce un control riguroso sobre los 12 distritos que lo rodean y que están aislados entre sí. Cada distrito se ve obligado a enviar anualmente un chico y una chica entre los doce y los dieciocho años para que participen en los Hunger Games, unos juegos que son transmitidos en directo por la televisión. Se trata de una lucha a muerte, en la que sólo puede haber un superviviente. Katniss Everdeen, una joven de dieciséis años, decide sustituir a su hermana en los juegos; pero para ella, que ya ha visto la muerte de cerca, la lucha por la supervivencia es su segunda naturaleza.', 'http://localhost/logrofilm/public/img/520063.png', 2012, 143, '', 'Gary Ross', 'Ciencia ficción,Aventuras,Thriller,Thriller futurista,Supervivencia,Televisión,Futuro postapocalíptico,Distopía,Young Adult', 0),
(11, 750408, 'Ready Player One', 'Ready Player One', 'Año 2045. Wade Watts es un adolescente al que le gusta evadirse del cada vez más sombrío mundo real a través de una popular utopía virtual a escala global llamada \"Oasis\". Un día, su excéntrico y multimillonario creador muere, pero antes ofrece su fortuna y el destino de su empresa al ganador de una elaborada búsqueda del tesoro a través de los rincones más inhóspitos de su creación. Será el punto de partida para que Wade se enfrente a jugadores, poderosos enemigos corporativos y otros competidores despiadados, dispuestos a hacer lo que sea, tanto dentro de \"Oasis\" como del mundo real, para hacerse con el premio.', 'http://localhost/logrofilm/public/img/750408.png', 2018, 140, '', 'Steven Spielberg', 'Ciencia ficción,Aventuras,Acción,Distopía,Internet / Informática,Videojuego,Mundo virtual', 0),
(12, 799011, 'Totsukuni no Shoujo', 'La pequeña forastera: Siúil, a Rún', 'Largometraje de WIT Studio financiado a través de Kickstarter para adaptar el manga original de Nagabe. Tras mostrar un corto de 10 minutos como carta de presentación, la campaña tuvo éxito y logró alcanzar el objetivo de 3 millones de yenes sobrepasando los 20 millones.', 'http://localhost/logrofilm/public/img/799011.png', 2022, 70, '', 'Yūtarō Kubo,Satomi Tani', 'Animación,Fantástico,Manga,Sobrenatural,Remake', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_peli` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `desactivada` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `contraseña`, `desactivada`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 0, 1),
(2, 'usuario', 'usuario', 'usuario', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_peli` (`id_usuario`,`id_peli`),
  ADD KEY `comentario_ibfk_1` (`id_peli`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_peli` (`nombre`);

--
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peli_usuario` (`id_peli`,`id_usuario`),
  ADD KEY `rating_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_peli`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_peli`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
