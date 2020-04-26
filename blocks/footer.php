<?php 
class Footer{
    
    public function show(){
        echo <<<LABEL
        <footer class="footer">
            <div class="container">
                <span>© 2020, ООО «BookStore». Все права защищены</span>
            </div>
        </footer>
        LABEL;
    }
}
?>