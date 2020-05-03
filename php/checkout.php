<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/order.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";       
    if(isset($_POST['createOrder'])){
        if (htmlspecialchars($_POST['customerName']) == "" || htmlspecialchars($_POST['customerTel']) == ""){
            header('Location: http://localhost/createorderpage.php?reg=no');
        } else {
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
                $info = getBook($key);
                if(count($info)>0){
                    insertOrderLine($idOrder, $key, getBookCost($key), $value);
                    updateBookPopularity($key);
                    $totalCost += getBookCost($key, $value);
                } else{
                    header('Location: http://localhost/createorderpage.php?reg=no');
                }
            }
            insertOrderHeader($idOrder, $customerName, $customerTel, $totalCost);
            header('Location: http://localhost/createorderpage.php?reg=ok&order=' . $idOrder);
        }        
    } else{
        header('Location: http://localhost/index.php');
    }    
?>

    