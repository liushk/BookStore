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
        $errtitle = "";

        if(isset($_GET['idgenre']) && !isset($_GET['idgenre2'])){
            $genre = htmlspecialchars($_GET['idgenre']);
            $catalog = getBookGenre($genre);
            if(count($catalog) > 0){                 
                $genrename = getGenres($genre);
                $catalogtitle = 'Все книги жанра "' . $genrename[0]['GENRE']. '"';        
            }else{
                $errtitle = "Извините, книг такого жанра у нас нет :(";     
            }
        }else if(isset($_GET['idgenre']) && isset($_GET['idgenre2'])){
            $genre = htmlspecialchars($_GET['idgenre']);
            $genre2 = htmlspecialchars($_GET['idgenre2']);
            $catalog = getBookGenre2($genre2, $genre);
            if(count($catalog) > 0){
                $genrename = getGenres($genre);                   
                $genre2name = getGenres2($genre, $genre2);
                $catalogtitle = 'Все книги жанра "' . $genrename[0]['GENRE']. '" поджанра "' . $genre2name[0]['GENRE2']. '"';        
            }else{
                $errtitle = "Извините, книг такого поджанра здесь нет :(";     
            }
        }else if(isset($_GET['idpublisher'])){
            $publisher = htmlspecialchars($_GET['idpublisher']);
            $catalog = getBookPublisher($publisher);
            if(count($catalog) > 0){                 
                $publishername = getPublishers($publisher);
                $catalogtitle = 'Все книги издательства "' . $publishername[0]['PUBLISHER'] . '"';
            }else{
                $errtitle = "Извините, книг такого издательства у нас нет :(";     
            }
        }else if(isset($_GET['searchInput'])){
            $search = urldecode(htmlspecialchars($_GET["searchInput"]));
            $catalog = getSearch($search);
            if(count($catalog) > 0){
                $catalogtitle = "По вашему запросу '" . $search . "' найдены следующие товары";
            }else{
                $errtitle = "К сожалению, по вашему запросу '" . $search . "' ничего не найдено :(";
            }            
        }else{
            $catalog = getBook();
            $catalogtitle = "Каталог BookStore";
        }
    ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="contentcontainer">
        <div class="contentcontainerCatalog">
            <div class="row sortCatalog">
                <div class="container"><h4><?=$errtitle?></h4></div>
                <?php if(count($catalog) > 0){?>  
                <div class="col-3">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <a class="dropdown-item" href="catalogPage.php">ЖАНРЫ</a></th>
                            </div>
                            <?php for($i = 0; $i < count($genre); $i++){
                                $genre2 = getGenres2($genre[$i]['IDGENRE']);?>                                
                                <div class="row"><a <?='href="catalogPage.php?idgenre=' . $genre[$i]['IDGENRE']  . '"';?> class="dropdown-item"><?=$genre[$i]['GENRE']?></a></div>
                                <?php for($j = 0; $j < count($genre2); $j++){?>
                                    <div class="row"><a <?='href="catalogPage.php?idgenre=' . $genre[$i]['IDGENRE'] . '&idgenre2=' . $genre2[$j]['IDGENRE2'] .'"';?> class="genre2 dropdown-item text-muted"><?=$genre2[$j]['GENRE2']?></a></div>
                                <?php }
                            }?>
                            <div class="row">
                                <a class="dropdown-item" href="catalogPage.php">ИЗДАТЕЛЬСТВА</a>
                            </div>
                            <?php for($i = 0; $i < count($publisher); $i++){?>
                                <div class="row"><a <?='href="catalogPage.php?idpublisher=' . $publisher[$i]['IDPUBLISHER']  . '"';?> class="dropdown-item text-muted" href="catalogPage.php"><?=$publisher[$i]['PUBLISHER']?></a></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row sortTitle">
                        <div class="col">
                            <h4><?=$catalogtitle?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col sortTitle">
                            <span class="sort">Всего найдено: <?=count($catalog) . ' '?> шт.</span><span class="sortType"></span>
                        </div>
                    </div>
                    <div class="row sortRow">
                        <div class="col"><button onclick="costASCsort()" id="costASC" class="btn btn-light btn-sm btn-block"><span>Цена</span><img class="catalogIcon" src="images/icon/up.svg" alt=""></button></div>
                        <div class="col"><button onclick="costDESCsort()" id="costDESC" class="btn btn-light btn-sm btn-block"><span>Цена</span><img class="catalogIcon" src="images/icon/down.svg" alt=""></button></div>
                        <div class="col"><button onclick="yearASCsort()" id="yearASC" class="btn btn-light btn-sm btn-block"><span>Год издания</span><img class="catalogIcon" src="images/icon/up.svg" alt=""></button></div>
                        <div class="col"><button onclick="yearDESCsort()"id="yearDESC" class="btn btn-light btn-sm btn-block"><span>Год издания</span><img class="catalogIcon" src="images/icon/down.svg" alt=""></button></div>
                        <div class="col"><button onclick="popularityASCsort()" id="popularityASC" class="btn btn-light btn-sm btn-block"><span>Популярность</span><img class="catalogIcon" src="images/icon/up.svg" alt=""></button></div>
                        <div class="col"><button onclick="popularityDESCsort()" id="popularityDESC" class="btn btn-light btn-sm btn-block"><span>Популярность</span><img class="catalogIcon" src="images/icon/down.svg" alt=""></button></div>
                    </div>
                    <div class="row" id="sortRow">
                    <?php 
                        for($i = 0; $i < count($catalog); $i++){
                        $book = getBook((int)$catalog[$i]['IDBOOK']);?>
                        <div class="col-3 sortCol"  <?='data-cost="' . $book[0]['COST'] . '" data-year="' . $book[0]['IMPRINTYEAR'] . '" data-popularity="' . $book[0]['POPULARITY'] . '"';?>>
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
                                        <?php if($book[0]['AVAILABILITY'] == '1'){?>
                                            <button class="btn btn-danger btn-sm addToCart" <?='data-id="' . $book[0]['IDBOOK'] . '"';?> type="submit">В корзину</button>
                                            <?php } else{?>
                                                <button class="btn btn-danger btn-sm" disabled>В корзину</button>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>            
            
            <?php }?>
        </div>
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";        
        $obj = new Footer;
        $obj->show();
    ?>
    <script src="js/sort.js" rel="stylesheet"></script>
</body>
</html>