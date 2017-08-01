<?php


function checkDirFilePerm()
{
    if(file_exists(FULL_WAY_TO_UPLOAD_DIR))
    {
        $permission = substr(sprintf('%o', fileperms(FULL_WAY_TO_UPLOAD_DIR)), -3);
        if ($permission[0] > 4 )
        {
            return true;
        } else
        {
            if (!chmod($this->fileWayName, 0755)) {
                return ['error' => 2];
            }
            return true;
        }
    }else
    {
        if(mkdir(FULL_WAY_TO_UPLOAD_DIR, 0755,true))
        {
            return true;
        }else
        {
            return ['error'=>1];
        }

    }
}

function uploadFile()
{
    $uploadFileWay = FULL_WAY_TO_UPLOAD_DIR . '/' . basename($_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFileWay)) {
        return true;
    } else {
        return ['error'=>3];
    }
}

function checkFilesSize($fileName)
{
    $fullWayToFile = FULL_WAY_TO_UPLOAD_DIR . "/$fileName";
    if (file_exists($fullWayToFile)) {
        $fileSizeInBKbMb = filesize($fullWayToFile);
        if ($fileSizeInBKbMb > 1000) {
            $fileSizeInBKbMb = checkSize($fileSizeInBKbMb);
        } else {
            $fileSizeInBKbMb = $fileSizeInBKbMb . 'b';
        }
    }else
    {
        return ['error'=>4];
    }
    return $fileSizeInBKbMb;
}

function checkSize($byteCount)
{
    if (($byteCount / 1000) < 1000) {
        return $sizeInKb = ($byteCount / 1000) . 'kb';
    } else {
        return $sizeInMb = ($byteCount / 1000 / 1000) . 'mb';
    }
}


function deleteFile($fileName)
{
    $fullWayToFile = FULL_WAY_TO_UPLOAD_DIR . "/$fileName";
    if (file_exists($fullWayToFile)) {
        if(!unlink($fullWayToFile))
            return ['error'=>5];
        return true;
    } else {
        return ['error'=>4];
    }
}


function fileInDir()
{
    $checkResult = checkDirFilePerm();
    if($checkResult)
    {
        $filesInDir = [];
        $allFilesInDir = scandir(FULL_WAY_TO_UPLOAD_DIR);

        for ($i = 0; $i < sizeof($allFilesInDir); $i++) {
            if (!is_dir($allFilesInDir[$i])) {
                $filesInDir[$i] = $allFilesInDir[$i];
            }
        }
        if(sizeof($filesInDir) == 0)
            return false;
        return $filesInDir;
    }else
    {
        return $checkResult;
    }
}

function myHandler($level, $message, $file, $line, $context) {
    switch ($level) {
        case E_WARNING:
            $type = 'Warning';
            break;
        case E_NOTICE:
            $type = 'Notice';
            break;
        default;
            return false;
    }
    return true;
}

function errors($errorNumber){
    switch ($errorNumber) {
        case 1:
            return MK_DIR_ERROR;
        case 2:
            return PEM_ERROR;
        case 3:
            return MOVE_UPLOAD_ERROR;
        case 4:
            return FILE_EXIST_ERROR;
        case 5:
            return DELETED_ERROR;
    }
}

