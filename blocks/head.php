<?php 
class Head{
    private $title;

    public function __construct($title){
        $this->title = $title;
    }

    public function show(){
        echo <<<LABEL
            <title>{$this->title}</title>
            <meta charset="utf-8">
            <link rel="icon" type="image/ico" href="images/fav.ico">
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>             
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script
            src="https://code.jquery.com/jquery-3.5.0.js"
            integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
            crossorigin="anonymous"></script>
            <script src="js/cart.js" rel="stylesheet"></script>
            <script src="js/main.js" rel="stylesheet"></script>            
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="css/style.css" media="all" type="text/css" rel="stylesheet"/>
        LABEL;
    }
}
?>