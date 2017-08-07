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
        if($this->firstValue !== null)
        {
            return $this->firstValue;
        }else
        {
            return 'Wrong number Priravnivaem k 0';
        }
    }

    public function  setFirstValue($value)
    {
        if(is_numeric($value))
        {
            $this->firstValue = $value;
        }else
        {
            $this->firstValue = null;
        }
    }

    public  function getSecondValue()
    {
        if($this->secondValue !== null)
        {
            return $this->secondValue;
        }else
        {
            return 'Wrong number Priravnivaem k 0';
        }
    }   

    public function setSecondValue($value)
    {
        if(is_numeric($value))
        {
            $this->secondValue = $value;
        }else
        {
            $this->secondValue = null;
        }
    }

    public function  getMemory()
    {
        if($this->firstValue !== null)
        {
            return $this->memory;
        }else
        {
            return 'Wrong number Priravnivaem k 0';
        }

    }

    public function  setMemory($value)
    {
        if(is_numeric($value)) {
            $this->memory = $value;
        }else
        {
            $this->memory = null;
        }
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
        if($this->firstValue >0)
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
