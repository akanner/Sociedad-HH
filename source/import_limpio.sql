-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2015 a las 20:12:07
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sociedad_hh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `questionnaire_respondent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `address`, `questionnaire_respondent_id`, `created_at`, `updated_at`) VALUES
(1, 'kleingra@speedy.com.ar', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(2, 'britinez@yahoo.com.ar', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(3, 'sandraargello@hotmail.com', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(4, 'celinavila@yahoo.com.ar', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(5, 'aznaraquino@hotmail.com', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(6, 'mercedesbol@hotmail.com', NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33'),
(7, 'bunzelsu@hotmail.com', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(8, 'amcatt@intramed.net', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(9, 'martin_ciappa@yahoo.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(10, 'a.cicchetti@hotmail.com', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(11, 'alcosmil@hotmail.com', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(12, 'fladamiani@hotmail.com', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(13, 'nestor.degaetano@speedy.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(14, 'dsandro@speedy.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(15, 'noraduy@hotmail.com', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(16, 'noraduy@fibertel.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(17, 'enrico@netverk.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(18, 'patriciagfazio@yahoo.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(19, 'rifernan@infovia.com.ar', NULL, '2015-10-17 21:10:34', '2015-10-17 21:10:34'),
(20, 'sandraformisano@yahoo.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(21, 'gggagliardino@ciudad.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(22, 'bramirezborga@yahoo.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(23, 'martagelemur@hotmail.com', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(24, 'farinaoh@netverk.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(25, 'giljuliet@gmail.com', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(26, 'sgrasso@lpsat.net', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(27, 'sebastianisnardi@yahoo.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(28, 'ojakus@ciudad.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(29, 'rcjau@hotmail.com', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(30, 'kleingra@speedy.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(31, 'gmarin@netverk.com.ar', NULL, '2015-10-17 21:10:35', '2015-10-17 21:10:35'),
(32, 'msmatano@yahoo.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(33, 'milonejh@netverk.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(34, 'orlando@way.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(35, 'elsabpalomino@yahoo.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(36, 'claudiaparodi05@hotmail.com', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(37, 'marielana@ciudad.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(38, 'carlopon@fibertel.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(39, 'mvprates@hotmail.com', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(40, 'oaromano57@gmail.com', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(41, 'garosiere@fibertel.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(42, 'sandrar_hemato@hotmail.com', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(43, 'sabasilvia@speedy.com.ar', NULL, '2015-10-17 21:10:36', '2015-10-17 21:10:36'),
(44, 'dianascebba@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(45, 'mfschifini@yahoo.com.ar', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(46, 'schutten@netverk.com.ar', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(47, 'gladystebaldi@yahoo.com.ar', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(48, 'marcelatittarelli@yahoo.com.ar', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(49, 'vidaosca@ciudad.com.ar', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(50, 'sebastianyantorno@gmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(51, 'sabasilvia@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(52, 'solecruset@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(53, 'julietadalmaroni@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(54, 'mariacecidacun@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(55, 'citometriacucaiba@gmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(56, 'drabunzel@yahoo.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(57, 'hematologiahospitalrossi@hotmail.com', NULL, '2015-10-17 21:10:37', '2015-10-17 21:10:37'),
(58, 'biolmol_ludovica@hotmail.com', NULL, '2015-10-17 21:10:38', '2015-10-17 21:10:38'),
(59, 'sebastianisnardi@hotmail.com', NULL, '2015-10-17 21:10:38', '2015-10-17 21:10:38'),
(60, 'spplatensehh@gmail.com', NULL, '2015-10-17 21:10:38', '2015-10-17 21:10:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_06_20_233413_create_questionnaires_table', 1),
('2015_06_24_040615_create_questions_table', 1),
('2015_06_24_040616_create_multiple_selection_subquestions_table', 1),
('2015_06_24_040617_create_multiple_selection_options_table', 1),
('2015_06_25_181926_create_multiple_choice_options_table', 1),
('2015_06_26_022102_create_questionnaires_respondents_table', 1),
('2015_06_26_212611_create_user_answers_table', 1),
('2015_06_27_025043_create_emails_table', 1),
('2015_07_19_032708_create_pictures_table', 1),
('2015_10_01_035406_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multiple_choice_options`
--

