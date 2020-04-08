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
        </div>
    </footer>
</body>
</html>