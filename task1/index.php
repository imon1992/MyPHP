<?php


include_once ('config.php');
include_once ("libs/function.php");
include ("templates/index.php");

if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
	uploadFile();

}

checkFiles("style.css");
deleteFile("style.css");
