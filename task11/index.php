<?php

include ('config.php');
include ('libs/ActiveRecords.php');
include ('libs/MyTest.php');
//include ('libs/PgTest.php');

try{

    $myTest = new MyTest();
    $myTest->key = 'user14';

    $saveResult = $myTest->save();
    if($saveResult != true)
    {
        $saveError = SAVE_ERROR;
    }

    $myTest->key = 'user14';
    $updateResult = $myTest->update();
    if($updateResult != true)
    {
        $updateError = UPDATE_ERROR;
    }

    $myTest->key = 'user14';
    $readResult = $myTest->read();
    if($readResult != true)
    {
        $readError = READ_ERROR;
    }

    $myTest->key = 'user14';
    $deleteResult = $myTest->deleted();
    if($deleteResult != true)
    {
        $deleteError = DELETE_ERROR;
    }

//    $pgTest = new PgTest();
//    $pgTest->key = 'user14';
//
//    $pgSaveResult = $myTest->save();
//    if($pgSaveResult != true)
//    {
//        $pgSaveError = SAVE_ERROR;
//    }
//
//    $pgTest->key = 'user14';
//    $pgUpdateResult = $myTest->update();
//    if($pgUpdateResult != true)
//    {
//        $pgUpdateError = UPDATE_ERROR;
//    }
//
//    $pgTest->key = 'user14';
//    $pgReadResult = $myTest->read();
//    if($pgReadResult != true)
//    {
//        $pgReadError = READ_ERROR;
//    }
//
//    $pgTest->key = 'user14';
//    $pgDeleteResult = $myTest->deleted();
//    if($pgDeleteResult != true)
//    {
//        $pgDeleteError = DELETE_ERROR;
//    }
}catch (Exception $e){
    $globalError = $e->getMessage();
}

include ('templates/index.php');