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
        $link = pg_connect("host=localhost dbname=user1 user=user1 password=user1z");
        //home connect
//        $link =pg_connect("host=localhost dbname=user1 user=postgres");
        if(!$link)
         {
            die('Connect Error');
//        try{
//        }catch (Exception $e){
//            echo $e->getMessage();
//        }
        //home connect
//        $link =pg_connect("host=localhost dbname=user1 user=postgres");
//            $link =pg_connect("host=localhost dbname=user1 user=user1 password=user1z");
//        if (!$link) {
//            die('PG Connect Error');
        }
        $this->connect = $link;
    }

    public function pgQuery($query)
    {

        $result = pg_query($this->connect, $query);

        return $result;
    }

    public function fetchAssoc($resource)
    {
        $i =0;
        $dataArr = [];
        while ($row = pg_fetch_assoc($resource)) {
            $row["key"];
            $row["data"];
            $dataArr[$i]=[$row["key"],$row["data"]];
            $i++;
        }
        return $dataArr;
    }
}

