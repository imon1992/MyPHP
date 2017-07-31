<?php

include ('iInstrument.php');
class Instrument implements iInstrument
{
    protected $name;
    protected $category;
    public function __construct($name,$category)
    {
        $this->name = $name;
        $this->category = $category;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCategory()
    {
        return $this->category;
    }
}