<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php"; 
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";       
        $title = 'Корзина - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
        <div class="emptyCart">
            <div class="contentcontainerCart">
                <div class="row cartMainRow align-items-center">
                    <div class="col-7 cartBookName"><h5>Сейчас в корзине</h5></div>       
                    <div class="col"></div>
                    <div class="col">Количество</div>
                    <div class="col"></div>
                    <div class="col-2">Общая стоимость</div>
                </div>                
                <div class="placeForCartRows"></div>
                <div class="row cartMainRow totalCart align-items-center"></div>
            </div>
            <div class="contentcontainerCart">
                <form action="php/checkout.php" method="post" class="checkoutForm">
                    <div class="form-group">
                        <label for="inputName">Имя и фамилия</label>
                        <input type="text" name="customerName" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Введите имя и фамилию получателя заказа" required>
                        <small id="nameHelp" class="form-text text-muted">Необходимо показать паспорт при получении заказа для подтверждения личности</small>
                    </div>
                    <div class="form-group">
                        <label for="inputTel">Телефон в формате +7 (ххх) ххх-хх-хх</label>
                        <input id="phone" name="customerTel" aria-describedby="telHelp" placeholder="+7 (ххх) ххх-хх-хх" class="form-control" id="inputTel" placeholder="+7 (555) 555-55-55" required>
                        <small id="telHelp" class="form-text text-muted">Наш менеджер перезвонит Вам в течении часа для подтверждения заказа</small>
                    </div>
                    <button type="submit" name="createOrder" class="btn btn-success btn-lg">Оформить заказ</button>
                </form>
            </div>
        </div>        
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
        $obj = new Footer;
        $obj->show();
    ?>
</body>
</html>