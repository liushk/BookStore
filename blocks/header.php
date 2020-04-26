<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $db = new Database();
    $genre = $db->getQuery("select genre from genre");
    $publisher = $db->getQuery("select publisher from publisher"); 
?>
<header class="container-fluid">
    <div class="navigations">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" title="BookStore" href="index.php">
                <img class="img-fluid d-inline-block align-top logo" src="images/234018-halloween/png/owl.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>        
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="searchform">
                    <form class="form-row container-nav">
                        <div class="searchformInput"><input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Введите название книги или имя автора..." aria-label="Search"></div>
                        <div class="searchformBtn"><button class="btn btn-danger btn-sm btn-block" type="submit">Найти</button></div>
                    </form>
                </div>
                <div>
                    <ul class="navbar-nav container-nav">
                        <li class="nav-item dropdown">
                            <img class="img-fluid d-inline-block align-top icon" src="images/234018-halloween/png/moon.png" alt="">
                            <a class="nav-link dropdown-toggle" href="aboutUsPage.php" id="dropdownAboutUs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">О BookStore</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAboutUs">
                                <a class="dropdown-item" href="singleBookPage.php">Книга</a>
                                <a class="dropdown-item" href="catalogPage.php">Каталог</a>
                                <a class="dropdown-item" href="checkoutPage.php">Чекаут</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <img class="img-fluid d-inline-block align-top icon" src="images/2080086-shopping-mall/png/008-car.png" alt="">
                            <a class="nav-link" href="deliveryAndPaymentTermsPage.php">Получение заказа и оплата</a>
                        </li>
                        <li class="nav-item">
                            <img class="img-fluid d-inline-block align-top icon" src="images/297998-communication-and-media/png/034-mailing-1.png" alt=""> 
                            <a class="nav-link" href="contactUsPage.php">Связаться с BookStore</a>
                        </li>
                        <li class="nav-item dropdown">
                            <img class="img-fluid d-inline-block align-top icon" src="images/234018-halloween/png/spellbook.png" alt="">
                            <a class="nav-link dropdown-toggle" href="catalogPage.php" id="dropdownBooks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Книги</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                                <div class="col">
                                    <div class="row">
                                        <a class="dropdown-item" href="catalogPage.php">Жанры</a></th>
                                    </div>
                                    <?php for($i = 0; $i < count($genre); $i++){?>
                                        <div class="row"><a class="dropdown-item text-muted" href="catalogPage.php"><?=$genre[$i]['genre']?></a></div>
                                    <?php }?>
                                    <div class="row">
                                        <a class="dropdown-item" href="catalogPage.php">Издательства</a>
                                    </div>
                                    <?php for($i = 0; $i < count($publisher); $i++){?>
                                        <div class="row"><a class="dropdown-item text-muted" href="catalogPage.php"><?=$publisher[$i]['publisher']?></a></div>
                                    <?php }?>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <img class="img-fluid d-inline-block align-top icon" src="images/2080086-shopping-mall/png/007-shopping cart.png" alt=""> 
                            <a class="nav-link" href="shoppingCartPage.php">Корзина<span class="countCart">&nbsp;3</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div>
</header>