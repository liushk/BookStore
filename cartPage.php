<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $title = 'Главная - BookStore';
        $book = new Book();
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
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя и фамилия</label>
                        <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Введите имя и фамилию получателя заказа" required>
                        <small id="nameHelp" class="form-text text-muted">Необходимо показать паспорт при получении заказа для подтверждения личности</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Телефон в формате +7 (ххх) ххх-хх-хх</label>
                        <input type="tel" pattern="+7 ([0-9]{3}) [0-9]{3}-[0-9]{2}-[0-9]{2}" aria-describedby="telHelp" placeholder="+7 (ххх) ххх-хх-хх" class="form-control" id="inputTel" placeholder="+7 (555) 555-55-55" required>
                        <small id="telHelp" class="form-text text-muted">Наш менеджер перезвонит Вам в течении часа для подтверждения заказа</small>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Оформить заказ</button>
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