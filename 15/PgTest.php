<?php

//include ('ActiveRecords.php');
class PgTest extends ActiveRecords
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
        $fieldValuesArr = $this->fieldValuesArr();
        if(sizeof($fieldValuesArr[0]) !== 0)
        {
            $sql = $this->insert('PG_TEST')->values($fieldValuesArr[0],$fieldValuesArr[1])->execute();

            $result = $this->query($sql);

            return $result;
        }else
        {
            throw new Exception('No Fields to Add');
        }
    }

    public function update()
    {
        $fieldValuesArr = $this->fieldValuesArr();
        $sql = parent::update('PG_TEST')->set($fieldValuesArr[0],$fieldValuesArr[1])->execute();


        $result = $this->query($sql);

        return $result;

    }

    public function read()
    {
        $columns = $this->getAllColumns();
        $fieldValuesArr = $this->fieldValuesArr();
        $sql= $this->select($columns)->from('PG_TEST')->where($fieldValuesArr[0],$fieldValuesArr[1])->execute();


        $result = $this->query($sql);

        $result = $this->fetchAssoc($result);

        return $result;
    }

    public function deleted()
    {
        $fieldValuesArr = $this->fieldValuesArr();
        $sql = $this->delet()->from('PG_TEST')->where($fieldValuesArr[0],$fieldValuesArr[1])->execute();


        $result = $this->query($sql);

        return $result;
    }

    private function getAllColumns()
    {
        foreach($this->tableField as $field=>$value)
        {
            $fieldsArr[] = $field;
        }

        return $fieldsArr;

    }

    private function fetchAssoc($resource)
    {
        while ($row = mysql_fetch_assoc($resource)) {
            $dataArr[]=$row;
        }
        return $dataArr;
    }

    private function fieldValuesArr()
    {
        var_dump($this->tableField);
        foreach($this->tableField as $field=>$value)
        {
            if($value != false)
            {
                $fieldsArr[] = $field;
                $valuesArr[] = $value;
                $this->tableField[$field]='';
            }
        }
        if(sizeof($fieldsArr) === 0)
        {
            throw new Exception('No find fields');
        }

        return [$fieldsArr,$valuesArr];
    }

    private function query($sql)
    {
        $result = pg_query($this->dbConnect, $sql);

        return $result;
    }


     function fieldsInTable()
    {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE information_schema.columns.table_name = 'PG_TEST'";
        $result = $this->query($sql);
        while($row = pg_fetch_row($result))
            $fields[]= $row;

        foreach($fields as $key=>$value)
        {
            $this->tableField[$value[0]]='';
        }
    }

    private function connectToDb()
    {
//        $link = pg_connect("host=localhost dbname=user1 user=user1 password=user1z");
        //home connect
        $link =pg_connect("host=localhost dbname=user1 user=postgres");
        if(!$link)
        {
            die('Connect Error');
        }
        $this->dbConnect = $link;
    }
}

//try{
//$c = new PgTest();
////var_dump($c->tableField);
//$c->key = 'user14';
//$c->data = 'some data';
////var_dump($c->read());
////$c->deleted();
////var_dump($c->tableField);
////$c->iddd = 100;
//
////$c->update();
////    $c->save();
//}catch (Exception $e){
//    echo $e->getMessage();
//}
//var_dump($c->tableField);
