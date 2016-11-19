-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2016 a las 13:56:45
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emasued_gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cohortes`
--

CREATE TABLE `cohortes` (
  `id` int(11) NOT NULL,
  `Instituciones_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores`
--

CREATE TABLE `coordinadores` (
  `id` int(11) NOT NULL,
  `Docentes_id` int(11) NOT NULL,
  `Instituciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `num_cuenta` varchar(45) DEFAULT NULL,
  `tipo_cuenta` varchar(45) DEFAULT NULL,
  `banco_cuenta` varchar(45) DEFAULT NULL,
  `documento_rut` int(11) DEFAULT NULL,
  `Personas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `fecha_ingreso` varchar(45) DEFAULT NULL,
  `Cohortes_id` int(11) NOT NULL,
  `Personas_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_trabajos_grado`
--

CREATE TABLE `estudiantes_trabajos_grado` (
  `Estudiantes_id` int(11) NOT NULL,
  `Trabajos_grado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `Municipios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(45) NOT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fecha_nacimiento` varchar(45) DEFAULT NULL,
  `num_identificacion` varchar(45) DEFAULT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `num_contacto` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `lugar_residencia` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE `revisiones` (
  `id` int(11) NOT NULL,
  `nota_cuantitativa` int(11) DEFAULT NULL,
  `descripcion_avance` varchar(255) DEFAULT NULL,
  `Docentes_id` int(11) NOT NULL,
  `Trabajos_grado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_grado`
--

CREATE TABLE `trabajos_grado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `palabras_clave` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_publicacion` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `grupo_investigacion` varchar(45) DEFAULT NULL,
  `director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_grado_documentos`
--

CREATE TABLE `trabajos_grado_documentos` (
  `Trabajos_grado_id` int(11) NOT NULL,
  `Documentos_id` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `Personas_id` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `Roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cohortes`
--
ALTER TABLE `cohortes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cohortes_Instituciones1_idx` (`Instituciones_id`);

--
-- Indices de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Coordinadores_Docentes1_idx` (`Docentes_id`),
  ADD KEY `fk_Coordinadores_Instituciones1_idx` (`Instituciones_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Docentes_Documentos1_idx` (`documento_rut`),
  ADD KEY `fk_Docentes_Personas1_idx` (`Personas_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Estudiantes_Cohortes1_idx` (`Cohortes_id`),
  ADD KEY `fk_Estudiantes_Personas1_idx` (`Personas_id`);

--
-- Indices de la tabla `estudiantes_trabajos_grado`
--
ALTER TABLE `estudiantes_trabajos_grado`
  ADD PRIMARY KEY (`Estudiantes_id`,`Trabajos_grado_id`),
  ADD UNIQUE KEY `Estudiantes_id_UNIQUE` (`Estudiantes_id`),
  ADD KEY `fk_Estudiantes_has_Trabajos_grado_Trabajos_grado1_idx` (`Trabajos_grado_id`),
  ADD KEY `fk_Estudiantes_has_Trabajos_grado_Estudiantes1_idx` (`Estudiantes_id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Instituciones_Municipios_idx` (`Municipios_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Personas_Municipios1_idx` (`lugar_residencia`);

--
-- Indices de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Revisiones_Docentes1_idx` (`Docentes_id`),
  ADD KEY `fk_Revisiones_Trabajos_grado1_idx` (`Trabajos_grado_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos_grado`
--
ALTER TABLE `trabajos_grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Trabajos_grado_Docentes1_idx` (`director`);

--
-- Indices de la tabla `trabajos_grado_documentos`
--
ALTER TABLE `trabajos_grado_documentos`
  ADD PRIMARY KEY (`Trabajos_grado_id`,`Documentos_id`),
  ADD UNIQUE KEY `Documentos_id_UNIQUE` (`Documentos_id`),
  ADD KEY `fk_Trabajos_grado_has_Documentos_Documentos1_idx` (`Documentos_id`),
  ADD KEY `fk_Trabajos_grado_has_Documentos_Trabajos_grado1_idx` (`Trabajos_grado_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Usuarios_Personas1_idx` (`Personas_id`),
  ADD KEY `fk_Usuarios_Roles1_idx` (`Roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cohortes`
--
ALTER TABLE `cohortes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `trabajos_grado`
--
ALTER TABLE `trabajos_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cohortes`
--
ALTER TABLE `cohortes`
  ADD CONSTRAINT `fk_Cohortes_Instituciones1` FOREIGN KEY (`Instituciones_id`) REFERENCES `instituciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD CONSTRAINT `fk_Coordinadores_Docentes1` FOREIGN KEY (`Docentes_id`) REFERENCES `docentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Coordinadores_Instituciones1` FOREIGN KEY (`Instituciones_id`) REFERENCES `instituciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `fk_Docentes_Documentos1` FOREIGN KEY (`documento_rut`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Docentes_Personas1` FOREIGN KEY (`Personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estudiantes_Cohortes1` FOREIGN KEY (`Cohortes_id`) REFERENCES `cohortes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_Personas1` FOREIGN KEY (`Personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes_trabajos_grado`
--
ALTER TABLE `estudiantes_trabajos_grado`
  ADD CONSTRAINT `fk_Estudiantes_has_Trabajos_grado_Estudiantes1` FOREIGN KEY (`Estudiantes_id`) REFERENCES `estudiantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_has_Trabajos_grado_Trabajos_grado1` FOREIGN KEY (`Trabajos_grado_id`) REFERENCES `trabajos_grado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD CONSTRAINT `fk_Instituciones_Municipios` FOREIGN KEY (`Municipios_id`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_Personas_Municipios1` FOREIGN KEY (`lugar_residencia`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `fk_Revisiones_Docentes1` FOREIGN KEY (`Docentes_id`) REFERENCES `docentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Revisiones_Trabajos_grado1` FOREIGN KEY (`Trabajos_grado_id`) REFERENCES `trabajos_grado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajos_grado`
--
ALTER TABLE `trabajos_grado`
  ADD CONSTRAINT `fk_Trabajos_grado_Docentes1` FOREIGN KEY (`director`) REFERENCES `docentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajos_grado_documentos`
--
ALTER TABLE `trabajos_grado_documentos`
  ADD CONSTRAINT `fk_Trabajos_grado_has_Documentos_Documentos1` FOREIGN KEY (`Documentos_id`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Trabajos_grado_has_Documentos_Trabajos_grado1` FOREIGN KEY (`Trabajos_grado_id`) REFERENCES `trabajos_grado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Personas1` FOREIGN KEY (`Personas_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_Roles1` FOREIGN KEY (`Roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
