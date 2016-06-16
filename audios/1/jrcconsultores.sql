-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2016 a las 22:10:01
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jrcconsultores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Sr WordPress', '', 'https://wordpress.org/', '', '2015-10-08 02:29:48', '2015-10-08 02:29:48', 'Hola, esto es un comentario.\nPara borrar un comentario simplemente accede y revisa los comentarios de la entrada. Ahí tendrás la opción de editarlo o borrarlo.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=196 ;

--
-- Volcado de datos para la tabla `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/jrcconsultores', 'yes'),
(2, 'home', 'http://localhost/jrcconsultores', 'yes'),
(3, 'blogname', 'JRC Consultores S.A.', 'yes'),
(4, 'blogdescription', 'Otro sitio realizado con WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'mveces8@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j F, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'j F, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/index.php/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'gzipcompression', '0', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'Tournette', 'yes'),
(42, 'stylesheet', 'Tournette', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '33056', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:0:{}', 'yes'),
(81, 'widget_rss', 'a:0:{}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'finished_splitting_shared_terms', '1', 'yes'),
(89, 'initial_db_version', '33056', 'yes'),
(90, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(91, 'WPLANG', 'es_ES', 'yes'),
(92, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'sidebars_widgets', 'a:6:{s:19:"wp_inactive_widgets";a:0:{}s:15:"sidebar_primary";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:8:"footer_1";N;s:8:"footer_2";N;s:8:"footer_3";N;s:13:"array_version";i:3;}', 'yes'),
(100, 'cron', 'a:5:{i:1445221864;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1445222969;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1454052840;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1454077792;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}s:7:"version";i:2;}', 'yes'),
(102, 'rewrite_rules', 'a:58:{s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:42:"index.php/feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:37:"index.php/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:30:"index.php/page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:51:"index.php/comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:46:"index.php/comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:54:"index.php/search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:49:"index.php/search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:42:"index.php/search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:24:"index.php/search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:57:"index.php/author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:52:"index.php/author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:45:"index.php/author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:27:"index.php/author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:79:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:74:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:67:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:49:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:66:"index.php/([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:61:"index.php/([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:54:"index.php/([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:36:"index.php/([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:53:"index.php/([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:48:"index.php/([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:41:"index.php/([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:23:"index.php/([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:68:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:78:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:98:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:93:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:93:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:67:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:87:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:82:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:75:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:82:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:67:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(/[0-9]+)?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:57:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:67:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:87:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:82:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:82:"index.php/[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:74:"index.php/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:61:"index.php/([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:48:"index.php/([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:37:"index.php/.?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:47:"index.php/.?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:67:"index.php/.?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"index.php/.?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"index.php/.?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"index.php/(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:50:"index.php/(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:45:"index.php/(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:38:"index.php/(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:45:"index.php/(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:30:"index.php/(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(114, '_transient_random_seed', '32d2812de2f9c64c1485c27dc2d1d4ef', 'yes'),
(115, '_site_transient_timeout_browser_d345f0fc2588ba33770d312d084b0dfc', '1444876265', 'yes'),
(116, '_site_transient_browser_d345f0fc2588ba33770d312d084b0dfc', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"45.0.2454.101";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(119, '_transient_timeout_plugin_slugs', '1444357868', 'no'),
(120, '_transient_plugin_slugs', 'a:2:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";}', 'no'),
(121, '_transient_timeout_dash_c05853b002c443ec8e57ff884f56cdde', '1444314668', 'no'),
(122, '_transient_dash_c05853b002c443ec8e57ff884f56cdde', '<div class="rss-widget"><p><strong>Error en el RSS:</strong> WP HTTP Error: No hay medios de transporte HTTP disponibles que puedan completar la solicitud requerida.</p></div><div class="rss-widget"><p><strong>Error en el RSS:</strong> WP HTTP Error: No hay medios de transporte HTTP disponibles que puedan completar la solicitud requerida.</p></div><div class="rss-widget"><ul></ul></div>', 'no'),
(123, 'can_compress_scripts', '1', 'yes'),
(125, '_transient_twentyfifteen_categories', '1', 'yes'),
(126, 'theme_mods_twentyfifteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1444272445;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(127, 'current_theme', 'Tournette', 'yes'),
(128, 'theme_mods_classy-lite', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1444273496;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:14:"footer_sidebar";N;}}}', 'yes'),
(129, 'theme_switched', '', 'yes'),
(130, '_ZELS_OPTIONs', 'a:54:{s:11:"logo_on_off";b:1;s:9:"logo_text";s:0:"";s:19:"logo_in_menu_upload";s:84:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/assets/images/logo.png";s:14:"favicon_upload";s:0:"";s:15:"slider_bg_image";s:124:"http://localhost/jrcconsultores/wp-content/uploads/2015/10/APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt.jpg";s:15:"slider_settings";a:4:{i:0;a:5:{s:17:"codex_slider_text";s:15:"mi primer lorem";s:20:"codex_slider_heading";s:26:"RESPONSIVE AND FLAT DESIGN";s:21:"codex_slider_textarea";s:139:"Lorem ipsum is the best dummy text and also dolor set emit. Lorem ipsum is the best dummy text and also dolor set emit also dolor set emit.";s:22:"codex_slider_link_text";s:0:"";s:21:"codex_slider_link_url";s:0:"";}i:1;a:5:{s:17:"codex_slider_text";s:18:"CLASSY IS THE BEST";s:20:"codex_slider_heading";s:26:"RESPONSIVE AND FLAT DESIGN";s:21:"codex_slider_textarea";s:134:"Lipsum is the best dummy text and also dolor set emit. Lorem ipsum is the best dummy text and also dolor set emit also dolor set emit.";s:22:"codex_slider_link_text";s:0:"";s:21:"codex_slider_link_url";s:0:"";}i:3;a:5:{s:17:"codex_slider_text";s:0:"";s:20:"codex_slider_heading";s:0:"";s:21:"codex_slider_textarea";s:0:"";s:22:"codex_slider_link_text";s:0:"";s:21:"codex_slider_link_url";s:0:"";}i:4;a:5:{s:17:"codex_slider_text";s:0:"";s:20:"codex_slider_heading";s:0:"";s:21:"codex_slider_textarea";s:0:"";s:22:"codex_slider_link_text";s:0:"";s:21:"codex_slider_link_url";s:0:"";}}s:13:"section_title";s:7:"Feature";s:27:"feature_section_description";s:0:"";s:21:"feature_section_group";a:3:{i:0;a:4:{s:12:"feature_icon";s:17:"fa fa-thumbs-o-up";s:19:"feature_select_icon";s:2:"-1";s:13:"feature_title";s:7:"Elegant";s:19:"feature_description";s:83:"We Developed classy HTML Template Following Coding Standard which is W3C Validated.";}i:1;a:4:{s:12:"feature_icon";s:12:"fa fa-laptop";s:19:"feature_select_icon";s:2:"-1";s:13:"feature_title";s:10:"Responsive";s:19:"feature_description";s:70:"classy HTML Template Following Coding Standard which is W3C Validated.";}i:2;a:4:{s:12:"feature_icon";s:10:"fa fa-gift";s:19:"feature_select_icon";s:2:"-1";s:13:"feature_title";s:6:"Modern";s:19:"feature_description";s:93:"CodexCoder Developed classy HTML Template And Follows Coding Standard which is W3C Validated.";}}s:13:"team_bg_image";s:0:"";s:18:"team_section_title";s:8:"Our Team";s:16:"team_section_des";s:164:"classy is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.";s:21:"service_section_title";s:27:"Latest<span>Features</span>";s:19:"service_section_des";s:164:"Classy is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.";s:26:"core_service_section_group";a:3:{i:0;a:4:{s:17:"core_service_icon";s:18:"fa fa-mobile-phone";s:23:"corefeature_select_icon";s:2:"-1";s:18:"core_service_title";s:17:"ATTRACTIVE DESIGN";s:24:"core_service_description";s:127:"All of our Themes designed attractively. Attractiveness is a power to attract visitor, make different from or related to other.";}i:1;a:4:{s:17:"core_service_icon";s:10:"fa fa-gear";s:23:"corefeature_select_icon";s:2:"-1";s:18:"core_service_title";s:17:"RESPONSIVE LAYOUT";s:24:"core_service_description";s:70:"classy HTML Template Following Coding Standard which is W3C Validated.";}i:2;a:4:{s:17:"core_service_icon";s:12:"fa fa-file-o";s:23:"corefeature_select_icon";s:2:"-1";s:18:"core_service_title";s:23:"EXPANSIVE DOCUMENTATION";s:24:"core_service_description";s:93:"CodexCoder Developed classy HTML Template And Follows Coding Standard which is W3C Validated.";}}s:27:"core_feature_bg_image_right";s:99:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/features/features-img.png";s:23:"portfolio_section_title";s:8:"Our Blog";s:21:"portfolio_section_des";s:98:"Get Latest Product Updates, News, Tutorial, Template or Theme Reviews from CodexCoder Legend Team.";s:21:"pricing_section_title";s:11:"Choose Plan";s:20:"pricing_section_desc";s:144:"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.";s:27:"pricing_table_section_group";a:3:{i:0;a:7:{s:19:"pricing_table_title";s:5:"basic";s:24:"pricing_table_percentage";s:2:"19";s:18:"pricing_table_sign";s:1:"$";s:18:"pricing_table_mo_y";s:2:"MO";s:18:"pricing_table_list";s:317:"<ul>\r\n                      <li>1 GB Space</li>\r\n                      <li>10 GB Bandwidth</li>\r\n                      <li>WooCommerce Support</li>\r\n                      <li>WordPress</li>\r\n                      <li>Exclusive Support</li>\r\n                      <li>Feedback 204 Hours</li>\r\n                    </ul>";s:21:"pricing_table_sign_id";s:7:"SIGN IN";s:26:"pricing_table_payment_link";s:1:"#";}i:1;a:7:{s:19:"pricing_table_title";s:7:"Premium";s:24:"pricing_table_percentage";s:2:"59";s:18:"pricing_table_sign";s:1:"$";s:18:"pricing_table_mo_y";s:2:"MO";s:18:"pricing_table_list";s:229:"               <ul> <li><span>59</span> Domain Uses</li>\r\n                <li>59+ <span>WordPress</span>Theme</li>\r\n                <li>59+ <span>HTML</span>Template</li>\r\n                <li><span>9TB</span> of Storage</li></ul>";s:21:"pricing_table_sign_id";s:7:"SIGN IN";s:26:"pricing_table_payment_link";s:1:"#";}i:2;a:7:{s:19:"pricing_table_title";s:3:"pro";s:24:"pricing_table_percentage";s:2:"99";s:18:"pricing_table_sign";s:1:"$";s:18:"pricing_table_mo_y";s:2:"MO";s:18:"pricing_table_list";s:234:"                <ul><li><span>100+</span> Domain Uses</li>\r\n                <li>100+ <span>WordPress</span>Theme</li>\r\n                <li>100+ <span>HTML</span>Template</li>\r\n                <li><span>50TB</span> of Storage</li></ul>";s:21:"pricing_table_sign_id";s:7:"SIGN IN";s:26:"pricing_table_payment_link";s:1:"#";}}s:13:"acthive_title";s:15:"Our Achievement";s:11:"acthive_dsc";s:139:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab facilis ipsam iusto non sunt obcaecati. Sunt voluptatibus alias et laudantium?";s:19:"project_section_img";s:107:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/achivement/achivement-add-img.png";s:3:"cup";s:20:"Cups of Tea Consumed";s:4:"numb";s:4:"3214";s:7:"project";s:17:"Project Completed";s:9:"proj_numb";s:3:"657";s:11:"client_text";s:19:"Clients Worked With";s:11:"client_numb";s:3:"213";s:3:"won";s:9:"Award Won";s:8:"won_numb";s:2:"99";s:15:"client_bg_image";s:0:"";s:20:"client_section_title";s:6:"client";s:18:"client_section_des";s:164:"classy is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.";s:20:"client_section_group";a:5:{i:0;a:5:{s:11:"client_name";s:11:"Maria Merri";s:10:"client_img";s:94:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/clients/client-4.jpg";s:13:"client_active";s:0:"";s:18:"client_description";s:110:"We Developed classy HTML Template Following Coding Standard which is W3C Validated.Lorem ipsum dolor sit amet.";s:17:"client_testi_fade";s:4:"fade";}i:1;a:5:{s:11:"client_name";s:5:"Maria";s:10:"client_img";s:94:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/clients/client-1.jpg";s:13:"client_active";s:0:"";s:18:"client_description";s:110:"We Developed classy HTML Template Following Coding Standard which is W3C Validated.Lorem ipsum dolor sit amet.";s:17:"client_testi_fade";s:4:"fade";}i:2;a:5:{s:11:"client_name";s:4:"Jake";s:10:"client_img";s:94:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/clients/client-2.jpg";s:13:"client_active";s:6:"active";s:18:"client_description";s:98:"Classy HTML Template Following Coding Standard which is W3C Validated. Lorem ipsum dolor sit amet.";s:17:"client_testi_fade";s:6:"active";}i:3;a:5:{s:11:"client_name";s:6:"Martin";s:10:"client_img";s:94:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/clients/client-3.jpg";s:13:"client_active";s:0:"";s:18:"client_description";s:121:"CodexCoder Developed classy HTML Template And Follows Coding Standard which is W3C Validated. Lorem ipsum dolor sit amet.";s:17:"client_testi_fade";s:4:"fade";}i:4;a:5:{s:11:"client_name";s:4:"Jake";s:10:"client_img";s:94:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/images/home/clients/client-5.jpg";s:13:"client_active";s:0:"";s:18:"client_description";s:121:"CodexCoder Developed classy HTML Template And Follows Coding Standard which is W3C Validated. Lorem ipsum dolor sit amet.";s:17:"client_testi_fade";s:4:"fade";}}s:18:"blog_section_title";s:8:"Our Blog";s:16:"blog_section_des";s:98:"Get Latest Product Updates, News, Tutorial, Template or Theme Reviews from CodexCoder Legend Team.";s:20:"blog_single_head_img";s:0:"";s:25:"blog_single_page_head_img";s:0:"";s:18:"page_section_title";s:8:"Our Blog";s:16:"page_section_des";s:98:"Get Latest Product Updates, News, Tutorial, Template or Theme Reviews from CodexCoder Legend Team.";s:8:"map_lati";s:9:"53.599339";s:9:"map_langi";s:9:"10.172954";s:8:"map_icon";s:88:"http://localhost/jrcconsultores/wp-content/themes/classy-lite/assets/images/map-icon.png";s:10:"custom_css";s:0:"";s:13:"copyright_txt";s:99:"  © <a href="#">classy</a>  2014 - Developed by <a href="http://www.codexcoder.com">CodexCoder</a>";s:14:"section_sorter";a:1:{s:7:"enabled";a:7:{s:7:"feature";s:7:"Feature";s:9:"portfolio";s:9:"Portfolio";s:4:"team";s:4:"Team";s:7:"service";s:7:"Service";s:12:"pricingtable";s:13:"Pricing Table";s:4:"blog";s:11:"Achievement";s:6:"client";s:6:"Client";}}s:9:"social_bg";s:0:"";s:20:"social_section_group";a:3:{i:0;a:3:{s:11:"social_name";s:8:"Facebook";s:11:"social_icon";s:14:"fa fa-facebook";s:10:"social_url";s:1:"#";}i:1;a:3:{s:11:"social_name";s:7:"Twitter";s:11:"social_icon";s:13:"fa fa-twitter";s:10:"social_url";s:1:"#";}i:2;a:3:{s:11:"social_name";s:6:"Google";s:11:"social_icon";s:17:"fa fa-google-plus";s:10:"social_url";s:1:"#";}}s:10:"team_group";s:0:"";s:24:"newsletter_section_title";s:0:"";s:6:"mc_API";s:0:"";s:6:"mc_lst";s:0:"";}', 'yes'),
(134, '_transient_timeout_zels_section_id', '1444273215', 'no'),
(135, '_transient_zels_section_id', 'slider', 'no'),
(138, '_transient_is_multi_author', '0', 'yes'),
(141, 'theme_mods_twentyfourteen', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1444273976;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";N;s:9:"sidebar-3";N;}}}', 'yes'),
(144, '_transient_twentyfourteen_category_count', '1', 'yes'),
(145, 'theme_mods_Tournette', 'a:1:{i:0;b:0;}', 'yes'),
(146, 'tournette_theme_options', 'a:79:{s:20:"themater_logo_source";s:5:"image";s:4:"logo";s:68:"http://localhost/jrcconsultores/wp-content/uploads/2015/10/logo2.jpg";s:10:"site_title";s:20:"JRC Consultores S.A.";s:16:"site_description";s:0:"";s:7:"favicon";s:78:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/favicon.png";s:18:"contact_form_email";s:17:"mveces8@gmail.com";s:9:"read_more";s:9:"Read More";s:20:"featured_image_width";s:3:"200";s:21:"featured_image_height";s:3:"160";s:23:"featured_image_position";s:9:"alignleft";s:27:"featured_image_width_single";s:3:"300";s:28:"featured_image_height_single";s:3:"225";s:30:"featured_image_position_single";s:9:"alignleft";s:18:"footer_custom_text";s:0:"";s:14:"footer_widgets";s:4:"true";s:7:"rss_url";s:0:"";s:10:"custom_css";s:0:"";s:9:"head_code";s:0:"";s:11:"footer_code";s:0:"";s:21:"featuredposts_enabled";a:1:{i:0;s:8:"homepage";}s:20:"featuredposts_source";s:6:"custom";s:27:"featuredposts_custom_slides";a:6:{i:0;a:4:{s:3:"img";s:87:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/default-slides/1.jpg";s:4:"link";s:1:"#";s:5:"title";s:38:"This is default featured slide 1 title";s:7:"content";s:188:"You can completely customize the featured slides from the theme theme options page. You can also easily hide the slider from certain part of your site like: categories, tags, archives etc.";}i:1;a:4:{s:3:"img";s:87:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/default-slides/2.jpg";s:4:"link";s:1:"#";s:5:"title";s:38:"This is default featured slide 2 title";s:7:"content";s:188:"You can completely customize the featured slides from the theme theme options page. You can also easily hide the slider from certain part of your site like: categories, tags, archives etc.";}i:2;a:4:{s:3:"img";s:87:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/default-slides/3.jpg";s:4:"link";s:1:"#";s:5:"title";s:38:"This is default featured slide 3 title";s:7:"content";s:188:"You can completely customize the featured slides from the theme theme options page. You can also easily hide the slider from certain part of your site like: categories, tags, archives etc.";}i:3;a:4:{s:3:"img";s:87:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/default-slides/4.jpg";s:4:"link";s:1:"#";s:5:"title";s:38:"This is default featured slide 4 title";s:7:"content";s:188:"You can completely customize the featured slides from the theme theme options page. You can also easily hide the slider from certain part of your site like: categories, tags, archives etc.";}i:4;a:4:{s:3:"img";s:87:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/default-slides/5.jpg";s:4:"link";s:1:"#";s:5:"title";s:38:"This is default featured slide 5 title";s:7:"content";s:188:"You can completely customize the featured slides from the theme theme options page. You can also easily hide the slider from certain part of your site like: categories, tags, archives etc.";}s:9:"the__id__";a:4:{s:3:"img";s:0:"";s:4:"link";s:0:"";s:5:"title";s:0:"";s:7:"content";s:0:"";}}s:33:"featuredposts_source_category_num";s:1:"5";s:29:"featuredposts_source_category";s:0:"";s:26:"featuredposts_source_posts";s:0:"";s:26:"featuredposts_source_pages";s:0:"";s:20:"featuredposts_effect";s:4:"fade";s:25:"featuredposts_moreoptions";a:8:{i:0;s:9:"thumbnail";i:1;s:10:"post_title";i:2;s:12:"post_excerpt";i:3;s:5:"pager";i:4;s:9:"next_prev";i:5;s:4:"sync";i:6;s:5:"pause";i:7;s:17:"pauseOnPagerHover";}s:22:"featuredposts_readmore";s:7:"More »";s:28:"featuredposts_excerpt_length";s:2:"32";s:21:"featuredposts_timeout";s:4:"4000";s:19:"featuredposts_delay";s:1:"0";s:19:"featuredposts_speed";s:4:"1000";s:21:"featuredposts_speedIn";s:0:"";s:22:"featuredposts_speedOut";s:0:"";s:33:"themater_social_profiles_networks";a:6:{i:0;a:3:{s:5:"title";s:7:"Twitter";s:3:"url";s:19:"http://twitter.com/";s:6:"button";s:94:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/twitter.png";}i:1;a:3:{s:5:"title";s:8:"Facebook";s:3:"url";s:20:"http://facebook.com/";s:6:"button";s:95:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/facebook.png";}i:2;a:3:{s:5:"title";s:11:"Google Plus";s:3:"url";s:24:"https://plus.google.com/";s:6:"button";s:92:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/gplus.png";}i:3;a:3:{s:5:"title";s:8:"LinkedIn";s:3:"url";s:24:"http://www.linkedin.com/";s:6:"button";s:95:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/linkedin.png";}i:4;a:3:{s:5:"title";s:8:"RSS Feed";s:3:"url";s:47:"http://localhost/jrcconsultores/index.php/feed/";s:6:"button";s:90:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/rss.png";}i:5;a:3:{s:5:"title";s:5:"Email";s:3:"url";s:21:"mailto:your@email.com";s:6:"button";s:92:"http://localhost/jrcconsultores/wp-content/themes/Tournette/images/social-profiles/email.png";}}s:12:"menu_primary";s:4:"true";s:25:"menu_primary_mobile_title";s:4:"Menu";s:18:"menu_primary_depth";s:1:"0";s:19:"menu_primary_effect";s:4:"fade";s:18:"menu_primary_speed";s:3:"200";s:18:"menu_primary_delay";s:3:"800";s:19:"menu_primary_arrows";s:4:"true";s:20:"menu_primary_shadows";s:0:"";s:14:"menu_secondary";s:0:"";s:27:"menu_secondary_mobile_title";s:10:"Navigation";s:20:"menu_secondary_depth";s:1:"0";s:21:"menu_secondary_effect";s:4:"fade";s:20:"menu_secondary_speed";s:3:"200";s:20:"menu_secondary_delay";s:3:"800";s:21:"menu_secondary_arrows";s:4:"true";s:22:"menu_secondary_shadows";s:0:"";s:24:"theme_guide_feature_tour";s:0:"";s:24:"themater_logo_iamge_wrap";s:0:"";s:28:"themater_logo_iamge_wrap_end";s:0:"";s:23:"themater_logo_text_wrap";s:0:"";s:27:"themater_logo_text_wrap_end";s:0:"";s:23:"featured_image_settings";s:0:"";s:32:"featured_image_settings_homepage";s:0:"";s:30:"featured_image_settings_single";s:0:"";s:13:"header_banner";s:0:"";s:13:"reset_options";s:0:"";s:7:"support";s:0:"";s:20:"featuredposts_images";s:0:"";s:24:"featuredposts_source_css";s:0:"";s:32:"featuredposts_source_custom_wrap";s:0:"";s:36:"featuredposts_source_custom_end_wrap";s:0:"";s:34:"featuredposts_source_category_wrap";s:0:"";s:38:"featuredposts_source_category_end_wrap";s:0:"";s:31:"featuredposts_source_posts_wrap";s:0:"";s:35:"featuredposts_source_posts_wrap_end";s:0:"";s:31:"featuredposts_source_pages_wrap";s:0:"";s:35:"featuredposts_source_pages_wrap_end";s:0:"";s:31:"featuredposts_misc_options_info";s:0:"";s:15:"social_profiles";s:0:"";s:17:"menu_primary_info";s:0:"";s:22:"menu_primary_drop_down";s:0:"";s:19:"menu_secondary_info";s:0:"";s:24:"menu_secondary_drop_down";s:0:"";}', 'yes'),
(147, 'wp_theme_initilize_set_tournette', 'a:2:{s:32:"428d9af01969ac0077ddc4a1adc59f6e";a:4:{i:0;s:7:"website";i:1;s:6:"R4 3DS";i:2;s:6:"R4i3DS";i:3;s:12:"Carte R4 3DS";}s:32:"940e6157290a1ea7a0e121aef8f19461";a:4:{i:0;s:22:"eesignalboosters.co.uk";i:1;s:4:"here";i:2;s:12:"Carte R4 3DS";i:3;s:15:"r4 3ds rts card";}}', 'yes'),
(185, '_transient_doing_cron', '1454035546.2270419597625732421875', 'yes'),
(187, '_site_transient_timeout_theme_roots', '1454037354', 'yes'),
(188, '_site_transient_theme_roots', 'a:5:{s:9:"Tournette";s:7:"/themes";s:11:"classy-lite";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";}', 'yes'),
(191, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:2:{i:0;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:64:"http://downloads.wordpress.org/release/es_ES/wordpress-4.4.1.zip";s:6:"locale";s:5:"es_ES";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:64:"http://downloads.wordpress.org/release/es_ES/wordpress-4.4.1.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.1";s:7:"version";s:5:"4.4.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}i:1;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:58:"http://downloads.wordpress.org/release/wordpress-4.4.1.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:58:"http://downloads.wordpress.org/release/wordpress-4.4.1.zip";s:10:"no_content";s:69:"http://downloads.wordpress.org/release/wordpress-4.4.1-no-content.zip";s:11:"new_bundled";s:70:"http://downloads.wordpress.org/release/wordpress-4.4.1-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.1";s:7:"version";s:5:"4.4.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1454035563;s:15:"version_checked";s:5:"4.3.1";s:12:"translations";a:0:{}}', 'yes'),
(194, 'auto_updater.lock', '1454035569', 'no'),
(195, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1454035572;s:7:"checked";a:5:{s:9:"Tournette";s:3:"1.0";s:11:"classy-lite";s:5:"1.0.2";s:13:"twentyfifteen";s:3:"1.3";s:14:"twentyfourteen";s:3:"1.5";s:14:"twentythirteen";s:3:"1.6";}s:8:"response";a:3:{s:13:"twentyfifteen";a:4:{s:5:"theme";s:13:"twentyfifteen";s:11:"new_version";s:3:"1.4";s:3:"url";s:43:"https://wordpress.org/themes/twentyfifteen/";s:7:"package";s:58:"http://downloads.wordpress.org/theme/twentyfifteen.1.4.zip";}s:14:"twentyfourteen";a:4:{s:5:"theme";s:14:"twentyfourteen";s:11:"new_version";s:3:"1.6";s:3:"url";s:44:"https://wordpress.org/themes/twentyfourteen/";s:7:"package";s:59:"http://downloads.wordpress.org/theme/twentyfourteen.1.6.zip";}s:14:"twentythirteen";a:4:{s:5:"theme";s:14:"twentythirteen";s:11:"new_version";s:3:"1.7";s:3:"url";s:44:"https://wordpress.org/themes/twentythirteen/";s:7:"package";s:59:"http://downloads.wordpress.org/theme/twentythirteen.1.7.zip";}}s:12:"translations";a:3:{i:0;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:13:"twentyfifteen";s:8:"language";s:5:"es_ES";s:7:"version";s:3:"1.3";s:7:"updated";s:19:"2015-07-27 22:21:26";s:7:"package";s:76:"http://downloads.wordpress.org/translation/theme/twentyfifteen/1.3/es_ES.zip";s:10:"autoupdate";b:1;}i:1;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:14:"twentyfourteen";s:8:"language";s:5:"es_ES";s:7:"version";s:3:"1.5";s:7:"updated";s:19:"2015-07-27 22:21:25";s:7:"package";s:77:"http://downloads.wordpress.org/translation/theme/twentyfourteen/1.5/es_ES.zip";s:10:"autoupdate";b:1;}i:2;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:14:"twentythirteen";s:8:"language";s:5:"es_ES";s:7:"version";s:3:"1.6";s:7:"updated";s:19:"2015-07-27 22:21:23";s:7:"package";s:77:"http://downloads.wordpress.org/translation/theme/twentythirteen/1.6/es_ES.zip";s:10:"autoupdate";b:1;}}}', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 4, '_menu_item_type', 'custom'),
(3, 4, '_menu_item_menu_item_parent', '0'),
(4, 4, '_menu_item_object_id', '4'),
(5, 4, '_menu_item_object', 'custom'),
(6, 4, '_menu_item_target', ''),
(7, 4, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(8, 4, '_menu_item_xfn', ''),
(9, 4, '_menu_item_url', 'http://localhost/jrcconsultores/'),
(10, 4, '_menu_item_orphaned', '1444272469'),
(11, 5, '_menu_item_type', 'post_type'),
(12, 5, '_menu_item_menu_item_parent', '0'),
(13, 5, '_menu_item_object_id', '2'),
(14, 5, '_menu_item_object', 'page'),
(15, 5, '_menu_item_target', ''),
(16, 5, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(17, 5, '_menu_item_xfn', ''),
(18, 5, '_menu_item_url', ''),
(19, 5, '_menu_item_orphaned', '1444272470'),
(20, 6, '_edit_last', '1'),
(21, 6, '_edit_lock', '1444272507:1'),
(26, 9, '_wp_attached_file', '2015/10/APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt.jpg'),
(27, 9, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1733;s:6:"height";i:1300;s:4:"file";s:73:"2015/10/APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:73:"APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:73:"APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:74:"APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt-1024x768.jpg";s:5:"width";i:1024;s:6:"height";i:768;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(28, 10, '_wp_attached_file', '2015/10/cx.jpg.jpg'),
(29, 10, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1733;s:6:"height";i:1300;s:4:"file";s:18:"2015/10/cx.jpg.jpg";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"cx.jpg-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:18:"cx.jpg-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:19:"cx.jpg-1024x768.jpg";s:5:"width";i:1024;s:6:"height";i:768;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2015-10-08 02:29:48', '2015-10-08 02:29:48', 'Bienvenido a WordPress. Esta es tu primera entrada. Edítala o bórrala, ¡y comienza a escribir!', '¡Hola mundo!', '', 'publish', 'open', 'open', '', 'hola-mundo', '', '', '2015-10-08 02:29:48', '2015-10-08 02:29:48', '', 0, 'http://localhost/jrcconsultores/?p=1', 0, 'post', '', 1),
(2, 1, '2015-10-08 02:29:48', '2015-10-08 02:29:48', 'Esto es una página de ejemplo. Es diferente a una entrada porque permanece fija en un lugar y se mostrará en la navegación de tu sitio (en la mayoría de los temas). La mayoría de la gente empieza con una página de Acerca de, que les presenta a los potenciales visitantes del sitio. Podría ser algo como esto:\n\n<blockquote>¡Hola! Soy mensajero por el día, aspirante a actor por la noche, y este es mi blog. Vivo en Madrid, tengo un perrazo llamado Duque y me gustan las piñas coladas (y que me pille un chaparrón)</blockquote>\n\n...o algo así:\n\n<blockquote>La empresa XYZ se fundó en 1971 y ha estado ofreciendo "cosas" de calidad al público desde entonces. Situada en Madrid, XYZ emplea a más de 2.000 personas y hace todo tipo de cosas sorprendentes para la comunidad de Madrid.</blockquote>\n\nSi eres nuevo en WordPress deberías ir a <a href="http://localhost/jrcconsultores/wp-admin/">tu escritorio</a> para borrar esta página y crear páginas nuevas con tu propio contenido. ¡Pásalo bien!', 'Página de ejemplo', '', 'publish', 'closed', 'open', '', 'pagina-ejemplo', '', '', '2015-10-08 02:29:48', '2015-10-08 02:29:48', '', 0, 'http://localhost/jrcconsultores/?page_id=2', 0, 'page', '', 0),
(4, 1, '2015-10-08 02:47:48', '0000-00-00 00:00:00', '', 'Inicio', '', 'draft', 'closed', 'closed', '', '', '', '', '2015-10-08 02:47:48', '0000-00-00 00:00:00', '', 0, 'http://localhost/jrcconsultores/?p=4', 1, 'nav_menu_item', '', 0),
(5, 1, '2015-10-08 02:47:49', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2015-10-08 02:47:49', '0000-00-00 00:00:00', '', 0, 'http://localhost/jrcconsultores/?p=5', 1, 'nav_menu_item', '', 0),
(6, 1, '2015-10-08 02:50:44', '2015-10-08 02:50:44', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id', 'Quiero otra entrada', '', 'publish', 'open', 'open', '', 'quiero-otra-entrada', '', '', '2015-10-08 02:50:44', '2015-10-08 02:50:44', '', 0, 'http://localhost/jrcconsultores/?p=6', 0, 'post', '', 0),
(7, 1, '2015-10-08 02:50:31', '2015-10-08 02:50:31', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id', 'Quiero otra entrada', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2015-10-08 02:50:31', '2015-10-08 02:50:31', '', 6, 'http://localhost/jrcconsultores/index.php/2015/10/08/6-revision-v1/', 0, 'revision', '', 0),
(9, 1, '2015-10-08 02:59:25', '2015-10-08 02:59:25', '', 'APLICACIÓN DE EM LECERIA ESTABULADA GRADO A- ANTON COCLÉ_opt', 'Aliquam tincidunt mauris eu risus.', 'inherit', 'open', 'closed', '', 'aplicacion-de-em-leceria-estabulada-grado-a-anton-cocle_opt', '', '', '2015-10-08 02:59:52', '2015-10-08 02:59:52', '', 0, 'http://localhost/jrcconsultores/wp-content/uploads/2015/10/APLICACIÓN-DE-EM-LECERIA-ESTABULADA-GRADO-A-ANTON-COCLÉ_opt.jpg', 0, 'attachment', 'image/jpeg', 0),
(10, 1, '2015-10-08 03:01:16', '2015-10-08 03:01:16', '', 'cx.jpg', '', 'inherit', 'open', 'closed', '', 'cx-jpg', '', '', '2015-10-08 03:01:16', '2015-10-08 03:01:16', '', 0, 'http://localhost/jrcconsultores/wp-content/uploads/2015/10/cx.jpg.jpg', 0, 'attachment', 'image/jpeg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Sin categoría', 'sin-categoria', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(6, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'jrcConsultores'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', ''),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'session_tokens', 'a:2:{s:64:"b3b355bbbb3c2e11274d1ad57e3951f39c489c32cf36bba9cd647fe9af452e25";a:4:{s:10:"expiration";i:1445351085;s:2:"ip";s:3:"::1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.71 Safari/537.36";s:5:"login";i:1445178285;}s:64:"a8e56e52853f4d006a18e0b45bafebf951a7c6b71ace7a272769c6ab9d20de2c";a:4:{s:10:"expiration";i:1445351115;s:2:"ip";s:3:"::1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.71 Safari/537.36";s:5:"login";i:1445178315;}}'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(16, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(17, 1, 'metaboxhidden_nav-menus', 'a:4:{i:0;s:13:"add-portfolio";i:1;s:12:"add-post_tag";i:2;s:15:"add-post_format";i:3;s:22:"add-portfolio-category";}'),
(18, 1, 'wp_user-settings', 'libraryContent=browse&mfold=o'),
(19, 1, 'wp_user-settings-time', '1444273203');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'jrcConsultores', '$P$BaRZd6MEdpmPYbZXKPCFC1pq.Q92/V0', 'jrcconsultores', 'mveces8@gmail.com', '', '2015-10-08 02:29:46', '', 0, 'jrcConsultores');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
