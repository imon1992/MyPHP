<?php


include_once('config.php');
include_once("libs/function.php");

set_error_handler('myHandler', E_ALL);


if ($_FILES['userfile']['error'] === 0)
{
    $permission = checkDirFilePerm();
    if ($permission) {
        $uploadResult = uploadFile();
        if($uploadResult !== true)
            $uploadError = errors($uploadResult['error']);
    }else
    {
        $permissionError = errors($permission['error']);
    }
}

if (!empty($_GET['del']))
{
        $deleteResult = deleteFile($_GET['del']);
        if($deleteResult !== true)
        {
            $deletedError = errors($deleteResult['error']);
        }
}

$fileInDir = fileInDir();
if($fileInDir)
{
    $countFileInDir = sizeof($fileInDir);
    $fileInDir = array_values($fileInDir);
    $fileSize = [];
    if(!array_key_exists('error',$fileSize)){
        for($i=0;$i<$countFileInDir;$i++)
        {
            $fileSize[$i] = checkFilesSize($fileInDir[$i]);
        }
    }
}


include ("templates/index.php");

