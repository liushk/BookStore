<?php
// функция для вывода данных на страницу единичного экземпляра книги
function getBookInfo(int $idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.IDBOOK, B.ISBN, B.BOOK, G.GENRE, B.AVAILABILITY, 
    G2.GENRE2, P.PUBLISHER, B.WEIGHT, B.IMPRINTYEAR, B.PAGE, A.NAME AUTHORS,
    B.ANNOTATION, B.AGELIMIT, B.COST, B.POPULARITY, B.PHOTO
    FROM BOOK B, GENRE G, GENRE2 G2, PUBLISHER P, AUTHOR A, BOOKAUTHOR BA
    WHERE B.IDBOOK = " . $idbook ." AND G.IDGENRE = G2.IDGENRE 
    AND G2.IDGENRE2 = B.IDGENRE2 AND P.IDPUBLISHER = B.IDPUBLISHER
    AND A.IDAUTHOR = BA.IDAUTHOR AND B.IDBOOK = BA.IDBOOK");
    if (count($info) <> 0){
        return $info;
    }
    else echo "Ошибка! Книги с таким ID не существует.";        
}

//функция для вывода информации о книге в корзину
function getCart($idbook){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT B.IDBOOK, B.BOOK, A.NAME AUTHORS, B.COST, B.PHOTO
    FROM BOOK B, AUTHOR A, BOOKAUTHOR BA WHERE B.IDBOOK = " . $idbook . "
    AND A.IDAUTHOR = BA.IDAUTHOR AND B.IDBOOK = BA.IDBOOK");
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

if (isset($_POST['id'])){
    $idbook = $_POST['id'];
    getCart($idbook); 
}
