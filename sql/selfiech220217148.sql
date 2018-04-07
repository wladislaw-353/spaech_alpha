-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2017 г., 20:48
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `selfiech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `language_id`, `login`, `password`, `date_add`) VALUES
(3, 'Главный администратор', 1, 'admin', '71df3f8347c1fa2c491cbec567b506c8', '0000-00-00 00:00:00'),
(4, 'user', 1, 'user', '410b595501f84ad4d5acef7206c2bff8', '2016-04-19 00:00:00'),
(5, 'useradmin', 1, '', '', '2016-11-12 20:34:22'),
(6, 'artem', 1, 'artem', 'b3ba7981d894271b0a94ca29e747e693', '2016-11-23 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `carousels`
--

CREATE TABLE IF NOT EXISTS `carousels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT 'Заголовок',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL,
  `link` text NOT NULL COMMENT 'Метатитлы',
  `photo` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `carousels`
--

INSERT INTO `carousels` (`id`, `group_id`, `name`, `language_id`, `description`, `link`, `photo`, `sort`, `block_id`, `date_add`) VALUES
(20, 20, 'карусель 1', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;\r\n', '/', '1471956300.jpg', 0, 1, '2016-08-23 15:42:30'),
(21, 21, 'карусель 2', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;', '/', '1471956324.jpg', 0, 1, '2016-08-23 15:44:03'),
(22, 22, 'карусель 3', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;', '/', '1471956394.jpg', 0, 1, '2016-08-23 15:46:23'),
(24, 20, 'карусель 1', 2, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;\r\n', '/', '1471956300.jpg', 0, 1, '2016-08-23 15:42:30'),
(25, 21, 'карусель 2', 2, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;', '/', '1471956324.jpg', 0, 1, '2016-08-23 15:44:03'),
(26, 22, 'карусель 3', 2, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quisquam laborum fuga voluptatum rerum eaque a aliquam quae optio, perspiciatis eius cupiditate, delectus excepturi, doloribus obcaecati qui possimus quos eveniet.&lt;/p&gt;', '/', '1471956394.jpg', 0, 1, '2016-08-23 15:46:23'),
(27, 27, '123123', 1, '&lt;p&gt;Описание&lt;/p&gt;\r\n', '', '1487682130.png', 0, 3, '2017-02-21 16:01:02'),
(28, 27, '123123', 2, '', '', '', 0, 3, '2017-02-21 16:01:02');

-- --------------------------------------------------------

--
-- Структура таблицы `carousels_blocks`
--

CREATE TABLE IF NOT EXISTS `carousels_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `class` varchar(255) NOT NULL,
  `is_header` int(1) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `carousels_blocks`
--

INSERT INTO `carousels_blocks` (`id`, `name`, `language_id`, `class`, `is_header`, `date_add`) VALUES
(2, 'карусель', 2, '', 1, '2016-08-23 15:42:08'),
(3, 'carousel', 1, 'carousel-div', 1, '2017-02-21 15:58:18');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_name` varchar(65) DEFAULT NULL,
  `cart_sku` varchar(65) DEFAULT NULL,
  `cart_price` int(10) DEFAULT NULL,
  `token` varchar(65) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `meta_t` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_header` int(11) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL DEFAULT '8',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  `token` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `galerys`
--

CREATE TABLE IF NOT EXISTS `galerys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `galerys`
--

INSERT INTO `galerys` (`id`, `name`, `language_id`, `date_add`) VALUES
(1, 'Лицензии', 1, '2016-08-03 14:31:27');

-- --------------------------------------------------------

--
-- Структура таблицы `galerys_photo`
--

CREATE TABLE IF NOT EXISTS `galerys_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) NOT NULL,
  `photo_desc` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Дамп данных таблицы `galerys_photo`
--

INSERT INTO `galerys_photo` (`photo_id`, `photo_name`, `photo_desc`, `src`, `pp_id`, `sort`) VALUES
(58, '', '', '1481204665.jpg', 1, 1),
(59, '', '', '1481204672.jpg', 1, 3),
(60, '', '', '1481204679.jpg', 1, 2),
(61, '', '', '1481204749.jpg', 1, 4),
(62, '', '', '1481204757.jpg', 1, 5),
(63, '', '', '1481204767.jpg', 1, 6),
(64, '', '', '1481204776.jpg', 1, 7),
(65, '', '', '1481204787.jpg', 1, 8),
(66, '', '', '1481204797.jpg', 1, 9),
(67, '', '', '1481204804.jpg', 1, 10),
(68, '', '', '1481204812.jpg', 1, 11),
(69, '', '', '1481204823.jpg', 1, 12),
(70, '', '', '1481204837.jpg', 1, 13),
(71, '', '', '1481204851.jpg', 1, 14),
(72, '', '', '1481204859.jpg', 1, 15),
(73, '', '', '1481204868.jpg', 1, 16),
(74, '', '', '1481204876.jpg', 1, 17),
(75, '', '', '1481204882.jpg', 1, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `htmls`
--

CREATE TABLE IF NOT EXISTS `htmls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `full_text` longtext NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Дамп данных таблицы `htmls`
--

INSERT INTO `htmls` (`id`, `group_id`, `name`, `alias`, `language_id`, `full_text`, `date_add`) VALUES
(76, 76, 'Главная (challenge, spaech, seeach) top slick slider', 'glavnaya-(challenge--spaech--seeach)-top-slick-slider', 1, '&lt;div class=&quot;container&quot;&gt;\r\n    &lt;div class=&quot;row&quot;&gt;\r\n        &lt;div class=&quot;slick-container&quot;&gt;\r\n            &lt;section class=&quot;boxers slider1&quot;&gt;\r\n            &lt;div &gt;\r\n                &lt;a class=&quot;two&quot; rel=&quot;group&quot; href=&quot;/img/other/challenge_img_small.jpg&quot;&gt;\r\n                    &lt;img src=&quot;/img/other/challenge_img_small.jpg&quot; class=&quot;img-responsive&quot;&gt;\r\n                &lt;/a&gt;\r\n               \r\n            &lt;/div&gt;\r\n            &lt;div&gt;\r\n                &lt;a class=&quot;two&quot; rel=&quot;group&quot; href=&quot;/img/other/spaech_img_small.jpg&quot;&gt;\r\n                    &lt;img src=&quot;/img/other/spaech_img_small.jpg&quot; class=&quot;img-responsive&quot;&gt; \r\n                &lt;/a&gt;\r\n              \r\n            &lt;/div&gt;\r\n            &lt;div&gt;\r\n                &lt;a class=&quot;two&quot; rel=&quot;group&quot; href=&quot;/img/other/seeach_img_small.jpg&quot;&gt;\r\n                    &lt;img src=&quot;/img/other/seeach_img_small.jpg&quot; class=&quot;img-responsive&quot;&gt; \r\n                &lt;/a&gt;\r\n              \r\n            &lt;/div&gt;\r\n        &lt;/section&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n&lt;/div&gt;\r\n', '2017-02-21 16:40:01'),
(77, 76, 'Главная (challenge, spaech, seeach) top slick slider', 'glavnaya-(challenge--spaech--seeach)-top-slick-slider', 2, 'UA', '2017-02-21 16:40:01'),
(78, 78, 'Главная (Миссия Принципы Итог)', 'glavnaya-(missiya-principy-itog)', 1, '&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;descr&quot;&gt;\r\n&lt;h3&gt;Миссия&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;Сделать мир добрее и остановить агрессию&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Мы верим, что благодаря нашей сети люди станут внимательней, учтивее, доброжелательней и приветливей друг к другу. Эти качества в дальнейшем помогут избежать конфликтных ситуаций.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;descr&quot;&gt;\r\n&lt;h3&gt;Принципы&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;Оценки по различным категориям&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;С помощью оценок люди смогут учитывать все свои сильные и слабые стороны, работать над собой, становиться лучше и всесторонне развиваться.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;descr&quot;&gt;\r\n&lt;h3&gt;Итог&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;Рейтинг как общепринятый показатель&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Высокий рейтинг открывает новые возможности и новых интересных людей.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n', '2017-02-22 12:57:04'),
(79, 78, 'Главная (Миссия Принципы Итог)', 'glavnaya-(missiya-principy-itog)', 2, '', '2017-02-22 12:57:04');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `language_id`) VALUES
(1, 'Русский', 1),
(2, 'Украинский', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `class` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `is_header` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `group_id`, `name`, `alias`, `language_id`, `class`, `position`, `is_header`, `date_add`, `type`) VALUES
(21, 21, 'Главное меню', 'glavnoe-menyu', 1, 'main-menu', 1, 0, '2016-06-10 13:51:30', 'horizontal'),
(23, 21, 'Главное меню', 'glavnoe-menyu', 2, 'main-menu', 1, 0, '2016-06-10 13:51:30', 'horizontal'),
(24, 22, 'Меню футер', 'menyu-futer', 2, '', 6, 0, '2016-06-24 16:56:52', 'vertical'),
(26, 25, 'Боковое', 'bokovoe', 2, 'bokovoe', 1, 1, '2016-12-19 13:16:42', 'vertical'),
(27, 27, 'Меню футер', 'menyu-futer', 1, '', 6, 0, '2017-01-07 13:08:17', 'vertical'),
(28, 27, 'Меню футер', 'menyu-futer', 2, '', 6, 0, '2017-01-07 13:08:17', 'vertical');

-- --------------------------------------------------------

--
-- Структура таблицы `menus_items`
--

CREATE TABLE IF NOT EXISTS `menus_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=178 ;

--
-- Дамп данных таблицы `menus_items`
--

INSERT INTO `menus_items` (`id`, `menu_id`, `page_id`, `sort`, `parent`) VALUES
(138, 21, 269, 20, 0),
(144, 22, 1, 10, 0),
(145, 22, 269, 20, 0),
(146, 22, 270, 30, 0),
(147, 22, 271, 40, 0),
(148, 22, 272, 50, 0),
(149, 22, 273, 60, 0),
(150, 22, 274, 70, 0),
(156, 21, 296, 30, 273),
(157, 21, 297, 40, 273),
(159, 25, 341, 0, 0),
(160, 25, 357, 0, 0),
(161, 25, 363, 0, 0),
(162, 25, 369, 0, 0),
(165, 21, 274, 50, 0),
(167, 21, 1, 10, 0),
(168, 21, 270, 30, 0),
(170, 27, 1, 10, 0),
(174, 27, 270, 20, 0),
(175, 27, 269, 30, 0),
(176, 21, 383, 40, 0),
(177, 27, 381, 40, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menus_positions`
--

CREATE TABLE IF NOT EXISTS `menus_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `menus_positions`
--

INSERT INTO `menus_positions` (`id`, `name`) VALUES
(1, 'Главное меню'),
(6, 'Меню футер справа');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numbers` int(6) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shipping` varchar(65) DEFAULT NULL,
  `payment` varchar(65) DEFAULT NULL,
  `name` varchar(65) DEFAULT NULL,
  `city` varchar(65) DEFAULT NULL,
  `address` varchar(65) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_items`
--

CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `spare_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `alias` text NOT NULL COMMENT 'Персональный URL',
  `name` text NOT NULL COMMENT 'Заголовок',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `full_text` longtext NOT NULL COMMENT 'Основной текст',
  `meta_t` text NOT NULL COMMENT 'Метатитлы',
  `meta_k` text NOT NULL COMMENT 'Ключевые слова (keywords)',
  `meta_d` text NOT NULL COMMENT 'Описание (description)',
  `date_add` datetime NOT NULL,
  `leftbar` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_text_prewie` int(1) NOT NULL DEFAULT '0',
  `is_image_prewie` int(1) NOT NULL DEFAULT '1',
  `is_rewies` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=403 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `group_id`, `alias`, `name`, `language_id`, `description`, `full_text`, `meta_t`, `meta_k`, `meta_d`, `date_add`, `leftbar`, `parent`, `sort`, `photo`, `is_text_prewie`, `is_image_prewie`, `is_rewies`) VALUES
(284, 284, 'otkhody-plastikovye', 'Отходы пластиковые', 1, '', '&lt;p&gt;Пластик обосновался во всех сферах нашей жизни довольно давно. Из-за своей дешевизны из пластика изготавливают все, начиная от упаковки для продуктов на наших столах и заканчивая деталями для производственного оборудования.&lt;/p&gt;\r\n\r\n&lt;p&gt;Но пластик имеет обратную сторону медали своей дешевизны, он быстро теряет свои свойства, и так же скоро отправляется &amp;laquo;на свалку&amp;raquo;, где проводит еще сотни лет, до полного своего разложения нанося вред окружающей среде.&lt;/p&gt;\r\n\r\n&lt;p&gt;К счастью, компания НПК &amp;laquo;УкрЭкоПром&amp;raquo; занимается переработкой отходов пластмассы. Вы сможете положиться на команду наших специалистов, которые быстро и качественно смогут решить Ваши проблемы с данным видом отходов, тем самым:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;сократив объемы отходов;&lt;/li&gt;\r\n	&lt;li&gt;обезвредив и переработав их;&lt;/li&gt;\r\n	&lt;li&gt;создав сырье для вторичного использования;&lt;/li&gt;\r\n	&lt;li&gt;уменьшив негативное влияние на экологию нашей планеты.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 'Отходы пластиковые', '', '', '2016-06-22 17:06:33', 0, 275, 70, '', 0, 1, 0),
(1, 1, 'home', 'Главная', 1, '', '&lt;div class=&quot;main-text&quot;&gt;\r\n    &lt;div class=&quot;selfi-header&quot;&gt;\r\n        &lt;h1&gt;Selfiech&lt;/h1&gt;\r\n\r\n        &lt;h3&gt;Селфи Империя XXI века&lt;/h3&gt;\r\n\r\n        &lt;p&gt;&lt;em&gt;Исключительно для заядлых селфи-мейкеров,&lt;br /&gt;\r\n            легкие которых наполнены духом состязания и победы&lt;/em&gt;&lt;/p&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;h3&gt;Предисловие&lt;/h3&gt;\r\n\r\n        &lt;p&gt;Можно ли предположить, что в 21 веке селфи-мейкер не найдет ни одной социальной сети, где бы он мог поделиться своим уникальным селфи со всем миром? Конечно, нет. Интернет-магазины переполнены сервисами типа Instagram, Tumblr, Facebook, VK и др. Но спустя уже столько лет успешного функционировании эти идеи почти изжили себя.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Пользователи Instagram автоматизировано выкладывают новые фотографии с +100500 хэштегами, жители Tumblr &amp;ndash; все реже посещают свои блоги, а Facebook и VK и ранее использовались больше для общения. Не получая от любимых соц. сетей волны былого удовольствия и восторга, пользователь ныряет в интерет-паутину за поисками своего селфи-клада&amp;hellip;&lt;/p&gt;\r\n\r\n        &lt;h3&gt;Уникальная находка&lt;/h3&gt;\r\n\r\n        &lt;blockquote&gt;&lt;em&gt;Selfiech&lt;/em&gt; &amp;ndash; свежий подход к селфи-мейкингу&lt;/blockquote&gt;\r\n\r\n        &lt;p&gt;Подобно Атлантиде, затерянной в неизмеримых водных массах, СелфиИмперия Selfiech ожидает своих воинов. В захватывающих селфи-сражениях, которые происходят за толщей стен замка, предстоит поучаствовать каждому, у кого хватит смелости и выдержки дойти до вершины через самые разнообразные испытания.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Selfiech воплотил желание миллионов в жизнь! Желание превзойти соперника своей неординарностью, инициативностью и креативностью, выраженными в одном единственном селфи (а может и не в одном&amp;hellip;).&lt;/p&gt;\r\n\r\n        &lt;h3&gt;Посвящение в рыцари&lt;/h3&gt;\r\n\r\n        &lt;p&gt;Чтобы стать полноценным жителем СелфиИмперии нужно потрудиться над своей репутацией, репутацией непобедимого Воина. Для этого были разработаны 100 селфи-приложений-городков, каждое из которых рассчитано на селфи определенной тематики.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Ваша задача &amp;ndash; делая уникальные тематические снимки в разных приложения (а можно и в одном) накопить 1000 баллов рейтинга, который будет формироваться исходя из оценок жителей селфи-городков.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Первый шаг - зарегистрировать понравившееся приложение из сотни предложенных, тематика которого была бы по душе. На выбор первопроходцев: селфи с друзьями (Selfie Friends), с животными (Selfie Animal), с едой (Selfie Food), с детьми (Baby Selfie), с бородой (Selfie Beard) и т.д. Категорий настолько много, что каждый найдет &amp;laquo;Свою&amp;raquo;, в которой он наиболее силен.&lt;/p&gt;\r\n\r\n        &lt;div class=&quot;row margin-top-bottom-50&quot;&gt;\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;good&quot; src=&quot;img/good_color.png&quot; /&gt;&lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;baby&quot; src=&quot;img/baby_color.png&quot; /&gt;&lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;rating&quot; src=&quot;img/rating_color.png&quot; /&gt;&lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;fr&quot; src=&quot;img/friend_color.png&quot; /&gt;&lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;food&quot; src=&quot;img/food_color.png&quot; /&gt;&lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-2 col-sm-4&quot;&gt;&lt;img alt=&quot;animal&quot; src=&quot;img/animal_color.png&quot; /&gt;&lt;/div&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;p&gt;При регистрации, пока ещё интернет-путешественнику, будет предоставлено 200 поинтов. Каждая сотня говорит о количестве городков, где может сражаться игрок. Это значит, что установив первое приложение, пользователю открывается доступ к подключении еще одного. Затем рост рейтинга будет зависеть от активности путешественника в обоих городках и, как только количество баллов достигнет 300, он получит возможность скачать третье приложение на свой выбор.&lt;/p&gt;\r\n        &amp;nbsp;\r\n\r\n        &lt;p&gt;&lt;em&gt;Сделай необычное селфи, завоюй признание горожан, достигни золотой вершины и стань избранным &amp;ndash; воином Селфи-Империи Selfiech &lt;/em&gt;&lt;/p&gt;\r\n\r\n        &lt;h3&gt;Правила рыцарского Selfiech-сражения&lt;/h3&gt;\r\n\r\n        &lt;p&gt;Как только ранее недостижимая брама замка Selfiech откроется перед воином, он перейдет на новый уровень сражения, сражения на Selfiech-ринге, где не существует никаких правил и открываются новые уникальные возможности, пребывающие за тысячью замками для обычного интернет-путешественника. Главное преимущество Selfiech-ринга &amp;ndash; возможность не только соревноваться с сильнейшими, но и самостоятельно создавать селфи-челенджеры.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Есть гениальная идея для темы фотоснимка? Нет проблемы! Организуй свой челендж-городок и управляй им. Одобрить работу жителя или отправить ее на свалку &amp;ndash; решать тебе.&lt;/p&gt;\r\n\r\n        &lt;p&gt;Почувствуй вкус сражения, триумфа и власти. Стремись к большему и не сдавайся. Делай селфи с удовольствием, развивай креативность, расширь границы своих возможностей, отбрось рамки, воплоти желанное в реальность, позволь другим оценить твои способности.&lt;/p&gt;\r\n\r\n        &lt;p&gt;&lt;em&gt;Сражайся в селфи-челенджерах Selfiech!&lt;/em&gt;&lt;/p&gt;\r\n    &lt;/div&gt;\r\n\r\n    &lt;div class=&quot;our-team&quot;&gt;\r\n        &lt;h2&gt;Наша команда&lt;/h2&gt;\r\n\r\n        &lt;h3&gt;Интернет-маркетинг&lt;/h3&gt;\r\n\r\n        &lt;div class=&quot;row&quot;&gt;\r\n            &lt;div class=&quot;col-md-12 text-center relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;n&quot; src=&quot;img/our_team_nikos.jpg&quot; /&gt; &lt;img alt=&quot;sword_png&quot; class=&quot;absolute_img&quot; src=&quot;img/sword.png&quot; /&gt;\r\n                    &lt;h4&gt;Никос&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Автор проектов&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;you&quot; src=&quot;img/our_team_yulya.jpg&quot; /&gt; &lt;img alt=&quot;sword_png&quot; class=&quot;absolute_img&quot; src=&quot;img/sword.png&quot; /&gt;\r\n                    &lt;h4&gt;Юля&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Копирайтер&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;nn&quot; src=&quot;img/our_team_yulya_menejer.jpg&quot; /&gt; &lt;img alt=&quot;sword_png&quot; class=&quot;absolute_img&quot; src=&quot;img/sword.png&quot; /&gt;\r\n                    &lt;h4&gt;Юля&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Менеджер&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;nn&quot; src=&quot;img/our_team_denis2.jpg&quot; /&gt; &lt;img alt=&quot;sword_png&quot; class=&quot;absolute_img&quot; src=&quot;img/sword.png&quot; /&gt;\r\n                    &lt;h4&gt;Денис&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;PPC&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;nn&quot; src=&quot;img/our_team_sasha.jpg&quot; /&gt; &lt;img alt=&quot;sword_png&quot; class=&quot;absolute_img&quot; src=&quot;img/sword.png&quot; /&gt;\r\n                    &lt;h4&gt;Александр&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;CMM&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;div class=&quot;row&quot;&gt;\r\n            &lt;h3&gt;Дизайн&lt;/h3&gt;\r\n\r\n            &lt;div class=&quot;col-md-12 text-center relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;k&quot; src=&quot;img/our_team_katya.jpg&quot; /&gt; &lt;img alt=&quot;tower&quot; class=&quot;absolute_img&quot; src=&quot;img/tower.png&quot; /&gt;\r\n                    &lt;h4&gt;Катерина&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Арт-директор&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;ks&quot; src=&quot;img/our_team_kseniya.jpg&quot; /&gt; &lt;img alt=&quot;tower&quot; class=&quot;absolute_img&quot; src=&quot;img/tower.png&quot; /&gt;\r\n                    &lt;h4&gt;Ксюша&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;UI/UX дизайн&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;al&quot; src=&quot;img/our_team_albina.jpg&quot; /&gt; &lt;img alt=&quot;tower&quot; class=&quot;absolute_img&quot; src=&quot;img/tower.png&quot; /&gt;\r\n                    &lt;h4&gt;Альбина&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Иллюстратор&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;m&quot; src=&quot;img/our_team_masha.jpg&quot; /&gt; &lt;img alt=&quot;tower&quot; class=&quot;absolute_img&quot; src=&quot;img/tower.png&quot; /&gt;\r\n                    &lt;h4&gt;Маша&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Web-дизайн&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n            &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;mm&quot; src=&quot;img/our_team_olya.jpg&quot; /&gt; &lt;img alt=&quot;tower&quot; class=&quot;absolute_img&quot; src=&quot;img/tower.png&quot; /&gt;\r\n                    &lt;h4&gt;Оля&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Иллюстратор&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n\r\n        &lt;div class=&quot;row&quot;&gt;\r\n            &lt;h3&gt;Программирование&lt;/h3&gt;\r\n\r\n            &lt;div class=&quot;col-md-12 text-center relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;a&quot; src=&quot;img/our_team_anton.jpg&quot; /&gt; &lt;img alt=&quot;horse&quot; class=&quot;absolute_img&quot; src=&quot;img/horse.png&quot; /&gt;\r\n                    &lt;h4&gt;Антон&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Team leader&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;yura&quot; src=&quot;img/our_team_yura.jpg&quot; /&gt; &lt;img alt=&quot;horse&quot; class=&quot;absolute_img&quot; src=&quot;img/horse.png&quot; /&gt;\r\n                    &lt;h4&gt;Юрий&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Ведущий программист&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;img/our_team_anton22.jpg&quot; /&gt; &lt;img alt=&quot;horse&quot; class=&quot;absolute_img&quot; src=&quot;img/horse.png&quot; /&gt;\r\n                    &lt;h4&gt;Антон&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Mobile dev&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;img/our_team_valer.jpg&quot; /&gt; &lt;img alt=&quot;horse&quot; class=&quot;absolute_img&quot; src=&quot;img/horse.png&quot; /&gt;\r\n                    &lt;h4&gt;Валерий&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Web-разработчик&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n\r\n            &lt;div class=&quot;col-md-3 col-sm-6 relative&quot;&gt;\r\n                &lt;div class=&quot;team-img-wrapper relative&quot;&gt;&lt;img alt=&quot;D&quot; src=&quot;img/our_team_denis.jpg&quot; /&gt; &lt;img alt=&quot;horse&quot; class=&quot;absolute_img&quot; src=&quot;img/horse.png&quot; /&gt;\r\n                    &lt;h4&gt;Денис&lt;/h4&gt;\r\n\r\n                    &lt;p&gt;&lt;em&gt;Web-разработчик&lt;/em&gt;&lt;/p&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n', 'SelfIech', '', 'SelfIech', '2016-05-12 00:00:00', 0, 0, 0, '', 0, 1, 0),
(401, 401, 'doc', 'doc', 1, '&lt;p&gt;dfg&lt;/p&gt;\r\n', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!&lt;/p&gt;\r\n', 'doc', '', '', '2017-01-12 18:48:31', 0, 399, 0, '1484297254.jpg', 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages_wrap`
--

CREATE TABLE IF NOT EXISTS `pages_wrap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `block_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Дамп данных таблицы `pages_wrap`
--

INSERT INTO `pages_wrap` (`id`, `page_id`, `table_name`, `block_id`, `position`, `sort`) VALUES
(24, '271', 'galerys', 1, 3, 10),
(32, '277', 'htmls', 17, 3, 0),
(33, '275', 'htmls', 17, 3, 0),
(34, '276', 'htmls', 17, 3, 0),
(36, '274', 'htmls', 17, 3, 0),
(41, '300', 'posts_blocks', 7, 2, 10),
(48, '299', 'posts_blocks', 7, 2, 10),
(49, '1', 'htmls', 14, 3, 10),
(50, '274', 'htmls', 12, 6, 20),
(54, '1', 'htmls', 42, 2, 10),
(55, '1', 'htmls', 44, 2, 20),
(56, '1', 'htmls', 46, 2, 30),
(61, '269', 'htmls', 56, 1, 1),
(62, '270', 'htmls', 58, 3, 1),
(64, '1', 'htmls', 62, 2, 50),
(65, '1', 'htmls', 64, 1, -1),
(66, '270', 'htmls', 38, 1, 0),
(67, 'all', 'htmls', 66, 20, 1),
(68, '1', 'htmls', 68, 2, 21),
(70, '1', 'htmls', 72, 2, 70),
(73, '1', 'htmls', 76, 1, 1),
(74, '1', 'sliders', 1, 2, 0),
(75, '1', 'htmls', 78, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Верх страницы'),
(2, 'Содержание верх'),
(3, 'Содержание низ'),
(4, 'Левая колонка'),
(6, 'Низ страницы'),
(11, 'Футер низ'),
(12, 'Хедер'),
(13, 'Футер лев'),
(20, 'nav_left'),
(23, 'top_nav_right');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `alias` text NOT NULL COMMENT 'Персональный URL',
  `name` text NOT NULL COMMENT 'Заголовок',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `full_text` longtext NOT NULL COMMENT 'Основной текст',
  `title` text NOT NULL COMMENT 'Метатитлы',
  `meta_k` text NOT NULL COMMENT 'Ключевые слова (keywords)',
  `meta_d` text NOT NULL COMMENT 'Описание (description)',
  `photo` varchar(255) NOT NULL,
  `block_id` int(11) NOT NULL,
  `leftbar` int(1) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `group_id`, `alias`, `name`, `language_id`, `description`, `full_text`, `title`, `meta_k`, `meta_d`, `photo`, `block_id`, `leftbar`, `date_add`, `sort`) VALUES
(150, 150, 'gryaznaya-dyuzhina', 'Грязная дюжина', 1, '&lt;p&gt;Что такое СОЗ, или какие органические соединения являются наиболее опасными.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Стойкие органические загрязнители&lt;/strong&gt;&amp;nbsp;&amp;mdash; это ядовитые химические вещества, негативно влияющие на здоровье людей и окружающую среду. Распространяясь по воздуху и воде, они могут воздействовать на людей и живую природу на значительном расстоянии от того места, где их использовали и выпустили в атмосферу. Они долгое время не разлагаются и могут накапливаться и передаваться по пищевой цепи.&lt;/p&gt;\r\n', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;Что такое СОЗ, или какие органические соединения являются наиболее опасными.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;strong&gt;Стойкие органические загрязнители&lt;/strong&gt; &amp;mdash; это ядовитые химические вещества, негативно влияющие на здоровье людей и окружающую среду. Распространяясь по воздуху и воде, они могут воздействовать на людей и живую природу на значительном расстоянии от того места, где их использовали и выпустили в атмосферу. Они долгое время не разлагаются и могут накапливаться и передаваться по пищевой цепи.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;23 мая 2001 года состоялась Стокгольмская Конвенция, инициированная ООН &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;laquo;О стойких органических загрязнителях&amp;raquo;. Данную Конвенцию ратифицировали 128 участников из 151 участника, но вступила в силу она только 17 мая 2004 года.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;strong&gt;&lt;em&gt;Что же такого было в этой конвенции, что вступление в силу конвенции затянулось на целых три года?&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Начнем с того, что многие СОЗ широко использовались во время подъема промышленности, когда в коммерческих целях начали использоваться тысячи видов синтетических химических веществ. Некоторые из них оказались эффективными в борьбе с вредителями и болезнями, в растениеводстве и промышленности. Одним из таких дешевых средств, стал дихлордифенилтрихлорэтан (ДДТ).&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;На постсоветском пространстве известный как &lt;strong&gt;&lt;em&gt;дуст&lt;/em&gt;&lt;/strong&gt;. По оценкам, с 1940&amp;nbsp;г. во всем мире было произведено и использовано&amp;nbsp;&lt;strong&gt;&lt;em&gt;1,8 млрд тонн&lt;/em&gt;&lt;/strong&gt; этого недорогого и эффективного химического вещества. В результате интенсивного использования это высокостойкое вещество стало накапливаться в организмах людей и в природе.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;И именно пункт о ДДТ и стал загвоздкой при ратификации конвенции. Потребовалось три года, что бы внести правки касающееся этого СОЗ, а именно: &amp;nbsp;прекратить или ограничить его производство и использование, но с небольшими оговорками.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;ДДТ включен в приложение об ограничении использования, то есть может производиться и использоваться только для борьбы с переносчиками инфекций. В рамках Конвенции создан открытый реестр пользователей и производителей ДДТ.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;А итогом трех летней борьбы стал список из &lt;strong&gt;&lt;em&gt;12 стойких органических веществ&lt;/em&gt;&lt;/strong&gt;, которые либо запретили производить (уже имеющиеся ликвидировать) либо внесли их в список ограниченного использования.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Основной список:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Дихлордифенил-трихлорэтан&amp;nbsp;(ДДТ).&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Альдрин&amp;nbsp;(пестицид-инсектицид, первоначально инсектицидного действия, оказавшийся токсичным для рыб, птиц и человека).&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Дильдрин&amp;nbsp;(пестицид, производное&amp;nbsp;альдрина; в почве альдрин быстро превращается в дильдрин, который имеет период полувыведения из почвы 5 лет, в отличие от 1 года для альдрина).&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Эндрин&amp;nbsp;(пестицид&amp;nbsp;&amp;mdash; инсектицид и дератизатор; высокотоксичен для рыб);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Хлордан&amp;nbsp;(инсектицид против термитов, оказавшийся токсичным для рыб, птиц; у человека воздействует на иммунную систему, потенциальный канцероген);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Мирекс&amp;nbsp;(инсектицид против муравьев и термитов, не токсичен для человека, но является потенциальным канцерогеном);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Токсафен&amp;nbsp;(инсектицид против клещей, является потенциальным канцерогеном);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Гептахлор&amp;nbsp;(инсектицид, применялся против почвенных насекомых, оказался токсичен для птиц; скорее всего, привел к уничтожению локальных популяций канадских гусей и американской пустельги в бассейне реки Колумбиа в США; потенциальный канцероген);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Полихлорированные дифенилы&amp;nbsp;(ПХД);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Гексахлорбензол&amp;nbsp;(ГХБ) (пестицид-фунгицид, воздействует на репродуктивные органы);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Полихлордибензодиоксины&amp;nbsp;(ПХДД);&lt;/li&gt;\r\n	&lt;li style=&quot;text-align:justify&quot;&gt;Полихлордибензофураны&amp;nbsp;(ПХДФ; дибензофураны по структуре очень похожи на диоксины и многие их токсические эффекты совпадают).&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'Грязная дюжина', 'Грязная дюжина', 'Грязная дюжина', '1472560264.jpg', 1, 1, '2016-08-30 15:20:49', 3),
(170, 170, 'GREEN-MIND', 'GREEN MIND', 1, '', '&lt;p&gt;&amp;nbsp; &amp;nbsp; &lt;strong&gt;&amp;nbsp;Компания НПК&amp;quot; УкрЭкоПром&amp;quot; приняла участие в V Международном форуме для устойчивого развития бизнеса GREEN MIND, который проходил 19-20 октября в г. Киев.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;В этом году GREEN MIND собрал более 120 спикеров и 650 участников - представителей всех ветвей власти, научных учреждений, предприятий и общественных организаций из 27 стран мира: Германии, Норвегии, Швеции, Финляндии, Нидерландов, Китая, Тайваня, Кореи, Гонконга, Индии, Австралии , Новой Зеландии, Израиля, Бразилии,&amp;nbsp;Китая, Казахстана и других.&lt;/p&gt;\r\n\r\n&lt;div class=&quot;text_exposed_show&quot; style=&quot;display: inline; color: rgb(29, 33, 41); font-family: Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;На форуме обсуждались вопросы, которые сегодня волнуют бизнес: как привлечь выгодные инвестиции, сохранить и приумножить продажи в условиях кризиса, выйти на новые рынки. Участники обсудили, как повлияют на бизнес реформы национального законодательства, какие модели управления наиболее действенны и тому подобное. Диалог и профессиональная дискуссия на форуме позволила максимально быстро получить ответы на вопросы для принятия эффективных управленческих решений.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;https://scontent.fhen1-1.fna.fbcdn.net/t31.0-8/13731929_1716433158611588_1334146970872987998_o.png&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Фотогалерею Международного бизнес форума GREEN MIND 2016 можно посмотреть пройдя по&lt;a href=&quot;https://www.facebook.com/forumgreenmind/?sk=photos_stream&amp;amp;app_data&quot;&gt; ссылке.&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n', 'GREEN-MIND', '', '', '1477469932.jpeg', 1, 1, '2016-10-26 11:16:08', 0),
(171, 170, 'GREEN-MIND', 'GREEN MIND', 2, '', '&lt;p&gt;&amp;nbsp; &amp;nbsp; &lt;strong&gt;&amp;nbsp;Компанія НПК &amp;quot;УкрЕкоПром&amp;quot; взяла участь в V Міжнародному форумі для стійкого розвитку бізнесу GREEN MIND, який проходив 19-20 жовтня в м Київ.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&amp;nbsp; &amp;nbsp; &amp;nbsp;Цього року GREEN MIND зібрав понад 120 спікерів і 650 учасників - представників всіх гілок влади, наукових установ, підприємств і громадських організацій з 27 країн світу: Німеччини, Норвегії, Швеції, Фінляндії, Нідерландів, Китаю, Тайваню, Кореї, Гонконгу, Індії, Австралії, Нової Зеландії, Ізраїлю, Бразилії, Китаю, Казахстану та інших.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;На форумі обговорювалися питання, які сьогодні хвилюють бізнес: як привернути вигідні інвестиції, зберегти і примножити продажу в умовах кризи, вийти на нові ринки. Учасники обговорили, як вплинуть на бізнес реформи національного законодавства, які моделі управління найбільш дієві тощо. Діалог і професійна дискусія на форумі дозволила максимально швидко отримати відповіді на питання для прийняття ефективних управлінських рішень.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;https://scontent.fhen1-1.fna.fbcdn.net/t31.0-8/13731929_1716433158611588_1334146970872987998_o.png&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Фотогалерею Міжнародного бізнес-форуму GREEN MIND 2016 можна подивитися перейшовши на &lt;a href=&quot;https://www.facebook.com/forumgreenmind/?sk=photos_stream&amp;amp;app_data&quot;&gt;сторінку форуму.&lt;/a&gt;&lt;/p&gt;\r\n', 'GREEN-MIND', '', 'GREEN-MIND', '1477469932.jpeg', 1, 1, '2016-10-26 11:16:08', 0),
(162, 162, 'mіf-№1', 'Миф №1', 1, '&lt;p&gt;&lt;strong&gt;&amp;nbsp;&amp;laquo;Декларацию про отходы можно делать единожды&amp;raquo;&lt;/strong&gt;&lt;/p&gt;\r\n', '&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/295-579bbaf0e0fc82875a6a3e5f4eb3bb03.jpg&quot; style=&quot;border-style:solid; border-width:0px; height:479px; width:600px&quot; /&gt;&lt;/p&gt;\n\n&lt;p&gt;Одним&amp;nbsp;из распространенных мифов в вопросах экологической проектной документации и обращения с отходами является тот факт, что&amp;nbsp;&lt;a href=&quot;http://www.ueco.com.ua/ru/pages/ehkologicheskijj-autsorsing&quot;&gt;декларацию про отходы&lt;/a&gt;&amp;nbsp;нужно делать один раз. Руководствуясь данным мифом, некоторые компании находятся в призрачной безопасности, считая, что сделанная ранее декларация освобождает их от ответственности и проблем в дальнейшем.&lt;/p&gt;\n\n&lt;p&gt;На самом деле согласно Закону Украины &amp;laquo;Про отходы&amp;raquo;, ст. 17 (часть 2) субъекты хозяйственной деятельности в сфере обращения с отходами, деятельность которых приводит к образованию отходов, для которых П&lt;sub&gt;ООО&lt;/sub&gt;&amp;nbsp;от 50 до 1000, обязаны ежегодно подавать декларацию про отходы по форме и в порядке, установленным Кабинетом Министров Украины.&lt;/p&gt;\n\n&lt;p&gt;Также хотим обратить внимание на одно существенное изменение в&amp;nbsp; порядке подачи декларации, которое вступило в силу в 2016 г., а именно: если субъект хозяйствования имеет в своем составе филиалы или другие обособленные подразделения без статуса юридического лица, осуществляющие свою деятельность в различных регионах (в пределах определенной административно-территориальной единицы) Украины, такой субъект хозяйствования подает декларацию по месту осуществления деятельности филиалом или другим обособленным подразделением.&lt;/p&gt;\n', 'Миф №1', '', '', '1475070279.jpg', 1, 1, '2016-09-28 16:31:15', 0),
(163, 162, 'mіf-№1', 'Міф №1', 2, '&lt;p&gt;Міф № 1 &amp;laquo;Декларацію про відходи можна робити один раз&amp;raquo;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/68-dcc7a7b7523571dbf72a9ae07c9edad4.jpg&quot; style=&quot;height:479px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nОдним з поширених міфів в питаннях екологічної проектної документації та поводження з відходами є той факт, що &lt;a href=&quot;http://www.ueco.com.ua/ua/pages/ehkologicheskijj-autsorsing&quot;&gt;декларацію про відходи &lt;/a&gt;потрібно робити один раз. Керуючись даними міфом, деякі компанії знаходяться в примарною безпеки, вважаючи, що зроблена раніше декларація звільняє їх від відповідальності і проблем в подальшому.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nНасправді відповідно до Закону України &amp;laquo;Про відходи&amp;raquo;, ст. 17 (частина 2) суб&amp;#39;єкти господарської діяльності у сфері поводження з відходами, діяльність яких призводить до утворення відходів, для яких ПООО від 50 до 1000, зобов&amp;#39;язані щорічно подавати декларацію про відходи за формою і в порядку, встановленими Кабінетом Міністрів України.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nТакож хочемо звернути увагу на одну суттєву зміну в порядку подачі декларації, яке вступило в силу в 2016 р, а саме: якщо суб&amp;#39;єкт господарювання має в своєму складі філії або інші відокремлені підрозділи без статусу юридичної особи, що здійснюють свою діяльність в різних регіонах (в межах певної адміністративно-територіальної одиниці) України, такий суб&amp;#39;єкт господарювання подає декларацію за місцем здійснення діяльності філією або іншим відокремленим підрозділом.&lt;/p&gt;\r\n', 'mіf-№1', '', 'Міф №1', '1475070279.jpg', 1, 1, '2016-09-28 16:31:15', 0),
(164, 164, 'k-kakomu-tipu-opasnosti-otnositsya-bentonirovannaya-glina-dlya-obrabotki-vina-', 'К какому типу опасности относится бентонированная глина для обработки вина?', 1, '&lt;p&gt;Для начала разберемся что представляет собой Бентонит.&lt;/p&gt;\r\n\r\n&lt;p&gt;Бентони́т &amp;ndash; это природный глинистый&amp;nbsp;минерал, который обладает свойством разбухать при&amp;nbsp;гидратации. В ограниченном пространстве для свободного разбухания в присутствии&amp;nbsp;воды&amp;nbsp;образуется плотный&amp;nbsp;гель, препятствующий дальнейшему проникновению влаги. Это свойство, а также&amp;nbsp;не токсичность&amp;nbsp;и химическая стойкость делает его незаменимым в винном производстве.&lt;/p&gt;\r\n', '&lt;p&gt;Для начала разберемся что представляет собой Бентонит.&lt;/p&gt;\r\n\r\n&lt;p&gt;Бентони́т &amp;ndash; это природный глинистый&amp;nbsp;минерал, который обладает свойством разбухать при&amp;nbsp;гидратации. В ограниченном пространстве для свободного разбухания в присутствии&amp;nbsp;воды&amp;nbsp;образуется плотный&amp;nbsp;гель, препятствующий дальнейшему проникновению влаги. Это свойство, а также&amp;nbsp;не токсичность&amp;nbsp;и химическая стойкость делает его незаменимым в винном производстве.&lt;/p&gt;\r\n\r\n&lt;p&gt;Что же касается бентонитовой глины - это состоящие в основном из минералов группы монтмориллонита которые обладают высокой связующей способностью, адсорбционной и каталитической активностью. В виноделии применяться для ускорения осветления сусла, виноматериалов и стабилизации вин против&amp;nbsp;белковых помутнений.&amp;nbsp;В виде крупки или до порошкообразного состояния. Бентониты задают в виноматериал в виде 20%-ной водной суспензии. После осветления сусло быстро отделяется от бентонитового осадка.&lt;/p&gt;\r\n\r\n&lt;p&gt;Химический состав бентонитовых глин:&lt;/p&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;0&quot; style=&quot;width:683px&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Соединение&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;Доля&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Соединение&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;Доля&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;SiO2&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;58,25 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;MgO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;3,62 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Al2O3&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;14,27 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;P2O5&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;0,18 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Fe2O3&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;4,37 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;S&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;0,14 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;FeO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;0,5 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;K2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;1,2 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Ti2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;0,36 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Na2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;2,25 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;CaO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;2,07 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;ППП&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;12,19 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Указанный вид отходов &amp;ndash; бетонитовая глина для обработки вина &amp;ndash; не включен в Желтый перечень отходов.&lt;/p&gt;\r\n\r\n&lt;p&gt;В Зеленом перечне отходов есть &amp;nbsp;позиция &amp;laquo;Отходы сельскохозяйственного и пищевого производства, если они не инфицированные: винные осадки&amp;raquo;. Но это не совсем точное определение. Фактически это уже вышеуказанный бентонитовый осадок или алюмосиликатный шлам. Данный вид отхода, согласно вышеперечисленного документа, относится с 4 классу опасности. На данный вид отхода должен быть разработан технический паспорт отхода, в котором обозначены качественные и количественные характеристики. Данный паспорт необходимо согласовать с Департаментом экологии. А его размещение должно быть согласовано с органами СЕС (это было раньше), сейчас есть орган Держпродспоживнагляд (куда как структурное подразделение входит и бывшие работники СЕС).Влажность отхода не должна превышать 85%, на полигон он должен транспортироваться не в цистерне.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;Если возникли вопросы &amp;ndash; обращайтесь по номеру (048) 714-86-67&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;Эколог компании НПК &amp;laquo;УкрЭкоПром&amp;raquo; окажет вам профессиональную консультацию по вопросам класса опасности интересующих Вас отходов.&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n', 'К какому типу опасности относится бентонированная глина для обработки вина?', '', '', '1475071561.jpg', 1, 1, '2016-09-28 17:04:49', 0),
(165, 164, 'k-kakomu-tipu-opasnosti-otnositsya-bentonirovannaya-glina-dlya-obrabotki-vina-', 'До якого типу небезпеки відноситься бетонована глина для обробки вина?', 2, '&lt;p&gt;&lt;strong&gt;Для початку розберемося що представляє собою Бентоніт.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;strong&gt;Бентоніт -&lt;/strong&gt;&amp;nbsp;це природний глинистий мінерал, який має властивість розбухати при гідратації. В обмеженому просторі для вільного розбухання у присутності води утворюється щільний гель, що перешкоджає подальшому проникненню вологи. Це властивість, а також не токсичність і хімічна стійкість робить його незамінним у винному виробництві.&lt;/p&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Для початку розберемося що представляє собою Бентоніт.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;strong&gt;Бентоніт -&lt;/strong&gt; це природний глинистий мінерал, який має властивість розбухати при гідратації. В обмеженому просторі для вільного розбухання у присутності води утворюється щільний гель, що перешкоджає подальшому проникненню вологи. Це властивість, а також не токсичність і хімічна стійкість робить його незамінним у винному виробництві.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\nЩо ж стосується бентонітової глини - це складаються в основному з мінералів групи монтморилоніту які мають високу сполучною здатністю, адсорбційної і каталітичної активністю. У виноробстві застосовуватися для прискорення освітлення сусла, виноматеріалів і стабілізації вин проти білкових помутнінь. У вигляді крупки або до порошкоподібного стану. Бентоніти задають в виноматеріал у вигляді 20% -ної водної суспензії. Після висвітлення сусло швидко відділяється від бентонітової осаду.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;strong&gt;Хімічний склад бентонітових глин:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;0&quot; style=&quot;width:683px&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;З&amp;#39;єднання&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;Частка&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;З&amp;#39;єднання&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;Частка&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;SiO2&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;58,25 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;MgO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;3,62 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Al2O3&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;14,27 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;P2O5&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;0,18 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Fe2O3&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;4,37 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;S&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;0,14 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;FeO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;0,5 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;K2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;1,2 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Ti2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;0,36 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;Na2O&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;2,25 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;CaO&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:142px&quot;&gt;\r\n			&lt;p&gt;2,07 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:160px&quot;&gt;\r\n			&lt;p&gt;ППП&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td style=&quot;height:18px; width:203px&quot;&gt;\r\n			&lt;p&gt;12,19 %&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;Зазначений вид відходів - бетонитовая глина для обробки вина - не включений в Жовтий перелік відходів.&lt;br /&gt;\r\nУ Зеленому переліку відходів є позиція &amp;laquo;Відходи сільськогосподарського і харчового виробництва, якщо вони не інфіковані: винні опади&amp;raquo;. Але це не зовсім точне визначення. Фактично це вже вищевказаний бентонітовий осад або алюмосилікатний шлам. Даний вид відходу, згідно вищезгаданого документа, ставиться з 4 класу небезпеки. На даний вид відходу повинен бути розроблений технічний паспорт відходу, в якому позначені якісні та кількісні характеристики. Даний паспорт необхідно узгодити з Департаментом екології. А його розміщення має бути погоджено з органами СЕС (це було раніше), зараз є орган Держпродспожівнагляд (куди як структурний підрозділ входить і колишні працівники СЕС) .Вологість відходу не повинна перевищувати 85%, на полігон він повинен транспортуватися не в цистерні.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;strong&gt;Якщо виникли питання - звертайтеся за номером (048) 714-86-67&lt;br /&gt;\r\nЕколог компанії НПК &amp;laquo;УкрЕкоПром&amp;raquo; надасть вам професійну консультацію з питань класу небезпеки цікавлять Вас відходів.&lt;/strong&gt;&lt;/p&gt;\r\n', 'k-kakomu-tipu-opasnosti-otnositsya-bentonirovannaya-glina-dlya-obrabotki-vina-', '', 'До якого типу небезпеки відноситься бетонована глина для обробки вина?', '1475071561.jpg', 1, 1, '2016-09-28 17:04:49', 0),
(153, 150, 'gryaznaya-dyuzhina', 'Грязная дюжина', 2, '&lt;p&gt;Что такое СОЗ, или какие органические соединения являются наиболее опасными.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Стойкие органические загрязнители&lt;/strong&gt;&amp;nbsp;&amp;mdash; это ядовитые химические вещества, негативно влияющие на здоровье людей и окружающую среду. Распространяясь по воздуху и воде, они могут воздействовать на людей и живую природу на значительном расстоянии от того места, где их использовали и выпустили в атмосферу. Они долгое время не разлагаются и могут накапливаться и передаваться по пищевой цепи.&lt;/p&gt;\r\n', '&lt;p&gt;Что такое СОЗ, или какие органические соединения являются наиболее опасными.&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/847-abbbde8cdbbc307993bf22b4a772c8bf.jpg&quot; style=&quot;border-style:solid; border-width:1px; float:left; height:169px; margin:0px; width:300px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Стойкие органические загрязнители&lt;/strong&gt; &amp;mdash; это ядовитые химические вещества, негативно влияющие на здоровье людей и окружающую среду. Распространяясь по воздуху и воде, они могут воздействовать на людей и живую природу на значительном расстоянии от того места, где их использовали и выпустили в атмосферу. Они долгое время не разлагаются и могут накапливаться и передаваться по пищевой цепи.&lt;/p&gt;\r\n\r\n&lt;p&gt;23 мая 2001 года состоялась Стокгольмская Конвенция, инициированная ООН &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;laquo;О стойких органических загрязнителях&amp;raquo;. Данную Конвенцию ратифицировали 128 участников из 151 участника, но вступила в силу она только 17 мая 2004 года.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;Что же такого было в этой конвенции, что вступление в силу конвенции затянулось на целых три года?&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Начнем с того, что многие СОЗ широко использовались во время подъема промышленности, когда в коммерческих целях начали использоваться тысячи видов синтетических химических веществ. Некоторые из них оказались эффективными в борьбе с вредителями и болезнями, в растениеводстве и промышленности. Одним из таких дешевых средств, стал дихлордифенилтрихлорэтан (ДДТ).&lt;/p&gt;\r\n\r\n&lt;p&gt;На постсоветском пространстве известный как &lt;strong&gt;&lt;em&gt;дуст&lt;/em&gt;&lt;/strong&gt;. По оценкам, с 1940&amp;nbsp;г. во всем мире было произведено и использовано&amp;nbsp;&lt;strong&gt;&lt;em&gt;1,8 млрд тонн&lt;/em&gt;&lt;/strong&gt; этого недорогого и эффективного химического вещества. В результате интенсивного использования это высокостойкое вещество стало накапливаться в организмах людей и в природе.&lt;/p&gt;\r\n\r\n&lt;p&gt;И именно пункт о ДДТ и стал загвоздкой при ратификации конвенции. Потребовалось три года, что бы внести правки касающееся этого СОЗ, а именно: &amp;nbsp;прекратить или ограничить его производство и использование, но с небольшими оговорками.&lt;/p&gt;\r\n\r\n&lt;p&gt;ДДТ включен в приложение об ограничении использования, то есть может производиться и использоваться только для борьбы с переносчиками инфекций. В рамках Конвенции создан открытый реестр пользователей и производителей ДДТ.&lt;/p&gt;\r\n\r\n&lt;p&gt;А итогом трех летней борьбы стал список из &lt;strong&gt;&lt;em&gt;12 стойких органических веществ&lt;/em&gt;&lt;/strong&gt;, которые либо запретили производить (уже имеющиеся ликвидировать) либо внесли их в список ограниченного использования.&lt;/p&gt;\r\n\r\n&lt;p&gt;Основной список:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Дихлордифенил-трихлорэтан&amp;nbsp;(ДДТ).&lt;/li&gt;\r\n	&lt;li&gt;Альдрин&amp;nbsp;(пестицид-инсектицид, первоначально инсектицидного действия, оказавшийся токсичным для рыб, птиц и человека).&lt;/li&gt;\r\n	&lt;li&gt;Дильдрин&amp;nbsp;(пестицид, производное&amp;nbsp;альдрина; в почве альдрин быстро превращается в дильдрин, который имеет период полувыведения из почвы 5 лет, в отличие от 1 года для альдрина).&lt;/li&gt;\r\n	&lt;li&gt;Эндрин&amp;nbsp;(пестицид&amp;nbsp;&amp;mdash; инсектицид и дератизатор; высокотоксичен для рыб);&lt;/li&gt;\r\n	&lt;li&gt;Хлордан&amp;nbsp;(инсектицид против термитов, оказавшийся токсичным для рыб, птиц; у человека воздействует на иммунную систему, потенциальный канцероген);&lt;/li&gt;\r\n	&lt;li&gt;Мирекс&amp;nbsp;(инсектицид против муравьев и термитов, не токсичен для человека, но является потенциальным канцерогеном);&lt;/li&gt;\r\n	&lt;li&gt;Токсафен&amp;nbsp;(инсектицид против клещей, является потенциальным канцерогеном);&lt;/li&gt;\r\n	&lt;li&gt;Гептахлор&amp;nbsp;(инсектицид, применялся против почвенных насекомых, оказался токсичен для птиц; скорее всего, привел к уничтожению локальных популяций канадских гусей и американской пустельги в бассейне реки Колумбиа в США; потенциальный канцероген);&lt;/li&gt;\r\n	&lt;li&gt;Полихлорированные дифенилы&amp;nbsp;(ПХД);&lt;/li&gt;\r\n	&lt;li&gt;Гексахлорбензол&amp;nbsp;(ГХБ) (пестицид-фунгицид, воздействует на репродуктивные органы);&lt;/li&gt;\r\n	&lt;li&gt;Полихлордибензодиоксины&amp;nbsp;(ПХДД);&lt;/li&gt;\r\n	&lt;li&gt;Полихлордибензофураны&amp;nbsp;(ПХДФ; дибензофураны по структуре очень похожи на диоксины и многие их токсические эффекты совпадают).&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'Грязная дюжина', 'Грязная дюжина', 'Грязная дюжина', '1472560264.jpg', 1, 1, '2016-08-30 15:20:49', 3),
(156, 156, 'licenzia', 'Лицензия', 1, '', '&lt;p style=&quot;text-align:center&quot;&gt;Спешим поделиться радостной новостью с нашими клиентами и партнерами.&lt;em&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;em&gt;&lt;strong&gt;Научно-производственная компания &amp;laquo;УкрЭкоПром&amp;raquo; получила Лицензию Министерства экологии и природных ресурсов Украины на обращение с опасными отходами.&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Мы заботимся о том, что бы наша работа была построена на полном спектре услуг в сфере обращения с отходами. Мы ценим наших клиентов, именно поэтому мы стремимся к повышению уровня предоставления нами услуг.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Подробнее ознакомиться с перечнем лицензий и сертификатов компании НПК &amp;quot;УкрЭкоПром&amp;quot; можно на странице&lt;a href=&quot;http://www.ueco.com.ua/ru/pages/licenzii&quot;&gt; &amp;quot;Лицензии&amp;quot;&amp;nbsp;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Мы не будем останавливаться на достигнутом&amp;nbsp;и все также будем повышать свой профессиональный уровень, для нашего с Вами сотрудничества.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/215-8b1954bd793c1a6cce299ea072f2c24a.jpg&quot; style=&quot;border-style:solid; border-width:10px; height:706px; width:500px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;pre&gt;\r\n\r\n&amp;nbsp;&lt;/pre&gt;\r\n', 'licenzia', '', '', '1473769662.jpeg', 1, 1, '2016-09-13 10:15:55', 168);
INSERT INTO `posts` (`id`, `group_id`, `alias`, `name`, `language_id`, `description`, `full_text`, `title`, `meta_k`, `meta_d`, `photo`, `block_id`, `leftbar`, `date_add`, `sort`) VALUES
(157, 156, 'licenzia', 'Ліцензія', 2, '&lt;p&gt;Ліцензія&lt;/p&gt;\r\n', '&lt;p style=&quot;text-align:center&quot;&gt;Хочемо поділитися радісною новиною з нашими клієнтами і партнерами.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;em&gt;&lt;strong&gt;Науково-виробнича компанія &amp;laquo;УкрЕкоПром&amp;raquo; отримала Ліцензію Міністерства екології та природних ресурсів України на поводження&amp;nbsp;з небезпечними відходами.&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Ми дбаємо про те, що б наша робота була побудована на повному спектрі послуг у сфері поводження з відходами. Ми цінуємо наших клієнтом, саме тому ми прагнемо до підвищення рівня надання нами послуг.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Детальніше ознайомитись з переліком ліцензій і сертифікатів компанії НПК &amp;quot;УкрЕкоПром&amp;quot; можливо на сторінці &lt;a href=&quot;http://www.ueco.com.ua/ua/pages/licenzii&quot;&gt;&amp;quot;Ліцензії&amp;quot;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Ми не будемо зупинятися на досягнутому, та&amp;nbsp;будемо підвищувати свій професійний рівень, для нашої&amp;nbsp;з Вами співпраці.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/215-8b1954bd793c1a6cce299ea072f2c24a.jpg&quot; style=&quot;border-style:solid; border-width:10px; height:706px; width:500px&quot; /&gt;&lt;/p&gt;\r\n', 'licenzia', '', 'licenzia', '1473769662.jpeg', 1, 1, '2016-09-13 10:15:55', 168),
(158, 158, 'akciya', 'АКЦИЯ', 1, '&lt;p&gt;Акция на разработку экологической проектной документации&lt;/p&gt;\r\n', '&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/651-d551ab99ebceed5e6350cf6922dd7248.jpg&quot; style=&quot;height:600px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;C полным перечнем услуг можно ознакомиться на страице &lt;a href=&quot;http://www.ueco.com.ua/ru/pages/uslugi&quot;&gt;&amp;quot;Услуги&amp;quot;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Связаться с менеджером можно по номеру: (048) 714-86-67&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Либо отправить заявку на наш адрес: office@ueco.com.ua&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'акция', '', '', '1473770598.jpg', 1, 1, '2016-09-13 15:35:13', 0),
(159, 158, 'akciya', 'АКЦІЯ', 2, '', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/651-d551ab99ebceed5e6350cf6922dd7248.jpg&quot; style=&quot;height:600px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;C повним переліком послуг можна ознайомитися на страіце &lt;a href=&quot;http://www.ueco.com.ua/ua/pages/uslugi&quot;&gt;&amp;quot;Послуги&amp;quot;&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Зв&amp;#39;язатися з менеджером можна за номером: (048) 714-86-67&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;Або відправити заявку на нашу адресу: office@ueco.com.ua&lt;/p&gt;\r\n', 'akciya', '', '', '1473770598.jpg', 1, 1, '2016-09-13 15:35:13', 0),
(168, 168, 'mif-№3', 'Миф №3', 1, '', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/147-6cb024708c8b24e341f25008baf67782.jpg&quot; style=&quot;height:638px; width:800px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Одним из распространённых заблуждений среди предприятий Украины является то, что отработанные шины можно вывозить на полигоны.&lt;/p&gt;\r\n\r\n&lt;p&gt;На самом деле это в корне неверно, так как отработанные шины являются крупнотоннажной продукцией, состоящей из полимерных материалов, которые не поддаются разложению в естественной среде. &amp;nbsp;Складирование данного вида отхода приводит к серьёзным загрязнениям окружающей &amp;nbsp;нас среды: так как при контакте с атмосферными осадками и грунтовыми водами из шин вымываются токсичные органические соединения, при воспламенении шины выделяют опасные для жизни канцерогены, а в скоплениях старых покрышек часто обитают разносчики инфекционных заболеваний.&lt;/p&gt;\r\n\r\n&lt;p&gt;Законодательство Украины относит отработанные шины к списку отходов подлежащих вторичной переработке. Таким образом, каждое предприятие обязано содействовать максимально возможной утилизации отходов путем прямого повторного или альтернативного использования ресурсно-ценных отходов, а именно: должны передавать специализированным предприятиям по утилизации отходов.&lt;/p&gt;\r\n', 'Миф №3', '', '', '1475222096.jpg', 1, 1, '2016-09-30 10:51:31', 0),
(169, 168, 'mif-№3', 'Міф №3', 2, '', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.ueco.com.ua/img/878-3ec2422a6a40bc809a41518191ad5fea.jpg&quot; style=&quot;height:638px; width:800px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot;&gt;Одніею з поширених помилок серед підприємств України є те, що відпрацьовані шини можна вивозити на полігони.&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot;&gt;Насправді це в корені невірно, так як відпрацьовані шини це великотоннажноа юпродукція, що складається з полімерних матеріалів, які не піддаються розкладанню в природному середовищі.&amp;nbsp;&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot;&gt;Складування даного виду відходу призводить до серйозних забруднень навколишнього нас середовища: так як при контакті з атмосферними опадами та грунтовими водами з шин вимиваються токсичні органічні сполуки, під час займання шини виділяють небезпечні для життя канцерогени, а в скупченнях старих покришок часто мешкають рознощики інфекційних захворювань.&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot;&gt;Законодавство України відносить відпрацьовані шини до списку відходів можуть бути утилізовані. Таким чином, кожне підприємство має сприяти максимально можливої ​​утилізації відходів шляхом прямого повторного чи альтернативного використання ресурсно-цінних відходів, а саме: повинні передавати спеціалізованим підприємствам з утилізації відходів.&lt;/span&gt;&lt;/p&gt;\r\n', 'mif-№3', '', 'Міф №3', '1475222096.jpg', 1, 1, '2016-09-30 10:51:31', 0),
(173, 172, '"-IV-specializirovannaya-vystavka-ehkologiya-predpriyatiya"', '&quot; IV СПЕЦИАЛИЗИРОВАННАЯ ВЫСТАВКА ЭКОЛОГИЯ ПРЕДПРИЯТИЯ&quot;', 2, '', '', '', '', '', '1477470572.jpeg', 1, 1, '2016-10-26 11:23:06', 0),
(189, 188, 'kompaniya-"ukrehkoprom"---lider-v-sfere-obrashheniya-s-otkhodami', 'Компания &quot;УкрЭкоПром&quot; - лидер в сфере обращения с отходами', 2, '', '', '', '', '', '', 3, 1, '2016-11-04 16:24:37', 0),
(179, 178, 'kompaniya-"ukrehkoprom"---lider-v-sfere-obrashheniya-s-otkhodami', 'Компания &quot;УкрЭкоПром&quot; - лидер в сфере обращения с отходами', 2, '', '', '', '', '', '', 1, 1, '2016-11-03 10:49:43', 0),
(191, 190, 'kompanіya-"ukrekoprom"---lіder-v-sferі-povodzhennya-z-vіdkhodami', 'Компанія &quot;УкрЕкоПром&quot; - лідер в сфері поводження з відходами', 2, '', '', '', '', '', '1478270397.jpg', 5, 1, '2016-11-04 16:38:30', 0),
(181, 180, 'kompaniya-"ukrehkoprom"---lider-v-sfere-obrashheniya-s-otkhodami', 'Компания &quot;УкрЭкоПром&quot; - лидер в сфере обращения с отходами', 2, '', '', '', '', '', '', 1, 1, '2016-11-03 14:31:24', 0),
(183, 182, 'kompanіya-"ukrekoprom"---lіder-v-sferі-povodzhennya-z-vіdkhodami', 'Компанія &quot;УкрЕкоПром&quot; - лідер в сфері поводження з відходами', 2, '', '', '', '', '', '', 1, 1, '2016-11-04 15:19:18', 0),
(184, 184, '581c95e749c59', 'GREEN MIND', 1, '', '&lt;p&gt;&lt;img src=&quot;https://scontent.fhen1-1.fna.fbcdn.net/t31.0-8/13731929_1716433158611588_1334146970872987998_o.png&quot; style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot; /&gt;&lt;span style=&quot;color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px&quot;&gt;Фотогалерею Международного бизнес форума GREEN MIND 2016 можно посмотреть пройдя по&lt;/span&gt;&lt;a href=&quot;https://www.facebook.com/forumgreenmind/?sk=photos_stream&amp;amp;app_data&quot; style=&quot;font-family: Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;&amp;nbsp;ссылке.&lt;/a&gt;&lt;/p&gt;\r\n', 'GREEN-MIND', '', '', '1478268554.jpeg', 3, 1, '2016-11-04 16:06:31', 0),
(185, 184, '581c95e749c59', 'GREEN MIND', 2, '', '&lt;p&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;strong&gt;&amp;nbsp;Компанія НПК &amp;quot;УкрЕкоПром&amp;quot; взяла участь в V Міжнародному форумі для стійкого розвитку бізнесу GREEN MIND, який проходив 19-20 жовтня в м Київ.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&amp;nbsp; &amp;nbsp; &amp;nbsp;Цього року GREEN MIND зібрав понад 120 спікерів і 650 учасників - представників всіх гілок влади, наукових установ, підприємств і громадських організацій з 27 країн світу: Німеччини, Норвегії, Швеції, Фінляндії, Нідерландів, Китаю, Тайваню, Кореї, Гонконгу, Індії, Австралії, Нової Зеландії, Ізраїлю, Бразилії, Китаю, Казахстану та інших.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;На форумі обговорювалися питання, які сьогодні хвилюють бізнес: як привернути вигідні інвестиції, зберегти і примножити продажу в умовах кризи, вийти на нові ринки. Учасники обговорили, як вплинуть на бізнес реформи національного законодавства, які моделі управління найбільш дієві тощо. Діалог і професійна дискусія на форумі дозволила максимально швидко отримати відповіді на питання для прийняття ефективних управлінських рішень.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;https://scontent.fhen1-1.fna.fbcdn.net/t31.0-8/13731929_1716433158611588_1334146970872987998_o.png&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Фотогалерею Міжнародного бізнес-форуму GREEN MIND 2016 можна подивитися перейшовши на&amp;nbsp;&lt;a href=&quot;https://www.facebook.com/forumgreenmind/?sk=photos_stream&amp;amp;app_data&quot;&gt;сторінку форуму.&lt;/a&gt;&lt;/p&gt;\r\n', 'GREEN-MIND', '', 'GREEN-MIND', '1478268554.jpeg', 3, 1, '2016-11-04 16:06:31', 0),
(244, 244, 'vrachi', 'Врачи', 1, '', '&lt;p&gt;&lt;img alt=&quot;cat_dog&quot; src=&quot;../img/stati_cat_dog.jpg&quot; style=&quot;height:634px; width:1171px&quot; /&gt;&lt;/p&gt;\r\n', 'Врачи', '', '', '', 1, 1, '2017-01-09 13:29:48', 0),
(245, 244, 'vrachi', 'Врачи', 2, '', '', '', '', '', '', 1, 1, '2017-01-09 13:29:48', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `posts_blocks`
--

CREATE TABLE IF NOT EXISTS `posts_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `meta_t` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `is_header` int(1) NOT NULL DEFAULT '1',
  `is_text_prewie` int(1) NOT NULL DEFAULT '1',
  `is_image_prewie` int(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL DEFAULT '5',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `posts_blocks`
--

INSERT INTO `posts_blocks` (`id`, `group_id`, `name`, `alias`, `language_id`, `meta_t`, `meta_d`, `meta_k`, `class`, `is_header`, `is_text_prewie`, `is_image_prewie`, `quantity`, `date_add`) VALUES
(1, 1, 'Блог1', 'blog', 1, '', '', '', 'blog', 0, 0, 0, 3, '2016-08-09 15:27:29'),
(7, 7, 'Блок2', 'blok2', 1, '', '', '', 'blok2', 0, 1, 1, 3, '2016-11-04 16:54:08');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '999999',
  `category` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `photo` varchar(255) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `signature` varchar(255) NOT NULL,
  `to_price` text NOT NULL,
  `deadline` text NOT NULL,
  `performers` text NOT NULL,
  `presents` text NOT NULL,
  `recomended` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `customer_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `full_text` text NOT NULL,
  `answer` text NOT NULL,
  `date_add` datetime NOT NULL,
  `checked` int(11) NOT NULL DEFAULT '0',
  `type_from` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `rewies`
--

CREATE TABLE IF NOT EXISTS `rewies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `customer_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `full_text` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `checked` int(11) NOT NULL DEFAULT '0',
  `type_from` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `rewies`
--

INSERT INTO `rewies` (`id`, `name`, `email`, `language_id`, `customer_id`, `phone`, `photo`, `full_text`, `rating`, `date_add`, `checked`, `type_from`, `group_id`) VALUES
(37, 'Lorem Saepe', 'Lorem@Saepe.ru', 1, 0, '8048484848', '1484229562.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!', 0, '2017-01-12 16:59:22', 1, 'pages', '270'),
(38, 'Злой Посетитель ', 'rrrr@rrrrr.rr', 1, 0, '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!', 0, '2017-01-12 17:10:31', 0, 'pages', '270'),
(39, 'Просто хороший человек', 'asdasd@adasd.ry', 1, 0, '', '1484230302.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!', 0, '2017-01-12 17:11:42', 1, 'pages', '270'),
(40, 'Doctor Vatson', 'mail@mail.mail', 1, 0, '123', '1484230372.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe fugit eaque repellat eius laudantium tempore quidem blanditiis sunt, totam et illo, ab accusamus ut non officiis perferendis, quia impedit culpa!', 0, '2017-01-12 17:12:52', 1, 'pages', '270');

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `group_id`, `name`, `alias`, `language_id`, `date_add`) VALUES
(1, 1, 'Слайдер на главной', '111', 1, '2016-06-29 16:00:54'),
(2, 1, 'Слайдер на главной', '', 2, '2016-06-29 16:00:54'),
(4, 3, 'Слайдер наши работы', '', 2, '2016-12-22 14:41:52');

-- --------------------------------------------------------

--
-- Структура таблицы `sliders_photo`
--

CREATE TABLE IF NOT EXISTS `sliders_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) NOT NULL,
  `photo_desc` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Дамп данных таблицы `sliders_photo`
--

INSERT INTO `sliders_photo` (`photo_id`, `photo_name`, `photo_desc`, `src`, `pp_id`, `sort`) VALUES
(39, '', '<p class="text-center"><br><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FCModalWindow_9912">Замовити послугу</button><br></p>', '1472827479.jpg', 2, 0),
(43, '', '', '1482406928.jpg', 3, 0),
(44, '', '', '1482406937.jpg', 3, 0),
(45, '', '', '1482406945.jpg', 3, 0),
(46, '', '', '1482406952.jpg', 3, 0),
(47, '', '', '1487751561.jpg', 1, 0),
(50, '', '', '1487784652.png', 1, 1),
(51, '', '', '1487784707.png', 1, 2),
(52, '', '', '1487784755.png', 1, 4),
(53, '', '', '1487784911.png', 1, 5),
(54, '', '', '1487784948.png', 1, 6),
(55, '', '', '1487784967.png', 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
