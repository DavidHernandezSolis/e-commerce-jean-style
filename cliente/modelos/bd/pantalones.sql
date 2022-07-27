-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 03:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantalones`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Foto` longblob DEFAULT NULL,
  `Dirreccion` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `Nombre`, `Apellidos`, `Foto`, `Dirreccion`, `Contrasena`, `Telefono`) VALUES
(1, 'David', 'Hernandez Solis', NULL, 'Tecpaco, Calnali, Hidalgo', 'david_hernandez', '7713332903'),
(4, 'Rodrigo', 'Solis Hernandez', NULL, 'Calnali, Hidalgo', '000', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `ayuda`
--

CREATE TABLE `ayuda` (
  `idAyuda` int(11) NOT NULL,
  `Pregunta` varchar(400) DEFAULT NULL,
  `Respuesta` varchar(700) DEFAULT NULL,
  `Tipo_Ayuda` varchar(45) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idAdminirador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `Catidad` int(11) DEFAULT NULL,
  `PrecioTotal` float NOT NULL,
  `PrecioUno` float DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `Catidad`, `PrecioTotal`, `PrecioUno`, `idUsuario`, `idProducto`) VALUES
(3, 2, 600, 300, 1, 7),
(4, 1, 300, 300, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `Nombres` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `icono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `Nombres`, `Descripcion`, `icono`) VALUES
(1, 'Hombres', 'Categoria para pantalones de Hombre', 'vistas/imgAdmin/imgCategorias/hombres.png'),
(2, 'Mujeres', 'Categoria para pantalones de Mujer', 'vistas/imgAdmin/imgCategorias/mujeres.png'),
(5, 'Niñas', 'Categoria pantalones para Niñas', 'vistas/imgAdmin/imgCategorias/niña.png'),
(6, 'niños', 'Categoria de pantalones para niños', 'vistas/imgAdmin/imgCategorias/niño.png'),
(7, 'Sin genero', 'Categoria de pantalones para personas sin genero', 'vistas/imgAdmin/imgCategorias/sinGenero.png'),
(9, 'alex', 'alex', 'vistas/imgAdmin/imgCategorias/1_Q_rHKZ9B_VKD64hAds1QCQ.png'),
(10, 'yo', 'yo', 'vistas/imgAdmin/imgCategorias/61.png');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Testigo1` varchar(45) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `calle2` varchar(45) DEFAULT NULL,
  `Referencia` varchar(200) DEFAULT NULL,
  `foto` longblob DEFAULT NULL,
  `Telefono_Cliente` varchar(45) DEFAULT NULL,
  `Telefono_Testigo` varchar(45) DEFAULT NULL,
  `idUsuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compras_fisica`
--

CREATE TABLE `compras_fisica` (
  `idCompras_Fisica` int(11) NOT NULL,
  `Codigo_Venta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Administrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compras_online`
--

CREATE TABLE `compras_online` (
  `idCompras` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `Cliente` int(11) DEFAULT NULL,
  `idProductos` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fechas` text DEFAULT NULL,
  `Tipo_Pago` varchar(45) DEFAULT NULL,
  `Direccion` text NOT NULL,
  `Correo` text NOT NULL,
  `Verificacion` tinyint(4) DEFAULT NULL,
  `Cod_Veri_pago_entrega` varchar(45) DEFAULT NULL,
  `CondicionProceso` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compras_online`
--

INSERT INTO `compras_online` (`idCompras`, `usuarioId`, `Cliente`, `idProductos`, `Cantidad`, `Fechas`, `Tipo_Pago`, `Direccion`, `Correo`, `Verificacion`, `Cod_Veri_pago_entrega`, `CondicionProceso`) VALUES
(144, 12, NULL, 2, 1, '26-07-2020', 'PayPal', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'sb-ynxh82699406@personal.example.com', NULL, NULL, 0),
(145, 12, NULL, 2, 1, '26-07-2020', 'PayPal', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'sb-ynxh82699406@personal.example.com', NULL, NULL, 1),
(146, 6, NULL, 7, 2, '29-07-2020', 'PayPal', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'sb-ynxh82699406@personal.example.com', NULL, NULL, 0),
(147, 6, NULL, 27, 3, '29-07-2020', 'PayPal', 'Calle Juarez 1, Miguel Hidalgo, Ciudad de Mexico, 11580', 'sb-ynxh82699406@personal.example.com', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `com_fisica_new`
--

CREATE TABLE `com_fisica_new` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(40) NOT NULL,
  `Marca` varchar(40) NOT NULL,
  `Categoría` varchar(40) NOT NULL,
  `Talla` varchar(40) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `PrecioTotal` int(11) NOT NULL,
  `PrecioProveedor` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_fisica_new`
--

INSERT INTO `com_fisica_new` (`id`, `Titulo`, `Marca`, `Categoría`, `Talla`, `Cantidad`, `Precio`, `PrecioTotal`, `PrecioProveedor`, `fecha`) VALUES
(108, '9', 'holis', 'Mujeres', 'Pequeño', 1, 120, 120, 90, '27-07-20'),
(109, 'pantalón negro dama 02', ' Lee', 'Mujeres', '', 2, 400, 800, 0, '27-07-20'),
(111, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 0, '27-07-20'),
(113, 'pantalón negro dama 02', ' Lee', 'Mujeres', '', 1, 400, 400, 0, '27-07-20'),
(114, 'pantalón negro dama 02', ' Lee', 'Mujeres', '', 1, 400, 400, 0, '27-07-20'),
(115, 'Pantalón para dama hh 03', ' Lee', 'Mujeres', 'Mediano', 1, 350, 350, 0, '28-07-20'),
(116, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(117, 'Pantalón para dama hh 03', ' Lee', 'Mujeres', 'Mediano', 1, 350, 350, 0, '29-07-20'),
(120, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 5, 370, 1850, 300, '29-07-20'),
(121, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(122, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(123, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(124, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(125, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(126, 'Pantalón para dama 01', 'Levi\'s', 'Mujeres', 'Mediano', 1, 370, 370, 300, '29-07-20'),
(127, 'pantalón negro dama 02', ' Lee', 'Mujeres', '', 2, 400, 800, 0, '29-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Proveedor` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `icono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`idMarca`, `Nombre`, `Proveedor`, `Descripcion`, `icono`) VALUES
(1, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/levis.jpg'),
(2, ' Lee', 'Lider Jeans', 'Presente en las vidas de las pequeñas', 'vistas/imgAdmin/imgMarcas/lee.png'),
(3, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/levis.jpg'),
(4, ' Lee', 'Lider Jeans', 'Presente en las vidas de las pequeñas', 'vistas/imgAdmin/imgMarcas/levis.jpg'),
(5, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/lee.png'),
(6, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/lee.png'),
(7, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/lee.png'),
(8, 'Levi\'s', 'Codisar', 'Los originales , los de siempre', 'vistas/imgAdmin/imgMarcas/levis.jpg'),
(9, 'alexJ', 'alexJ', 'alexJ', 'vistas/imgAdmin/imgAdministrador/lacocinadeelisa-1-1024x589.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `No_Codigo` varchar(45) DEFAULT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `PrecioProveedor` float NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Talla` varchar(100) NOT NULL,
  `Oferta` float DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `FotoFrontal` text DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idCategorias` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Nuevo` int(1) NOT NULL DEFAULT 1,
  `FotoLateral` text NOT NULL,
  `FotoTrasera` text NOT NULL,
  `Publicidad` tinyint(1) NOT NULL,
  `PublicidadBaner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idProductos`, `No_Codigo`, `Titulo`, `Precio`, `PrecioProveedor`, `Cantidad`, `Color`, `Talla`, `Oferta`, `Descripcion`, `FotoFrontal`, `idMarca`, `idCategorias`, `Fecha`, `Nuevo`, `FotoLateral`, `FotoTrasera`, `Publicidad`, `PublicidadBaner`) VALUES
(1, '01019', 'Pantalón para dama 01', 370, 300, 3, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(2, '0102', 'pantalón negro dama 02', 400, 10, 0, 'negro', '', 0, 'Pantalón negro para dama -Hombres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(3, '0101', 'Pantalón para dama hh 03', 350, 0, 2, 'azul', 'Mediano', 0, 'pantalon para dama-Niñas', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(4, '0102', 'pantalón negro dama 05', 400, 0, 10, 'negro', '', 0, 'Pantalón negro para dama - Niños', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(5, '01013', 'Pantalón para dama', 350, 0, 8, 'azul', '', 0, 'pantalon para dama-Sin genero', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(6, '0102', 'pantalón negro dama 06', 400, 0, 2, 'negro', '', 0, 'Pantalón negro para dama ', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(7, '0101', 'Pantalón para dama', 350, 0, 7, 'azul', '', 300, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(8, '0102', 'pantalón negro dama', 400, 0, 2, 'negro', '', 0, 'Pantalón negro para dama ', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(9, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(11, '0101', 'Pantalón para dama', 350, 0, 3, 'azul', '', 300, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(13, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(14, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(15, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(16, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(17, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(18, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(19, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(20, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 0, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(22, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', 'Grande', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(23, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', 'Mediano', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(24, '0101', 'Pantalón para dama', 350, 0, 1, 'azul', 'Grande', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(25, '0101', 'Pantalón para dama', 350, 0, 2, 'azul', 'chico', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(26, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(27, '0101', 'Pantalón para dama', 350, 0, 3, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 1),
(28, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 1),
(29, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 1),
(30, '0102', 'pantalón negro dama', 400, 0, 2, 'negro', '', 0, 'Pantalón negro para dama ', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(31, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(32, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(33, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(34, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(35, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(36, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(37, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(38, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(39, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(40, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(41, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(42, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(43, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(44, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(45, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(46, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(47, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(48, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(49, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(50, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(51, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(52, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(53, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(54, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(55, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(56, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(57, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(58, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(59, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(60, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(61, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(62, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(63, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(64, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(65, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(66, '0101', 'Pantalón para dama', 350, 0, -8, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(67, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(68, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(69, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(70, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(71, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(72, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(73, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(74, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(75, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 0),
(76, '0101', 'Pantalón para dama', 350, 0, 4, 'azul', '', 325, 'pantalon para dama', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 0),
(77, '0101', 'Pantalón para dama 01', 370, 0, 5, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(78, '0101', 'Pantalón para dama 01', 370, 0, 5, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(79, '0102', 'pantalón negro dama 02', 400, 0, 4, 'negro', '', 0, 'Pantalón negro para dama -Hombres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(80, '0101', 'Pantalón para dama 01', 370, 0, 5, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(81, '0102', 'pantalón negro dama 02', 400, 0, 4, 'negro', '', 0, 'Pantalón negro para dama -Hombres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(82, '0101', 'Pantalón para dama hh 03', 350, 0, 4, 'azul', 'Mediano', 0, 'pantalon para dama-Niñas', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(83, '0102', 'pantalón negro dama 05', 400, 0, 10, 'negro', '', 0, 'Pantalón negro para dama - Niños', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(84, '01013', 'Pantalón para dama', 350, 0, 8, 'azul', '', 0, 'pantalon para dama-Sin genero', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(85, '0101', 'Pantalón para dama 01', 370, 0, 5, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(86, '0102', 'pantalón negro dama 02', 400, 0, 4, 'negro', '', 0, 'Pantalón negro para dama -Hombres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(87, '0101', 'Pantalón para dama hh 03', 350, 0, 4, 'azul', 'Mediano', 0, 'pantalon para dama-Niñas', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(88, '0102', 'pantalón negro dama 05', 400, 0, 10, 'negro', '', 0, 'Pantalón negro para dama - Niños', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(89, '01013', 'Pantalón para dama', 350, 0, 8, 'azul', '', 0, 'pantalon para dama-Sin genero', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(90, '0101', 'Pantalón para dama 01', 370, 0, 5, 'azul', 'Mediano', 300, 'pantalon para dama-Mujeres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon4.jpg', 1, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(91, '0102', 'pantalón negro dama 02', 400, 0, 4, 'negro', '', 0, 'Pantalón negro para dama -Hombres', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 0, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(92, '0101', 'Pantalón para dama hh 03', 350, 0, 4, 'azul', 'Mediano', 0, 'pantalon para dama-Niñas', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(93, '0102', 'pantalón negro dama 05', 400, 0, 10, 'negro', '', 0, 'Pantalón negro para dama - Niños', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 2, 5, '2020-07-14', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(94, '01013', 'Pantalón para dama', 350, 0, 8, 'azul', '', 0, 'pantalon para dama-Sin genero', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 1, 2, NULL, 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon5.jpg', 'vistas/imgAdmin/imgAdministrador/imgPantalones/pantalon6.jpg', 0, 0),
(95, '1', 'pantalon alex', 350, 280, 30, 'rohjo', 'PequeÃ±o', 0, 'pantalon xxxx', 'vistas/imgAdmin/imgAdministrador/imgPantalones/61.png', 9, 1, '2020-07-28', 1, 'vistas/imgAdmin/imgAdministrador/imgPantalones/1_yAgpZTxbHK87_DkyzEOsMg.png', 'vistas/imgAdmin/imgAdministrador/imgPantalones/1_Q_rHKZ9B_VKD64hAds1QCQ.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productos_has_talla`
--

CREATE TABLE `productos_has_talla` (
  `Productos_idProductos` int(11) NOT NULL,
  `Talla_idTalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productos_has_tipo`
--

CREATE TABLE `productos_has_tipo` (
  `Productos_idProductos` int(11) NOT NULL,
  `Tipo_idTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `idSlide` int(20) NOT NULL,
  `titulo` text NOT NULL,
  `precio` float NOT NULL,
  `texto` varchar(300) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`idSlide`, `titulo`, `precio`, `texto`, `foto`) VALUES
(1, 'Pantalón mezclilla azul para dama', 350, 'Pantalon mezclilla azul para dama ajustable a cualquier cuerpo.', 'vistas/imgAdmin/imgAdministrador/sliderYpublicidad/pantalon4.jpg'),
(2, 'Pantalón negro para dama', 325, 'Pantalón negro para dama ', 'vistas/imgAdmin/imgAdministrador/sliderYpublicidad/pantalon5.jpg'),
(3, 'Pantalón cafe', 325, 'Pantalón cafe para dama ', 'vistas/imgAdmin/imgAdministrador/sliderYpublicidad/pantalon6.jpg'),
(4, 'Pantalón negro dama', 400, 'Pantalón negro para dama que se ajusta para todos los tipos de cuerpo, únicos en su modelo.', 'vistas/imgAdmin/imgAdministrador/sliderYpublicidad/pantalon8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `talla`
--

CREATE TABLE `talla` (
  `idTalla` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Correo` text NOT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Usuariocol` varchar(45) DEFAULT NULL,
  `id_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `Apellido`, `Correo`, `Contrasena`, `Domicilio`, `Colonia`, `Calle`, `Telefono`, `Usuariocol`, `id_Cliente`) VALUES
(1, 'Gerardo', ' Hernandez', 'eh889819@gmail.com', 'Emanuel/1999#', 'Tecpaco', 'Tecpaco', 'Tlachiquilt', '7713332003', NULL, NULL),
(2, 'Armando', 'Montiel Perez', '', 'Armando123', 'Lopez, Zacualtipan', 'Lopez', 'Nose', '7722334456', 'armandito', NULL),
(3, 'Jaquelin', 'Soriano', '', 'sori123', 'Zacualtipan', 'Lopez', 'Nose', '8811223344', 'jaquiSol', NULL),
(4, 'Armando', 'Montiel Perez', '', 'Armando123', 'Lopez, Zacualtipan', 'Lopez', 'Nose', '7722334456', 'armandito', NULL),
(6, 'David', 'Hernandez Solis', 'david@gmail.com', 'david.1999', 'Zacualtipán', 'Rio chikito', 's/n', '7712332904', NULL, NULL),
(7, 'a', 'a', 'a@gmal.com', 'a', 'Zacualtipán', 'a', 'a', '3456687', NULL, NULL),
(8, 'jhj', 'jhj', 'jhjj@gmail', '12', 'Zacualtipán', 'uyuyu', 'yuyuy', '45454454', NULL, NULL),
(9, 'qw', 'qw', 'qw@gmail.com', 'qw', 'Zacualtipán', 'qw', 'qw', '121212', NULL, NULL),
(10, 'ooo', 'ooo', 'ooo@gmail.com', 'oo', 'Zacualtipán', 'oo', 'oo', '00', NULL, NULL),
(11, 'davis', 'davis', 'davis@gmail.com', 'davis', 'Zacualtipán', 'david', 'davis', '123456', NULL, NULL),
(12, 'GERARDO', 'HDEZ', 'eh889819@gmail.com', 'ema', 'Zacualtipan', 'ema', 's/n', '7712', NULL, NULL),
(13, 'yooo', 'yooo', 'yooo@gmail.com', 'yooo', 'Zacualtipán', 'yooo', 'yooo', '86767676', NULL, NULL),
(14, 'David', 'Hernadez Solis', '18389@utsh.edu.mx', 'David', 'Zacualtipán', 'nose', 'nose', '7766554433', 'David', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventalocal`
--

CREATE TABLE `ventalocal` (
  `idVenta` int(11) NOT NULL,
  `Titulo` varchar(60) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `talla` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `PrecioProveedor` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indexes for table `ayuda`
--
ALTER TABLE `ayuda`
  ADD PRIMARY KEY (`idAyuda`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAdministrador` (`idAdminirador`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `idUsuario1` (`idUsuario`),
  ADD KEY `idProducto2` (`idProducto`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idUsuario3` (`idUsuarios`);

--
-- Indexes for table `compras_fisica`
--
ALTER TABLE `compras_fisica`
  ADD PRIMARY KEY (`idCompras_Fisica`),
  ADD KEY `idAdministrador1` (`Administrador`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indexes for table `compras_online`
--
ALTER TABLE `compras_online`
  ADD PRIMARY KEY (`idCompras`),
  ADD KEY `idCliente` (`Cliente`),
  ADD KEY `idProductos` (`idProductos`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indexes for table `com_fisica_new`
--
ALTER TABLE `com_fisica_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idCategorias` (`idCategorias`);

--
-- Indexes for table `productos_has_talla`
--
ALTER TABLE `productos_has_talla`
  ADD PRIMARY KEY (`Productos_idProductos`,`Talla_idTalla`),
  ADD KEY `fk_Productos_has_Talla_Talla1` (`Talla_idTalla`);

--
-- Indexes for table `productos_has_tipo`
--
ALTER TABLE `productos_has_tipo`
  ADD PRIMARY KEY (`Productos_idProductos`,`Tipo_idTipo`),
  ADD KEY `fk_Productos_has_Tipo_Tipo1` (`Tipo_idTipo`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idSlide`);

--
-- Indexes for table `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idTalla`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- Indexes for table `ventalocal`
--
ALTER TABLE `ventalocal`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ayuda`
--
ALTER TABLE `ayuda`
  MODIFY `idAyuda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras_fisica`
--
ALTER TABLE `compras_fisica`
  MODIFY `idCompras_Fisica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras_online`
--
ALTER TABLE `compras_online`
  MODIFY `idCompras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `com_fisica_new`
--
ALTER TABLE `com_fisica_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `idSlide` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `talla`
--
ALTER TABLE `talla`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ventalocal`
--
ALTER TABLE `ventalocal`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ayuda`
--
ALTER TABLE `ayuda`
  ADD CONSTRAINT `idAdministrador` FOREIGN KEY (`idAdminirador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `idProducto2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idUsuario3` FOREIGN KEY (`idUsuarios`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras_fisica`
--
ALTER TABLE `compras_fisica`
  ADD CONSTRAINT `compras_fisica_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`),
  ADD CONSTRAINT `idAdministrador1` FOREIGN KEY (`Administrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras_online`
--
ALTER TABLE `compras_online`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idProductos` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarioId` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `idCategorias` FOREIGN KEY (`idCategorias`) REFERENCES `categorias` (`idCategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idMarca` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos_has_talla`
--
ALTER TABLE `productos_has_talla`
  ADD CONSTRAINT `fk_Productos_has_Talla_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Talla_Talla1` FOREIGN KEY (`Talla_idTalla`) REFERENCES `talla` (`idTalla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos_has_tipo`
--
ALTER TABLE `productos_has_tipo`
  ADD CONSTRAINT `fk_Productos_has_Tipo_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Tipo_Tipo1` FOREIGN KEY (`Tipo_idTipo`) REFERENCES `tipo` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
