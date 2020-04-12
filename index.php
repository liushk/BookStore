<!DOCTYPE html>
<html>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/blocks/head.php";
        $title = 'Главная - BookStore';
        $obj = new Head($title);
        $obj->show();
    ?>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/blocks/header.php";
    $slider = $db->getQuery("SELECT * FROM SLIDER S WHERE S.RELEVANCE = 1 ORDER BY S.CREATIONDATE;");?>
    <main role="main" class="container-fluid flex-shrink-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <?php for($i = 0; $i < count($slider); $i++){
                    if($i == 0){
                        echo "<div class='carousel-item active'>";
                    } else{ 
                        echo "<div class='carousel-item'>";
                    }?>
                    <img class="img-fluid" <?='src="images/' . $slider[$i]['PHOTO'] . '"';?> alt="">                    
                    <div class="container">
                        <div class="carousel-caption text-left">                            
                                <?php if($slider[$i]['BACKGROUNDTEXT'] == 1){
                                    echo '<div class="bannertext">';
                                } else{
                                    echo '<div>';
                                }?>                      
                                <h1><?=$slider[$i]['TITLE']?></h1>
                                <p><?=$slider[$i]['TITLE2']?></p>
                            </div>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button"><?=$slider[$i]['BTN']?></a></p>                                                      
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
</body>
</html>