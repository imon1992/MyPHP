<?php

include ('libs/Sql.php');
include ('libs/DbPdo.php');
include ('libs/function.php');
include ('config.php');

set_error_handler('myHandler', E_ALL);

$mySql = new DbPdo('mysql','localhost','user1','user1','tuser1');
//$mySql = new DbPdo('mysql','localhost','user1','root','');

$insertResult = $mySql->insert('MY_TEST')->values(['key','data'],[':key',':data'])->
                execute([':key'=>'user14',':data'=>'data for user14']);
if(is_array($insertResult))
{
    if(array_key_exists('error',$insertResult))
        $insertError = errors($insertResult['error']);
}

$selectResult = $mySql->select(['data'])->from('MY_TEST')->where(['key'],[':key'])->execute(
                        [':key'=>'user14']);

if(is_array($selectResult))
{
    if(array_key_exists('error',$selectResult))
        $selectError = errors($selectResult['error']);
}

$updateResult = $mySql->update('MY_TEST')->set(['data'],[':data'])->execute([':data'=>'new value']);

if(is_array($updateResult))
{
    if(array_key_exists('error',$updateResult))
        $updateError = errors($updateResult['error']);
}

$deleteResult = $mySql->delet()->from('MY_TEST')->where(['key'],[':key'])->execute([':key'=>'user14']);

if(is_array($deleteResult))
{
    if(array_key_exists('error',$deleteResult))
        $deleteError = errors($deleteResult['error']);
}


$pgSql = new DbPdo('pgsql','localhost','user1','user1','user1z');

$pgInsert = $pgSql->insert('PG_TEST')->values(['key','data'],[':key',':data'])->
            execute([':key'=>'user14',':data'=>'data for user14']);

if(is_array($pgInsert))
{
    if(array_key_exists('error',$pgInsert))
        $pgInsertError = errors($pgInsert['error']);
}

$pgSelectResult = $pgSql->select(['data'])->from('PG_TEST')->where(['key'],[':key'])->execute(
                        [':key'=>'user14']);

if(is_array($pgSelectResult))
{
    if(array_key_exists('error',$pgSelectResult))
        $pgSelectError = errors($pgSelectResult['error']);
}


include ('templates/index.php');
