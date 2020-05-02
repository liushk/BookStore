<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $title = 'Главная - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
    <script src="js/cart.js" rel="stylesheet"></script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";
    $slider = getSliders();?>
    <main role="main" class="container-fluid flex-shrink-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php for($i = 0; $i < count($slider) - 1; $i++){?>
                    <li data-target="#myCarousel" data-slide-to=<?='"' . ($i+1) . '"'?>></li>
                <?php }?>
            </ol>
            <div class="carousel-inner">
                <?php for($i = 0; $i < count($slider); $i++){
                    if($i == 0){
                        echo "<div class='carousel-item active'>";
                    } else{ 
                        echo "<div class='carousel-item'>";
                    }?>
                    <img <?='src="images/slide/' . $slider[$i]['PHOTO'] . '"';?> alt="">                    
                    <div class="container">
                        <div class="carousel-caption text-left">                            
                                <?php if($slider[$i]['BACKGROUNDTEXT'] == 1){
                                    echo '<div class="bannertext">';
                                } else{
                                    echo '<div>';
                                }?>                      
                                <h4><?=$slider[$i]['TITLE']?></h4>
                                <p><?=$slider[$i]['TITLE2']?></p>
                            </div>
                            <p><a class="btn btn-danger" <?='href="catalogPage.php' . $slider[$i]['COLLECTIONLINK'] .'"';?> role="button"><?=$slider[$i]['BTN']?></a></p>                                                      
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Назад</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Вперед</span>
            </a>
        </div>
        <div class="container contentcontainer">
            <div class="row miniBookFlow">
                <div class="col">
                    <div class="row miniBookTitle">
                        <div class="col">
                            <h5>Горячие новинки</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $bookPop = sortBookDate("DESC");
                         for($i = 0; $i != 4; $i++){ $book = getBook($bookPop[$i]['IDBOOK']);?>
                        <div class="col">
                            <div class="item">
                                <div class="row">
                                    <div class="col">
                                        <a <?='href="singleBookPage.php?idbook=' . $book[0]['IDBOOK'] . '"';?>><img class="miniBookImg" <?='src="images/book/' . $book[0]['PHOTO'] . '"';?> alt=""></a>
                                    </div>
                                </div>
                                <div class="row miniBookText">
                                    <div class="col">
                                        <a class="text-dark" <?='href="singleBookPage.php?idbook=' . $book[0]['IDBOOK'] . '"';?><span class="miniBookName"><?=$book[0]['BOOKNAME'];?></span></a><br>
                                        <span class="miniBookAutor"><?=$book[0]['AUTHORS'];?></span>
                                    </div>
                                </div>
                                <div class="row miniBookFooter">
                                    <div class="col-5">
                                        <div><?=$book[0]['COST'];?> ₽</div>
                                    </div> 
                                    <div class="col-7">
                                        <button class="btn btn-danger btn-sm addToCart" <?='data-id="' . $book[0]['IDBOOK'] . '"';?> type="submit">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>            
            <div class="row miniBookFlow">
                <div class="col">
                    <div class="row miniBookTitle">
                        <div class="col">
                            <h5>Популярное</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $bookPop = sortBookPopularity("DESC");
                         for($i = 0; $i != 4; $i++){ $book = getBook($bookPop[$i]['IDBOOK']);?>
                            <div class="col">
                            <div class="item">
                                <div class="row">
                                    <div class="col">
                                        <a <?='href="singleBookPage.php?idbook=' . $book[0]['IDBOOK'] . '"';?>><img class="miniBookImg" <?='src="images/book/' . $book[0]['PHOTO'] . '"';?> alt=""></a>
                                    </div>
                                </div>
                                <div class="row miniBookText">
                                    <div class="col">
                                        <a class="text-dark" <?='href="singleBookPage.php?idbook=' . $book[0]['IDBOOK'] . '"';?><span class="miniBookName"><?=$book[0]['BOOKNAME'];?></span></a><br>
                                        <span class="miniBookAutor"><?=$book[0]['AUTHORS'];?></span>
                                    </div>
                                </div>
                                <div class="row miniBookFooter">
                                    <div class="col-5">
                                        <div><?=$book[0]['COST'];?> ₽</div>
                                    </div> 
                                    <div class="col-7">
                                        <button class="btn btn-danger btn-sm addToCart" <?='data-id="' . $book[0]['IDBOOK'] . '"';?> type="submit">В корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
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