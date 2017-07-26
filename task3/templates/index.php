<?php
echo 'read By Line';
echo '<br>';
echo '<br>';

if($errorByLine === null)
{
    $arrSize = sizeof($readByLine);
    for($i=0;$i<$arrSize;$i++)
    {
        echo $readByLine[$i] . '<br>';
    }
}else
{
    echo $errorByLine . '<br>';
}
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo 'read by symbols';
echo '<br>';
echo '<br>';

if($errorBySymbols === null)
{
    $arrSize = sizeof($readBySymbols);
    for($i=0;$i<$arrSize;$i++)
    {
        echo $readBySymbols[$i] . '<br>';
    }
}else
{
    echo $errorBySymbols . '<br>';
}