-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 23:45:31
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senasoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `documento`, `nombre`, `direccion`, `email`, `telefono`, `created_at`, `updated_at`) VALUES
(1, '123456', 'FIRULAY ANDRES', 'calle 2 #34', 'firu@gmail.com', '3127890943', '2020-10-15 13:21:25', '2020-10-15 13:21:25'),
(2, '1234', 'WILFER', 'blasdelezo MC LT 7 2ETP', 'wilfer@hotmail.com', '2334', '2020-10-15 20:22:53', '2020-10-15 20:22:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_proveedores` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_proveedores`, `id_usuarios`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-10-15 07:24:54', '2020-10-15 07:24:54'),
(2, 1, 1, '2020-10-15 07:27:27', '2020-10-15 07:27:27'),
(3, 1, 1, '2020-10-15 07:47:19', '2020-10-15 07:47:19'),
(4, 1, 1, '2020-10-15 03:06:18', '2020-10-15 03:06:18'),
(5, 1, 1, '2020-10-15 03:06:34', '2020-10-15 03:06:34'),
(6, 1, 1, '2020-10-15 03:10:06', '2020-10-15 03:10:06'),
(7, 2, 1, '2020-10-15 12:50:14', '2020-10-15 12:50:14'),
(8, 2, 1, '2020-10-15 12:50:29', '2020-10-15 12:50:29'),
(9, 1, 1, '2020-10-15 21:29:11', '2020-10-15 21:29:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_de_compras`
--

CREATE TABLE `detalles_de_compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_compras` bigint(20) UNSIGNED NOT NULL,
  `id_productos` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_de_compras`
--

INSERT INTO `detalles_de_compras` (`id`, `cantidad`, `id_compras`, `id_productos`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 8, '2020-10-15 07:24:54', '2020-10-15 07:24:54'),
(2, 12, 2, 9, '2020-10-15 07:27:27', '2020-10-15 07:27:27'),
(3, 8, 3, 9, '2020-10-15 07:47:20', '2020-10-15 07:47:20'),
(4, 10, 4, 10, '2020-10-15 03:06:18', '2020-10-15 03:06:18'),
(5, 1, 5, 10, '2020-10-15 03:06:35', '2020-10-15 03:06:35'),
(6, 1, 6, 11, '2020-10-15 03:10:06', '2020-10-15 03:10:06'),
(7, 10, 7, 12, '2020-10-15 12:50:14', '2020-10-15 12:50:14'),
(8, 12, 8, 12, '2020-10-15 12:50:29', '2020-10-15 12:50:29'),
(9, 56, 9, 11, '2020-10-15 21:29:11', '2020-10-15 21:29:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_de_inventarios`
--

CREATE TABLE `detalles_de_inventarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_inventarios` bigint(20) UNSIGNED NOT NULL,
  `id_productos` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_de_inventarios`
--

INSERT INTO `detalles_de_inventarios` (`id`, `cantidad`, `id_inventarios`, `id_productos`, `created_at`, `updated_at`) VALUES
(4, 122, 5, 8, '2020-10-15 06:17:32', '2020-10-15 07:24:55'),
(5, 4, 6, 9, '2020-10-15 07:27:16', '2020-10-15 21:34:37'),
(6, 11, 7, 10, '2020-10-15 03:05:51', '2020-10-15 03:06:35'),
(7, 23, 8, 11, '2020-10-15 03:09:34', '2020-10-15 21:34:32'),
(8, 21, 9, 12, '2020-10-15 12:49:48', '2020-10-15 20:59:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_clientes` bigint(20) UNSIGNED NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `id_productos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_clientes`, `id_usuarios`, `id_productos`, `cantidad`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 11, 1, '2020-10-15 20:21:36', '2020-10-15 20:21:36'),
(10, 2, 1, 11, 1, '2020-10-15 20:39:47', '2020-10-15 20:39:47'),
(11, 2, 1, 11, 1, '2020-10-15 20:46:08', '2020-10-15 20:46:08'),
(12, 2, 1, 11, 1, '2020-10-15 20:46:32', '2020-10-15 20:46:32'),
(13, 2, 1, 9, 5, '2020-10-15 20:46:32', '2020-10-15 20:46:32'),
(14, 1, 1, 11, 11, '2020-10-15 20:58:43', '2020-10-15 20:58:43'),
(15, 2, 4, 11, 12, '2020-10-15 21:32:34', '2020-10-15 21:32:34'),
(16, 1, 4, 11, 11, '2020-10-15 21:34:50', '2020-10-15 21:34:50'),
(17, 1, 4, 9, 11, '2020-10-15 21:34:51', '2020-10-15 21:34:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_temporales`
--

CREATE TABLE `facturas_temporales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_productos` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `id_usuarios` bigint(20) UNSIGNED NOT NULL,
  `id_clientes` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sucursales` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id`, `id_sucursales`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-15 05:23:23', '2020-10-15 05:23:23'),
(2, 1, '2020-10-15 05:25:35', '2020-10-15 05:25:35'),
(3, 1, '2020-10-15 05:29:02', '2020-10-15 05:29:02'),
(4, 1, '2020-10-15 06:13:25', '2020-10-15 06:13:25'),
(5, 1, '2020-10-15 06:17:32', '2020-10-15 06:17:32'),
(6, 1, '2020-10-15 07:27:15', '2020-10-15 07:27:15'),
(7, 1, '2020-10-15 03:05:50', '2020-10-15 03:05:50'),
(8, 1, '2020-10-15 03:09:34', '2020-10-15 03:09:34'),
(9, 1, '2020-10-15 12:49:48', '2020-10-15 12:49:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2011_10_14_055228_create_sucursales_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2018_10_14_133356_create_proveedores_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_10_14_060424_create_productos_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2020_10_14_053225_create_sessions_table', 1),
(10, '2020_10_14_055900_create_clientes_table', 1),
(11, '2020_10_14_060158_create_facturas_table', 1),
(12, '2020_10_14_134439_create_compras_table', 1),
(13, '2020_10_14_135115_create_inventarios_table', 1),
(14, '2020_10_14_135940_create_facturas_temporales_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `iva` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedores` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `iva`, `id_proveedores`, `created_at`, `updated_at`) VALUES
(8, 'MANGO', 59595, '19', 1, '2020-10-15 06:17:32', '2020-10-15 06:17:32'),
(9, 'MAIZ', 1000, '19', 1, '2020-10-15 07:27:15', '2020-10-15 07:27:15'),
(10, 'PIÑA', 7000, '19', 1, '2020-10-15 03:05:50', '2020-10-15 03:05:50'),
(11, 'GALLETA', 111111, '19', 1, '2020-10-15 03:09:34', '2020-10-15 03:09:34'),
(12, 'MANDARINA FIRULINA', 59595, '19', 2, '2020-10-15 12:49:48', '2020-10-15 12:49:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `email`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'proveedor', 'blasdelezo MC LT 7 2ETP', 'proveedor@gmail.com', '3008024244', '2020-10-15 03:48:05', '2020-10-15 04:08:21'),
(2, 'Firulay Andres Guau Guau', 'calle 2 #34', 'firu@gmail.com', '3127890943', '2020-10-15 03:19:41', '2020-10-15 03:19:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', NULL, NULL),
(2, 'VENDEDOR', NULL, NULL),
(3, 'ALMACENADOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EFGmdO6X3G7Ub2BUkebRfbtYr0dkrzDcxeSGvXCT', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTkJzdFlGb1d5Sld2SzFjMU9ld1B6WTdyUkE1RUpMSGJyR0o0TUNTaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdmVudGEiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL24xaE9rR0l5VFI4NGJvSTQxcHQ1T2NoWUs5L2F5amhoejFvNGhKczVjNEEyc2hHU1lZSnUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJC9uMWhPa0dJeVRSODRib0k0MXB0NU9jaFlLOS9heWpoaHoxbzRoSnM1YzRBMnNoR1NZWUp1Ijt9', 1602797872);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'CARTAGENA', NULL, '2020-10-14 23:41:55'),
(2, 'BAYUNCA', NULL, NULL),
(3, 'SAN FERNANDO', '2020-10-15 01:07:23', '2020-10-15 01:07:23'),
(4, 'BOGOTA', '2020-10-15 21:28:22', '2020-10-15 21:28:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `id_sucursales` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_roles`, `id_sucursales`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin', 'admin@gamil.com', NULL, '$2y$10$TwOQL35hG6bbZiwxLRJzMeGIsOHEmPkSeaDWc7T6b1FUgCpg0aDPK', NULL, NULL, NULL, NULL, NULL, '2020-10-14 19:22:02', '2020-10-14 19:22:02'),
(3, 3, 2, 'Bodeguero', 'almacenador@gmail.com', NULL, '$2y$10$6wU1Ak2.mb59Uytj5l6r3urButENI8pRwsYVuHqswdYF0YqLAcieq', NULL, NULL, NULL, NULL, NULL, '2020-10-14 20:19:43', '2020-10-15 21:04:59'),
(4, 2, 2, 'vendedor', 'vendedor@gmail.com', NULL, '$2y$10$/n1hOkGIyTR84boI41pt5OchYK9/ayjhhz1o4hJs5c4A2shGSYYJu', NULL, NULL, NULL, NULL, NULL, '2020-10-15 21:03:38', '2020-10-15 21:03:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_id_proveedores_foreign` (`id_proveedores`),
  ADD KEY `compras_id_usuarios_foreign` (`id_usuarios`);

--
-- Indices de la tabla `detalles_de_compras`
--
ALTER TABLE `detalles_de_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_de_compras_id_compras_foreign` (`id_compras`),
  ADD KEY `detalles_de_compras_id_productos_foreign` (`id_productos`);

--
-- Indices de la tabla `detalles_de_inventarios`
--
ALTER TABLE `detalles_de_inventarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_de_inventarios_id_inventarios_foreign` (`id_inventarios`),
  ADD KEY `detalles_de_inventarios_id_productos_foreign` (`id_productos`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturas_id_clientes_foreign` (`id_clientes`),
  ADD KEY `facturas_id_usuarios_foreign` (`id_usuarios`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `facturas_temporales`
--
ALTER TABLE `facturas_temporales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturas_temporales_id_productos_foreign` (`id_productos`),
  ADD KEY `facturas_temporales_id_usuarios_foreign` (`id_usuarios`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id_proveedores_foreign` (`id_proveedores`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedores_email_unique` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_roles_foreign` (`id_roles`),
  ADD KEY `users_id_sucursales_foreign` (`id_sucursales`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalles_de_compras`
--
ALTER TABLE `detalles_de_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalles_de_inventarios`
--
ALTER TABLE `detalles_de_inventarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `facturas_temporales`
--
ALTER TABLE `facturas_temporales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_proveedores_foreign` FOREIGN KEY (`id_proveedores`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `compras_id_usuarios_foreign` FOREIGN KEY (`id_usuarios`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `detalles_de_compras`
--
ALTER TABLE `detalles_de_compras`
  ADD CONSTRAINT `detalles_de_compras_id_compras_foreign` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `detalles_de_compras_id_productos_foreign` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detalles_de_inventarios`
--
ALTER TABLE `detalles_de_inventarios`
  ADD CONSTRAINT `detalles_de_inventarios_id_inventarios_foreign` FOREIGN KEY (`id_inventarios`) REFERENCES `inventarios` (`id`),
  ADD CONSTRAINT `detalles_de_inventarios_id_productos_foreign` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_id_clientes_foreign` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `facturas_id_usuarios_foreign` FOREIGN KEY (`id_usuarios`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_id_proveedores_foreign` FOREIGN KEY (`id_proveedores`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_roles_foreign` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_id_sucursales_foreign` FOREIGN KEY (`id_sucursales`) REFERENCES `sucursales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
