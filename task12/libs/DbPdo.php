<?php

//include ('Sql.php');
class DbPdo extends Sql
{
    protected $testPdo;
//    protected $dbConnect;
    public function __construct($baseToConnect,$hostToConnect,$dbName,$user,$password)
    {
        $baseAndHostDbName = $baseToConnect.':host='.$hostToConnect.'; dbname='.$dbName;
//var_dump($baseAndHostDbName);
       // $this->dbConnect 
        $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->testPdo =  new PDO($baseAndHostDbName, $user , $password, $opt);
    
    //var_dump($this->c->query('select * from MY_TEST')->execute());
    $this->bindParams();
//var_dump($this->c); 
//$this->c = $c; 
//$this->bindParams();
    }

    public function bindParams()
    {
        
       var_dump($this->testPdo); 
    }

    public function query($sql=false,$bindParamsArr = false)
    {
var_dump($this->cccc);
        if($sql == false)
            
            $stmt = $this->cccc->prepare($sql);
//var_dump($stmt);
            $paramsCount = sizeof($bindParamsArr);
            foreach($bindParamsArr as $paramName=>$paramValue)
            {
               $stmt->bindParam($paramName,$paramValue);
            }
//            var_dump($stmt);
            /*for($i=0;$i<$paramsCount;$i++)
            {
                
            }*/
        
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
