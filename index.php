<?php require_once __DIR__.'/php/db.php';?>
<!DOCTYPE html>
<html>
    <?php 
        require_once "blocks/head.php";
        $title = 'Главная - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php 
        require_once "blocks/header.php";
        $obj = new Header;
        $obj->show();
    ?>
    <main role="main" class="container flex-shrink-0">
        <h4>Главная - BookStore</h4>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
            <?php
                //попытка соединиться с БД
                $db = new Database();
                $result = $db->getQuery("select * from genre");
                var_dump($result);
            ?>
        </div>
    </footer>
</body>
</html>