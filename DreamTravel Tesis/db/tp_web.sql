-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2022 a las 04:06:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tp_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(20) NOT NULL,
  `destino` varchar(60) NOT NULL,
  `info` text NOT NULL,
  `precio` int(40) NOT NULL,
  `aereos` varchar(60) NOT NULL,
  `hospedaje` varchar(60) NOT NULL,
  `comidas` varchar(60) NOT NULL,
  `cant_personas` int(10) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `destino`, `info`, `precio`, `aereos`, `hospedaje`, `comidas`, `cant_personas`, `img`) VALUES
(1, 'Disney, USA', 'La Magia está lista cuando tu lo estés. Explora todas las cosas que puedes disfrutar! Parques. Restaurantes. Compras. Recreación. Hoteles. Marcas: Magic Kingdom, EPCOT.', 8000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 5, 'img/paquetedisney_1655380749.png'),
(2, 'Taj Mahal, INDIA', 'Aunque muchos lo consideran un templo, el Taj Mahal es un mausoleo que esconde una bella y trágica historia de amor entre un emperador y su esposa. Es sin duda una parada obligada para los miles de turistas que visitan este rincón de India.', 5300, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 3, 'img/paquetetajmahal_1655343804.png'),
(28, 'Mykonos, GRECIA', 'Probablemente la más famosa isla griega. Tiene un paisaje típicamente cicládico. Es árida y está rodeada de magníficas playas. Se trata de una isla muy visitada, con una vida nocturna muy acentuada y loca.', 5000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/a1_1655343396.png'),
(29, 'El Cairo, EGIPTO', 'La capital egipcia, el área metropolitana más grande de África, es famosa por su tráfico endemoniado y su desconcierto urbanístico. Aún así, es también una visita imprescindible para comprender el país de los faraones.', 3000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 1, 'img/paqueteegipto_1655343437.png'),
(30, 'Phuket, TAILANDIA', 'Playas tropicales, templos ocultos, mercados locales y una energética escena de clubes nocturnos. Phuket atrae a aquellos que se relajan al sol y se animan durante la noche.', 4000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/paquetephuket_1655343477.png'),
(31, 'Cancún, MÉXICO', '“Vacaciones de primavera para siempre” acostumbraba ser el lema no oficial de Cancún, pero la ciudad fiestera más famosa de México tiene mucho más para ofrecer que playas perfectas y clubes nocturnos salvajes.', 2800, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/paquetecancun_1655343534.png'),
(32, 'Machu Pichu, PERÚ', 'En lo alto de la montaña, grandes e impresionantes bloques de piedra unidos entre sí sin amalgama alguna conforman uno de los centros religiosos, políticos y culturales más importantes del imperio incaico: Machu Picchu.', 3200, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 3, 'img/paquetemachupichu_1655343589.png'),
(33, 'Monte Fuji, JAPÓN', 'Si hay una excursión desde Tokio que resulta imprescindible es una visita al monte Fuji, el símbolo de Japón y uno de sus paisajes más venerados. Descubre la belleza única de esta montaña sagrada y conoce la historia del volcán más famoso del país.', 4200, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 1, 'img/paquetefuji_1655343625.png'),
(34, 'Gran Muralla China, CHINA', 'Patrimonio de la Humanidad por la Unesco desde 1987 y considerada una de las Nuevas 7 Maravillas del Mundo, serpentea sobre las montañas del gigante asiático en un conjunto de muros y distintas estructuras defensivas construidas a lo largo del tiempo por diferentes dinastías.', 6200, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/paquetechina_1655343675.png'),
(35, 'Londres, INGLATERRA', 'La capital de Inglaterra y del Reino Unido, es una ciudad del siglo XXI. En su centro se alzan el imponente Palacio del Parlamento, la torre del icónico reloj &quot;Big Ben&quot; y la Abadía de Westminster, lugar de las coronaciones monárquicas británicas.', 4900, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/paquetelondres_1655346134.png'),
(36, 'Dubai, EMIRATOS ARABES', 'Dubái es una ciudad emirato de los Emiratos Árabes Unidos conocida por su lujoso comercio, la arquitectura ultramoderna y su vida nocturna animada. Burj Khalifa, una torre de 830 m de alto, domina el paisaje lleno de rascacielos.', 10000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 3, 'img/paquetedubai1655346157_1655381994.png'),
(38, 'Santa Mónica, USA', 'Es una ciudad costera al oeste del centro de Los Ángeles. La playa de Santa Mónica está rodeada del parque Palisades Park, con vista al océano Pacífico. En el muelle, se encuentra el parque de atracciones Pacific Park, el Carrusel Looff Hippodrome y el Acuario del Muelle de Santa Mónica.', 5000, 'Incluye aéreos', 'Incluye hospedaje', 'Desayuno / almuerzo / cena', 2, 'img/santamonica1655346253_1657758466.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre`, `mail`, `pass`, `is_admin`) VALUES
(8, 'asdasd', 'asdasd12345@asa2s.com', '$2y$10$m4NFrPU8C3Vka/Rjqdm5vuDCiF3nOwdEVpDUk/wzLias0uiQpoGz6', 0),
(9, 'as', 'qwerty@qwerty.com', '$2y$10$S/bHY8yof1Lp4c/O3MDOkuZ4Ot8AdgkhkmsdQfR1ZNqhs0AMaaYGW', 0),
(10, 'asdasd', 'qwerty12@qwerty12.com', '$2y$10$SuwxGCmGZ7BZ2df08wqJCe6evonAPNUJVp7w/mkV1hXeaC.RTKqEm', 0),
(11, 'martin', 'martin@martin.com', '$2y$10$H0XoUT1e1O13IXRprG5fNulKbc97SfP0Bm4JmQRb4OtZ.3M06VQ3K', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
