<?php
$html = readline();
$body = explode('<body', $html)[1];
$regexTitle = '/(?<=\<title\>).+(?=\<\/title>)/';
$regexContent = '/(?<=\>)[^\<,^\\\]+(?=\<)/';
$matchTitle = [];
$matchContent = [];
preg_match($regexTitle, $html, $matchTitle);
preg_match_all($regexContent, $body, $matchContent);
$content = implode(' ', $matchContent[0]);
echo "Title: {$matchTitle[0]}", PHP_EOL;
echo "Content: {$content}", PHP_EOL;
?>