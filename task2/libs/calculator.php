<?php

class calculator{
    private $firstValue;
    private $secondValue;
    private $memory;
    
    public function __construct()
    {
    }
    public function __destruct()
     {
     }

    public function  getFirstValue()
    {
        return $this->firstValue;
    }

    public function  setFirstValue($value)
    {
        $this->firstValue = $value;
    }

    public  function getSecondValue()
    {
        return $this->secondValue;
    }   

    public function setSecondValue($value)
    {
        $this->secondValue = $value;
    }

    public function  getMemory()
    {
        return $this->memory;
    }

    public function  setMemory($value)
    {
        $this->memory = $value;
    }


    public function plus()
    {
        return $this->firstValue + $this->secondValue; 
    }

    public function minus() 
    {
        return $this->firstValue - $this->secondValue;
    } 

    public function division()
    {
        if($this->secondValue === 0)
            {
                return ERRORDIVISION;
            }else{ 
                return $this->firstValue / $this->secondValue;
            }
    } 

    public function multiplication()
    {
        return $this->firstValue * $this->secondValue;
    }
    
    public function squareRoot() 
    {
        return sqrt($this->firstValue);
    }

    public function addToMemory($value) 
    {
        $this->setMemory($value);
    }
    
    public function giveFromMemory()
    {
        return $this->getmemory();
    }

    public function clearmemory()
    {
        $this->memory = 0; 
    }    

    public function mPlus($value)
    {
        $this->memory = $this->memory + $value;
    }

    public function mMinus($value)
    {
        $this->memory = $this->memory - $value;    
    }

    public function persent()
    {
        return ($this->firstValue/$this->secondValue) * 100;
    }



}
