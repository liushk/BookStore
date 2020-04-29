<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Заказ успешно оформлен - BookStore';
        $obj = new Head($title);
        $obj->show();
        if((isset($_GET['reg'])) && (isset($_GET['order'])) && ($_GET['reg']=='ok')){
            $orderNumber = htmlspecialchars($_GET['order']);
        }
    ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";?>
    <main class="container contentcontainer">
    <?php
    if((isset($_GET['reg'])) && (isset($_GET['order'])) && ($_GET['reg']=='ok')){?>
    <h4>Заказ №" <?=$orderNumber?> успешно оформлен!</h4>
    <p>В течение часа наш менеджер проверит комплектацию заказа и позвонит вам для подтверждения. Хорошего дня!</p>
    <?php }?>
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/footer.php";
        $obj = new Footer;
        $obj->show();
    ?>
</body>
</html>