<?php

include('config.php');
include('libs/ReadFileAndReplace.php');

$fileReader = new ReadFileAndReplace('file.txt');
$readByLine = $fileReader->readByline(2);

if(is_array($readByLine))
{
    if (array_key_exists('error', $readByLine))
    {
        $errorByLine = $fileReader->checkError($readByLine['error']);
    }
}

$readBySymbols = $fileReader->readBySymbols(1,1);
if(is_array($readBySymbols)){
    if (array_key_exists('error', $readBySymbols))
    {
        $errorBySymbols = $fileReader->checkError($readByLine['error']);
    }

}

include('templates/index.php');
