<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/book.php";
    $genre = getGenres();
    $publisher = getPublishers();
?>
<header class="container-fluid">
    <div class="navigations">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" title="BookStore" href="index.php">
                <img class="img-fluid d-inline-block align-top logo" src="images/icon/owl.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>        
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="col">
                    <form class="form-row container-nav" action="catalogPage.php" method="get">
                        <div class="col searchInp"><input name="searchInput" class="form-control form-control-sm mr-sm-2" type="text" placeholder="Введите название книги или имя автора..." aria-label="Search" required></div>
                        <div class="col searchBtn"><button class="btn btn-danger btn-sm btn-block" type="submit">Найти</button></div>
                    </form>
                </div>
                <div class="col itemMenu">
                    <ul class="navbar-nav container-nav">
                        <li class="nav-item dropdown">
                            <img class="img-fluid d-inline-block align-top icon" src="images/icon/moon.svg" alt="">
                            <a class="nav-link" href="aboutUsPage.php">О BookStore</a>
                        </li>
                        <li class="nav-item dropdown">
                            <img class="img-fluid d-inline-block align-top icon" src="images/icon/book.svg" alt="">
                            <a class="nav-link" href="catalogPage.php">Каталог</a>
                        </li>
                        <li class="nav-item dropdown">                            
                            <img class="img-fluid d-inline-block align-top icon" src="images/icon/cart.svg" alt="">
                            <a class="nav-link" href="cartPage.php"><span class="totalCountMiniCart">Корзина<span></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div>
</header>