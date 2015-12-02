-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2015 a las 21:23:15
-- Versión del servidor: 5.6.27-0ubuntu1
-- Versión de PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sociedadhh`
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `address`, `questionnaire_respondent_id`, `created_at`, `updated_at`) VALUES
(1, 'alcosmil@hotmail.com', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(2, 'fladamiani@hotmail.com', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(3, 'dsandro@speedy.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(4, 'enrico@netverk.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(5, 'patriciagfazio@yahoo.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(6, 'sandraformisano@yahoo.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(7, 'bramirezborga@yahoo.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(8, 'farinaoh@netverk.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(9, 'giljuliet@gmail.com', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(10, 'sebastianisnardi@yahoo.com.ar', NULL, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(11, 'ojakus@ciudad.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(12, 'rcjau@hotmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(13, 'gmarin2009@gmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(14, 'kleingra@speedy.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(15, 'msmatano@yahoo.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(16, 'milonejh@netverk.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(17, 'elsabpalomino@yahoo.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(18, 'claudiaparodi05@hotmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(19, 'marielana@ciudad.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(20, 'mvprates@hotmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(21, 'oaromano57@gmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(22, 'dianascebba@hotmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(23, 'sandrar_hemato@hotmail.com', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(24, 'mfschifini@yahoo.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(25, 'schutten@netverk.com.ar', NULL, '2015-12-02 03:22:24', '2015-12-02 03:22:24'),
(26, 'gladystebaldi@yahoo.com.ar', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(27, 'marcelatittarelli@yahoo.com.ar', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(28, 'vidaosca@ciudad.com.ar', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(29, 'sebastianyantorno@gmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(30, 'julietadalmaroni@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(31, 'mariacecidacun@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(32, 'citometriacucaiba@gmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(33, 'drabunzel@yahoo.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(34, 'biolmol_ludovica@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(35, 'sebastianisnardi@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(36, 'sandraformisano@yahoo.com.ar', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(37, 'solecrucet@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(38, 'sabasilvia@hotmail.com', NULL, '2015-12-02 03:22:25', '2015-12-02 03:22:25'),
(39, 'gabriela.balager@hotmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(40, 'mariaelisariva@gmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(41, 'mariamercedesbol@gmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(42, 'martagelemur@hotmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(43, 'milonejh@netverk.com.ar', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(44, 'patriciagfazio@yahoo.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(45, 'orlandosm527@gmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(46, 'balladaresgraciela@hotmail.com', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(47, 'celinavila@yahoo.com.ar', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(48, 'hemato_sm@yahoo.com.ar', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(49, 'luxzop@yahoo.com.ar', NULL, '2015-12-02 03:22:26', '2015-12-02 03:22:26'),
(50, 'lauvives@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(51, 'aznaraquino@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(52, 'jbordone@netverk.com.ar', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(53, 'florenciafreixa@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(54, 'reynosojorgedaniel@yahoo.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(55, 'lerefiad@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(56, 'lucisoleil@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(57, 'dav_almada@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(58, 'colombifacundo@gmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(59, 'reynosojorgedaniel@hotmail.com', NULL, '2015-12-02 03:22:27', '2015-12-02 03:22:27'),
(60, 'diegoece@hotmail.com', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(61, 'sandraargello@hotmail.com', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(62, 'celinavila@yahoo.com.ar', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(63, 'aznaraquino@hotmail.com', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(64, 'mercedesbol@hotmail.com', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(65, 'bunzelsu@hotmail.com', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(66, 'amcatt@intramed.net', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(67, 'martin_ciappa@yahoo.com.ar', NULL, '2015-12-02 03:22:28', '2015-12-02 03:22:28');

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
(1, 'Leucemia', 0, 0, 1, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(2, 'Linfoma', 0, 0, 1, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(3, 'Mieloma Múltiple', 0, 0, 1, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(4, 'Enfermedad de Gaucher', 0, 0, 1, '2015-12-02 03:22:17', '2015-12-02 03:22:17'),
(5, 'Leucemia Granulocítica Crónica', 0, 0, 1, '2015-12-02 03:22:17', '2015-12-02 03:22:17'),
(6, 'Desórdenes de Sangrado', 0, 0, 1, '2015-12-02 03:22:17', '2015-12-02 03:22:17'),
(7, 'Otra', 1, 0, 1, '2015-12-02 03:22:17', '2015-12-02 03:22:17'),
(8, 'Mieloma Múltiple', 0, 0, 4, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(9, 'Enfermedad de Gaucher', 0, 0, 4, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(10, 'Leucemia Granulocítica Crónica', 0, 0, 4, '2015-12-02 03:22:23', '2015-12-02 03:22:23');

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
(1, 'Leucemia aguda', 1, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(2, 'Mieloma múltiple', 1, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(3, 'Enfermedad de Gaucher', 1, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(4, 'Leucemia aguda', 2, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(5, 'Mieloma múltiple', 2, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(6, 'Enfermedad de Gaucher', 2, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(7, 'Leucemia aguda', 3, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(8, 'Mieloma múltiple', 3, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(9, 'Enfermedad de Gaucher', 3, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(10, 'Leucemia aguda', 4, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(11, 'Mieloma múltiple', 4, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(12, 'Enfermedad de Gaucher', 4, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(13, 'Leucemia aguda', 5, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(14, 'Mieloma múltiple', 5, '2015-12-02 03:22:18', '2015-12-02 03:22:18'),
(15, 'Enfermedad de Gaucher', 5, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(16, 'Leucemia aguda', 6, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(17, 'Mieloma múltiple', 6, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(18, 'Enfermedad de Gaucher', 6, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(19, 'Leucemia aguda', 7, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(20, 'Mieloma múltiple', 7, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(21, 'Enfermedad de Gaucher', 7, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(22, 'Leucemia aguda', 8, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(23, 'Mieloma múltiple', 8, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(24, 'Enfermedad de Gaucher', 8, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(25, 'Leucemia aguda', 9, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(26, 'Mieloma múltiple', 9, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(27, 'Enfermedad de Gaucher', 9, '2015-12-02 03:22:19', '2015-12-02 03:22:19'),
(28, 'Leucemia aguda', 10, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(29, 'Mieloma múltiple', 10, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(30, 'Enfermedad de Gaucher', 10, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(31, 'Leucemia aguda', 11, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(32, 'Mieloma múltiple', 11, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(33, 'Enfermedad de Gaucher', 11, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(34, 'Leucemia aguda', 12, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(35, 'Mieloma múltiple', 12, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(36, 'Enfermedad de Gaucher', 12, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(37, 'Leucemia aguda', 13, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(38, 'Mieloma múltiple', 13, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(39, 'Enfermedad de Gaucher', 13, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(40, 'Leucemia aguda', 14, '2015-12-02 03:22:20', '2015-12-02 03:22:20'),
(41, 'Mieloma múltiple', 14, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(42, 'Enfermedad de Gaucher', 14, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(43, 'Leucemia aguda', 15, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(44, 'Mieloma múltiple', 15, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(45, 'Enfermedad de Gaucher', 15, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(46, 'Leucemia aguda', 16, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(47, 'Mieloma múltiple', 16, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(48, 'Enfermedad de Gaucher', 16, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(49, 'Leucemia aguda', 17, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(50, 'Mieloma múltiple', 17, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(51, 'Enfermedad de Gaucher', 17, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(52, 'Leucemia aguda', 18, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(53, 'Mieloma múltiple', 18, '2015-12-02 03:22:21', '2015-12-02 03:22:21'),
(54, 'Enfermedad de Gaucher', 18, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(55, 'Leucemia aguda', 19, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(56, 'Mieloma múltiple', 19, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(57, 'Enfermedad de Gaucher', 19, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(58, 'Leucemia aguda', 20, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(59, 'Mieloma múltiple', 20, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(60, 'Enfermedad de Gaucher', 20, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(61, 'Leucemia aguda', 21, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(62, 'Mieloma múltiple', 21, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(63, 'Enfermedad de Gaucher', 21, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(64, 'Leucemia aguda', 22, '2015-12-02 03:22:22', '2015-12-02 03:22:22'),
(65, 'Mieloma múltiple', 22, '2015-12-02 03:22:23', '2015-12-02 03:22:23'),
(66, 'Enfermedad de Gaucher', 22, '2015-12-02 03:22:23', '2015-12-02 03:22:23');

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
(1, 'Anemia, Trombocitopenia', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(2, 'Hepatomegalia, Esplenomegalia', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(3, 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(4, 'Anemia, Trombocitopenia, dolor óseo agudo ó crónico', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(5, 'Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(6, 'Anemia, Trombocitopenia, Hepatomegalia, Esplenomegalia, Dolor óseo agudo ó crónico', 2, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(7, 'Estudio hematológico de sangre periférica', 3, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(8, 'Laboratorio general', 3, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(9, 'Laboratorio general + LDH', 3, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(10, 'Laboratorio general + B2 Microglobulina', 3, '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(11, 'Proteinograma elecroforético+ Dosaje de Inmunoglobulinas+ Proteinuria de Bence Jones', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(12, 'Biopsia-Punción de Médula ósea', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(13, 'Estudio Citogenético', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(14, 'Estudios Moleculares', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(15, 'PET', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(16, 'Radiografías (Huesos Largos)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(17, 'Radiografías (Pulmón)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(18, 'Radiografías (Calota Craneana)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(19, 'Radiografías (Columna Lumbosacra)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(20, 'RNM (Ósea)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(21, 'RNM (Abdomen)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16'),
(22, 'RNM (Cerebro)', 3, '2015-12-02 03:22:16', '2015-12-02 03:22:16');

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
(1, 'cuestionario1.png', 4, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(2, 'cuestionario2.png', 4, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(3, 'cuestionario3.png', 4, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(4, 'cuestionario4.png', 4, '2015-12-02 03:22:28', '2015-12-02 03:22:28'),
(5, 'cuestionario5.png', 4, '2015-12-02 03:22:28', '2015-12-02 03:22:28');

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
(1, 'ENCUESTA A LA SOCIEDAD DE HEMATOLOGOS', 'La Sociedad de Hematología y Hemoterapia de La Plata ha desarrollado la siguiente\n            encuesta que tiene como objetivo conocer el razonamiento médico del especialista ante\n            ciertas patologías. </br>\n            Les pedimos que se tomen únicamente cinco minutos para contestarla, ya que su\n            respuesta colaborará con la elaboración de contenidos que enriquezcan la formación\n            profesional.', 'CONSTRUYAMOS NUESTRO CONOCIMIENTO', '2015-07-31', NULL, '5220c6837259782e37996e46ef08f6dd.pdf', 'ppt-mails.pdf', 1, 1, 0, '2015-12-02 03:22:14', '2015-12-02 03:22:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionnaire_respondents`
--

