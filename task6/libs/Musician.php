<?php

include ('iMusician.php');

class Musician implements iMusician
{
    protected $name;
    protected $type;
    protected $instrument = [];
    protected $bands = [];

    public function __construct($name,$type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function addInstrument(iInstrument $obj)
    {
        $this->instrument[$obj->getName()] =$obj->getCategory();
    }

    public function getInstrument()
    {
        return $this->instrument;
    }

    public function assignToBand(iBand $nameBand)
    {
        $nameBand->addMusician($this);
    }

    public function getMusicianType(){
        return $this->type;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getBands()
    {
        return $this->bands;
    }
}