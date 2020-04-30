<?php
// функция для вывода данных на страницу единичного экземпляра книги
function getBookInfo(int $idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.IDBOOK, B.ISBN, B.BOOK, G.GENRE,  
    G2.GENRE2, P.PUBLISHER, B.WEIGHT, B.IMPRINTYEAR, B.PAGE, B.AUTHORS,
    B.ANNOTATION, B.AGELIMIT, B.COST, B.POPULARITY, B.PHOTO, G.IDGENRE,
    G2.IDGENRE2, P.IDPUBLISHER, B.AVAILABILITY
    FROM BOOK B, GENRE G, GENRE2 G2, PUBLISHER P
    WHERE B.IDBOOK = " . $idbook ." AND G.IDGENRE = G2.IDGENRE 
    AND G2.IDGENRE2 = B.IDGENRE2 AND P.IDPUBLISHER = B.IDPUBLISHER");
    if (count($info) <> 0){
        return $info;
    }
    else echo "Ошибка! Книги с таким ID не существует.";        
}

//функция для вывода информации о книге в корзину
function getCart($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.IDBOOK, B.BOOK, B.AUTHORS, B.COST, B.PHOTO
    FROM BOOK B WHERE B.IDBOOK = " . $idbook);
    if (count($info) <> 0){
        echo json_encode($info[0]);
    }
    else echo "Ошибка! Книги с таким ID не существует.";     
}

//функция расчета стоимости книги (можно задать количество экземпляров)
function getBookCost($idbook, $count = 1){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.COST FROM BOOK B WHERE B.IDBOOK = " . $idbook);
    return (double)$info[0]['COST'] * $count;
}

//функция для обновления популярности
function updateBookPopularity($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT POPULARITY FROM BOOK WHERE IDBOOK = " . $idbook);
    $popularity = (int)$info[0]['POPULARITY'] + 1;
    $db->getUpdateOrInsert("UPDATE BOOK SET POPULARITY = " . $popularity . " WHERE IDBOOK = " . $idbook);
}

//функция для проверки, существует ли книга: true - существует, иначе - false
function isAvailableBook($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM BOOK WHERE IDBOOK = " . $idbook );
    if ((int)$info[0]['COUNTOF'] <> 0){
        return true;
    }
    else {
        return false;
    }
}

//функция для вывода книг по популярности: ASC - от меньшего к большему, DESC - от большего к меньшему
function sortBookPopularity($typeOfSort){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($typeOfSort = "ASC"){
        $info = $db->getQuery("SELECT IDBOOK FROM BOOK ORDER BY POPULARITY DESC");
        return $info;
    }else if($typeOfSort = "DESC"){
        $info = $db->getQuery("SELECT IDBOOK FROM BOOK ORDER BY POPULARITY");
        return $info;
    }
}

//функция для вывода книг по новизне и популярности ("горячие новинки"): ASC - от меньшего к большему, DESC - от большего к меньшему
function sortBookDate($typeOfSort){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($typeOfSort = "ASC"){
        $info = $db->getQuery("SELECT IDBOOK, IMPRINTYEAR, POPULARITY FROM BOOK ORDER BY IMPRINTYEAR DESC, POPULARITY DESC");
        return $info;
    }else if($typeOfSort = "DESC"){
        $info = $db->getQuery("SELECT IDBOOK, IMPRINTYEAR, POPULARITY FROM BOOK ORDER BY IMPRINTYEAR, POPULARITY");
        return $info;
    }
}

//функция для проверки, существует ли жанр: true - существует, иначе - false
function isAvailableGenre($idgenre){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM GENRE WHERE IDGENRE = " . $idgenre);
    for($i = 0; $i < count($info); $i++){
        if (((int)$info[$i]['COUNTOF']) <> 0){
            return true;
        }
        else {
            return false;
        }
    }    
}

//функция для проверки, существует ли поджанр: true - существует, иначе - false
function isAvailableGenre2($idgenre, $idgenre2){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM GENRE2 WHERE IDGENRE2 = " . $idgenre2 . " AND IDGENRE = " . $idgenre);
    for($i = 0; $i < count($info); $i++){
        if ((int)$info[0]['COUNTOF'] <> 0){
            return true;
        }
        else {
            return false;
        }
    }
}

//функция для проверки, существует ли издательство: true - существует, иначе - false
function isAvailablePublisher($publisher){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM PUBLISHER WHERE IDPUBLISHER = " . $publisher);
    for($i = 0; $i < count($info); $i++){
        if ((int)$info[0]['COUNTOF'] <> 0){
            return true;
        }
        else {
            return false;
        }
    }
}

//функция для вывода всех жанров или определенного жанра
function getGenres($idgenre = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($idgenre == ""){
        return $db->getQuery("SELECT * FROM GENRE");
    }
    else{
        return $db->getQuery("SELECT * FROM GENRE WHERE IDGENRE = " . $idgenre);
    }
}

//функция для вывода поджанра
function getGenres2($idgenre2){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT * FROM GENRE2 WHERE IDGENRE2 = " . $idgenre2);
}

//функция для вывода всех издательств 
function getPublishers($publisher = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($publisher == ""){
        return $db->getQuery("SELECT * FROM PUBLISHER");
    }
    else{
        return $db->getQuery("SELECT * FROM PUBLISHER WHERE IDPUBLISHER = " . $publisher);
    }
}

//функция для вывода книг определенного жанра
function getGenre($idgenre){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT B.IDBOOK FROM BOOK B, GENRE2 G WHERE B.IDGENRE2 = G.IDGENRE2 AND G.IDGENRE = " . $idgenre);
}

//функция для вывода книг определенного поджанра
function getGenre2($idgenre2){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE IDGENRE2 = " . $idgenre2);
}

//функция для вывода книг определенного издательства
function getPublisher($publisher){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE IDPUBLISHER = " . $publisher);
}

//функция для вывода книг
function getCatalog(){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK");
}

//функция для поиска книг по базе
function getSearch($searchStr){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK B WHERE 
    B.ISBN LIKE '%" . $searchStr . "%' OR B.BOOK LIKE '%" . $searchStr . "%' 
    OR B.AUTHORS LIKE '%" . $searchStr . "%' OR B.ANNOTATION LIKE '%" . $searchStr . "%'");
}

if (isset($_POST['id'])){
    $idbook = $_POST['id'];
    getCart($idbook); 
}
