-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3307
-- Время создания: Апр 10 2020 г., 17:52
-- Версия сервера: 5.7.24
-- Версия PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookshop`
--
CREATE DATABASE IF NOT EXISTS `bookshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookshop`;

DELIMITER $$
--
-- Функции
--
DROP FUNCTION IF EXISTS `GETAUTHORNAMEBYBOOKID`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `GETAUTHORNAMEBYBOOKID` (`inIDBOOK` INTEGER) RETURNS TEXT CHARSET utf8 BEGIN
	DECLARE fAUTHORNAME TEXT;
    DECLARE fAUTHORNAMES TEXT;
    DECLARE fAUTHORBOOKCOUNT INTEGER;
    DECLARE DONE INTEGER DEFAULT FALSE;    

    DECLARE AUTHORS CURSOR FOR 
    SELECT CONCAT_WS(' ', A.FIRSTNAME, A.LASTNAME) AUTHNAMES FROM AUTHOR A, BOOKAUTHOR BA
    WHERE BA.IDBOOK = inIDBOOK AND A.IDAUTHOR = BA.IDAUTHOR;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET DONE = TRUE;

    SELECT COUNT(A.FIRSTNAME) INTO fAUTHORBOOKCOUNT	FROM AUTHOR A, BOOKAUTHOR BA
	WHERE BA.IDBOOK = inIDBOOK AND A.IDAUTHOR = BA.IDAUTHOR;  

    IF fAUTHORBOOKCOUNT = 0 THEN
    	SIGNAL SQLSTATE '42000'
        SET MESSAGE_TEXT = 'Книги с таким ID в системе не существует.';
    ELSEIF fAUTHORBOOKCOUNT = 1 THEN
        OPEN AUTHORS;
        read_loop: LOOP
            FETCH AUTHORS INTO fAUTHORNAME;
            IF DONE THEN
                LEAVE read_loop;
            END IF;            
            SET fAUTHORNAMES := fAUTHORNAME;
        END LOOP;
        CLOSE AUTHORS;
    ELSE
        OPEN AUTHORS;
        read_loop: LOOP
            FETCH AUTHORS INTO fAUTHORNAME;
            IF DONE THEN
                LEAVE read_loop;
            END IF;            
            SELECT CONCAT_WS(', ', fAUTHORNAME, fAUTHORNAMES) INTO fAUTHORNAMES;
        END LOOP;
        CLOSE AUTHORS;
    END IF;
    RETURN fAUTHORNAMES;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `IDAUTHOR` int(11) NOT NULL,
  `LASTNAME` tinytext NOT NULL,
  `FIRSTNAME` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`IDAUTHOR`, `LASTNAME`, `FIRSTNAME`) VALUES
(1, 'Ру', 'Тори'),
(2, 'Панова', 'Е.'),
(3, 'Позднякова', 'А.'),
(4, 'Сигел', 'Джейсон'),
(5, 'Миллер', 'Кристен');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `IDBOOK` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `BOOKNAME` text NOT NULL,
  `IDSECONDGENRE` int(11) DEFAULT NULL,
  `IDPUBLISHER` int(11) DEFAULT NULL,
  `WEIGHT` double NOT NULL DEFAULT '-1',
  `IMPRINTYEAR` year(4) DEFAULT NULL,
  `PAGE` int(11) DEFAULT NULL,
  `ANNOTATION` text,
  `AGELIMIT` int(11) NOT NULL DEFAULT '-1',
  `COST` double UNSIGNED NOT NULL DEFAULT '0',
  `POPULARITY` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `AVAILABILITY` tinyint(1) NOT NULL DEFAULT '1',
  `PHOTO` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`IDBOOK`, `ISBN`, `BOOKNAME`, `IDSECONDGENRE`, `IDPUBLISHER`, `WEIGHT`, `IMPRINTYEAR`, `PAGE`, `ANNOTATION`, `AGELIMIT`, `COST`, `POPULARITY`, `AVAILABILITY`, `PHOTO`) VALUES
(1, '978-5-17-119485-7', 'Ноль', 1, 1, -1, 2020, 320, 'Мою семью уважают и поддерживают, твою - презирают и проклинают. Нас воспитывали в атмосфере страха и взаимной ненависти. Но это не то, что мы чувствуем друг к другу. Что произойдет, если мы рискнем при всех взяться за руки? \'Возможно, когда-нибудь он захочет вновь появиться в моей жизни и разделить со мной страхи, горе и радости, и мы, смеясь, пробежимся по темному парку, помечтаем на моей \'Луне\', глядя в грозные загадочные небеса, забудемся в странном танце в толпе яркой счастливой молодежи, и, глядя другу в глаза, провалимся в любовь, растворимся в ней, держась за руки… Но даже если этого не случится, он останется в моем сердце самым ярким, самым живым, самым болезненным воспоминанием, раной, которая никогда не превратится в шрам...\'', 18, 356, 0, 1, '978-5-17-119485-7.jpg'),
(2, '978-5-17-114532-3', 'Ночные кошмары! Забытая колыбельная', 2, 1, -1, 2020, 352, 'Чарли Лэрд в полной растерянности. Проблемы с мачехой-ведьмой давно в прошлом. К порталу в царство ночных кошмаров, расположенному в доме Чарли, уже давным-давно никто не приближается. Со зловредными сестрамиблизняшками покончено. Откуда же взялась эта странная девочка? Что она делает в реальности — да не просто в реальности, а в школе, в одном классе с Чарли? И случайно ли с ее появлением начинают происходить жуткие и пугающие события? Либо все это сон… Либо скоро всем станет не до сна.', 6, 391, 0, 1, '978-5-17-114532-3.jpg'),
(3, '978-5-17-058998-2', 'Русский язык Для подг. к устному экзамену и ЕГЭ', 3, 1, 350, 2010, 462, 'Справочник включает все программные темы школьного курса русского языка с 5 по 11 классы. Книга будет незаменимым помощником при изучении и закреплении нового материала, повторении пройденных тем, а также при подготовке к зачетам, выпускным экзаменам в школе и вступительным экзаменам в любой вуз. Материалы книги соответствуют формату Единого государственного экзамена.', -1, 150, 0, 1, '978-5-17-058998-2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `bookauthor`
--

DROP TABLE IF EXISTS `bookauthor`;
CREATE TABLE `bookauthor` (
  `IDAUTHOR` int(11) NOT NULL,
  `IDBOOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookauthor`
--

INSERT INTO `bookauthor` (`IDAUTHOR`, `IDBOOK`) VALUES
(1, 1),
(4, 2),
(5, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `IDGENRE` int(11) NOT NULL,
  `GENRENAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`IDGENRE`, `GENRENAME`) VALUES
