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
    public function editContent(string $newContent){
        $this->content = $newContent;
    }
    public function changeAuthor(string $newAuthor){
        $this->author = $newAuthor;
    }
    public function rename(string $newTitle){
        $this->title = $newTitle;
    }
    public function __toString(){
        return "{$this->title} - {$this->content}: {$this->author}";
    }
}

$article = new Article(...explode(', ', readline()));
$commandsCount = intval(readline());

for ($i = 0; $i < $commandsCount; $i++) { 
    $command = explode(': ', readline());

    switch($command[0]){
        case 'Edit': $article->editContent($command[1]); break;
        case 'ChangeAuthor': $article->changeAuthor($command[1]); break;
        case 'Rename': $article->rename($command[1]); break;
    }
}

echo $article;
?>