<?php
$filePathList = explode('\\', readline());
$file = explode('.', array_pop($filePathList));

if (count($file) == 2) {
    echo "File name: {$file[0]}", PHP_EOL;
    echo "File extension: {$file[1]}", PHP_EOL;
} else {
    $extension = array_pop($file);
    $filename = implode('.', $file);
    echo "File name: {$filename}", PHP_EOL;
    echo "File extension: {$extension}", PHP_EOL;
}

?>