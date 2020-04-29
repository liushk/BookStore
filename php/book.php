<?php
class Book{
    private $id;
    public $isbn;
    public $name;
    public $genre;
    public $genre2;
    public $publisher;
    public $weight;
    public $year;
    public $page;
    public $annotation;
    public $agelimit;
    public $cost;
    public $popularity;
    public $availability;
    public $photo;
    public $authors;

    public function getId(){
		return $this->id;
	}

    public function setFieldName($field, $value){
		if($field != 'id'){
			$this->$field = $value;
		} else{
			echo "Ошибка! Нельзя изменить ID книги.";
		}
	}

    public function getBookInfo(int $idbook){
        require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
        $db = new Database();
        $info = $db->getQuery("SELECT B.ISBN, B.BOOK, G.GENRE, B.AVAILABILITY, 
        G2.GENRE2, P.PUBLISHER, B.WEIGHT, B.IMPRINTYEAR, B.PAGE, A.NAME AUTHORS,
        B.ANNOTATION, B.AGELIMIT, B.COST, B.POPULARITY, B.PHOTO
        FROM BOOK B, GENRE G, GENRE2 G2, PUBLISHER P, AUTHOR A, BOOKAUTHOR BA
        WHERE B.IDBOOK = " . $idbook ." AND G.IDGENRE = G2.IDGENRE 
        AND G2.IDGENRE2 = B.IDGENRE2 AND P.IDPUBLISHER = B.IDPUBLISHER
        AND A.IDAUTHOR = BA.IDAUTHOR AND B.IDBOOK = BA.IDBOOK");
        $i = 0;
        if (count($info) <> 0){
            $this->id = (integer)$idbook;
            $this->isbn = $info[$i]['ISBN'];
            $this->name = $info[$i]['BOOK'];
            $this->genre = $info[$i]['GENRE'];
            $this->genre2 = $info[$i]['GENRE2'];
            $this->publisher = $info[$i]['PUBLISHER'];
            $this->weight = (double)$info[$i]['WEIGHT'];
            $this->year = (integer)$info[$i]['IMPRINTYEAR'];
            $this->page = (integer)$info[$i]['PAGE'];
            $this->annotation = $info[$i]['ANNOTATION'];
            $this->agelimit = $info[$i]['AGELIMIT'];
            $this->cost = (double)$info[$i]['COST'];
            $this->popularity = (integer)$info[$i]['POPULARITY'];
            $this->availability = (boolean)$info[$i]['AVAILABILITY'];
            $this->photo = $info[$i]['PHOTO'];
            $this->authors = $info[$i]['AUTHORS'];
        }
        else echo "Ошибка! Книги с таким ID не существует.";        
    }    
}

  