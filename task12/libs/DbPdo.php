<?php

//include ('Sql.php');
class DbPdo extends Sql
{
    protected $testPdo;
    protected $dbConnect;
    protected $sql;
    private $baseToConnect;
    protected $stmt;
    public function __construct($baseToConnect,$hostToConnect,$dbName,$user,$password)
    {
        $baseAndHostDbName = $baseToConnect.':host='.$hostToConnect.'; dbname='.$dbName;

        $this->baseToConnect = $baseToConnect;

        try {
            $this->dbConnect =  new PDO($baseAndHostDbName, $user , $password);
            $this->dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connect error: ';
        }

        $this->screeningBrackets();

    }

    private function screeningBrackets()
    {
        $baseBrackets =['mysql'=>'`',
                        'pgsql'=>'"'];
        $this->screeningBrackets = $baseBrackets[$this->baseToConnect];
    }

    public function execute($bindParamsArr = false)
    {

        $dbCon = $this->dbConnect;
        $sql = parent::execute();
//var_dump($sql);
        if($this->dbConnect !== null){

            $stmt = $dbCon->prepare($sql);

            if($bindParamsArr == false)
            {
                $result = $stmt->execute();
            }else
            {
                if(is_array($bindParamsArr[0]))
                {
                    foreach($bindParamsArr as $value)
                    {
                        foreach($value as $paramName=>&$paramValue)
                        {
                            $stmt->bindParam($paramName,$paramValue);
                            $result = $stmt->execute();
                        }
                    }

                }else
                {
                    foreach($bindParamsArr as $paramName=>&$paramValue)
                    {
                        $stmt->bindParam($paramName,$paramValue);
                    }
                $result = $stmt->execute();
                }
            }
            $this->stmt = $stmt;

            if($result == false)
                $result =['error'=>0];
            return $result;
        }else{
            return ['error'=>1];
        }

    }

    public function fetchAssoc()
    {
        while($assocRow = $this->stmt->fetch(PDO::FETCH_ASSOC))
        {
            $result[]=$assocRow;
        }

        return $result;
    }

}

//$c = new DbPdo('mysql','localhost','user1','root','');
//var_dump($c->c);
//var_dump($c->link);

//new PDO('mysql:host=localhost;dbname=user1', 'root', '');
