
CREATE TABLE `student` (
                           `id` int(11) NOT NULL,
                           `firtsName` varchar(255) NOT NULL,
                           `lastName` varchar(255) NOT NULL,
                           `email` varchar(255) NOT NULL,
                           `password` varchar(100) NOT NULL,
                           `status` tinyint(1) NOT NULL DEFAULT '1',
                           `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                           `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`id`, `firtsName`, `lastName`, `email`, `password`, `status`, `date_created`, `date_updated`) VALUES
    (1, 'Antonio', 'Razo', 'antonio@santafe.com', '$2y$10$HO01sZ7Gdnw9yR3c1aEZ6uXfEq0n2oCkeAPYbD6ONUUTXA1CadN46', 1, '2022-08-04 20:36:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `turn` enum('mornig','afternoon','night','') NOT NULL,
                            `status` tinyint(1) NOT NULL DEFAULT '1',
                            `credits` smallint(6) NOT NULL DEFAULT '5',
                            `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `turn`, `status`, `credits`, `date_created`, `date_updated`) VALUES
                                                                                                       (1, 'Lengua Extranjera I', 'mornig', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (2, 'Lengua Extranjera II', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (3, 'Álgebra Superior', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (4, 'Cálculo Diferencial', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (5, 'Programación II', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (6, 'Estructuras de Datos', 'mornig', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (7, 'Ingeniería de Software', 'night', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (8, 'Metodología de la Programación', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (9, 'Administración de Proyectos', 'mornig', 1, 5, '2022-08-04 20:42:02', NULL),
                                                                                                       (10, 'Ecuaciones Diferenciales', 'afternoon', 1, 5, '2022-08-04 20:42:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects_by_student`
--

CREATE TABLE `subjects_by_student` (
                                       `id` int(11) NOT NULL,
                                       `student_id` int(11) NOT NULL,
                                       `subject_id` int(11) NOT NULL,
                                       `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email_user` (`email`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_name_subject` (`name`);

--
-- Indices de la tabla `subjects_by_student`
--
ALTER TABLE `subjects_by_student`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_X_subject_by_student` (`student_id`),
  ADD KEY `fk_subject_X_subject_by_student` (`subject_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `subjects_by_student`
--
ALTER TABLE `subjects_by_student`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subjects_by_student`
--
ALTER TABLE `subjects_by_student`
    ADD CONSTRAINT `fk_student_X_subject_by_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `fk_subject_X_subject_by_student` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
