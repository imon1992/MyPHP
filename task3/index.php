<?php

include('config.php');
include('libs/ReadFileAndReplace.php');

include ('libs/errorHundlerFunction.php');

set_error_handler('myHandler', E_ALL);

$fileReader = new ReadFileAndReplace('file.txt');

for($i=0; ;$i++)
{
    $readByLineResult = $fileReader->readByline($i);
    if ($readByLineResult === 'The lines ran out')
        break 1;
    $readByLine[] = $readByLineResult;

}

if(is_array($readByLine))
{
    if (array_key_exists('error', $readByLine))
    {
        $errorByLine = $fileReader->checkError($readByLine['error']);
    }
}

for($i=0; ;$i++)
{
    for($j=0; ;$j++) {
        $readBySymbolsResult = $fileReader->readBySymbols($i, $j);
        if ($readBySymbolsResult === 'The lines ran out')
            break 2;
        if ($readBySymbolsResult === 'The symbols ran out')
            break 1;
        $readBySymbols[$i] .= $readBySymbolsResult;
    }
}

if(is_array($readBySymbols)){
    if (array_key_exists('error', $readBySymbols))
    {
        $errorBySymbols = $fileReader->checkError($readByLine['error']);
    }

}

include('templates/index.php');
