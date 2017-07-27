<?php

include_once ('libs/Sql.php');
include_once ('libs/MySql.php');
include_once ('libs/PgSql.php');
include ('config.php');



$mySql = new MySql();
$mySql->connectToDb();

$insert = $mySql->insert('user1','MY_TEST')->values(['key1','data'],['user14','Add insert text'])->execute();
$insertResult = $mySql->query($insert);
if($insertResult === false)
{
    $insertError = INSERT_ERROR;
}

//$select = $mySql->select(['data'])->from('user1','MY_TEST')->where(['key1'],['user14'])->execute();
//$selectResult = $mySql->query($select);
//if($selectResult !== false)
//{
//    $selectResultArr = $mySql->fetchAssoc($selectResult);
//}else
//{
//    $selectError = SELECT_ERROR;
//}

//$update = $mySql->update('user1','MY_TEST')->set(['data'],['new value'])->execute();
//$updateResult = $mySql->query($update);
//if($updateResult === false)
//{
//    $updateError = UPDATE_ERROR;
//}
//
//$delete = $mySql->delet()->from('user1','MY_TEST')->where(['key1'],['user14'])->execute();
//$deleteResult = $mySql->query($delete);
//if($deleteResult === false)
//{
//    $deleteError = DELETE_ERROR;
//}

$pgSql = new PgSql();
$pgSql->connectToDb();

//$insert = $pgSql->insert('user1','PG_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
//$insertResult = $pgSql->pgQuery($insert);
//if($insertResult === false)
//{
//    $insertError = INSERT_ERROR;
//}

$select = $pgSql->select(['data'])->from('user1','PG_TEST')->where(['key'],['user14'])->execute();
//var_dump($select);
$selectResult = $pgSql->pgQuery($select);
//var_dump($selectResult);
if($selectResult !== false)
{
    $selectResultArr = $pgSql->fetchAssoc($selectResult);
}else
{
    $selectError = SELECT_ERROR;
}
//var_dump($selectResultArr);
//var_dump($selectResultArr);
//$update = $pgSql->update('user1','MY_TEST')->set(['data'],['new value'])->execute();
//$updateResult = $pgSql->pgQuery($update);
//if($updateResult === false)
//{
//    $updateError = UPDATE_ERROR;
//}
//
//$delete = $pgSql->delet()->from('user1','MY_TEST')->where(['key1'],['user14'])->execute();
//$deleteResult = $pgSql->pgQuery($delete);
//if($deleteResult === false)
//{
//    $deleteError = DELETE_ERROR;
//}

include ('templates/index.php');
//var_dump($insertResult);
//$v = $mySql->delet()->from('t1')->where(['a'],['1'])->execute();
//$c = $mySql->select(['*'])->from('MY_TEST')->execute();
//$u = $mySql->update('t1')->set(['a','b'],[1,2])->execute();
//$i = $mySql->insert('t1')->values(['a','c'],['10','20'])->execute();
////$row = mysql_fetch_assoc($mySql->query($c));
//$result = $mySql->query($c);