<?php
function checkFiles($fileName){
	$fullWayToFile = FULLWAY . "/uploadFiles/$fileName";
	if(file_exists($fullWayToFile)){
		$sizeFile = filesize($fullWayToFile);
		if($sizeFile > 1000){
			$fileSizeInBKbMb = checkSize($sizeFile);
		}else{
			$fileSizeInBKbMb = $sizeFile . 'b';
		}	
	}	
	echo $fileSizeInBKbMb;
}

function checkSize($byteCount){
	if(($byteCount/1000) < 1000){
		return $sizeInKb = ($byteCount/1000) . 'kb';	
	}else{
		return $sizeInMb = ($byteCount/1000/1000) . 'mb';
	}
}

function uploadFile(){
// uploaddir - FULLWAY
	$uploaddir ="/usr/home/user14/public_html/MyPHP/task1/uploadFiles";
	$uploadfile = $uploaddir . '/' . basename($_FILES['userfile']['name']);
	if (move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile )) {
		$result = true; 
	} else {
		$result = false;	
	}
	return $result;
}	

function deleteFile($fileName){
	$fullWayToFile = FULLWAY . "/uploadFiles/$fileName";
	unlink($fullWayToFile);
	echo "1111";
}




