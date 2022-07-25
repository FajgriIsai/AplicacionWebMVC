CREATE DATABASE unir_csweb;

CREATE TABLE `estudiante` (
                        `id` int(11) NOT NULL,
                        `nombre` varchar(75) NOT NULL,
                        `apellido` text NOT NULL,
                        `nacionalidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `estudiante`
    ADD PRIMARY KEY (`id`);

CREATE TABLE `asignatura` (
                              `id` int(11) NOT NULL,
                              `codigo` varchar(75) NOT NULL,
                              `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `asignatura`
    ADD PRIMARY KEY (`id`);