CREATE TABLE IF NOT EXISTS `questionnaire_respondents` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Frente a un hombre de 42 años con Anemia leve, Trombocitopenia moderada, Hepatomegalia leve, Esplenomegalia grado 3 a 4, y dolor óseo crónico: ¿En cuál de los posibles diagnósticos pensaría para ese paciente?', 1, NULL, 'App\\Models\\MultipleChoiceQuestionSingleOption', '2015-12-02 03:22:14', '2015-12-02 03:22:14'),
(2, 'Ante un paciente de 42 años de edad con presunto diagnóstico de Leucemia aguda, mieloma múltiple o enfermedad de Gaucher, asigne el grado de relevancia (muy relevante, relevante o poco relevante) de cada síntoma para cada una de las patologías mencionadas.', 1, '[{"description":"Muy Relevante","acronym":"MR"},{"description":"Relevante","acronym":"R"},{"description":"Poco Relevante","acronym":"PR"}]', 'App\\Models\\MultipleSelectionQuestion', '2015-12-02 03:22:14', '2015-12-02 03:22:14'),
(3, 'Qué estudios solicitaría, dando relevancia (nunca, a veces, siempre) para cada una de las patologías antes mencionadas.', 1, '[{"description":"Nunca","acronym":"N"},{"description":"A veces","acronym":"AV"},{"description":"Siempre","acronym":"S"}]', 'App\\Models\\MultipleSelectionQuestion', '2015-12-02 03:22:15', '2015-12-02 03:22:15'),
(4, 'Ante las siguientes imágenes de Resonancia  y Rx. de un paciente con historial de anemia y dolor óseo ¿qué diagnóstico considera correcto?', 1, NULL, 'App\\Models\\MultipleChoiceQuestionSingleOption', '2015-12-02 03:22:15', '2015-12-02 03:22:15');

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
(1, 'Graciela Klein', 'kleingra@speedy.com.ar', '$2y$10$E7Z0ZeApsV3DhAdIrKsABe8aBdKCiG0CK2.o0GitC8tsXCGCqlUlG', NULL),
(2, 'Super Admin', 'superadminsociedad@admin.com', '$2y$10$ejfJN9isEvA51YabuJu2kO2BrJt86mK2VX5iTOfckN3QNvgZ8mBTG', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_questionnaire_respondent_id_foreign` (`questionnaire_respondent_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- Indices de la tabla `multiple_choice_options`
--
ALTER TABLE `multiple_choice_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multiple_choice_options_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `multiple_selection_options`
--
ALTER TABLE `multiple_selection_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multiple_selection_options_subquestion_id_foreign` (`subquestion_id`);

--
-- Indices de la tabla `multiple_selection_subquestions`
--
ALTER TABLE `multiple_selection_subquestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multiple_selection_subquestions_question_id_foreign` (`question_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_question_id_foreign` (`question_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_questionnaire_id_foreign` (`questionnaire_id`),
  ADD KEY `questions_class_name_index` (`class_name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_questionnaire_respondent_id_foreign` (`questionnaire_respondent_id`),
  ADD KEY `user_answers_questionnaire_id_foreign` (`questionnaire_id`),
  ADD KEY `user_answers_multiple_choice_option_id_foreign` (`multiple_choice_option_id`),
  ADD KEY `user_answers_multiple_selection_option_id_foreign` (`multiple_selection_option_id`),
  ADD KEY `user_answers_question_id_foreign` (`question_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
