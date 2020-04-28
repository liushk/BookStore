<!DOCTYPE html>
<html>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'О магазине - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
        <div class="articleContainer">
            <div class="row">
                <div class="col">
                    <h3>Команда "BookStore" приветствует тебя!</h3>                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Заваривай чай, садись удобнее, давай знакомиться ;)</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>"BookStore" - небольшой книжный магазин, который возник относительно недавно - в январе 2020 года. Наша команда на сегодняшний день состоит из 5 человек, и мы каждый день трудимся, чтобы делать ваш досуг ярче и раньше всех знакомить любимых читателей с экслюзивными новинками литературного мира!</p>
                    <p>Ассортимент нашего магазина формируется не только благодаря сотрудникам, а еще благодаря тебе, дорогой гость. Если, например, тебе очень нужна определенная книга, но по какой-либо причине ты не можешь найти ее в магазинах Казани - ты можешь обратиться к нам, и ребята из команды "BookStore" возьмут поиски и доставку товара на место выдачи на себя.</p>
                    <p>Наша цель - помочь тебе найти свою книгу. Мы всегда радуемся за наших покупателей, которые находят для себя в этом маленьком пространстве что-нибудь по-настоящему интересное.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img class="articles" src="images/article/article1.jpg" alt="">
                </div>
            </div>            
            <div class="row">
                <div class="col">
                    <h3>Режим работы</h3>
                    <p>Книги можно выбрать и приобрести в нашем магазине по адресу г. Казань, ул. Габдуллы Тукая, д. 1, в любой день с 9:00 до 21:00 (работаем без выходных), а также можно воспользоваться нашим интернет-магазином. </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img class="articles" src="images/article/article2.jpg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Как оформить, оплатить и получить заказ</h3>
                    <p>Для того, чтобы оформить заказ в интернет-магазине "BookStore", достаточно просто добавить товар в корзину и заполнить специальную форму. Менеджер получит твою заявку и в течении часа проверит комплектацию заказа, а затем перезвонит тебе для подтвеждения. После этого заказ будет собран и его можно будет оплатить и забрать в нашем магазине. При получении заказа не забудь взять с собой паспорт, так как он нужен для подтверждения личности и проверки на возрастные ограничения. Некоторые книги нельзя продавать лицам младше 18 лет.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img class="articles" src="images/article/article3.jpg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Связаться с нами</h3>
                    <p>Если у тебя появились какие-либо вопросы, пожелания, предложения или хочешь оставить отзыв, свяжись с нами удобным для тебя способом. Телефон, почтовый адрес и электронная почта размещены ниже. Будем рады видеть тебя, дорогой друг!</p>
                </div>
            </div>
            <div class="contactUsBlock">
                <div class="row contactUsRow">
                    <div class="col">Адрес</div>
                    <div class="col">РТ, г. Казань, ул. Габдуллы Тукая, д. 1</div>
                </div>
                <div class="row contactUsRow">
                    <div class="col">Телефон</div>
                    <div class="col">+7 (xxx) xxx-xx-xx</div>
                </div>
                <div class="row contactUsRow">
                    <div class="col">Почта</div>
                    <div class="col">bookstorekazan@gmail.com</div>
                </div>
                <div class="row contactUsRow">
                    <div class="col">Режим работы</div>
                    <div class="col">ежедневно с 9:00 до 21:00</div>
                </div>
                <div class="row contactUsRow">
                    <div class="col">Получение заказа</div>
                    <div class="col">только самовывоз</div>
                </div>
                <div class="row contactUsRow">
                    <div class="col">Оплата</div>
                    <div class="col">при получении</div>
                </div>
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