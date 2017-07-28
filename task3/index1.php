<?php

include('config.php');
include('libs/ReadFileAndReplace.php');

$replacer = new ReadFileAndReplace('file.txt');

$replaceString = $replacer->replaceString(1,'tu');
if($replaceString !== true)
{
    if (array_key_exists('error', $replaceString))
    {
        $errorReplaceString = $replacer->checkError($replaceString['error']);
    }
}

$replaceSymbol = $replacer->replaceSymbols(2,'a');
if($replaceSymbol !==true)
{
    if (array_key_exists('error', $replaceSymbol))
    {
        $errorReplaceSymbol = $replacer->checkError($replaceSymbol['error']);
    }
}

include('templates/index1.php');
4
