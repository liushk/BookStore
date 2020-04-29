<!DOCTYPE html>
<html>
<head>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Страница книги - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
</head>
<body>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $book = getBookInfo(4);
        //echo '<pre>'; 
        //var_dump($book);
        //echo '</pre>';        
    ?>
    <main class="container">
        <div class="container contentcontainer">
            <?php 
            if(isset($_GET['idbook']) && isAvailableBook(htmlspecialchars($_GET['idbook']))){
            $book = getBookInfo(htmlspecialchars($_GET['idbook']));?>
            <div class="row contentcontainerBook">          
                <div class="col-5 bookCol">
                    <div class="row">
                        <div class="col containerPhotoBook">
                            <img class="img-thumbnail bookImg" <?='src="images/book/' . $book[0]['PHOTO'] . '"';?> alt="">
                            <button class="btn btn-danger btn-sm addToCart" <?='data-id="' . $book[0]['IDBOOK'] . '"';?> type="submit">Добавить в корзину</button>
                        </div>
                    </div>
                </div>
                <div class="col-7 bookCol">
                    <div class="row bookRow">
                        <div class="col bookField">Название</div>
                        <div class="col"><h4><?=$book[0]['BOOK'];?></h4></div>              
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Автор(ы)</div>
                        <div class="col"><h6><?=$book[0]['AUTHORS'];?></h6></div>              
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">ID товара</div>
                        <div class="col"><?=$book[0]['IDBOOK'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Издательство</div>
                        <div class="col"><?=$book[0]['BOOK'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Год издания</div>
                        <div class="col"><?=$book[0]['IMPRINTYEAR'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">ISBN</div>
                        <div class="col"><?=$book[0]['ISBN'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Количество страниц</div>
                        <div class="col"><?=$book[0]['PAGE'];?> стр.</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Вес</div>
                        <div class="col"><?=$book[0]['WEIGHT'];?> г.</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Возрастные ограничения</div>
                        <div class="col"><?=$book[0]['AGELIMIT'];?>+</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Жанр</div>
                        <div class="col"><?=$book[0]['GENRE'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Поджанр</div>
                        <div class="col"><?=$book[0]['GENRE2'];?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">В наличии</div>
                        <?php 
                        if($book[0]['AVAILABILITY'] = '1'){
                            echo '<div class="col" style="color: #00ca11;">есть</div>';
                        } else{
                            echo '<div class="col" style="color: #dc3545;">нет</div>';
                        }?>
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Стоимость</div>
                        <div class="col"><?=$book[0]['COST'];?> руб.</div>                
                    </div>                    
                    <div class="row annotationRow">
                        <div class="col"><?=$book[0]['ANNOTATION'];?></div>
                    </div>                 
                </div>  
            </div>
            <?php } else {?>
            <h4>Такой книги у нас в системе нет :(</h4>
            <?php }?>          
        </div>
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
        $obj = new Footer;
        $obj->show();
    ?>
</body>
</html>