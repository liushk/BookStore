CREATE TABLE BOOK(
    IDBOOK INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(255) NOT NULL UNIQUE,
    BOOK TEXT NOT NULL,
    IDSECONDGENRE INTEGER,
    IDPUBLISHER INTEGER,
    WEIGHT DOUBLE NOT NULL DEFAULT -1,
    IMPRINTYEAR YEAR,
    PAGE INTEGER,
    ANNOTATION TEXT,
    AGELIMIT INTEGER NOT NULL DEFAULT -1,
    COST DOUBLE UNSIGNED NOT NULL DEFAULT 0,
    POPULARITY INTEGER UNSIGNED NOT NULL DEFAULT 0,
    AVAILABILITY BOOLEAN NOT NULL DEFAULT TRUE,
	PHOTO TEXT
);

CREATE TABLE GENRE(
    IDGENRE INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    GENRE VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE GENRE2(
    IDGENRE2 INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    IDGENRE INTEGER NOT NULL,
    GENRE2 TINYTEXT NOT NULL
);

CREATE TABLE AUTHOR(
    IDAUTHOR INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    LASTNAME TINYTEXT NOT NULL,
    FIRSTNAME TINYTEXT NOT NULL
);

CREATE TABLE BOOKAUTHOR(
    IDAUTHOR INTEGER NOT NULL,
    IDBOOK INTEGER NOT NULL
);

CREATE TABLE PUBLISHER(
    IDPUBLISHER INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PUBLISHER VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE ORDERSTATUS(
    IDORDERSTATUS INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ORDERSTATUS VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE ORDERLINE(
    IDBOOK INTEGER	NOT NULL,
    IDORDER INTEGER	NOT NULL,
    COUNTOF INTEGER UNSIGNED NOT NULL DEFAULT 1
);

CREATE TABLE ORDERHEADER(
    IDORDER INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    LASTNAME TINYTEXT NOT NULL,
    FIRSTNAME TINYTEXT NOT NULL,
    TELEPHONE TINYTEXT NOT NULL,
    TOTALCOST DOUBLE UNSIGNED NOT NULL DEFAULT 0,
    GETORDERDATE DATE NOT NULL,
    CREATIONDATE TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    IDORDERSTATUS INTEGER NOT NULL
);

CREATE TABLE USERS(
    IDUSER INTEGER NOT NULL PRIMARY KEY,
    PASSWORD VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE SLIDER(
    IDSLIDER INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CREATIONDATE TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    TITLE TEXT NOT NULL,
    TITLE2 TEXT NOT NULL,
    BTN TINYTEXT NOT NULL,
    COLLECTIONLINK TEXT,
    RELEVANCE BOOLEAN NOT NULL DEFAULT FALSE,
    BACKGROUNDTEXT BOOLEAN NOT NULL DEFAULT TRUE,
    PHOTO TEXT
);

INSERT INTO SLIDER(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, PHOTO) VALUES
    ("Ребята, приключений час!", 
    "Проведи этот час в нашем уютном BookStore - твоя история тебя ждет!", 
    "Запускай", "", TRUE, "page4.jpg");
INSERT INTO SLIDER(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, PHOTO) VALUES
    ("Для чего существуют правила?", 
    "Чтобы бессовестно нарушать их и создавать потрясающий киберпанк-мир! Переходи на нашу сторону. У нас здесь своя атмосфера. И космические корабли. И межгалактические печеньки (но мы ни на что не намекаем)", 
    "Дайте одну", "", TRUE, "page8.jpg");
INSERT INTO SLIDER(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, BACKGROUNDTEXT, PHOTO) VALUES
    ("Любовь витает в воздухе", 
    "Закрой глаза и вдохни полной грудью... чувствуешь? Прямо здесь и сейчас наша свежая подборка романов для самых мечтательных читателей из сердца BookStore", 
    "Покажи", "", TRUE, FALSE, "page10.jpg");
INSERT INTO SLIDER(TITLE, TITLE2, BTN, COLLECTIONLINK, PHOTO) VALUES
    ("Весна", 
    "Тихонько бегут ручьи, светит солнышко, на душе распускаются цветы. BookStore считает, что это самое лучшее время, чтобы влюбиться в эти восхитительные произведения, встречай нашу сезонную подборку!", 
    "Влюбиться", "", "page12,jpg");

INSERT INTO GENRE(GENRE) VALUES
    ("Художественная литература"),
    ("Книги для детей"),
    ("Образование");

INSERT INTO GENRE2(IDGENRE, GENRE2) VALUES
    (1, "Проза"),
    (2, "Детская фантастика"),
    (3, "Старшая школа");

INSERT INTO AUTHOR(LASTNAME, FIRSTNAME) VALUES
    ("Ру", "Тори"),
    ("Панова", "Е."),
    ("Позднякова", "А."),
    ("Сигел", "Джейсон"),
    ("Миллер", "Кристен");

INSERT INTO PUBLISHER(PUBLISHER) VALUES
    ("АСТ");

INSERT INTO BOOK(ISBN, BOOK, IDSECONDGENRE, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO) VALUES
    ("978-5-17-119485-7", "Ноль", 1, 1, 2020, 320, "Мою семью уважают и поддерживают, твою - презирают и проклинают. Нас воспитывали в атмосфере страха и взаимной ненависти. Но это не то, что мы чувствуем друг к другу. Что произойдет, если мы рискнем при всех взяться за руки? 'Возможно, когда-нибудь он захочет вновь появиться в моей жизни и разделить со мной страхи, горе и радости, и мы, смеясь, пробежимся по темному парку, помечтаем на моей 'Луне', глядя в грозные загадочные небеса, забудемся в странном танце в толпе яркой счастливой молодежи, и, глядя другу в глаза, провалимся в любовь, растворимся в ней, держась за руки… Но даже если этого не случится, он останется в моем сердце самым ярким, самым живым, самым болезненным воспоминанием, раной, которая никогда не превратится в шрам...'", 18, 356, "978-5-17-119485-7.jpg");
INSERT INTO BOOK(ISBN, BOOK, IDSECONDGENRE, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO) VALUES
    ("978-5-17-114532-3", "Ночные кошмары! Забытая колыбельная", 2, 1, 2020, 352, "Чарли Лэрд в полной растерянности. Проблемы с мачехой-ведьмой давно в прошлом. К порталу в царство ночных кошмаров, расположенному в доме Чарли, уже давным-давно никто не приближается. Со зловредными сестрамиблизняшками покончено. Откуда же взялась эта странная девочка? Что она делает в реальности — да не просто в реальности, а в школе, в одном классе с Чарли? И случайно ли с ее появлением начинают происходить жуткие и пугающие события? Либо все это сон… Либо скоро всем станет не до сна.", 6, 391, "978-5-17-114532-3.jpg");
INSERT INTO BOOK(ISBN, BOOK, IDSECONDGENRE, IDPUBLISHER, WEIGHT, IMPRINTYEAR, PAGE, ANNOTATION, COST, PHOTO) VALUES
    ("978-5-17-058998-2", "Русский язык Для подг. к устному экзамену и ЕГЭ", 3, 1, 350, 2010, 462, "Справочник включает все программные темы школьного курса русского языка с 5 по 11 классы. Книга будет незаменимым помощником при изучении и закреплении нового материала, повторении пройденных тем, а также при подготовке к зачетам, выпускным экзаменам в школе и вступительным экзаменам в любой вуз. Материалы книги соответствуют формату Единого государственного экзамена.", 150, "978-5-17-058998-2.jpg");

INSERT INTO BOOKAUTHOR(IDAUTHOR, IDBOOK) VALUES
    (1,1), (4,2), (5,2), (2,3), (3,3);

--функция, которая возвращает авторов по ID книги
DELIMITER $$
CREATE FUNCTION GETAUTHORNAMEBYBOOKID(inIDBOOK INTEGER) 
RETURNS TEXT
LANGUAGE SQL
BEGIN
	DECLARE fAUTHORNAME TEXT; --переменная для хранения имени автора в курсоре
    DECLARE fAUTHORNAMES TEXT; --переменная, которая вернет всех авторов через запятую
    DECLARE fAUTHORBOOKCOUNT INTEGER; --переменная для подсчета количества авторов у книги
    DECLARE DONE INTEGER DEFAULT FALSE; --переменная для отслеживания шагов по курсору 

    --в этом курсорке собираются полные имена авторов книги, склеенные из имени и фамилии
    DECLARE AUTHORS CURSOR FOR 
    SELECT CONCAT_WS(' ', A.FIRSTNAME, A.LASTNAME) AUTHNAMES FROM AUTHOR A, BOOKAUTHOR BA
    WHERE BA.IDBOOK = inIDBOOK AND A.IDAUTHOR = BA.IDAUTHOR;
    --задается хандлер, означающий, что если строки в курсоре закончится, то переменная done примет значение ложь
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET DONE = TRUE;

    --подсчитываем количество авторов книги
    SELECT COUNT(A.FIRSTNAME) INTO fAUTHORBOOKCOUNT	FROM AUTHOR A, BOOKAUTHOR BA
	WHERE BA.IDBOOK = inIDBOOK AND A.IDAUTHOR = BA.IDAUTHOR;  

    --если авторов нет, это значит, что книга не могла быть добавлена в систему, следовательно, выдаем ошибку
    IF fAUTHORBOOKCOUNT = 0 THEN
    	SIGNAL SQLSTATE '42000'
        SET MESSAGE_TEXT = 'Книги с таким ID в системе не существует.';
    --в случае, если книга одна, мы заходим в курсор и забираем это значение
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
    --в случае, если авторов несколько, мы склеиваем имена через запятую и складываем в переменную fAUTHORNAMES
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
END $$
DELIMITER ;