(2, 'Книги для детей'),
(3, 'Образование'),
(1, 'Художественная литература');

-- --------------------------------------------------------

--
-- Структура таблицы `orderheader`
--

DROP TABLE IF EXISTS `orderheader`;
CREATE TABLE `orderheader` (
  `IDORDER` int(11) NOT NULL,
  `LASTNAME` tinytext NOT NULL,
  `FIRSTNAME` tinytext NOT NULL,
  `TELEPHONE` tinytext NOT NULL,
  `TOTALCOST` double UNSIGNED NOT NULL DEFAULT '0',
  `GETORDERDATE` date NOT NULL,
  `PLACEORDERDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IDORDERSTATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE `orderline` (
  `IDBOOK` int(11) NOT NULL,
  `IDORDER` int(11) NOT NULL,
  `COUNTOF` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orderstatus`
--

DROP TABLE IF EXISTS `orderstatus`;
CREATE TABLE `orderstatus` (
  `IDORDERSTATUS` int(11) NOT NULL,
  `ORDERSTATUSNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `IDPUBLISHER` int(11) NOT NULL,
  `PUBLISHERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`IDPUBLISHER`, `PUBLISHERNAME`) VALUES
(1, 'АСТ');

-- --------------------------------------------------------

--
-- Структура таблицы `secondgenre`
--

DROP TABLE IF EXISTS `secondgenre`;
CREATE TABLE `secondgenre` (
  `IDSECONDGENRE` int(11) NOT NULL,
  `IDGENRE` int(11) NOT NULL,
  `SECONDGENRENAME` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `secondgenre`
--

INSERT INTO `secondgenre` (`IDSECONDGENRE`, `IDGENRE`, `SECONDGENRENAME`) VALUES
(1, 1, 'Проза'),
(2, 2, 'Детская фантастика'),
(3, 3, 'Старшая школа');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `IDUSER` int(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`IDAUTHOR`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`IDBOOK`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`IDGENRE`),
  ADD UNIQUE KEY `GENRENAME` (`GENRENAME`);

--
-- Индексы таблицы `orderheader`
--
ALTER TABLE `orderheader`
  ADD PRIMARY KEY (`IDORDER`);

--
-- Индексы таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`IDORDERSTATUS`),
  ADD UNIQUE KEY `ORDERSTATUSNAME` (`ORDERSTATUSNAME`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`IDPUBLISHER`),
  ADD UNIQUE KEY `PUBLISHERNAME` (`PUBLISHERNAME`);

--
-- Индексы таблицы `secondgenre`
--
ALTER TABLE `secondgenre`
  ADD PRIMARY KEY (`IDSECONDGENRE`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUSER`),
  ADD UNIQUE KEY `PASSWORD` (`PASSWORD`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `IDAUTHOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `IDBOOK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `IDGENRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orderheader`
--
ALTER TABLE `orderheader`
  MODIFY `IDORDER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `IDORDERSTATUS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `IDPUBLISHER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `secondgenre`
--
ALTER TABLE `secondgenre`
  MODIFY `IDSECONDGENRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
