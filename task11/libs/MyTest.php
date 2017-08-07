<?php

include ('ActiveRecords.php');
class MyTest extends ActiveRecords
{
    public $tableField = [];
    protected $dbConnect;
    public function  __construct()
    {
        $this->connectToDb();
        $this->fieldsInTable();
    }

    public function __set($name,$value)
    {
        if(array_key_exists($name,$this->tableField))
        {
            $this->tableField[$name] = $value;
        }else
        {
            throw new Exception('No this field in table');
        }
    }

    public function save()
    {

        foreach($this->tableField as $field=>$value)
        {
            if($value != false)
            {
            $fieldsArr[] = $field;
            $valuesArr[] = $value;
            }
        }
        $sql = $this->insert('MY_TEST')->values($fieldsArr,$valuesArr)->execute();

        var_dump($sql);
    }
    
    protected function fieldsInTable()
    {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'MY_TEST'";
        mysql_select_db('user1',$this->dbConnect);
        $result = mysql_query($sql,$this->dbConnect);
        while($row = mysql_fetch_row($result))
            $fields[]= $row;
        foreach($fields as $key=>$value)
        {
            $this->tableField[$value[0]]='';
        }
var_dump($this->tableField);

    }

    public function connectToDb()
    {
//        $link = mysql_connect('localhost', 'user1', 'tuser1');
        //home connect
        $link = mysql_connect('localhost', 'root', '');
        if (!$link) {
             die(' MySql Connect Error');
         }   
       $this->dbConnect = $link;
     }
}

$c = new MyTest();
$c->key = 'user14';
$c->data = 'some data';
//$c->iddd = 100;
$c->save();