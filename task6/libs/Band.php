<?php
include ('iBand.php');
class Band implements iBand
{
    protected $bandName;
    protected $bandGenre;
    protected $musicians = [];
    public function __construct($bandName,$bandGenre)
    {
        $this->bandName = $bandName;
        $this->bandGenre = $bandGenre;
    }
    public function getName()
    {
        return $this->bandName;
    }

    public function getGenre()
    {
        return $this->bandGenre;
    }

    public function addMusician(iMusician $obj)
    {
        $musicianName = $obj->getName();
        $musicianType = $obj->getMusicianType();
        $musicianInstrument = $obj->getInstrument();
        $this->musicians["$musicianName"] =['musicianType'=>$musicianType,
                                            'musicianInstrument'=>$musicianInstrument];
    }
    public function getMusician()
    {
        return $this->musicians;
    }
}