<?php

include('config.php');
include('libs/ReadFileAndReplace.php');

$fileReader = new ReadFileAndReplace();
$readByLine = $fileReader->readByline('file.txt');

if (array_key_exists('error', $readByLine))
{
    $errorByLine = $fileReader->checkError($readByLine['error']);
}

$readBySymbols = $fileReader->readBySymbols('file.txt');
if (array_key_exists('error', $readBySymbols))
{
    $errorBySymbols = $fileReader->checkError($readByLine['error']);
}

include('templates/index.php');
