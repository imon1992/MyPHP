<?php

//include ('Sql.php');
class DbPdo extends Sql
{
    public $c;
    public $dbConnect;
//    public function __construct($baseToConnect,$hostToConnect,$dbName,$user,$password)
//    {
//        $baseAndHostDbName = $baseToConnect.':host='.$hostToConnect.';dbname='.$dbName;
//        $this->dbConnect =  new PDO($baseAndHostDbName, $user , $password);
//    }

//    public function bindParams()
//    {
//
//    }

    public function query($sql,$bindParamsArr = false)
    {

    }
//    public function prepareSql($sql)
//    {
//
//    }


}

//$c = new DbPdo('mysql','localhost','user1','root','');
//var_dump($c->c);
//var_dump($c->link);

//new PDO('mysql:host=localhost;dbname=user1', 'root', '');