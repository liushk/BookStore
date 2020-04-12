<!DOCTYPE html>
<html>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Корзина - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container">
        <h4>Корзина - BookStore</h4>
    </main>
    <footer>
    </footer>
</body>
</html>