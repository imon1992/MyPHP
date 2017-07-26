<?php
class Sql
 {
    protected $sql;
    protected $select;
    protected $from;
    protected $where;
    protected $delet;
    protected $update;
    protected $set;
    protected $insert;
     public function select($columns)
     {
         $columnsCount = sizeof($columns);
         $select = "SELECT ";
         for($i=0;$i<$columnsCount;$i++)
         {
             if($columnsCount == ($i+1))
             {
                 $select .= $columns[$i];
             }else
             {
                 $select .= $columns[$i] . ',';
             }
         }
         $this->select= $select;
         return $this;
     }

     public function from($tableName)
     {
         $from = " FROM $tableName";
         $this->from .= $from;
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
                 $where .= $columnsArr[$i] . '=' . $paramsArr[$i];
             }else
             {
                 $where .= $columnsArr[$i] . '=' . $paramsArr[$i] . ',';
             }
         }
         $this->where  .= $where;
         return $this;
    }

    public function delet($tName)
    {
        $delet = 'DELETE ';
        $this->delet = $delet;
        return $this;
    }

    public function update($tName)
    {
        $update = "UPDATE $tName";
        $this->update = $update;
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
                  $set .= $columnsArr[$i] . '=' . $paramsArr[$i];
              }else
              {
                  $set .= $columnsArr[$i] . '=' . $paramsArr[$i] . ',';
              }

        }
        $this->set = $set;
        return $this;
    }

    public function insert($tName,$columnsArr)
    {
        $insert = "INSER INTO $tName ";
        $columnsCount = sizeof($columnsArr);
         for($i=0;$i<$columnsCount;$i++)
         {
               if($columnsCount == ($i+1))
               {
                   $insert .= $columnsArr[$i] . '=' . $paramsArr[$i];
               }else
              {
                  $insert .= $columnsArr[$i] . '=' . $paramsArr[$i] . ',';
              }

         }
        $insert .=')';
        $this->insert = $insert;
        return $this;
    }
    
    public function execute()
    {
        $result = '';
        foreach($this as $value)
        {
            $result .= $value;
        }
        return $result;
    }
}
/*
$c = new Sql();
$c->select(['a','ab'])->from('t1')->where(['a','ab'],[1,2]);
echo $c->sqlSelect;
*/
