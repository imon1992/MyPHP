<?php

include ('config.php');
include ('libs/MySearch.php');
include ('libs/function.php');

set_error_handler('myHandler', E_ALL);

$search = new MySearch();

if(!empty($_POST['searchQuery']))
{
    $searchString = $search->processingWithPost();
    $searchGetResult = $search->getPage($searchString);
    if(is_array($searchGetResult))
    {
        if(array_key_exists('error',$searchGetResult))
        {
            $searchGetError = errors($searchGetResult['error']);
        }else
        {
            $dataArr = $search->parsePage();
        }
    }

    if($searchGetError === null)
        $dataArr = $search->parsePage();

}

include ('templates/index.php');
