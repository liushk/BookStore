<!DOCTYPE html>
<html>
    <?php 
        require_once "blocks/head.php";
        $title = 'Доставка и оплата - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php 
        require_once "blocks/header.php";
        $obj = new Header;
        $obj->show();
    ?>
    <main class="container">
        <h4>Доставка и оплата - BookStore</h4>
    </main>
    <footer>
    </footer>
</body>
</html>