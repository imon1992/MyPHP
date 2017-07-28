<?php
//include ('Sql.php');
class PgSql extends Sql
{
    protected $connect;

    public function __construct()
    {
        $this->connectToDb();
    }

    public function connectToDb()
    {
        //home connect
        $link =pg_connect("host=localhost dbname=user1 user=postgres");
        if (!$link) {
            die('Connect Error');
        }
        $this->connect = $link;
    }

    public function pgQuery($query)
    {
//        mysql_select_db('user1',$this->connect);

        $result = pg_query($this->connect, $query);

        return $result;
    }

    public function fetchAssoc($resource)
    {
        $i =0;
        $dataArr = [];
        while ($row = pg_fetch_assoc($resource)) {
            $row["key1"];
            $row["data"];
            $dataArr[$i]=[$row["key1"],$row["data"]];
            $i++;
        }
        return $dataArr;
    }
}

//$c = new PgSql();
//$c->connectToDb();
//$select = $c->select(['data'])->from('user1','PG_TEST')->where(['key'],['user14'])->execute();
//////var_dump($select);
////////var_dump(var_dump('SELECT `data` FROM  `user1`.`MY_TEST` WHERE key1=\'user14\''));
//////$a = 'SELECT "data" FROM  "user1"."PG_TEST"  WHERE "key"=\'user14\'';
//////
////$insert = $c->insert('user1','PG_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
////var_dump($insert);
////////$update = $c->update('user1','PG_TEST')->set(['data'],['new value'])->execute();
//////$delete = $c->delet()->from('user1','PG_TEST')->where(['key'],['user14'])->execute();
//////var_dump($delete);
//var_dump($c->pgQuery($select));
//
////SELECT `data` FROM  `user1`.`MY_TEST` WHERE key1='user14'