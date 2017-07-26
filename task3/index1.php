<?php

include('config.php');
include('libs/ReadFileAndReplace.php');

$replacer = new ReadFileAndReplace();

$replaceString = $replacer->replaceString('file.txt',2,'tu');
if($replaceString !== true)
{
    if (array_key_exists('error', $replaceString))
    {
        $errorReplaceString = $fileReader->checkError($replaceString['error']);
    }
}

$replaceSymbol = $replacer->replaceSymbols('file.txt',3,'a');
if($replaceSymbol !==true)
{
    if (array_key_exists('error', $replaceSymbol))
    {
        $errorReplaceSymbol = $fileReader->checkError($replaceSymbol['error']);
    }
}

include('templates/index1.php');

