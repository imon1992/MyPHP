<?php

include ('Sql.php');
class MySql extends Sql
{
    protected $connect
    public function connectToDb()
    {
        $link = mysql_connect('localhost', 'user1', 'tuser1');
        if (!$link) {
            die('Connect Error' . mysql_error());
         }   
       $this->connect = $link; 
     }
    
    public function query($query)
    {
        mysql_select_db('user1',$link);

       $result = mysql_query($query,$this->connect);
 
// Выполняем запрос
        return $result;
    }
}

$x = new MySql();
$x->connectToDb();

$c = $x->select(['*'])->from('MY_TEST')->execute();

//var_dump($c);
/*
echo $x->query($x->getSql(),$x->connectToDb());
var_dump($x->getSql());
*/

/*
$link = mysql_connect('localhost', 'user1', 'tuser1');
        if (!$link) {
           die('Connect Error' . mysql_error());
        }

mysql_select_db('user1',$link); 
// выполняем операции с базой данных
$result = mysql_query($c, $link) or die("Error " . mysql_error($link)); 
if($result)
{
    echo "yes";
}
*/ 
// закрываем подключение
mysql_close($link);
