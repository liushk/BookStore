<!DOCTYPE html>
<html>
    <?php 
        require_once "blocks/head.php";
        $title = 'Связаться с нами - BookStore';
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
        <h4>Связаться с нами - BookStore</h4>
    </main>
    <footer>
    </footer>
</body>
</html>