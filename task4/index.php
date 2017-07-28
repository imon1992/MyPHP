<?php

include_once ('libs/Sql.php');
include_once ('libs/MySql.php');
include_once ('libs/PgSql.php');
include ('config.php');



$mySql = new MySql();

$insert = $mySql->insert('user1','MY_TEST')->values(['key1','data'],['user14','Add insert text'])->execute();
$insertResult = $mySql->query($insert);
if($insertResult === false)
{
    $insertError = INSERT_ERROR;
}

$select = $mySql->select(['data'])->from('user1','MY_TEST')->where(['key1'],['user14'])->execute();
$selectResult = $mySql->query($select);
if($selectResult !== false)
{
    $selectResultArr = $mySql->fetchAssoc($selectResult);
}else
{
    $selectError = SELECT_ERROR;
}

$update = $mySql->update('user1','MY_TEST')->set(['data'],['new value'])->execute();
$updateResult = $mySql->query($update);
if($updateResult === false)
{
    $updateError = UPDATE_ERROR;
}

$delete = $mySql->delet()->from('user1','MY_TEST')->where(['key1'],['user14'])->execute();
$deleteResult = $mySql->query($delete);
if($deleteResult === false)
{
    $deleteError = DELETE_ERROR;
}

$pgSql = new PgSql();

$pgInsert = $pgSql->insert('user1','PG_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
$pgInsertResult = $pgSql->pgQuery($pgInsert);
if($pgInsertResult === false)
{
    $pgInsertError = INSERT_ERROR;
}

$pgSelect = $pgSql->select(['data'])->from('user1','PG_TEST')->where(['key'],['user14'])->execute();
$pgSelectResult = $pgSql->pgQuery($pgSelect);
if($pgSelectResult !== false)
{
    $pgSelectResultArr = $pgSql->fetchAssoc($pgSelectResult);
}else
{
    $pgSelectError = SELECT_ERROR;
}

$pgUpdate = $pgSql->update('user1','PG_TEST')->set(['data'],['new value'])->where(['key'],['user14'])->execute();
$pgUpdateResult = $pgSql->pgQuery($pgUpdate);
if($pgUpdateResult === false)
{
    $pgUpdateError = UPDATE_ERROR;
}

$pgDelete = $pgSql->delet()->from('user1','PG_TEST')->where(['key'],['user14'])->execute();
$pgDeleteResult = $pgSql->pgQuery($pgDelete);
if($pgDeleteResult === false)
{
    $pgDeleteError = DELETE_ERROR;
}

include ('templates/f.php');