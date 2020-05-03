<?php
//функция для формирования нового ID заказа
function setOrderID(){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM ORDERHEADER");
    return (int)$info[0]['COUNTOF'] + 1;
}

//функция для проверки ID заказа: если ID свободно - true, иначе - false
function isAvailableOrderID($idOrder ){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $info = $db->getQuery("SELECT COUNT(*) COUNTOF FROM ORDERHEADER WHERE IDORDER = " . $idOrder );
    if ((int)$info[0]['COUNTOF'] <> 0){
        return true;
    }
    else {
        return false;
    }
}

//добавление записи в шапку заказа
function insertOrderHeader($idOrder, $customerName, $customerTel, $totalCost){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $db->getUpdateOrInsert("INSERT INTO ORDERHEADER(IDORDER, NAME, TELEPHONE, TOTALCOST) VALUES 
    (" . $idOrder . ", '" . $customerName . "', '" . $customerTel . "', " . $totalCost . ");");
}

//добавление записи в строки заказа
function insertOrderLine($idOrder, $idBook, $cost, $countOf){
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $db->getUpdateOrInsert("INSERT INTO ORDERLINE(IDBOOK, IDORDER, COUNTOF, COST) VALUES 
    (" . $idBook . ", " . $idOrder . ", " . $countOf . ", " . $cost . ");");
}