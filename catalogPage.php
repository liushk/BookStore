<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
        $title = 'Каталог - BookStore';
        $obj = new Head($title);
        $obj->show();
        $catalog = [];

        if(isset($_GET['idgenre']) && !isset($_GET['idgenre2'])){
            $genre = htmlspecialchars($_GET['idgenre']);
            if(isAvailableGenre($genre)){
                $catalog = getGenre($genre);                    
                $genrename = getGenres($genre);
                $title = 'Все книги жанра "' . $genrename[0]['GENRE']. '"';        
            }else{
                $title = "Извините, такого жанра у нас нет :(";     
            }
        }else if(isset($_GET['idgenre']) && isset($_GET['idgenre2'])){
            $genre = htmlspecialchars($_GET['idgenre']);
            $genre2 = htmlspecialchars($_GET['idgenre2']);
            if(isAvailableGenre2($genre, $genre2)){
                $catalog = getGenre2($genre2);
                $genrename = getGenres($genre);                   
                $genre2name = getGenres2($genre2);
                $title = 'Все книги жанра "' . $genrename[0]['GENRE']. '" поджанра "' . $genre2name[0]['GENRE2']. '"';        
            }else{
                $title = "Извините, такого поджанра здесь нет :(";     
            }
        }else if(isset($_GET['idpublisher'])){
            $publisher = htmlspecialchars($_GET['idpublisher']);
            if(isAvailablePublisher($publisher)){
                $catalog = getPublisher($publisher);                    
                $publishername = getPublishers($publisher);
                $title = 'Все книги издательства "' . $publishername[0]['PUBLISHER'] . '"';
            }else{
                $title = "Извините, такого издательства у нас нет :(";     
            }
        }else if(isset($_GET['searchInput'])){
            $search = urldecode(htmlspecialchars($_GET["searchInput"]));
            $catalog = getSearch($search);
            if(count($catalog) > 0){
                $title = "По вашему запросу '" . $search . "' найдены следующие товары";
            }else{
                $title = "К сожалению, по вашему запросу '" . $search . "' ничего не найдено :(";
            }            
        }else{
            $catalog = getCatalog();
            $title = "Каталог BookStore";
        }
    ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
        <div class="contentcontainerCatalog">
            <div class="row">
                <div class="col">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Тут будут сортировочки</p>
                </div>
            </div>
            <div class="row rowCatalog">
            <?php 
                for($i = 0; $i < count($catalog); $i++){
                $book = getBookInfo((int)$catalog[$i]['IDBOOK']);?>
                <div class="col-3">
                    <div class="item">
                        <div class="row">
                            <div class="col">
                                <a <?='href="singleBookPage.php?idbook=' . $book[0]['IDBOOK'] . '"';?>><img class="miniBookImg" <?='src="images/book/' . $book[0]['PHOTO'] . '"';?> alt=""></a>
                            </div>
                        </div>
                        <div class="row miniBookText">
                            <div class="col">
                                <span class="miniBookName"><?=$book[0]['BOOK'];?></span><br>
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
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
        $obj = new Footer;
        $obj->show();
    ?>
</body>
</html>