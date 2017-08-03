<?php

class Sql
{
    protected $sqlOrder = [];
    protected $select;
    protected $from;
    protected $where;
    protected $delet;
    protected $update;
    protected $set;
    protected $insert;
    protected $values;
    protected $selectDistinct;
    protected $innerJoin;
    protected $leftJoin;
    protected $rightJoin;
    protected $crossJoin;
    protected $naturalJoin;
    protected $groupBy;
    protected $having;
    protected $orderBy;
    protected $limit;

    public function select($columns)
    {
        $columnsCount = sizeof($columns);
        $select = "SELECT ";

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $select .=  $columns[$i] ;
            }else
            {
                $select .= $columns[$i]  . ',';
            }
        }

        $this->select= $select;
        if(array_search('*',$columns) !== false)
            $this->select= null;
        $this->sqlOrder[] = 'select';

        return $this;
    }

    public function from($tableName)
    {
        $from = " FROM  $tableName ";
        $this->from .= $from;
        $this->sqlOrder[] = 'from';

        return $this;
    }
    public function where($columnsArr,$paramsArr)
    {
        $columnsCount = sizeof($columnsArr);
        $where = " WHERE ";

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $where .= $columnsArr[$i] . '=' .$paramsArr[$i];
            }else
            {
                $where .= $columnsArr[$i] . '=' . $paramsArr[$i] . ' AND ';
            }
        }

        $this->where  .= $where;
        $this->sqlOrder[] = 'where';

        return $this;
    }
    public function delet()
    {
        $delet = "DELETE ";
        $this->delet = $delet;
        $this->sqlOrder[] = 'delet';

        return $this;
    }
    public function update($tName)
    {
        $update = "UPDATE $tName";
        $this->update = $update;
        $this->sqlOrder[] = 'update';

        return $this;
    }
    public function set($columnsArr,$paramsArr)
    {
        $set = " SET ";
        $columnsCount = sizeof($columnsArr);

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $set .= $columnsArr[$i] . '=' . $paramsArr[$i] ;
            }else
            {
                $set .= $columnsArr[$i] . '=' . $paramsArr[$i] .',';
            }
        }

        $this->set = $set;
        $this->sqlOrder[] = 'set';

        return $this;
    }
    public function insert($tName)
    {
        $insert = "INSERT INTO $tName ";
        $this->insert = $insert;
        $this->sqlOrder[] = 'insert';

        return $this;
    }
    public function values($columnsArr,$paramsArr)
    {
        $this->insert .= '(';
        $columns = '';
        $values = ' VALUES (';
        $columnsCount = sizeof($columnsArr);

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $columns .= $columnsArr[$i] ;
            }else
            {
                $columns .= $columnsArr[$i] .',';
            }
        }

        $this->insert .= $columns . ')';
        $paramsCount = sizeof($paramsArr);

        for($i=0;$i<$paramsCount;$i++)
        {
            if($paramsCount == ($i+1))
            {
                $values .= $paramsArr[$i] ;
            }else
            {
                $values .= $paramsArr[$i] . ',';
            }
        }

        $values .= ')';
        $this->values = $values;
        $this->sqlOrder[] = 'values';

        return $this;
    }

    public function selectDistinct($columns)
    {
        $columnsCount = sizeof($columns);
        $selectDistinct = "SELECT DISTINCT ";

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == ($i+1))
            {
                $selectDistinct .= $columns[$i] ;
            }else
            {
                $selectDistinct .= $columns[$i] .',';
            }
        }

        $this->selectDistinct= $selectDistinct;
        if(array_search('*',$columns) !== false)
            $this->select= null;
        $this->sqlOrder[] = 'selectDistinct';

        return $this;
    }

    public function groupBy($groupByArr)
    {
        $groupBy = ' GROUP BY ';
        $groupByCount = sizeof($groupByArr);

        for($i=0;$i<$groupByCount;$i++)
        {
            if($groupByCount == $i+1)
            {
                $groupBy .= $groupByArr[$i] ;
            }else
            {
                $groupBy .= $groupByArr[$i] . ',';
            }
        }

        $this->groupBy = $groupBy;
        $this->sqlOrder[] = 'groupBy';

        return $this;
    }

    public function having($agrFunctionArr,$columnsArr,$singArr,$valuesArr)
    {
        $having = ' HAVING ';
        $agrFunctionCount = sizeof($agrFunctionArr);

        for($i=0;$i<$agrFunctionCount;$i++)
        {
            if($agrFunctionCount == $i+1)
            {
                $having .= $agrFunctionArr[$i] .'(' . $columnsArr[$i] . ') ' . $singArr[$i] . ' ' . $valuesArr[$i];
            }else
            {
                $having .= $agrFunctionArr[$i] .'(' . $columnsArr[$i] . ') ' . $singArr[$i] . ' ' . $valuesArr[$i] . ' AND ';
            }
        }

        $this->having = $having;
        $this->sqlOrder[] = 'having';

        return $this;
    }

    public function orderBy($columnsArr,$askDeskArr)
    {
        $order = ' ORDER BY ';
        $columnsCount = sizeof($columnsArr);

        for($i=0;$i<$columnsCount;$i++)
        {
            if($columnsCount == $i+1)
            {
                $order .= $columnsArr[$i] . ' ' . $askDeskArr[$i];
            }else
            {
                $order .= $columnsArr[$i] . ' ' . $askDeskArr[$i] . ',';
            }
        }
        $this->orderBy = $order;
        $this->sqlOrder[] = 'orderBy';

        return $this;
    }

    public function limit($firstValue,$secondValue = false)
    {
        $limit = ' LIMIT ' . $firstValue;
        if($secondValue !==false && is_numeric($secondValue))
            $limit .= ',' . $secondValue;
        $this->limit = $limit;
        $this->sqlOrder[] = 'limit';

        return $this;
    }

    public function innerJoin($joinTableArr,$joinFieldArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $innerJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
            $innerJoin = ' INNER JOIN ' . $joinTableArr[$i] . ' ON ' . $onJoinTableArr[$i] . '.' .$onJoinFieldArr[$i] . ' = '
                .$joinTableArr[$i] .'.'.$joinFieldArr[$i];
        }

        $this->innerJoin = $innerJoin;
        $this->sqlOrder[] = 'innerJoin';

        return $this;
    }

    public function leftJoin($joinTableArr,$joinFieldArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $leftJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
            $leftJoin = ' LEFT OUTER JOIN ' . $joinTableArr[$i] . ' ON ' . $onJoinTableArr[$i] . '.' .$onJoinFieldArr[$i] . ' = '
                .$joinTableArr[$i] .'.'.$joinFieldArr[$i];
        }

        $this->leftJoin = $leftJoin;
        $this->sqlOrder[] = 'leftJoin';

        return $this;

    }

    public function rightJoin($joinTableArr,$joinFieldArr,$onJoinTableArr,$onJoinFieldArr)
    {
        $rightJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
            $rightJoin = ' RIGHT OUTER JOIN ' . $joinTableArr[$i] . ' ON ' . $onJoinTableArr[$i] . '.' .$onJoinFieldArr[$i] . ' = '
                .$joinTableArr[$i] .'.'.$joinFieldArr[$i];
        }

        $this->rightJoin = $rightJoin;
        $this->sqlOrder[] = 'rightJoin';

        return $this;

    }

    public function crossJoin($joinTableArr)
    {
        $crossJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
            $crossJoin .= ' CROSS JOIN ' . $joinTableArr[$i];
        }

        $this->crossJoin = $crossJoin;
        $this->sqlOrder[] = 'crossJoin';

        return $this;
    }

    public function naturalJoin($joinTableArr)
    {
        $naturalJoin = '';
        $joinTableCount = sizeof($joinTableArr);

        for($i=0;$i<$joinTableCount;$i++)
        {
            $naturalJoin .= ' NATURAL JOIN ' . $joinTableArr[$i];
        }
        $this->naturalJoin = $naturalJoin;
        $this->sqlOrder[] = 'naturalJoin';

        return $this;
    }


    public function execute()
    {
        $result = '';

        foreach($this->sqlOrder as $values)
        {
            $result .= $this->$values;
        }

        foreach($this as$key=> $value)
        {
            $this->$key = null;
        }

        return $result;
    }
}

