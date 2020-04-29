<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Каталог - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
        <div class="contentcontainerCatalog">
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Тут будут жанры</p>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <p>Название жанра</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Найдено столько-то товаров</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Форма сортировки</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Ну и тут список книжулечек по 4 штучки в ряд</p>
                        </div>
                    </div>
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