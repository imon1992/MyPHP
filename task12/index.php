<?php

include ('libs/Sql.php');
include ('libs/DbPdo.php');

$sql = new DbPdo('mysql','localhost','user1','user1','tuser1');
//$select = $sql->select(['key','data'])->from('MY_TEST')->where(['data','key'],[':data',':key'])->groupBy(['key','data'])->limit('1')->execute();
//$sql->query($select,[':data'=>'parametr data',':key'=>'params key']);
$sql->bindParams();

//$innerJoin = $sql->select(['key','data'])->from('MY_TEST')->innerJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
//    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
//$having = $sql->select(['key','data'])->from('MY_TEST')->having(['AVG','MAX'],['key','data'],['>','='],[10,20])->execute();
//$leftJoin = $sql->select(['key','data'])->from('MY_TEST')->leftJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
//    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
//$rightJoin = $sql->select(['key','data'])->from('MY_TEST')->rightJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
//    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
//$crossJoin = $sql->select(['key','data'])->from('MY_TEST')->crossJoin(['table1','table2'])->execute();
//$naturalJoin = $sql->select(['key','data'])->from('MY_TEST')->naturalJoin(['table1','table2'])->execute();
//$selectDistinct = $sql->selectDistinct(['key','data'])->from('MY_TEST')->where(['data','key'],[10,11])->groupBy(['key','data'])->limit('1')->execute();
//$insert = $sql->insert('MY_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
//$update = $sql->update('MY_TEST')->set(['data'],['new value'])->execute();
//$deleted = $sql->delet()->from('MY_TEST')->where(['key'],['user14'])->execute();
//
//var_dump($select,$innerJoin,$having,$leftJoin,$rightJoin,$crossJoin,$naturalJoin,$selectDistinct,$insert,$update,$deleted);
//var_dump($select);
//var_dump('' ==false);

//if('' == false)
  //  echo 11111111;