//$sql = new Sql();
//$select = $sql->select(['key','data'])->from('MY_TEST')->where(['data','key'],[':data',':key'])->groupBy(['key','data'])->limit('1')->execute();
////$innerJoin = $sql->select(['key','data'])->from('MY_TEST')->innerJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
////    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
////$having = $sql->select(['key','data'])->from('MY_TEST')->having(['AVG','MAX'],['key','data'],['>','='],[10,20])->execute();
////$leftJoin = $sql->select(['key','data'])->from('MY_TEST')->leftJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
////    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
////$rightJoin = $sql->select(['key','data'])->from('MY_TEST')->rightJoin(['table1'],['joinfield'],['MY_TEST'],['key'])
////    ->orderBy(['key','joinfield'],['ask','desk'])->execute();
////$crossJoin = $sql->select(['key','data'])->from('MY_TEST')->crossJoin(['table1','table2'])->execute();
////$naturalJoin = $sql->select(['key','data'])->from('MY_TEST')->naturalJoin(['table1','table2'])->execute();
////$selectDistinct = $sql->selectDistinct(['key','data'])->from('MY_TEST')->where(['data','key'],[10,11])->groupBy(['key','data'])->limit('1')->execute();
////$insert = $sql->insert('MY_TEST')->values(['key','data'],['user14','Add insert text'])->execute();
////$update = $sql->update('MY_TEST')->set(['data'],['new value'])->execute();
////$deleted = $sql->delet()->from('MY_TEST')->where(['key'],['user14'])->execute();
////
////var_dump($select,$innerJoin,$having,$leftJoin,$rightJoin,$crossJoin,$naturalJoin,$selectDistinct,$insert,$update,$deleted);
//var_dump($select);