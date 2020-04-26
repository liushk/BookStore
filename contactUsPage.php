<!DOCTYPE html>
<html>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Связаться с нами - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <div class="wrapper">
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
        <main class="container">
            <h4>Связаться с нами - BookStore</h4>
        </main>
        <?php 
            include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
            $obj = new Footer;
            $obj->show();
        ?>
    </div>
</body>
</html>