CREATE TABLE IF NOT EXISTS `multiple_choice_options` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_other_option` tinyint(1) NOT NULL DEFAULT '0',
  `correct_answer` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `multiple_choice_options`
--

INSERT INTO `multiple_choice_options` (`id`, `description`, `is_other_option`, `correct_answer`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'Leucemia', 0, 0, 1, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(2, 'Linfoma', 0, 0, 1, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(3, 'Mieloma Múltiple', 0, 0, 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(4, 'Enfermedad de Gaucher', 0, 0, 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(5, 'Leucemia Granulocítica Crónica', 0, 0, 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(6, 'Desórdenes de Sangrado', 0, 0, 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(7, 'Otra', 1, 0, 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(8, 'Mieloma Múltiple', 0, 0, 4, '2015-10-17 21:10:31', '2015-10-17 21:10:31'),
(9, 'Enfermedad de Gaucher', 0, 0, 4, '2015-10-17 21:10:31', '2015-10-17 21:10:31'),
(10, 'Leucemia Granulocítica Crónica', 0, 0, 4, '2015-10-17 21:10:31', '2015-10-17 21:10:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multiple_selection_options`
--

CREATE TABLE IF NOT EXISTS `multiple_selection_options` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subquestion_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `multiple_selection_options`
--

INSERT INTO `multiple_selection_options` (`id`, `description`, `subquestion_id`, `created_at`, `updated_at`) VALUES
(1, 'Leucemia aguda', 1, '2015-10-17 21:10:21', '2015-10-17 21:10:21'),
(2, 'Mieloma múltiple', 1, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(3, 'Enfermedad de Gaucher', 1, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(4, 'Leucemia aguda', 2, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(5, 'Mieloma múltiple', 2, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(6, 'Enfermedad de Gaucher', 2, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(7, 'Leucemia aguda', 3, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(8, 'Mieloma múltiple', 3, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(9, 'Enfermedad de Gaucher', 3, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(10, 'Leucemia aguda', 4, '2015-10-17 21:10:22', '2015-10-17 21:10:22'),
(11, 'Mieloma múltiple', 4, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(12, 'Enfermedad de Gaucher', 4, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(13, 'Leucemia aguda', 5, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(14, 'Mieloma múltiple', 5, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(15, 'Enfermedad de Gaucher', 5, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(16, 'Leucemia aguda', 6, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(17, 'Mieloma múltiple', 6, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(18, 'Enfermedad de Gaucher', 6, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(19, 'Leucemia aguda', 7, '2015-10-17 21:10:23', '2015-10-17 21:10:23'),
(20, 'Mieloma múltiple', 7, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(21, 'Enfermedad de Gaucher', 7, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(22, 'Leucemia aguda', 8, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(23, 'Mieloma múltiple', 8, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(24, 'Enfermedad de Gaucher', 8, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(25, 'Leucemia aguda', 9, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(26, 'Mieloma múltiple', 9, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(27, 'Enfermedad de Gaucher', 9, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(28, 'Leucemia aguda', 10, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(29, 'Mieloma múltiple', 10, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(30, 'Enfermedad de Gaucher', 10, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(31, 'Leucemia aguda', 11, '2015-10-17 21:10:24', '2015-10-17 21:10:24'),
(32, 'Mieloma múltiple', 11, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(33, 'Enfermedad de Gaucher', 11, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(34, 'Leucemia aguda', 12, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(35, 'Mieloma múltiple', 12, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(36, 'Enfermedad de Gaucher', 12, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(37, 'Leucemia aguda', 13, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(38, 'Mieloma múltiple', 13, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(39, 'Enfermedad de Gaucher', 13, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(40, 'Leucemia aguda', 14, '2015-10-17 21:10:25', '2015-10-17 21:10:25'),
(41, 'Mieloma múltiple', 14, '2015-10-17 21:10:26', '2015-10-17 21:10:26'),
(42, 'Enfermedad de Gaucher', 14, '2015-10-17 21:10:26', '2015-10-17 21:10:26'),
(43, 'Leucemia aguda', 15, '2015-10-17 21:10:26', '2015-10-17 21:10:26'),
(44, 'Mieloma múltiple', 15, '2015-10-17 21:10:26', '2015-10-17 21:10:26'),
(45, 'Enfermedad de Gaucher', 15, '2015-10-17 21:10:27', '2015-10-17 21:10:27'),
(46, 'Leucemia aguda', 16, '2015-10-17 21:10:27', '2015-10-17 21:10:27'),
(47, 'Mieloma múltiple', 16, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(48, 'Enfermedad de Gaucher', 16, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(49, 'Leucemia aguda', 17, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(50, 'Mieloma múltiple', 17, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(51, 'Enfermedad de Gaucher', 17, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(52, 'Leucemia aguda', 18, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(53, 'Mieloma múltiple', 18, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(54, 'Enfermedad de Gaucher', 18, '2015-10-17 21:10:28', '2015-10-17 21:10:28'),
(55, 'Leucemia aguda', 19, '2015-10-17 21:10:29', '2015-10-17 21:10:29'),
(56, 'Mieloma múltiple', 19, '2015-10-17 21:10:29', '2015-10-17 21:10:29'),
(57, 'Enfermedad de Gaucher', 19, '2015-10-17 21:10:29', '2015-10-17 21:10:29'),
(58, 'Leucemia aguda', 20, '2015-10-17 21:10:29', '2015-10-17 21:10:29'),
(59, 'Mieloma múltiple', 20, '2015-10-17 21:10:29', '2015-10-17 21:10:29'),
(60, 'Enfermedad de Gaucher', 20, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(61, 'Leucemia aguda', 21, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(62, 'Mieloma múltiple', 21, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(63, 'Enfermedad de Gaucher', 21, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(64, 'Leucemia aguda', 22, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(65, 'Mieloma múltiple', 22, '2015-10-17 21:10:30', '2015-10-17 21:10:30'),
(66, 'Enfermedad de Gaucher', 22, '2015-10-17 21:10:30', '2015-10-17 21:10:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multiple_selection_subquestions`
--

CREATE TABLE IF NOT EXISTS `multiple_selection_subquestions` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `multiple_selection_subquestions`
--

INSERT INTO `multiple_selection_subquestions` (`id`, `description`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'Anemia, Trombocitopenia', 2, '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(2, 'Hepatomegalia, Esplenomegalia', 2, '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(3, 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia', 2, '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(4, 'Anemia, Trombocitopenia, dolor óseo agudo ó crónico', 2, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(5, 'Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico', 2, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(6, 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico', 2, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(7, 'Estudio hematológico de sangre periférica', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(8, 'Laboratorio general', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(9, 'Laboratorio general + LDH', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(10, 'Laboratorio general + B2 Microglobulina', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(11, 'Proteinograma elecroforético+ Dosaje de Inmunoglobulinas+ Proteinuria de Bence Jones', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(12, 'Biopsia-Punción de Médula ósea', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(13, 'Estudio Citogenético', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(14, 'Estudios Moleculares', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(15, 'PET', 3, '2015-10-17 21:10:19', '2015-10-17 21:10:19'),
(16, 'Radiografías (Huesos Largos)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(17, 'Radiografías (Pulmón)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(18, 'Radiografías (Calota Craneana)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(19, 'Radiografías (Columna Lumbosacra)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(20, 'RNM (Ósea)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(21, 'RNM (Abdomen)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20'),
(22, 'RNM (Cerebro)', 3, '2015-10-17 21:10:20', '2015-10-17 21:10:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(10) unsigned NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'cuestionario1.png', 4, '2015-10-17 21:10:38', '2015-10-17 21:10:38'),
(2, 'cuestionario2.png', 4, '2015-10-17 21:10:38', '2015-10-17 21:10:38'),
(3, 'cuestionario3.png', 4, '2015-10-17 21:10:38', '2015-10-17 21:10:38'),
(4, 'cuestionario4.png', 4, '2015-10-17 21:10:39', '2015-10-17 21:10:39'),
(5, 'cuestionario5.png', 4, '2015-10-17 21:10:39', '2015-10-17 21:10:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnaires`
--

CREATE TABLE IF NOT EXISTS `questionnaires` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `heading` text COLLATE utf8_unicode_ci NOT NULL,
  `activeFrom` date NOT NULL,
  `activeTo` date DEFAULT NULL,
  `attachedFilePhysicalName` text COLLATE utf8_unicode_ci,
  `attachedFileLogicalName` text COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `answersCount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `title`, `description`, `heading`, `activeFrom`, `activeTo`, `attachedFilePhysicalName`, `attachedFileLogicalName`, `active`, `locked`, `answersCount`, `created_at`, `updated_at`) VALUES
(1, 'ENCUESTA A LA SOCIEDAD DE HEMATOLOGOS', 'La Sociedad de Hematología y Hemoterapia de La Plata ha desarrollado la siguiente\r\n            encuesta que tiene como objetivo conocer el razonamiento médico del especialista ante\r\n            ciertas patologías. </br>\r\n            Les pedimos que se tomen únicamente cinco minutos para contestarla, ya que su\r\n            respuesta colaborará con la elaboración de contenidos que enriquezcan la formación\r\n            profesional.', 'CONSTRUYAMOS NUESTRO CONOCIMIENTO', '2015-07-31', NULL, NULL, NULL, 1, 1, 0, '2015-10-17 21:10:18', '2015-10-17 21:10:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnaire_respondents`
--

CREATE TABLE IF NOT EXISTS `questionnaire_respondents` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `questionnaire_respondents`
--

INSERT INTO `questionnaire_respondents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, '2015-10-17 21:10:33', '2015-10-17 21:10:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `questionnaire_id` int(10) unsigned NOT NULL,
  `multiple_selection_answers` text COLLATE utf8_unicode_ci,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `description`, `questionnaire_id`, `multiple_selection_answers`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 'Frente a un hombre de 42 años con Anemia leve, Trombocitopenia moderada, Hepatomegalia leve, Esplenomegalia grado 3 a 4, y dolor óseo crónico: ¿En cuál de los posibles diagnósticos pensaría para ese paciente?', 1, NULL, 'App\\Models\\MultipleChoiceQuestionSingleOption', '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(2, 'Ante un paciente de 42 años de edad con presunto diagnóstico de Leucemia aguda, mieloma múltiple o enfermedad de Gaucher, asigne el grado de relevancia (muy relevante, relevante o poco relevante) de cada síntoma para cada una de las patologías mencionadas.', 1, '[{"description":"Muy Relevante","acronym":"MR"},{"description":"Relevante","acronym":"R"},{"description":"Poco Relevante","acronym":"PR"}]', 'App\\Models\\MultipleSelectionQuestion', '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(3, 'Qué estudios solicitaría, dando relevancia (nunca, a veces, siempre) para cada una de las patologías antes mencionadas.', 1, '[{"description":"Nunca","acronym":"N"},{"description":"A veces","acronym":"AV"},{"description":"Siempre","acronym":"S"}]', 'App\\Models\\MultipleSelectionQuestion', '2015-10-17 21:10:18', '2015-10-17 21:10:18'),
(4, 'Ante las siguientes imágenes de Resonancia  y Rx. de un paciente con historial de anemia y dolor óseo ¿qué diagnóstico considera correcto?', 1, NULL, 'App\\Models\\MultipleChoiceQuestionSingleOption', '2015-10-17 21:10:18', '2015-10-17 21:10:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'Graciela Klein', 'kleingra@speedy.com.ar', '$2y$10$n2LvZDHJ4nI9R09s1ueCfuQugOX7h51OqLgLo.fIrHxhwZiDcJkUS', NULL),
(2, 'Super Admin', 'superadminsociedad@admin.com', '$2y$10$oDXHeMPGVHElmYRsHnpniOPqXrCi1I37lzN7O9/O7/i/Y7BhOZ1om', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_answers`
--

CREATE TABLE IF NOT EXISTS `user_answers` (
  `id` int(10) unsigned NOT NULL,
  `answer` text COLLATE utf8_unicode_ci,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `questionnaire_respondent_id` int(10) unsigned NOT NULL,
  `questionnaire_id` int(10) unsigned NOT NULL,
  `multiple_choice_option_id` int(10) unsigned DEFAULT NULL,
  `multiple_selection_option_id` int(10) unsigned DEFAULT NULL,
  `question_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`), ADD KEY `emails_questionnaire_respondent_id_foreign` (`questionnaire_respondent_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`), ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- Indices de la tabla `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  ADD PRIMARY KEY (`id`), ADD KEY `multiple_choice_options_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `multiple_selection_options`
--
ALTER TABLE `multiple_selection_options`
  ADD PRIMARY KEY (`id`), ADD KEY `multiple_selection_options_subquestion_id_foreign` (`subquestion_id`);

--
-- Indices de la tabla `multiple_selection_subquestions`
--
ALTER TABLE `multiple_selection_subquestions`
  ADD PRIMARY KEY (`id`), ADD KEY `multiple_selection_subquestions_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`), ADD KEY `pictures_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questionnaire_respondents`
--
ALTER TABLE `questionnaire_respondents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`), ADD KEY `questions_questionnaire_id_foreign` (`questionnaire_id`), ADD KEY `questions_class_name_index` (`class_name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`), ADD KEY `user_answers_questionnaire_respondent_id_foreign` (`questionnaire_respondent_id`), ADD KEY `user_answers_questionnaire_id_foreign` (`questionnaire_id`), ADD KEY `user_answers_multiple_choice_option_id_foreign` (`multiple_choice_option_id`), ADD KEY `user_answers_multiple_selection_option_id_foreign` (`multiple_selection_option_id`), ADD KEY `user_answers_question_id_foreign` (`question_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `multiple_selection_options`
--
ALTER TABLE `multiple_selection_options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `multiple_selection_subquestions`
--
ALTER TABLE `multiple_selection_subquestions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `questionnaire_respondents`
--
ALTER TABLE `questionnaire_respondents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
ADD CONSTRAINT `emails_questionnaire_respondent_id_foreign` FOREIGN KEY (`questionnaire_respondent_id`) REFERENCES `questionnaire_respondents` (`id`);

--
-- Filtros para la tabla `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
ADD CONSTRAINT `multiple_choice_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `multiple_selection_options`
--
ALTER TABLE `multiple_selection_options`
ADD CONSTRAINT `multiple_selection_options_subquestion_id_foreign` FOREIGN KEY (`subquestion_id`) REFERENCES `multiple_selection_subquestions` (`id`);

--
-- Filtros para la tabla `multiple_selection_subquestions`
--
ALTER TABLE `multiple_selection_subquestions`
ADD CONSTRAINT `multiple_selection_subquestions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `pictures`
--
ALTER TABLE `pictures`
ADD CONSTRAINT `pictures_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`);

--
-- Filtros para la tabla `user_answers`
--
ALTER TABLE `user_answers`
ADD CONSTRAINT `user_answers_multiple_choice_option_id_foreign` FOREIGN KEY (`multiple_choice_option_id`) REFERENCES `multiple_choice_options` (`id`),
ADD CONSTRAINT `user_answers_multiple_selection_option_id_foreign` FOREIGN KEY (`multiple_selection_option_id`) REFERENCES `multiple_selection_options` (`id`),
ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
ADD CONSTRAINT `user_answers_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`),
ADD CONSTRAINT `user_answers_questionnaire_respondent_id_foreign` FOREIGN KEY (`questionnaire_respondent_id`) REFERENCES `questionnaire_respondents` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
