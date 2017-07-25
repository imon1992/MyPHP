<?php


include_once('config.php');
include_once("libs/function.php");
include("templates/index.php");



if(sizeof(fileInDir())>0 && $_FILES['userfile']['error']===null && empty($_GET['del'])){
    drawTable();
}

if ($_FILES['userfile']['error'] == 0) {
    $uploadResult = uploadFile();

    if ($uploadResult == true) {
        echo DAWNLOADSUCCES;
        drawTable();
    }
} else {
    echo ERRORDAWNLOAD;
    drawTable();
}

if (!empty($_GET['del'])) {
    if (deleteFile($_GET['del'])) {
        echo DELETEDSUCCES;
        drawTable();
    }else{
        echo ERRORDELETED;
        drawTable();
    }

}

