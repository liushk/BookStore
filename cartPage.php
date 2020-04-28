<!DOCTYPE html>
<html>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $title = 'Главная - BookStore';
        $book = new Book();
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
        <div class="myCart">
            <div class="row cartMainRow align-items-center">
                <div class="col-7 cartBookName"><h5>Сейчас в корзине</h5></div>       
                <div class="col"></div>
                <div class="col">Количество</div>
                <div class="col"></div>
                <div class="col-2">Общая стоимость</div>
            </div>
            <?php for($i = 1; $i <= 6; $i++){ $book->getBookInfo($i);?>
            <div class="row cartRow align-items-center">
                <div class="col">
                    <button class="btn btn-danger btn-sm" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="x" viewBox="0 0 8 8">
                            <path fill="#ffffff" d="M1.406 0l-1.406 1.406.688.719 1.781 1.781-1.781 1.781-.688.719 1.406 1.406.719-.688 1.781-1.781 1.781 1.781.719.688 1.406-1.406-.688-.719-1.781-1.781 1.781-1.781.688-.719-1.406-1.406-.719.688-1.781 1.781-1.781-1.781-.719-.688z" />
                        </svg>
                    </button>
                </div>
                <div class="col">
                    <img class="cartBookImg" <?='src="images/book/' . $book->photo . '"';?> alt="">
                </div>
                <div class="col-4 cartBookName">
                    <span class="cartBookName"><?='"' . $book->name . '" - ' . $book->authors;?></span>
                </div>
                <div class="col">
                    <div class="cost"><?=$book->cost;?> ₽</div>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-sm" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="minus" data-container-transform="translate(0 3)" viewBox="0 0 8 8">
                            <path fill="#ffffff" d="M0 3v2h8v-2h-8z" />
                        </svg>
                    </button>
                </div>
                <div class="col">
                    <span><?=$i;?><span>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-sm" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="8" height="8" data-icon="plus" viewBox="0 0 8 8">
                            <path fill="#ffffff" d="M3 0v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2z" />
                        </svg>
                    </button>
                </div>
                <div class="col-2">
                    <div class="cost"><?=$book->cost*$i?> ₽</div>
                </div>
            </div>
            <?php }?>
            <div class="row cartMainRow align-items-center">
                <div class="col-8 cartBookName"><h5>Итого</h5></div>
                <div class="col"><span>21<span></div>
                <div class="col"></div>            
                <div class="col-2"><div class="cost">10012 ₽</div></div>
            </div>
        </div>
        <div class="myCart">
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
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
        $obj = new Footer;
        $obj->show();
    ?>
</body>
</html>