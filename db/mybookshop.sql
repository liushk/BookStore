CREATE TABLE BOOK(
    IDBOOK INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(255) NOT NULL UNIQUE,
    BOOKNAME TEXT NOT NULL,
    FULLBOOKNAME TEXT NOT NULL,
    AUTHORS TEXT NOT NULL,
    IDGENRE2 INTEGER NOT NULL,
    IDPUBLISHER INTEGER NOT NULL,
    IMPRINTYEAR YEAR,
    PAGE INTEGER,
    ANNOTATION TEXT,
    AGELIMIT INTEGER NOT NULL DEFAULT 0,
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

CREATE TABLE PUBLISHER(
    IDPUBLISHER INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PUBLISHER VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE ORDERLINE(
    IDBOOK INTEGER	NOT NULL,
    IDORDER INTEGER	NOT NULL,
    COUNTOF INTEGER UNSIGNED NOT NULL DEFAULT 1,
    COST DOUBLE
);

CREATE TABLE ORDERHEADER(
    IDORDER INTEGER NOT NULL PRIMARY KEY,
    NAME TEXT NOT NULL,
    TELEPHONE TINYTEXT NOT NULL,
    TOTALCOST DOUBLE UNSIGNED NOT NULL DEFAULT 0,
    CREATIONDATE TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE SLIDE(
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

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-119485-7", "Ноль", "Ноль", "Тори Ру", 1, 1, 2020, 320,
    "Мою семью уважают и поддерживают, твою - презирают и проклинают. Нас воспитывали в атмосфере страха и взаимной ненависти. Но это не то, что мы чувствуем друг к другу. Что произойдет, если мы рискнем при всех взяться за руки? 'Возможно, когда-нибудь он захочет вновь появиться в моей жизни и разделить со мной страхи, горе и радости, и мы, смеясь, пробежимся по темному парку, помечтаем на моей 'Луне', глядя в грозные загадочные небеса, забудемся в странном танце в толпе яркой счастливой молодежи, и, глядя другу в глаза, провалимся в любовь, растворимся в ней, держась за руки… Но даже если этого не случится, он останется в моем сердце самым ярким, самым живым, самым болезненным воспоминанием, раной, которая никогда не превратится в шрам...", 
    18, 356, "978-5-17-119485-7.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-114532-3", "Ночные кошмары! Забытая колыбельная", "Ночные кошмары! Забытая колыбельная", "Дж. Сигел, Кр. Миллер", 2, 1, 2020, 352,
    "Чарли Лэрд в полной растерянности. Проблемы с мачехой-ведьмой давно в прошлом. К порталу в царство ночных кошмаров, расположенному в доме Чарли, уже давным-давно никто не приближается. Со зловредными сестрамиблизняшками покончено. Откуда же взялась эта странная девочка? Что она делает в реальности — да не просто в реальности, а в школе, в одном классе с Чарли? И случайно ли с ее появлением начинают происходить жуткие и пугающие события? Либо все это сон… Либо скоро всем станет не до сна.", 
    6, 391, "978-5-17-114532-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-058998-2", "Русский язык и ЕГЭ", "Русский язык для подготовки к устному экзамену и ЕГЭ", "Панова Е., Позднякова А.", 3, 1, 2010, 462, 
    "Справочник включает все программные темы школьного курса русского языка с 5 по 11 классы. Книга будет незаменимым помощником при изучении и закреплении нового материала, повторении пройденных тем, а также при подготовке к зачетам, выпускным экзаменам в школе и вступительным экзаменам в любой вуз. Материалы книги соответствуют формату Единого государственного экзамена.", 
    0, 150, "978-5-17-058998-2.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-517-00978-4", "Как я играю!", "Как я играю!", "Константинов Е., Штерн А.", 9, 2, 2020, 342,
    "Месть двенадцати избранным - только это и осталось черному колдуну после того, как подружившиеся лекпины, эльф, гном, гоблин, тролль, вампир, ведьма и преподаватели Факультета рыболовной магии, на корню пресекли попытку глобально изменить существующим мир. Несколько ритуальных убийств, направленное колдовство... и вот уже кто-то из избранных оказываются на берегах замерзшей реки, кто-то попал в топи болот, кишащих кошмарными тварями, а кто-то подвергаются преследованиям в стенах замка факультета. Всем им угрожает смертельная опасность! Но они знают, как защитить себя и друзей.", 
    18, 649, "978-5-517-00978-4.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-121943-7", "Большая кулинарная книга", "Большая кулинарная книга для юных шефов", "Усова И.", 5, 1, 2020, 207,
    "'Большая кулинарная книга для юных шефов' - это полное руководство для юных поваров. В ней содержится более сотни рецептов: от закусок и напитков до горячих блюд на всю семью и вкуснейших десертов. Все рецепты, собранные в этой книге, опробовали и оценили дети со всего мира. Помимо рецептов, читатель встретит увлекательные и полезные советы об ингредиентах и оборудовании, а также многочисленные кулинарные секреты. Стать профессиональным шеф-поваром проще, чем кажется! Для среднего школьного возраста.", 
    6, 937, "978-5-17-121943-7.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-09-073209-3", "Технология. 5-9 классы", "Технология. Методическое пособие. 5-9 классы", "Казакевич В.", 3, 3, 2020, 96, 
    "Методическое пособие соответствует требованиям Федерального государственного образовательного стандарта основного общего образования и Примерной программы основного общего образования по технологии. В пособии представлены научно-методические основы курса и их реализация в УМ К для 5-9 классов, тематическое планирование, планируемые результаты (личностные, метапредметные и предметные) по итогам обучения в 5-9 классах.", 
    16, 195, "978-5-09-073209-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-4499-0314-3", "Алгоритмизация и программирование. Практикум", "Алгоритмизация и программирование. Практикум. Учебное пособие", "Нагаева И., Кузнецов И.", 6, 4, 2019, 168, 
    "Основная задача учебного пособия — изучение основ алгоритизации и программирования на практических примерах. Пособие представляет собой сборник задач для самостоятельного решения в среде разработки Pascal. Рассмотренные решения задач различной степени сложности демонстрируют возможности языка структурного программирования.Пособие предназначено для школьников, абитуриентов, студентов, преподавателей.Текст печатается в авторской редакции.", 
    0, 577, "978-5-4499-0314-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, AVAILABILITY, PHOTO)
VALUES("978-5-4499-0097-5", "Практикум по информатике", "Практикум по информатике: основы алгоритмизации и программирования", "Колокольникова А.", 6, 4, 2019, 424, 
    "Практикум предназначен для получения навыков работы с языком программирования VBA (Visual Basic for Applications). Дано описание визуальной среды программирования. Изложены приемы разработки графического интерфейса проектов, интегрированных с офисным приложением Microsoft Excel. Сделан акцент на работу с основными алгоритмическими структурами, технологии обработки массивов данных, программирование графики. Представлены процедуры численных методов решения полиномов, нелинейных уравнений, нахождения экстремумов, вычисления интегралов и суммы ряда, приведены примеры применения VBA для программирования задач АВС-анализа.Рассмотрены основы двоичного кодирования в машинной арифметике, реализация базовых алгоритмов на диалектах языка Pascal и в интегрированной среде разработки Delphi 10.3. Учебное издание содержит более 200 примеров и более 350 заданий, вопросы для самопроверки усвоения изученного материала.Практикум можно рекомендовать студентам всех специальностей и форм обучения для аудиторной и самостоятельной работы. Целесообразно использовать издание тем, кто занимается обучением, а также всем желающим освоить навыки автоматизации работы в Excel и разработки Windows-приложений.", 
    0, 1164, 0, "978-5-4499-0097-5.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, AVAILABILITY, PHOTO)
VALUES("978-5-00146-744-1", "Импрессионизм: энциклопедия эпохи", "Импрессионизм: энциклопедия эпохи", "Рубин Дж.", 7, 5, 2020, 424, 
    "Оригинальное исследование наиболее популярного художественного движения в мире, которое навсегда изменило искусство и открыло имена таких художников, как Моне, Ренуар, Дега, Сёра, Кэссэт и другие. Избегая традиционного хронологического повествования или фокуса на конкретных художниках, Джеймс Рубин исследует общие темы: городские пейзажи и городская жизнь, интерьеры и натюрморт, семья и друзья. Автор предоставляет читателям инструменты для критического осмысления импрессионизма и предлагает новое понимание коллективного импульса, который побудил импрессионистов работать с такой оригинальностью и приверженностью своим темам. Благодаря пристальному изучению и сравнению конкретных картин Рубин устанавливает связи в широкой визуальной культуре разных периодов и между художниками в пределах одной школы. Вся история импрессионизма освещается совершенно по-новому.", 
    18, 1887, 0, "978-5-00146-744-1.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-105254-6", "Накопительный эффект", "Накопительный эффект. От поступка – к привычке, от привычки – к выдающимся результатам", "Харди Д.", 8, 6, 2020, 224, 
    "Накопительный эффект — легендарная книга, которую на Западе давно окрестили библией по саморазвитию и лабораторией по изучению успеха. Впервые издается на русском языке. Признана бестселлером таких престижных книжных рейтингов, как The New York Times и Wall Street Journal. Маленькими шагами к большим целям — именно в этом заключается смысл накопительного эффекта. Сформулировал его миллионер, предприниматель и лайф-коуч Даррен Харди. Свой первый миллион он заработал в 24 года, а в 27 его компания имела оборот в 50 миллионов долларов. В книге автор приводит 6 стратегий успеха, но напоминает, что секретным ингредиентом к каждой из них является именно накопительный эффект.", 
    16, 477, "978-5-04-105254-6.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-102880-0", "Дилер реальности", "Дилер реальности", "Димитров Н.", 4, 1, 2019, 416, 
    "Сингапур недалекого будущего превратился в мировую столицу бизнеса и развлечений. Потребление достигло предела, мораль вышла из моды, религии превратились в фастфуд. Человечество погрязло в разврате и излишествах. А у элиты появился новый, особый вид развлечений - цифровой наркотик под названием «Персональные Реальности». В них можно удовлетворить любую, самую порочную и преступную фантазию и, возможно, получить цифровое бессмертие..... Корпоративный шпион Золтан Варго получает задание проникнуть в недра могущественной корпорации, которая готовит этот наркотик к массовому распространению. Золтан должен выяснить суть зловещего проекта, однако, сам оказывается втянут в дьявольскую игру: от порнографического эксперимента над миллионами людей, до свержения всех мировых религий. Эти события неожиданно ломают все его планы. И Золтан открывает для себя одну потрясающую истину…", 
    18, 346, "978-5-04-102880-0.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-118576-3", "Восставшая Луна", "Восставшая Луна", "Макдональд Й.", 4, 1, 2020, 604, 
    "Пять Драконов – пять семейных кланов, контролирующих ведущие промышленные компании Луны, – ведут между собой настоящую войну. Соперники не гнушаются ничем, чтобы проложить себе путь на самый верх пищевой цепочки – ни браками по расчету, ни корпоративным шпионажем, ни похищениями людей, ни массовыми убийствами. Теперь эта битва подошла к концу, и тот, кто, казалось, потерял все, кто поднялся из руин корпоративного разгрома, захватил контроль над Луной благодаря изощренным манипуляциям и невероятной силе воли. Но война никогда не заканчивается, и теперь против победителя выступает его родная сестра. Вот только мир вокруг не стоит на месте, Луна и Земля никогда не будут прежними, неумолимые силы истории придадут бесконечной борьбе за власть совершенно иной масштаб, а человечество уже готово двигаться дальше – за пределы Солнечной системы.", 
    18, 576, "978-5-17-118576-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-517-02422-0", "Ночь черного хрусталя", "Ночь черного хрусталя", "Михайлов В.", 4, 7, 2020, 192, 
    "Цикл состоит из трех романов известного отечественного фантаста Владимира Михайлова, объединенные темой недалекого будущего и общими героями — сотрудником Интерпола Даниилом Миловым и его подругой — американкой Евой Рикс. Перед вами — три дела Даниила и Евы. Три шедевра современной приключенческой научной фантастики! Весь мир переживает экологическое бедствие. Отравлена земля, вода и воздух, все чаще рождаются дети, которые не могут дышать атмосферным воздухом. Их содержат в специальных кислородных камерах на территории Международного научного центра ООН в Намурии. Милов расследовал дело о контрабанде наркотиков и оказался на территории этого европейского государства. В это время под лозунгами борьбы за природу в Намурии произошел государственный переворот и к власти пришли фашисты. Они остановили заводы, взорвали плотину, начали убивать ученых...", 
    16, 849, "978-5-517-02422-0.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-617-12-7473-0", "CTRL+S", "CTRL+S", "Бриггс Э.", 4, 8, 2020, 432, 
    "Реальности больше нет. Есть СПЕЙС — альфа и омега мира будущего. Достаточно надеть специальный шлем — и в твой голове возникает новая, виртуальная жизнь. Здесь ты можешь испытать любые эмоции: радость, восторг, счастье… Или страх. Боль. И даже смерть. Все эти чувства «выкачивают» из живых людей и продают на черном рынке СПЕЙСа богатеньким любителям острых ощущений. Тео даже не догадывался, что его мать Элла была одной из тех, кто начал борьбу с незаконным бизнесом «нефильтрованных эмоций». И теперь женщина в руках киберпреступников. Тео и его друзья ввязываются в настоящую виртуальную войну. Они объявлены вне закона и в реальности, и в СПЕЙСе. Тео придется продираться сквозь коды и блоки Системы без права нажать «Esc» и сохраниться. Ведь единственное, что реально в СПЕЙСе, — это жизнь. И ее так легко потерять.", 
    16, 892, "978-617-12-7473-0.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-105563-9", "Радость, словно нож у сердца", "Радость, словно нож у сердца", "Эриксон С.", 4, 9, 2019, 480, 
    "Реальности больше нет. Есть СПЕЙС — альфа и омега мира будущего. Достаточно надеть специальный шлем — и в твой голове возникает новая, виртуальная жизнь. Здесь ты можешь испытать любые эмоции: радость, восторг, счастье… Или страх. Боль. И даже смерть. Все эти чувства «выкачивают» из живых людей и продают на черном рынке СПЕЙСа богатеньким любителям острых ощущений. Тео даже не догадывался, что его мать Элла была одной из тех, кто начал борьбу с незаконным бизнесом «нефильтрованных эмоций». И теперь женщина в руках киберпреступников. Тео и его друзья ввязываются в настоящую виртуальную войну. Они объявлены вне закона и в реальности, и в СПЕЙСе. Тео придется продираться сквозь коды и блоки Системы без права нажать «Esc» и сохраниться. Ведь единственное, что реально в СПЕЙСе, — это жизнь. И ее так легко потерять.", 
    16, 590, "978-5-04-105563-9.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-118366-0", "Будущее", "Будущее", "Глуховский Д.", 4, 1, 2019, 480, 
    "НА ЧТО ТЫ ГОТОВ РАДИ ВЕЧНОЙ ЖИЗНИ? Уже при нашей жизни будут сделаны открытия, которые позволят людям оставаться вечно молодыми. Смерти больше нет. Наши дети не умрут никогда. Добро пожаловать в будущее. В мир, населенный вечно юными, совершенно здоровыми, счастливыми людьми. Но будут ли они такими же, как мы? Нужны ли дети, если за них придется пожертвовать бессмертием? Нужна ли семья тем, кто не может завести детей? Нужна ли душа людям, тело которых не стареет? Утопия 'БУДУЩЕЕ' — первый после пяти лет молчания роман Дмитрия Глуховского, автора культового романа 'МЕТРО 2033' и триллера 'Сумерки'. Книги писателя переведены на десятки иностранных языков, продаются миллионными тиражами и экранизируются в Голливуде. Но ни одна из них не захватит вас так, как 'БУДУЩЕЕ'.", 
    18, 702, "978-5-17-118366-0.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-106516-4", "Сверхновая НФ и киберпанк", "Сверхновая научная фантастика и киберпанк (комплект из 3 книг)", "Ньюиц А., Уилсон Р., Тидхар Л.", 4, 9, 2019, 1280, 
    "Аннали Ньюиц Автономность Земля, 2144 год. Ученый и борец с копирайтом превратилась в пирата. В своей подводной лодке она занимается контрабандой синтезирует и дешево продает копии дорогих лекарств. Но последняя партия 'стимулятора работы' вызвала зависимость и ряд летальных случаев: люди начинали зацикливаться на работе и сходить с ума. И фармкорпорация, владелец прав на оригинальный препарат, наносит ответный удар. Роберт Чарльз Уилсон Слепое Озеро В середине XXI века с помощью сверхмощных квантовых компьютеров группа ученых в закрытой обсерватории исследует экзопланеты. Здесь, на переднем крае науки, переписываются устаревшие учебники, заново определяется место человека во Вселенной. А в десятках световых лет от Земли, на далекой планете живет некто, кого некорректно назвать человеком. Впереди важнейшие открытия, эра Новой Астрономии, зарождение сверхразума. Чем закончится первое в истории наблюдение за таинственной одиссеей Субъекта? Леви Тидхар Центральная станция 250 000 мигрантов остались жить у подножия гигантского космического вокзала. Культуры сплавились вместе, как реальность и виртуальность. Город вокруг продолжает расти, словно сорняк. Жизнь дешева. Информация ничего не стоит. Марсианский симбионт и поврежденный киборг, представители постчеловечества, люди и машины... Над всеми возвышается Центральная станция межпланетный узел, куда однажды ушло человечество.", 
    18, 874, "978-5-04-106516-4.png");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-6043075-6-4", "Проездом по планетам", "Проездом по планетам", "Кошелева Е.", 9, 10, 2020, 146, 
    "После падения гигантского метеорита на нашу планету, все человечество было стерто с лица земли. Но спустя пару месяцев жители другой галактики все-таки находят двух выживших: парня и девушку. К счастью, есть способ воссоздать человечество. Для этого найденная пара всего лишь должна зачать и родить ребенка. Вся проблема состоит в том, что они терпеть не могут друг друга. Получится ли у инопланетян уговорить их на этот подвиг?", 
    0, 390, "978-5-6043075-6-4.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-91339-906-9", "Рик и Морти представляют", "Рик и Морти представляют", "Кэннон С.", 9, 11, 2020, 136, 
    "Сценарист Дж. Торрес (BroBots, 'Молодые титаны, вперёд') расскажет подлинную историю первой встречи Рика, Морти и ВИНДИКАТОРОВ! Сценарист Дэниел Мэллори Ортберг (сооснователь сайта The Toast) поведает о жизни КРОМБОПУЛОСА МАЙКЛА, профессионального убийцы, который просто любит убивать, и заодно о его знакомстве с Риком. Сценаристка Мэгдалин Визаджио (Kim & Kim, Eternity Girl) узнает, так ли важно, что СОННЫЙ ГЭРИ мозговой паразит, если он делает Джерри... счастливым? А сценаристка Делайла С. Доусон ('Звёздные войны') представит иную версию получившей 'Эмми' серии 'ОГУРЧИК РИК'. Каждый комикс нарисован художником по имени Сиджей Кэннон при участии Ника Фиральди, Сары Стерн и Бриттани Пир. Леттерингом занимался CRANK.", 
    18, 946, "978-5-91339-906-9.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-91339-908-3", "41 Ночь", "41 Ночь", "Прутов Е., Орлов Р.", 9, 11, 2020, 136, 
    "У Альберта было всё, о чём можно только мечтать: спокойная жизнь, большой загородный дом, любимая жена и обожаемый маленький сын. Как говорят в народе: «Не жизнь, а самая настоящая сказка». Но у любой сказки есть тёмная сторона. Однажды ночью прямо из уютной детской кроватки пропадает ребёнок...Объятый паникой, отец тотчас бросается на поиски сына — Альберт уверен, что младенец был похищен ночным чудовищем с горящими жёлтыми глазами. Но словам мужчины не верит никто: ни следователи, ни психолог, ни даже родная жена. В поисках сына Альберт остаётся наедине с самим собой...И вскоре ему предстоит сделать страшное открытие.", 
    16, 379, "978-5-91339-908-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-517-02515-9", "История Галактики. Душа Одиночки", "История Галактики. Душа Одиночки", "Ливадный А.", 4, 7, 2020, 436, 
    "3828 год. Зловещее наследие галактической войны — искусственный разум, известный, как «Пакет программ независимого поведения 'Одиночка'». Многие годы данная киберсистема считалась жутким порождением запредельных военных технологий. Однако когда в прямом неиросенсорном контакте с киберсистемой находится человек, возникает двусторонняя связь и часть личности пилота остается на искусственном носителе... даже после его смерти.", 
    16, 1136, "978-5-517-02515-9.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-517-00917-3", "Кибервождь", "Кибервождь", "Белаш А., Белаш Л.", 4, 7, 2020, 550, 
    "Поняв, что «война кукол» бесперспективна и ведёт только к уничтожению лучших и самых совершенных киборгов, глава проекта «Антикибер» Хиллари Хармон принимает неожиданное решение, обрекая себя тем самым на новую, долгую и трудную борьбу. Теперь его противники — военные, подкомиссия Конгресса и общественное мнение. Проект и жизни его новых «сотрудников» висят на волоске. Но Хиллари слишком хорошо понимает, что поставлено на карту и какие дивиденды сулит победа.", 
    16, 909, "978-5-517-00917-3.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-98358-243-9", "Нетерпеливый алхимик", "Нетерпеливый алхимик", "Сильва Л.", 9, 12, 2011, 368, 
    "Нетерпеливый алхимик - это человек, который в погоне за золотом теряет самого себя и продает душу дьяволу. Именно таким оказался тихий и неприметный Тринидад Солер: инженер АЭС, добропорядочный семьянин любящий отец и муж, обнаруженный мертвым в пригородном мотеле. Лоренсо Сильва мастерски закручивает интригу, наделяет главного героя, помимо прочих достоинств, еще и чувством юмора, создает целую галерею ярких портретов, затрагивает в романе множество самых разнообразных проблем современной Испании (от захоронения ядерных отходов и использования атомной энергии до иммиграции из Восточной Европы). Яркие и живые персонажи, легкий и ироничный стиль повествования, щедро сдобренный испанским колоритом, и смелый нетривиальный сюжет не дают читателю заскучать и держат в напряжении до самого конца.", 
    0, 252, "978-5-98358-243-9.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-389-15179-6", "Черный Корсар", "Черный Корсар", "Сальгари Э.", 9, 13, 2018, 384, 
    "Эмилио Сальгари (1862–1911) — один из мастеров приключенческого жанра, «итальянский Жюль Верн», его романами зачитываются миллионы людей во всем мире. Особой любовью у читателей пользуются романы о Кавалере ди Вентимилья, прозванном собратьями Черным Корсаром. Черный Корсар посвятил свою жизнь мести вероломному врагу, герцогу Ван Гульду, убившему его братьев. Он поклялся стереть с лица земли весь род предателя, но неожиданно рядом с герцогом он находит прекрасную женщину, которая завоевывает его сердце... И вот на одной чаше весов оказывается его нерушимая клятва, а на другой — любовь к женщине, без которой он не хочет жить. Каков будет его выбор? Сколько испытаний и головокружительных приключений придется пережить ему и его верным друзьям, сколько раз лишь чудом и отвагой избежать неминуемой гибели, прежде чем он сможет осуществить свои желания?", 
    12, 126, "978-5-389-15179-6.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-17-121144-8", "Курок", "Курок", "Дуглас П.", 10, 1, 2020, 576, 
    "Он вернулся, чтобы отомстить. Она не даст себя в обиду. Уинтер: 'Отправить его в тюрьму - худшее, что я могла сделать. И не важно, что он совершил преступление и что я желаю ему смерти. Мне казалось, я успею исчезнуть до его освобождения. Возможно, там, за решеткой, он остепенится. Но я ошиблась. Хотя я и боялась, что он начнет мстить, реальность оказалась гораздо страшнее. Он хочет сделать больно не только мне. Его цель - утопить в боли весь мир.' Дэймон: 'Сначала - главное: избавимся от ее папочки. Он всем рассказал, будто я заставил ее. Сказал, что его маленькая девочка стала жертвой. Только я тоже был юн, и она хотела этого не меньше меня. Затем… Лишить Уинтер, ее сестру и мать денег и возможности бежать. Тогда женщины семьи Эшби останутся одни и будут отчаянно нуждаться в рыцаре в сияющих доспехах. Однако их ждет совершенно другое. К тому времени, как я с ней расквитаюсь, она будет так напугана, что даже в мыслях не сможет чувствовать себя в безопасности. А самое лучшее - для этого мне даже не придется вламываться в ее дом. Став новым главой семьи, я получил ключи от всех дверей.'", 
    18, 405, "978-5-17-121144-8.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-00154-276-6", "Восхитительная ведьма", "Восхитительная ведьма", "Джейн А.", 10, 14, 2020, 544, 
    "Пожелайте мне удачи. Я покоряю человека с железным сердцем, каменными плечами и ужасным характером. Я не знаю, чего мне хочется больше - придушить или обнять его. Он зануда, который старается все делать правильно, но совершает такие безбашенные поступки, на которые я никогда не решилась бы. Он университетский преподаватель, а я старшекурсница. Пока он не знает, что станет моим парнем. Но ведь это дело времени, правда? Я добьюсь его во что бы то ни стало.", 
    16, 432, "978-5-00154-276-6.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-389-17128-2", "Дарующий звезды", "Дарующий звезды", "Мойес Дж.", 10, 15, 2019, 544, 
    "США. 1937 год. Элис выходит замуж за красивого американца Беннета Ван Клива в надежде избежать душной атмосферы родительского дома в Англии, но довольно скоро понимает, что сменила одну тюрьму на другую. Именно поэтому она с радостью соглашается на работу в весьма необычной библиотеке по программе Элеоноры Рузвельт. Марджери, возглавившая эту библиотеку, – самодостаточная женщина, хорошо знающая жителей и обычаи гор, – привыкла сама решать, что ей делать и как поступать, не спрашивая мнения мужчин, а потому нередко попадает в трудные ситуации. Они с Элис быстро находят общий язык и становятся близкими подругами… Захватывающий, основанный на реальных событиях рассказ о пяти необыкновенных женщинах-библиотекарях, доставлявших книги в самые отдаленные уголки горных районов Кентукки, от автора «До встречи с тобой»! Впервые на русском языке!", 
    16, 332, "978-5-389-17128-2.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-104284-4", "Девушка, привет", "Девушка, привет", "Эмдин А.", 10, 16, 2019, 244, 
    "Девушка, привет - сборник романтических писем Андрея Эмдина, популярного блогера, автора романа «Когда ты проснешься...». В этих письмах он обращается к своей будущей девушке. Они еще не знакомы, но это не мешает ему уже сейчас любить ее, говорить с ней, делиться своими переживаниями. Эмдин объясняет, что в любви, как и в жизни, нет ничего идеального, красота может скрываться в недостатках, а забота - в желании надеть на тебя, сопротивляющуюся, шапку в мороз. Любовь многогранна, доступна и лишь совсем чуть-чуть - несбыточна. Мужской взгляд на любовь - пугающе откровенно и вместе с тем бесконечно романтично.", 
    16, 294, "978-5-04-104284-4.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-101549-7", "После", "После", "Эмдин А.", 10, 16, 2019, 544, 
    "Тесса была тихой и примерной девочкой. Пока не встретила Хардина – чертовски привлекательного, по-настоящему плохого парня, которому плевать на все правила. Между ними промелькнула не просто искра, это был мощный электрический разряд. Так их жизнь навсегда разделилась на до и после...", 
    16, 343, "978-5-04-101549-7.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("978-5-04-103673-7", "Save me/Спаси меня", "Save me/Спаси меня", "Кастен М.", 10, 16, 2019, 352, 
    "Любовь, страсть, привязанность – Руби Белл боится всего этого как огня. Ей нужно лишь окончить Макстон-холл, одну из самых престижных школ Англии, и уехать подальше. Отношения в ее планы не входят! Но как выжить одной, когда ты обычная девушка, а все вокруг высокомерные выскочки? Особенно Руби не нравится Джеймс Бофорт. Он слишком уверен в себе, слишком привлекателен, слишком опасен. В здравом уме она ни за что бы не стала с ним общаться, вот только у судьбы другие планы. Вскоре жизнь Руби безвозвратно изменится.", 
    18, 336, "978-5-04-103673-7.jpg");

INSERT INTO BOOK(ISBN, BOOKNAME, FULLBOOKNAME, AUTHORS, IDGENRE2, IDPUBLISHER, IMPRINTYEAR, PAGE, ANNOTATION, AGELIMIT, COST, PHOTO)
VALUES("78-5-17-086712-7", "Виноваты звезды", "Виноваты звезды", "Грин Дж.", 10, 17, 2016, 286, 
    "Подростки, страдающие от тяжелой болезни, не собираются сдаваться. Они по-прежнему остаются подростками — ядовитыми, неугомонными, взрывными, бунтующими, равно готовыми и к ненависти, и к любви. Хейзел и Огастус бросают вызов судьбе. Они влюблены друг в друга, их терзает не столько нависшая над ними тень смерти, сколько обычная ревность, злость и непонимание. Они — вместе. Сейчас — вместе. Но что их ждет впереди?", 
    16, 375, "978-5-17-086712-7.jpg");

INSERT INTO GENRE(GENRE) VALUES ("Художественная литература"), ("Книги для детей"), ("Образование"), ("Наука и техника"), ("Психология");

INSERT INTO GENRE2(IDGENRE, GENRE2) VALUES (1, "Проза"), (2, "Детская фантастика"), (3, "Старшая школа"), (1, "Фантастика, киберпанк"), 
(2, "Творчество и досуг"), (4, "Технические науки"), (4, "Гуманитарные науки"), (5, "Психологический бестселлер"), (1, "Приключения"), 
(1, "Романтика");

INSERT INTO PUBLISHER(PUBLISHER) VALUES ("АСТ"), ("Т8 Издательские технологии"), ("Просвещение"), ("Директ-Медиа"), ("Манн, Иванов и Фербер"),
("Бомбора"), ("Т8 RUGRAM"), ("Клуб Семейного Досуга"), ("Fanzon"), ("Москва"), ("Комильфо"), ("Флюид"), ("Азбука"), ("Клевер"), ("Иностранка"), 
("Эксмо"), ("Кино");

INSERT INTO SLIDE(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, PHOTO) VALUES
    ("Ребята, приключений час!", 
    "Проведи этот час в нашем уютном BookStore - твоя история тебя ждет!", 
    "Запускай", "?idgenre=1&idgenre2=9", TRUE, "slide4.jpg");
INSERT INTO SLIDE(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, PHOTO) VALUES
    ("Зачем создают правила?", 
    "Чтобы нарушать их и отправляться в потрясающий киберпанк-мир! Переходи на нашу сторону. У нас тут своя атмосфера, космические дирижабли. И межгалактические печеньки (хе-хе)...", 
    "Дайте одну", "?idgenre=1&idgenre2=4", TRUE, "slide8.jpg");
INSERT INTO SLIDE(TITLE, TITLE2, BTN, COLLECTIONLINK, RELEVANCE, BACKGROUNDTEXT, PHOTO) VALUES
    ("Любовь витает в воздухе", 
    "Закрой глаза и вдохни полной грудью... чувствуешь? Прямо здесь и сейчас наша свежая подборка романов для самых мечтательных читателей из сердца BookStore", 
    "Покажи", "?idgenre=1&idgenre2=10", TRUE, FALSE, "slide10.jpg");


