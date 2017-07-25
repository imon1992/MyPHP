<?php

function uploadFile()
{
// uploaddir - FULLWAY
    $uploadDir = FULLWAY . "/uploadFiles";
    $uploadFileWay = $uploadDir . '/' . basename($_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFileWay)) {
        return true;
    } else {
        return false;
    }
}

function checkFilesSize($fileName)
{
    $fullWayToFile = FULLWAY . "/uploadFiles/$fileName";
    if (file_exists($fullWayToFile)) {
        $fileSizeInBKbMb = filesize($fullWayToFile);
        if ($fileSizeInBKbMb > 1000) {
            $fileSizeInBKbMb = checkSize($fileSizeInBKbMb);
        } else {
            $fileSizeInBKbMb = $fileSizeInBKbMb . 'b';
        }
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
    $fullWayToFile = FULLWAY . "/uploadFiles/$fileName";
    if (file_exists($fullWayToFile)) {
        unlink($fullWayToFile);
        return true;
    } else {
        return false;
    }
}


function fileInDir()
{
    $filesInDir = [];
    $fullWayToDir = FULLWAY . "/uploadFiles";
    $allFilesInDir = scandir($fullWayToDir);

    for ($i = 0; $i < sizeof($allFilesInDir); $i++) {
        if (!is_dir($allFilesInDir[$i])) {
            $filesInDir[$i] = $allFilesInDir[$i];
        }
    }
    return $filesInDir;
}

function drawTable()
{
    $filesInDir = fileInDir();
    if (empty($filesInDir)) {
        return false;
    }
    $tableHeader = '  <table border="1">
                        <caption>User Files</caption>
                       <tr>
                        <th>№</th>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Action</th>
                       </tr>';
    echo $tableHeader;
    $f = 0;
    $filesInDir = array_values($filesInDir);
    for ($i = 1; $i <= sizeof($filesInDir); $i++) {
        $fileSize = checkFilesSize($filesInDir[$f]);
        echo '<tr>';
        echo "<td> $i </td>" . "<td> $filesInDir[$f] </td>" . "<td> $fileSize </td>" . "<td><a href='index.php?del=$filesInDir[$f]'.>delete</a></td>";
        $f++;
    }
}
