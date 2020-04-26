<!DOCTYPE html>
<html>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Книга - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $book = new Book();
        $book->getBookInfo(6);
    ?>
    <main class="container">
        <div class="container contentcontainer">
            <div class="row">          
                <div class="col bookField">Здесь будут книжные крошки</div>
            </div>
            <div class="row contentcontainerBook">          
                <div class="col-5 bookCol">
                    <div class="row">
                        <div class="col containerPhotoBook">
                            <img class="img-thumbnail bookImg" <?='src="images/books/' . $book->photo . '"';?> alt="">
                            <button class="btn btn-danger btn-sm" type="submit">Добавить в корзину</button>
                        </div>
                    </div>
                </div>
                <div class="col-7 bookCol">
                    <div class="row bookRow">
                        <div class="col bookField">Название</div>
                        <div class="col"><h4><?=$book->name;?></h4></div>              
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Автор(ы)</div>
                        <div class="col"><h6><?=$book->authors;?></h6></div>              
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">ID товара</div>
                        <div class="col"></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Издательство</div>
                        <div class="col"><?=$book->publisher;?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Год издания</div>
                        <div class="col"><?=$book->year;?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">ISBN</div>
                        <div class="col"><?=$book->isbn;?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Количество страниц</div>
                        <div class="col"><?=$book->page;?> стр.</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Вес</div>
                        <div class="col"><?=$book->weight;?> г.</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Возрастные ограничения</div>
                        <div class="col"><?=$book->agelimit;?>+</div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Жанр</div>
                        <div class="col"><?=$book->genre;?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Поджанр</div>
                        <div class="col"><?=$book->genre2;?></div>                
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">В наличии</div>
                        <?php 
                        //$book->setFieldName('availability', false);
                        if($book->availability){
                            echo '<div class="col" style="color: #00ca11;">есть</div>';
                        } else{
                            echo '<div class="col" style="color: #dc3545;">нет</div>';
                        }?>
                    </div>
                    <div class="row bookRow">
                        <div class="col bookField">Стоимость</div>
                        <div class="col"><?=$book->cost;?> руб.</div>                
                    </div>                    
                    <div class="row annotationRow">
                        <div class="col"><?=$book->annotation;?></div>
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