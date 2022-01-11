<?php
class Book {
    private $title;
    private $author;
    private $publisher;
    private $releaseDate;
    private $isbn;
    private $price;
    public function __construct(string $title, string $author, string $publisher, string $releaseDate, string $isbn, string $price){
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->releaseDate = $releaseDate;
        $this->isbn = $isbn;
        $this->price = floatval($price);
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getPrice(){
        return $this->price;
    }
}
class Library {
    private $name;
    private $booksList;
    public function __construct(string $name){
        $this->name = $name;
        $this->booksList= [];
    }
    public function addBook(Book $book){
        $this->booksList[] = $book;
    }
    public function printBooks(){
        $result = [];

        foreach ($this->booksList as $book) {
            if (!isset($result[$book->getAuthor()])) $result[$book->getAuthor()] = 0;
            $result[$book->getAuthor()] += $book->getPrice();
        }

        uksort($result, function($keyA, $keyB) use($result){
            $priceDifference = $result[$keyB] - $result[$keyA];
            if ($priceDifference == 0) return strcmp($keyA, $keyB);
            else return $priceDifference < 0 ? -1 : 1;
        });

        foreach ($result as $key => $value) {
            echo $key.' -> '.number_format($value, 2, '.', ''), PHP_EOL;
        }
    }
}

$booksCount = intval(readline());
$library = new Library('My Library');

for ($i = 0; $i < $booksCount; $i++) { 
    $book = new Book (...explode(' ', readline()));
    $library->addBook($book);
}

$library->printBooks();
?>