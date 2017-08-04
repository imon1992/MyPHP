<?php

include ('config.php');
include_once ('libs/Sql.php');
include_once ('libs/MySql.php');
include_once ('libs/PgSql.php');
include ('libs/errorHundlerFunction.php');

set_error_handler('myHandler', E_ALL);

$mySql = new MySql();

$insertResult = $mySql->insert('MY_TEST')->values(['key','data'],['user14','Add insert text'])->execute();

//$insertResult = $mySql->fetchAssoc($insert);
if($insertResult === false)
{
    $insertError = INSERT_ERROR;
}

$selectResult = $mySql->select(['data'])->from('MY_TEST')->where(['key'],['user14'])->execute();
//var_dump($selectResult);
//$selectResult = $mySql->fetchAssoc($select);
if($selectResult !== false)
{
    $selectResultArr = $mySql->fetchAssoc($selectResult);
}else
{
    $selectError = SELECT_ERROR;
}

$updateResult = $mySql->update('MY_TEST')->set(['data'],['new value'])->execute();
//$updateResult = $mySql->query($update);
if($updateResult === false)
{
    $updateError = UPDATE_ERROR;
}

$deleteResult = $mySql->delet()->from('MY_TEST')->where(['key'],['user14'])->execute();
//$deleteResult = $mySql->query($delete);
if($deleteResult === false)
{
    $deleteError = DELETE_ERROR;
}


$pgSql = new PgSql();

$pgInsertResult = $pgSql->insert('PG_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
//$pgInsertResult = $pgSql->pgQuery($pgInsert);
if($pgInsertResult === false)
{
    $pgInsertError = INSERT_ERROR;
}

$pgSelectResult = $pgSql->select(['data'])->from('PG_TEST')->where(['key'],['user14'])->execute();
//$pgSelectResult = $pgSql->pgQuery($pgSelect);
if($pgSelectResult !== false)
{
    $pgSelectResultArr = $pgSql->fetchAssoc($pgSelectResult);
}else
{
    $pgSelectError = SELECT_ERROR;
}

$pgUpdateResult = $pgSql->update('PG_TEST')->set(['data'],['new value'])->where(['key'],['user14'])->execute();
//$pgUpdateResult = $pgSql->pgQuery($pgUpdate);
if($pgUpdateResult === false)
{
    $pgUpdateError = UPDATE_ERROR;
}

$pgDeleteResult = $pgSql->delet()->from('PG_TEST')->where(['key'],['user14'])->execute();
//$pgDeleteResult = $pgSql->pgQuery($pgDelete);
if($pgDeleteResult === false)
{
    $pgDeleteError = DELETE_ERROR;
}

include ('templates/index.php');
