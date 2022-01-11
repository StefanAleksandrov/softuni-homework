<?php
class Article {
    private $title;
    private $content;
    private $author;
    public function __construct(string $title, string $content, string $author){
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function __toString(){
        return "{$this->title} - {$this->content}: {$this->author}";
    }
}

$articlesList = [];
$commandsCount = intval(readline());

for ($i = 0; $i < $commandsCount; $i++) { 
    $articlesList[] = new Article(...explode(', ', readline()));
}

$sortBy = readline();

usort($articlesList, function($articleA, $articleB) use($sortBy){
    switch ($sortBy) {
        case 'title': return strcmp($articleA->getTitle(), $articleB->getTitle());
        case 'content': return strcmp($articleA->getContent(), $articleB->getContent());
        case 'author': return strcmp($articleA->getAuthor(), $articleB->getAuthor());
    }
});

foreach ($articlesList as $article) {
    echo $article, PHP_EOL;
}
?>