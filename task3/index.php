<?php

include('config.php');
include('libs/ReadFile.php');

$fileReader = new ReadFile();
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
