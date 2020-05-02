<?php
// функция для вывода данных на страницу единичного экземпляра книги
function getBook($idbook = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if ($idbook == ""){
        return $db->getQuery("SELECT IDBOOK FROM BOOK");
    } else{
        return $db->getQuery("SELECT B.IDBOOK, B.ISBN, B.BOOKNAME, G.GENRE, G2.GENRE2, P.PUBLISHER, B.IMPRINTYEAR, B.PAGE, B.AUTHORS,        
        B.ANNOTATION, B.AGELIMIT, B.COST, B.POPULARITY, B.PHOTO, G.IDGENRE, G2.IDGENRE2, P.IDPUBLISHER, B.AVAILABILITY, B.FULLBOOKNAME
        FROM BOOK B, GENRE G, GENRE2 G2, PUBLISHER P WHERE B.IDBOOK = " . $idbook ." AND G.IDGENRE = G2.IDGENRE        
        AND G2.IDGENRE2 = B.IDGENRE2 AND P.IDPUBLISHER = B.IDPUBLISHER");
    }        
}

//функция для проверки наличия книги: если есть в наличии - true, иначе - false
function isAvailableBook($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT AVAILABILITY FROM BOOK WHERE IDBOOK = " . $idbook);
    if($info[0]['AVAILABILITY'] <> "0"){
        return true;
    } else{
        return false;
    }
}

//функция для вывода информации о книге в корзину
function getCart($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.IDBOOK, B.FULLBOOKNAME, B.AUTHORS, B.COST, B.PHOTO
    FROM BOOK B WHERE B.IDBOOK = " . $idbook);
    if (count($info) <> 0){
        echo json_encode($info[0]);
    }   
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

//функция для вывода книг по популярности: ASC - от меньшего к большему, DESC - от большего к меньшему
function sortBookPopularity($typeOfSort){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($typeOfSort = "ASC"){
        return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE AVAILABILITY = 1 ORDER BY POPULARITY DESC");
    } else if($typeOfSort = "DESC"){
        return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE AVAILABILITY = 1 ORDER BY POPULARITY");
    }
}

//функция для вывода книг по новизне и популярности ("горячие новинки"): ASC - от меньшего к большему, DESC - от большего к меньшему
function sortBookDate($typeOfSort){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($typeOfSort = "ASC"){
        return $db->getQuery("SELECT IDBOOK, IMPRINTYEAR, POPULARITY FROM BOOK WHERE AVAILABILITY = 1 ORDER BY IMPRINTYEAR DESC, POPULARITY DESC");
    } else if($typeOfSort = "DESC"){
        return $db->getQuery("SELECT IDBOOK, IMPRINTYEAR, POPULARITY FROM BOOK WHERE AVAILABILITY = 1 ORDER BY IMPRINTYEAR, POPULARITY");
    }
}

//функция для вывода списка жанров или определенного жанра
function getGenres($idgenre = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($idgenre == ""){
        return $db->getQuery("SELECT * FROM GENRE");
    } else{
        return $db->getQuery("SELECT * FROM GENRE WHERE IDGENRE = " . $idgenre);
    }
}

//функция для вывода списка жанров или определенного поджанра
function getGenres2($idgenre, $idgenre2 = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($idgenre2 == ""){
        return $db->getQuery("SELECT * FROM GENRE2 WHERE IDGENRE = " . $idgenre);
    } else{
        return $db->getQuery("SELECT * FROM GENRE2 WHERE IDGENRE = " . $idgenre . " AND IDGENRE2 = " . $idgenre2);
    }
}

//функция для вывода списка издательств или определенного издательства
function getPublishers($publisher = ""){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    if($publisher == ""){
        return $db->getQuery("SELECT * FROM PUBLISHER");
    } else{
        return $db->getQuery("SELECT * FROM PUBLISHER WHERE IDPUBLISHER = " . $publisher);
    }
}

//функция для вывода книг определенного жанра
function getBookGenre($idgenre){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT B.IDBOOK FROM BOOK B, GENRE2 G WHERE B.IDGENRE2 = G.IDGENRE2 AND G.IDGENRE = " . $idgenre);
}

//функция для вывода книг определенного поджанра
function getBookGenre2($idgenre2){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE IDGENRE2 = " . $idgenre2);
}

//функция для вывода книг определенного издательства
function getBookPublisher($publisher){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK WHERE IDPUBLISHER = " . $publisher);
}

//функция для поиска книг по базе
function getSearch($searchStr){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT IDBOOK FROM BOOK B WHERE 
    B.ISBN LIKE '%" . $searchStr . "%' OR B.BOOKNAME LIKE '%" . $searchStr . "%' 
    OR B.AUTHORS LIKE '%" . $searchStr . "%' OR B.ANNOTATION LIKE '%" . $searchStr . "%'
    OR B.FULLBOOKNAME LIKE '%" . $searchStr . "%'");
}

//функция для вывода информации для слайдеров на главной странице
function getSliders(){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    return $db->getQuery("SELECT * FROM SLIDE S WHERE S.RELEVANCE = 1 ORDER BY S.CREATIONDATE;");
}

if (isset($_POST['id'])){
    $idbook = $_POST['id'];
    getCart($idbook); 
}
