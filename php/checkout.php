<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/order.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";       
    if(isset($_POST['createOrder'])){
        $customerName = htmlspecialchars($_POST['customerName']);
        $customerTel = htmlspecialchars($_POST['customerTel']);
        $bookCount = [];
        $totalCost = 0;
        $idOrder = 0;     
        //в массив забиваем количество книг по ID
        foreach ($_POST as $key => $value) {
            if (($key != "customerName") && ($key != "customerTel") && ($key != "createOrder")){
                $bookCount[$key] = (int)$value;       
            }
        }
        if(!isAvailableOrderID($idOrder)){
            $idOrder = setOrderID();        
        }
        foreach ($bookCount as $key => $value) {
            insertOrderLine($idOrder, $key, getBookCost($key), $value);
            updateBookPopularity($key);
            $totalCost += getBookCost($key, $value);
        }
        insertOrderHeader($idOrder, $customerName, $customerTel, $totalCost);
        header('Location: http://localhost/createorderpage.php?reg=ok&order=' . $idOrder);
        echo "<h4>Заказ №" . $idOrder . " успешно оформлен!</h4><p>В течение часа наш менеджер проверит комплектацию заказа и свяжется с вамт для уточнения. Хорошего дня!</p>";
    }
    else{
        header('Location: http://localhost/index.php');
    }    
?>

    