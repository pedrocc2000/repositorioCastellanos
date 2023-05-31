-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 18:54:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compusystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idProductoCarrito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `ctd` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(1, 'Cables Ethernet'),
(3, 'Routers'),
(5, 'Switches'),
(6, 'Repetidores Wi-Fi'),
(7, 'Telefonos VoIP inalambricos'),
(8, 'Telefonos VoIP fijos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavorito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`idFavorito`, `idProducto`, `idUsuario`) VALUES
(53, 20, 10),
(54, 19, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `idFoto` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `principal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`idFoto`, `nombre`, `idProducto`, `principal`) VALUES
(11, '0e23b94bbec103ed91c70fcbb78e8f18.PNG', 18, 1),
(12, '67d7482f305751e8ef44beab04493436.PNG', 18, 0),
(13, 'ad23ae53c0c4ed48fe42f910e761162c.PNG', 18, 0),
(14, 'c7cce8c9274a69971ff2b8eb05380c30.PNG', 19, 1),
(15, '01f5490b02371ce16f195053d42f86ff.PNG', 19, 0),
(16, '8f6956c3904dc84db60e22632b2ecb08.PNG', 19, 0),
(17, '9b672dfa6cc01e370105c47b71dee0a7.PNG', 20, 1),
(18, 'dc26fcb125e9b5ee7b5fc3d64a016737.PNG', 20, 0),
(19, 'e17e6dfd4ca2f53d5257279c7a360070.PNG', 20, 0),
(20, '1d38f459c18e8f4cfab0c0c92b18ac52.PNG', 21, 1),
(21, '820825fbd2287d5df1b068be9c523741.PNG', 21, 0),
(22, 'e17bf9ac28e905d63b3a4152a4cbb4f4.PNG', 21, 0),
(23, 'f659bb49f8fb839ea6834dec76421e5a.PNG', 22, 1),
(24, '3b09630d40219003ef922dde4e722efb.PNG', 22, 0),
(25, '757a380df3272d3f612d873247261b82.PNG', 22, 0),
(30, '07cbd91a0a23de9120feb88ce6ab9983.PNG', 24, 1),
(31, '46a31e596f7e4e5248ca691e75eb3240.PNG', 24, 0),
(33, 'd603e5a63467709995135be70003e85d.PNG', 24, 0),
(34, '66d799965ecfae463f913e82c212ab54.PNG', 25, 1),
(35, '4153b348cc85b645aca830539efd1155.PNG', 25, 0),
(36, 'd53dbf2399bdad6c740d41a7d334c570.PNG', 25, 0),
(37, 'fabfdb0ee14bb5e3b2fdf744bb50e920.PNG', 28, 1),
(38, 'de31b7ee8cfd5324e28f71d710af10aa.PNG', 28, 0),
(39, 'd88d96040ee95b96f70f33e06dc088e4.PNG', 28, 0),
(41, 'f6283d479f28d5604b8e7e76e262534a.PNG', 31, 1),
(42, 'f665e92549f6764ee93eda078dd54c96.PNG', 31, 0),
(43, '84bbbbd6454cad9aa47d68f0e452b094.PNG', 31, 0),
(45, '32bde841e905c3b4b1ba3a5fb0d1cf22.PNG', 32, 1),
(46, '6517243f2cb52e0d84ef699c90299c04.PNG', 32, 0),
(47, '9c6dbc98830fe6f1ff5957bd868acc51.PNG', 32, 0),
(49, '3a094f5ec1c28a621bc176010448e78e.PNG', 33, 1),
(50, '52d079d51bc8234e14e898f45f42ee2b.PNG', 33, 0),
(51, '3785eb77a8ddd614a62c7d365541d719.PNG', 33, 0),
(56, '1060c8b94254e6832678b17b72621dab.PNG', 37, 1),
(57, '85b294a7e3a7f9ce729174705274bad9.PNG', 37, 0),
(58, '377720147b1dcaab5e89c089fdc8d81e.PNG', 37, 0),
(59, '347709cd2c61a7fe2ea0ae767e7621d8.PNG', 38, 1),
(60, '04bc844c539dd6988630392ae7cea625.PNG', 38, 0),
(61, 'f66ef0e0390973caa2e976139bf43cc1.PNG', 38, 0),
(62, '1384bfca1507037fd6edea61752ce1b8.PNG', 39, 1),
(63, '8dc27e16ff7f99b79dd16696cc8604e1.PNG', 39, 0),
(64, '1e246e42cfcc39745175bf65a28056da.PNG', 39, 0),
(65, '1c012c909ccad76c01e53b29d469bbde.PNG', 40, 1),
(66, 'ce1dc3968af7c01b02c936e2e20ff28f.PNG', 40, 0),
(67, '04b3a0be5519e56c4f5a4917fcfad40b.PNG', 40, 0),
(68, '740fddd7872c085004189421e863b8c1.PNG', 41, 1),
(69, 'b6feeecc905fb5012372c47bb0cc127e.PNG', 41, 0),
(70, '41319f7da23c8478771182ccb7cc03ba.PNG', 41, 0),
(71, '52a1df9aa327397d9db0465af850a699.PNG', 42, 1),
(72, 'b8592e1b7c4bf7b3dab1e9ca9a450418.PNG', 42, 0),
(73, '784cd1e13081c5b8e7977cdf5b59a524.PNG', 42, 0),
(77, 'ad3bada13643c4bb706115b9b3e84d66.PNG', 44, 1),
(78, '4ccb5d07a48fefc34cc8fc4f22529a00.PNG', 44, 0),
(79, '3855719e4506b98c3a16387276c3a6de.PNG', 44, 0),
(80, 'da6b41cb147ca3e8f94c6fe058ae4ae3.PNG', 45, 1),
(81, 'd293518fe2a9c98b3ac91282723191ae.PNG', 45, 0),
(82, 'fc4b76fd6882cc18f597c595c611e173.PNG', 45, 0),
(83, 'b3018079725c923e353705a91bbfdb91.PNG', 46, 1),
(84, 'e47f025988c8ea8149ad6a0a287c723f.PNG', 46, 0),
(85, '9dd2cde8089a71aaed37d8d6ee18f1f8.PNG', 46, 0),
(86, '5c0a11a47930b0ba8d23ac51072d2189.PNG', 47, 1),
(87, '001c18e69e52d2c7605090625e0a915f.PNG', 47, 0),
(88, '04e900ac2c94f906f3e933741cd698b4.PNG', 47, 0),
(89, '48251332a0243a1adbc0aabb8cf28cef.PNG', 48, 1),
(90, 'b2af68db6aba66cfdea1f075441e17d3.PNG', 49, 1),
(91, '758bb35f9dcd741594d18995df311850.PNG', 49, 0),
(92, '2541bba682ca24ded6cdc24235339f1a.PNG', 49, 0),
(93, '1241400866a34e1eab8cb86ea0aba5af.PNG', 50, 1),
(94, '869d4f9385069c46b0c12c8af3928a1f.PNG', 50, 0),
(95, '41c93aab57e902974eb2995186385cc4.PNG', 50, 0),
(96, '8a9895508421e8d9f3f7a67d7ad22554.PNG', 51, 1),
(97, 'd66e50e0d71fe1c052d977da4522bf0f.PNG', 51, 0),
(98, '4b2a28e1cc8d9766af6a92787598f4fa.PNG', 51, 0),
(99, 'c7ba41a8647e9268084b10fc820aeee3.PNG', 52, 1),
(100, 'a65a431af72fbe9463a9facd11c804fb.PNG', 52, 0),
(101, '40827f658492f5ed9d04a6a8135d9afc.PNG', 52, 0),
(102, '648152d083d7f4e3375021c350490bc3.PNG', 53, 1),
(103, '13caa4fda25af2a11e2fb0571c623d6d.PNG', 53, 0),
(104, '2a766392ffc5cefff71725a43b50074a.PNG', 53, 0),
(105, 'ea3aeaefffd0bd519fd752cc1bc02bea.PNG', 54, 1),
(106, '2fb256c9fbe785fa80b57721056fd222.PNG', 54, 0),
(107, '8e2ae57400aea3a27a44e392bd39a1e0.PNG', 54, 0),
(108, 'fad2f69b707ac0bad458a8005603d877.PNG', 55, 1),
(109, '09fc03983028b3560a104bfa7b251d8f.PNG', 55, 0),
(110, '6cac4d2659b7777b087ca181a1bc3660.PNG', 55, 0),
(111, '31581849b800af9f455837c0ac22d2a6.jpg', 56, 1),
(112, '45d101cc56ae078306757a892e407260.jpg', 56, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedidos`
--

CREATE TABLE `lineapedidos` (
  `idLineaPedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `ctd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `lineapedidos`
--

INSERT INTO `lineapedidos` (`idLineaPedido`, `idPedido`, `idProducto`, `ctd`) VALUES
(31, 24, 20, 3),
(32, 25, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `total`) VALUES
(24, 10, 5.37),
(25, 11, 1.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(4000) NOT NULL,
  `precio` float NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `precio`, `idCategoria`) VALUES
(18, 'Cable de red RJ-45 Cat 5e', '<ul><li>Color del cable: Blanco</li><li>Longitud del cable: 1 metro</li><li>Cable estandar: Cat5e</li><li>Blindaje del cable: U/UTP (UTP)</li><li>Conector 1: RJ-45</li><li>Conector 2: RJ-45</li><li>Genero del conector: Macho/Macho</li><li>AWG calibre del cable: 24</li><li>Acorde RoHS: Si+</li></ul>', 0.99, 1),
(19, 'Cable de red RJ-45 Cat6', '<ul><li>Color del cable: Rojo</li><li>Longitud del cable: 1 metro</li><li>Cable estandar: Cat6</li><li>Blindaje del cable: U/UTP (UTP)</li><li>Conector 1: RJ-45</li><li>Conector 2: RJ-45</li><li>Genero del conector: Macho/Macho</li><li>AWG calibre del cable: 24</li><li>Acorde RoHS: Si</li></ul>', 1.75, 1),
(20, 'Cable de red RJ-45 Cat 6A', '<ul><li>Color del cable: Negro</li><li>Longitud del cable: 1 metro</li><li>Cable estandar: Cat6A</li><li>Blindaje del cable: U/UTP (UTP)</li><li>Conector 1: RJ-45</li><li>Conector 2: RJ-45</li><li>Genero del conector: Macho/Macho</li><li>Material de chaqueta: libre de halogenos (LSZH)</li><li>Clase de cable: E</li><li>Tipo de interfaz ethernet: 10 Gigabit Ethernet</li><li>AWG calibre del cable: 24</li><li>Frecuencia: 500 MHz</li><li>Libre de halogenos: Si</li><li>Acorde RoHS: Si</li></ul>', 1.79, 1),
(21, 'Cable de red RJ-45 Cat7', '<ul><li>Color del cable: Negro</li><li>Longitud de cable: 2 metros</li><li>Cable estandar: Cat. 6</li><li>Blindaje de cable: U/UTP (UTP)</li><li>Conector 1: RJ-45</li><li>Conector 2: RJ-45</li><li>Genero del conector: Macho/Macho</li><li>AWG calibre del cable: 24</li><li>Acorde RoHS: Si</li></ul>', 6.29, 1),
(22, 'Cable de red RJ-45 Cat8', '<ul><li>Clase de blindaje: S / FTP (PiMF)</li><li>Especificacion: Cat 8.1</li><li>Tipo de cable: cable crudo Cat 8.1</li><li>Material conductor interno: CU (cobre)</li><li>Material de la funda del cable: LSZH</li><li>AWG: 26/7 (varado)</li><li>Numero de blindajes: 2 x</li><li>Diametro de la funda del cable (aprox.): 8,2 mm</li><li>Cumple con LSZH: Si</li><li>Longitud: 50cm</li></ul>', 14.28, 1),
(24, 'TP-LINK TL-WR841N Wireless Router Neutro 11n', '<ul><li>Puertos e interfaces: 4 puertos ethernet lan (RJ-45).</li><li>Consumo energetico: 8W.</li><li>Conexiones de red: <span style=\"color: rgb(136, 136, 136);\">&nbsp;</span>IEEE 802.11b,IEEE 802.11g,IEEE 802.11n,IEEE 802.3,IEEE 802.3u.</li><li>Su velocidad inalambrica de 300 Mbps lo convierte en el equipo ideal para aplicaciones sensibles a las interrupciones tales como la reproduccion en streaming de video HD.</li><li>Dos antenas para incrementar las prestaciones y estabilidad de la conexion inalambrica.</li><li>Encriptacion de la red inalambrica pulsando simplemente el boton QSS.</li><li>La asignacion de ancho de banda segun la IP permite a los administradores especificar de cuanto ancho de banda dispone cada ordenador.</li></ul>', 19.9, 3),
(25, 'TP-LINK Archer C50 Dual Wireless AC1200 Band', '<ul><li>Soporta el estandar 802.11ac la nueva generacion Wi-Fi</li><li>Conexiones simultaneas de 2.4GHz a 300Mbps y 5GHz a 867Mbps para un total de 1.2Gbps de ancho de banda disponible</li><li>4 Antenas externas de doble banda que proporcionan una conexion inalambrica estable y una cobertura optima</li><li>Sencilla gestion red en sus manos con TP-LINK Tether</li></ul>', 47.02, 3),
(28, 'TP-Link Archer AX23 Router Gigabit WiFi 6 AX1800', '<ul><li><strong>Wi-Fi super rapido de 1.8 Gbps</strong>: disfrute de una transmision y descarga 4K fluidas con velocidades de Wi-Fi super rapidas de 1.8 Gbps.</li><li><strong>Conecte mas dispositivos</strong>: se comunica con mas dispositivos mediante OFDMA y al mismo tiempo reduce el retraso.</li><li><strong>Cobertura mas amplia</strong>&nbsp;: el algoritmo mejorado, la formacion de haces y las antenas de alto rendimiento mejoran el rendimiento de la cobertura Wi-Fi.</li><li><strong>Plataforma de proxima generacion</strong>: el conjunto de chips de alta eficiencia de proxima generacion proporciona Wi-Fi rapido y estable a la vez que ahorra consumo de energia.</li><li><strong>Controles parentales:</strong>&nbsp;disfrute de las funciones de control parental mas versatiles pero gratuitas entre todos los enrutadores, incluido el bloqueo de URL, la administracion de perfiles, la pausa y mas.</li><li><strong>Funciona con la mayoria de los ISP</strong>: compatible con la mayoria de los ISP con soporte adicional para L2TP / PPTP. El soporte de IPTV funciona con su contrato de TV existente a traves de Internet.&nbsp;</li><li><strong>OneMesh&nbsp;</strong>&nbsp;: utilicelo con los extensores OneMesh para obtener cobertura en todo el hogar y disfrutar de una itinerancia fluida.</li><li><strong>Configuracion facil:</strong>&nbsp;configure su enrutador en minutos con la poderosa aplicacion TP-Link Tether.</li><li><strong>Compatible con versiones anteriores :</strong>&nbsp;admite todos los dispositivos Wi-Fi de estandares 802.11 anteriores.</li></ul>', 92.49, 3),
(31, 'TP-Link TL-WR940N 450Mbps Wireless Router WiFi', '<ul><li>Velocidad inalambrica de 450Mbps ideal para las aplicaciones sensibles como el streaming de video HD sin interrupciones.</li><li>Tres antenas inalambricas que incrementan la robustez y estabilidad.</li><li>Configure una conexion segura con cifrado WPA pulsando el boton WPS.</li><li>El modo inalambrico WDS extiende facilmente la cobertura de la red inalambrica.</li><li>Incluye la funcion de envio automatico de archivos de registro a traves del correo electronico para ayudarle en las tareas de gestion del router.</li><li>Utilidad Easy Setup Assistant posibilita una instalacion rapida y sin problemas.</li></ul>', 40.98, 3),
(32, 'TP-Link Archer AX6000 Router Inalambrico Dual Band Gigabit Negro', '<ul><li><strong>Blazing Speed</strong>: la velocidad de Wi-Fi de doble banda AX6000 aumentada por 1024QAM ofrece una velocidad inalambrica asombrosa de hasta 5952 Mbps: 4804 Mbps (5 GHz) y 1148 Mbps (2.4 GHz).</li><li><strong>Ultra conectividad</strong>: 1 x 2.5 Gbps puerto WAN6, 8 puertos Gigabit LAN y 2 × USB 3.0 en Tipo A y Tipo C.</li><li><strong>Altamente eficiente:</strong>&nbsp;OFDMA aumenta el rendimiento promedio en 4 × en escenarios de alta densidad, en comparacion con un enrutador estándar 802.11ac. Ambos son compatibles con el enlace descendente y el enlace ascendente MU-MIMO5.</li><li><strong>Procesamiento potente:</strong>&nbsp;CPU de cuatro nucleos a 1,8 GHz y 2 coprocesadores que eliminan la latencia y ofrecen un rendimiento estable.</li><li><strong>Conexion inteligente</strong>: Band Steering dirige a los clientes a una banda menos congestionada y Airtime Fairness optimiza el uso del tiempo.</li><li><strong>Sistema de seguridad incorporado:</strong>&nbsp;TP-Link HomeCareTM proporciona una red completa con un servicio avanzado de antimalware desarrollado por Trend MicroTM, que ofrece antivirus, controles parentales y QoS7.</li><li><strong>Configuracion sencilla:</strong>&nbsp;conecte su enrutador a traves de Bluetooth y configurelo en minutos con la potente aplicacion Tether.</li></ul>', 272.85, 3),
(33, 'TP-Link Archer AX11000 Router WiFi 6 Gaming 11 Gbps Tri-Banda USB 3.0 Quad-Core 1.8 GHz', '<ul><li><strong>Wi-Fi Ultra Rapido para Juegos Extremos</strong>: Maquina de velocidad AX11000 que entrega 12-streams Wi-Fi con Velocidades que sobrepasan 10 Gbps: 4804 Mbps (5 GHz Gaming) + 4804 Mbps (5 GHz) + 1148 Mbps (2.4 GHz).</li><li><strong>Acelerador Game</strong>: Detecta y optimiza el flujo de juegos, asegurando la inmersion en el juego.</li><li><strong>Protector Game</strong>: Mantenga las cuentas y dicumentos seguros gracias al sistema de seguridad Homecare de Trend Micro.</li><li><strong>Estadisticas Game</strong>: Latencia en tiempo real, duracion de juego y asignacion de recursos de red de un vistazo gracias a la Interfaz de Usuario.</li><li><strong>Conectividad Ultra</strong>: Puerto WAN de 2.5 Gbps y 8 puertos LAN Gigabit, 2 USB 3.0 Tipo A y Tipo C proporcionando una conectividad extensa.</li><li><strong>Procesador Potente</strong>: CPU Quad-Core 1.8 GHz y 3 coprocesadores aseguran una performance de la red a la maxima eficiencia.</li></ul>', 421.06, 3),
(37, 'TP-Link TL-SG105-M2 Switch 5 Puertos Gigabit', '<ul><li>5 puertos 10/100/1000Mbps que ofrecen grandes transferencias de archivos al instante.</li><li>Innovadora tecnologia de eficiencia energetica que reduce el consumo de energia hasta en un 75%.</li><li>Control de flujo IEEE 802.3x que proporciona transferencias de datos fiables.</li><li>Jumbo Frames de 16K que mejoran el rendimiento de las transferencias de datos de gran capacidad.</li><li>Supervision de red efectiva a traves de la duplicacion de puertos, prevenciÃ³n de bucles y diagnosticos de los cables.</li><li>QoS basado en etiquetas y puertos que permiten que el trafico sensible a la latencia sea muy ligero.</li><li>Las caracteristicas de VLAN mejoran la seguridad de la red a traves de la segmentaciÃ³n del trafico.</li><li>IGMP Snooping que optimiza las aplicaciones de multidifusion.</li><li>Administracion centralizada de todos los switches Easy Smart con la utilidad de configuracion Easy Smart.</li></ul>', 17.99, 5),
(38, 'TP-LINK TL-SG108 Switch 8 Puertos Gigabit 10/100/1000 Mbps MetÃ¡lico', '<ul><li>Innovadora tecnologia de eficiencia energetica que ahorra hasta un 72% de energia,</li><li>Soporta control de flujo IEEE 802.3x en modo Full-Duplex y Back-Pressure en modo Half-Duplex.</li><li>Chasis metalico diseÃ±ado para sobremesa o montaje en pared.</li><li>Soporta QoS (IEEE 802.1p).</li><li>Arquitectura de switching sin bloqueos para el reenvio y filtrado de paquetes a la maxima velocidad del cable para obtener un rendimiento optimo.</li><li>Las tramas Jumbo de 9K mejoran el rendimiento en grandes transferencias de datos.</li><li>La deteccion automatica MDI/MDIX hace innecesario el uso de cables cruzados.</li><li>Soporta aprendizaje y caducidad automaticas de direcciones MAC (Auto-Learning y Auto-Aging).</li><li>Integracion inteligente del hardware de 10 Mbps, 100 Mbps y 1000 Mbps gracias a la negociacion automatica de puertos.</li><li>Su diseÃ±o sin ventiladores garantiza un funcionamiento silencioso.</li><li>Instalacion sencilla Plug and Play.</li></ul>', 23.49, 5),
(39, 'TP-Link TL-SG116 Switch 16 Puertos Gigabit 10/100/1000 Mbps MetÃ¡lico No Administrado', '<ul><li>16 puertos RJ45 de 10/100/1000Mbps que admiten Auto-MDI / MDIX.</li><li>La tecnologia Green Ethernet ahorra consumo de energia.</li><li>El control de flujo IEEE 802.3x proporciona una transferencia de datos segura.</li><li>Carcasa de acero, sobremesa o pared.</li><li>Admite 802.1p / DSCP QoS y funcion de indagaciÃ³n IGMP.</li><li>Plug and play, sin necesidad de configuracion.</li></ul>', 69.97, 5),
(40, 'TP-Link 24-Port Gigabit Desktop/Rackmount Switch No administrado Gigabit Ethernet', '<ul><li>Cantidad de puertos basicos de conmutacion RJ-45 Ethernet: 24.</li><li>Puertos tipo basico de conmutacion RJ-45 Ethernet: Gigabit Ethernet (10/100/1000).</li><li>Gigabit Ethernet (cobre), cantidad de puertos: 24.</li><li>Conector electrico: Toma de entrada de CC.</li><li>Estandares de red: IEEE 802.3ab,IEEE 802.3u,IEEE 802.3x.</li><li>Tasas de transferencia soportadas: 10/100/1000 Mbps.</li></ul>', 104.99, 5),
(41, 'TP-Link TL-SX3016F Switch Administrado 16 Puertos 10GE SFP+ L2+', '<ul><li><strong>16 Ã— ranuras SFP+ de 10 GE completas:</strong>&nbsp;las ranuras SFP+ completas de 10 Gbps ultrarrapidas brindan conectividad de agregacion de ancho de banda alto y capacidad de conmutacion de 320 Gbps sin bloqueo.</li><li><strong>Abundantes funciones L2 y L2+:&nbsp;</strong>admite una linea completa de funciones L2 y L2+ que incluyen enrutamiento estatico, QoS de nivel empresarial, IGMP Snooping y mas.</li><li><strong>Estrategias de seguridad solidas:&nbsp;</strong>ayuda a proteger la inversion en el area LAN con enlace de puerto IP-MAC integrado, ACL, seguridad de puerto, autenticacion 802.1X y mas.</li><li><strong>Fuentes de alimentacion redundantes dobles:&nbsp;</strong>dos fuentes de alimentacion que se respaldan entre si lo convierten en una opciin ideal para una arquitectura de red confiable.</li><li><strong>Gestiin centralizada de la nube:&nbsp;</strong>se integra en Omada SDN para el acceso a la nube y la gestion remota.</li><li><strong>Administracion independiente:&nbsp;</strong>Web, CLI (puerto de consola, Telnet, SSH), SNMP, RMON e imagen dual brindan potentes capacidades de administracion.</li></ul>', 660.18, 5),
(42, 'TP-Link TL-PA7017 KIT PLC Powerline Red ElÃ©ctrica AV1000 Gigabit', '<ul><li><strong>HomePlug AV2 Standard</strong>: velocidades de transferencia de datos de alta velocidad de hasta 1000 Mbps, para&nbsp;todas tus necesidades en linea.</li><li><strong>Puerto Gigabit</strong>: proporciona redes cableadas seguras para ordenadores de escritorio, televisores inteligentes o consolas de juegos.</li><li><strong>Plug and play:</strong> permite la configuracion de tu powerline en minutos, para que puedas disfrutar de conexiones rapidas, sin cables e inalambricas al instante.</li><li><strong>Energia patentada:</strong> Modo de ahorro - reduce automaticamente el consumo de energia hasta un 85%.</li></ul>', 44, 6),
(44, 'TP-Link TL-WPA4221 KIT Kit Extensor Powerline WiFi AV600 300Mbps', '<ul><li><strong>El estandar HomePlug AV proporciona transmision de datos a alta velocidad hasta 600Mbps</strong>1&nbsp;sobre el cableado electrico existente en el hogar, ideal para streaming de vÃ­deo HD o 3D sin retardos y juegos en red.</li><li>E<strong>xtiende las conexiones inalambricas a 300Mbps</strong>&nbsp;a zonas previamente inaccesibles de su hogar y oficina.</li><li><strong>Super extension de cobertura pulsando un boton</strong>&nbsp;â€“ El boton de clonado Wi-Fi simplifica su configuraciÃ³n Wi-Fi y le ayuda a construir una red domestica unificada y sin cortes.</li><li><strong>Plug&amp;Play,</strong>&nbsp;sin configuracion requerida.</li></ul>', 66.75, 6),
(45, 'TP-Link TL-WPA7517 KIT PLC Powerline Red Electrica AV1000 + WiFi AC750 Con Puerto Gigabit', '<ul><li><strong>Cumple con el estandar Homeplug AV2:</strong>&nbsp;proporciona a los usuarios tasas de transferencia de datos estables y de alta velocidad de hasta 1000 Mbps en una longitud de linea de hasta 300 metros.</li><li><strong>Wi-Fi 802.11ac de doble banda:&nbsp;</strong>el Wi-Fi de doble banda AC750 (433 Mbps a 5 GHz y 300 Mbps a 2,4 GHz) permite la transmision, los juegos, el envio de correos electrinicos, la navegacion y la publicacion en sus dispositivos inalambricos en toda su casa.</li><li><strong>Sincronizacion automatica de Wi-Fi:</strong>&nbsp;simplemente copie la configuracion de Wi-Fi de su enrutador y aplique los cambios en la red electrica segura con Wi-Fi Clone y Wi-Fi Move.</li><li><strong>Puerto Gigabit Ethernet:</strong>&nbsp;proporciona conexiones por cable confiables de alta velocidad para consolas de juegos, televisores inteligentes y NAS.</li><li><strong>Plug, Pair and Play:&nbsp;</strong>configure rapidamente una red Powerline segura.</li></ul>', 75, 6),
(46, 'TP-Link TL-WPA7617 KIT PLC Powerline Red Electrica AV1000 + WiFi AC1200 Con Puerto Gigabit', '<ul><li><strong>Cumple con el estandar Homeplug AV2:&nbsp;</strong>proporciona a los usuarios velocidades de transferencia de datos estables y de alta velocidad de hasta 1000 Mbps en una longitud de linea de hasta 300 metros.</li><li><strong>Wi-Fi 802.11ac de doble banda:&nbsp;</strong>Wi-Fi de doble banda AC1200 (867 Mbps en 5 GHz y 300 Mbps en 2,4 GHz) permite hacer streaming, jugar, enviar correos electronicos, navegar y publicar en sus dispositivos inalambricos, en toda su casa.</li><li><strong>Sincronizacion automatica de Wi-Fi:&nbsp;</strong>simplemente copie la configuraciÃ³n de Wi-Fi de su enrutador y aplique cualquier cambio a traves de la red electrica segura con Wi-Fi Clone y Wi-Fi Move.</li><li><strong>Puerto Gigabit Ethernet:&nbsp;</strong>proporciona conexiones por cable confiables de alta velocidad para consolas de juegos, televisores inteligentes y NAS.</li><li><strong>Plug, Pair and Play:&nbsp;</strong>configure rapidamente una red Powerline segura.</li></ul>', 86.99, 6),
(47, 'TP-Link TL-WPA8631P KIT PLC Powerline Red Electrica AV1000 + WiFi AC1300 Puerto Gigabit con Enchufe', '<ul><li><strong>HomePlug AV2:&nbsp;</strong>Ofrece transferencias ultrarapidas de velocidad powerline de hasta 1300 Mbps.</li><li><strong>AC1200:</strong>&nbsp;Doble banda Wi-Fi con velocidades de hasta 867 Mbps en 5 GHz y 300 Mbps en 2.4 GHz.</li><li><strong>OneMeshTM:&nbsp;</strong>Funciona con tu router OneMeshTM para formar una red de malla unificada para una transmision fluida mientras te desplazas por tu hogar.</li><li><strong>2x2 MIMO:&nbsp;</strong>Establece multiples conexiones simultaneas para que disfrutes de velocidades powerline mas altas y con mayor estabilidad.</li><li><strong>Boton de clonado Wi-Fi:&nbsp;</strong>Copia automÃ¡ticamente el nombre de red (SSID) y contraseÃ±a de tu router principal simplemente pulsando un boton y se aplica a toda la red Powerline.</li><li><strong>Auto sincronizacion:&nbsp;</strong>AÃ±ade extensores adicionales a tu red powerline mediante el boton emparejar, sincronizacion uniforme de los ajustes para todos los dispositivos de red como por ejemplo SSID, contraseÃ±a, Programacion Wi-Fi y Programacion de LED.</li><li><strong>Plug and Play:&nbsp;</strong>Configura tu red electrica y comienza a disfrutar de conexiones rapidas e inalambricas en minutos.</li><li><strong>Enchufe de corriente extra:&nbsp;</strong>Podras a la vez alimentar otros dispositivos a traves del enchufe integrado.</li><li><strong>3 puertos Gigabit:&nbsp;</strong>Brinda redes cableadas seguras para ordenadores de escritorio, televisores inteligentes o consolas de juegos.</li></ul>', 120, 6),
(48, 'Yealink SIP-T30P Telefono VoIP BÃ¡sico PoE 1 Linea', '<ul><li>Voz HD de Yealink.</li><li>LCD grafico de 2.3\" y 132 x 64 pixeles.</li><li>Switch Ethernet 10/100M de dos puertos.</li><li>Soporta PoE.</li><li>Soporta codec Opus.</li><li>1 Cuentas SIP.</li><li>Conferencias locales de a 5.</li><li>Compatible con auriculares inalambricos EHS.</li><li>Firmware unificado.</li><li>Soporte YDMP/YMCS.</li><li>Soporte de mesa con 2 angulos ajustables..</li><li>Montable en pared.</li></ul>', 43.99, 8),
(49, 'Yealink SIP-T27G Telefono VoIP', '<ul><li>Yealink optima voz HD.</li><li>3,66\" grafica de 240x120 pixeles.</li><li>LCD con luz de fondo.</li><li>Hasta 6 cuentas SIP.</li><li>Papel de etiqueta de diseÃ±o libre.</li><li>Soporte PoE.</li><li>Auricular, apoyo EHS.</li><li>Soporte integrado con 2 angulos ajustables.</li><li>Montaje en pared (opcional).</li><li>Simple, flexible y seguro.</li><li>Opciones de establecimiento.</li></ul>', 93.99, 8),
(50, 'Yealink SIP-T53W Telefono VoIP Negro', '<ul><li>LCD grafico de 3.7\" y 360x160 pixeles con luz de fondo.</li><li>Pantalla LCD ajustable.</li><li>Bluetooth incorporado 4.2.</li><li>Wi-Fi incorporado de doble banda 2.4G / 5G (802.11a/b/g/n/ac).</li><li>Puerto USB 2.0 para grabacion USB, auriculares con cable / inalambricos USB y EXP50.</li><li>Hasta 12 cuentas VoIP.</li><li>Gigabit Ethernet de doble puerto.</li><li>Soporte PoE.</li><li>Auricular HAC.</li><li>DiseÃ±o de etiquetas sin papel.</li><li>Se puede instalar en la pared.</li></ul>', 154.98, 8),
(51, 'Yealink SIP-T54W Telefono IP Negro', '<ul><li>Color del producto: Negro</li><li>Tipo de auricular: Terminal con conexion por cable</li><li>Control de volumen: Botones</li><li>Montaje: Escritorio/pared</li><li>Iluminacion de teclado: Si</li><li>Voicemail integrado: Si</li><li>Intercambio de agenda: Si</li><li>DECT conectable: Si</li><li>Numero de telefonos inalambricos DECT: 4</li><li>Numero de teclas programables: 10</li><li>Modos de marcacion multifrecuencia de tono dual: En banda, Out-of band, InformaciÃ³n SIP</li></ul>', 198.98, 8),
(52, 'Yealink SIP-T57W Telefono VoIP Negro', '<ul><li>Pantalla LCD tactil capacitiva ajustable de 7\" y 800 x 480</li><li>Bluetooth incorporado 4.2</li><li>Wi-Fi incorporado de doble banda 2.4G / 5G (802.11a / b / g / n / ac)</li><li>Puerto USB 2.0 para grabacion USB, auriculares con cable / inalambricos USB y EXP50</li><li>Hasta 16 cuentas VoIP</li><li>Gigabit Ethernet de doble puerto</li><li>Soporte PoE</li><li>Auricular HAC</li><li>DiseÃ±o de etiquetas sin papel</li><li>Montable en la pared</li></ul>', 258.98, 8),
(53, 'GrandStream DP720 Telefono Inalambrico VoIP', '<ul><li>Compatible con la estacion base DECT DP750 de Grandstream.</li><li>5 telefonos DP720 son compatibles con cada DP750.</li><li>Admite un alcance de 300 metros en exteriores y 50 metros en interiores desde la estacion base DP750.</li><li>Admite hasta 10 cuentas SIP por telefono.</li><li>Audio Full HD tanto en el altavoz como en el auricular.</li><li>Conector para auriculares de 3.5 mm, conferencia de voz de 3 vias.</li><li>Las opciones de aprovisionamiento automatizado incluyen TR-069 y archivos de configuracion XML.</li><li>Autenticacion DECT y tecnologÃ­a de encriptacion para proteger llamadas y cuentas.</li></ul>', 64.73, 7),
(54, 'Yealink SIP-W52H Telefono VoIP DECT', '<ul><li>Varios modos de funcionamiento: Seleccione Telefono para recibir llamadas.</li><li>Localizador, Intercom, Respuesta automatica.</li><li>Llamada en espera, Transferencia de llamadas.</li><li>Pasar de un interlocutor.</li><li>3 vias de conferencia.</li><li>Llamada en espera, silencio, DND.</li><li>Pantalla del identificador de llamadas, rellamada.</li><li>Llamada anonima, rechazo de llamadas anonimas.</li><li>Desvio de llamadas (siempre / Ocupado / Sin respuesta).</li><li>Marcacion rapida, correo de voz.</li><li>Indicacion de mensaje en espera (MWI).</li></ul>', 118.13, 7),
(55, 'Yealink SIP-W60P Telefono VoIP', '<ul><li>2.4\'\' 240x320 pantalla a color con interfaz de facil uso.</li><li>Hasta 8 llamadas simultaneas.</li><li>Compatible con sincronizacion de hasta 8 handsets inalambricos.</li><li>Hasta 8 cuentas VoIP.</li><li>Hasta 30 horas en conversacion.</li><li>Hasta 400 horas en standby.</li><li>Carga rapida: 10min para 2h de conversacion.</li><li>TLS y SRTP.</li><li>Codecs: Opus, AMR-WB (opcional), G.722, PCMU, PCMA, G.726, G.729, iLBC.</li><li>Aprovisionamiento Zero Touch.</li><li>Reduccion de ruido.</li><li>Conexion al hadset via 3.5mm jack.</li></ul>', 195.93, 7),
(56, 'Prueba', '<ul><li>vasdva</li><li>sdvasdvasd</li><li>asdv</li></ul>', 23.23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `fechaNacimiento` varchar(50) NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(200) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `uid` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `password`, `telefono`, `fechaNacimiento`, `fechaAlta`, `foto`, `rol`, `uid`) VALUES
(10, 'Pedro', 'Castellanos', 'pedro@gmail.com', 'pedro', '$2y$10$tNNZlpneiI4Xd9Bbp0GkHeEzDf9KuPqrvH8nSydgejka6DGnc0bwK', '677741162', '2023-05-08', '2023-05-27 17:24:58', '615909ba698e7722f5fb8c6c5a518ecf.jpg', 'user', '05491adf4a6be3868240d561380f604f7496b553'),
(11, 'pepe', 'pepe', 'pepe@gmail.com', 'pepe', '$2y$10$dQW75I.ttuMRy6Bhx/.Ag.B1xrw1VdUn1wvX5gLdnVspsaxBvXxeG', '677741162', '2023-05-22', '2023-05-27 17:24:20', '0ec3d8206d455c95275286c22ebc4f54.jpg', 'user', 'd20ab3596113c57fd3919efcf6b2c1eb1dfa5fc4'),
(12, 'prueba', 'prueba', 'prueba@gmail.com', 'prueba', '$2y$10$tTRCzXY0un70S.cDtUtBtud1hlMuF5/w4VKhuhI9fJ2Ff81RiWf6S', '12345678', '2023-05-05', '2023-05-28 16:55:37', '7a1dd0df465734dd85189e3682755573.jpg', 'user', '015fb9de612cce6cd04a7d7675dc156dd2e93c85'),
(13, 'manolo', 'manolo', 'manolo@gmail.com', 'manolo', '$2y$10$HD6VsSGljq3fX2bc/ouL3uKfFk/uV8Qv49fdIgyRYLAG6mFWrTL2.', '12345678', '2023-05-03', '2023-05-28 16:56:08', '45277a7b4b0499f028c476633c00c388.jpg', 'user', '5a0f42141edb3534363e47a4007879746e4c7af6'),
(14, 'alonso', 'alonso', 'alonso@gmail.com', 'alonso', '$2y$10$q4XMyawAeKGYueabzFk25Oi9cuKZpzOgrhSe00jBzRysImNlFOT4K', '12345678', '2023-05-22', '2023-05-28 17:12:08', '4e6c01fedb9ef7ab9064abb01b738681.jpg', 'user', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idProductoCarrito`),
  ADD KEY `fk_idProductoCarrito` (`idProducto`),
  ADD KEY `fk_idUsuarioCarrito` (`idUsuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `fk_favProducto` (`idProducto`),
  ADD KEY `fk_favUsuario` (`idUsuario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idFoto`),
  ADD KEY `fk_fotoProducto` (`idProducto`);

--
-- Indices de la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD PRIMARY KEY (`idLineaPedido`),
  ADD KEY `fk_lineaPedidoProducto` (`idProducto`),
  ADD KEY `fk_lineaPedidoPedido` (`idPedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_idPedidoUsuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_categoriaProducto` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idProductoCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  MODIFY `idLineaPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_idProductoCarrito` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUsuarioCarrito` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_favProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotoProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD CONSTRAINT `fk_lineaPedidoPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lineaPedidoProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_idPedidoUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoriaProducto` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
