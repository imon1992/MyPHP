<?php

include('libs/Calculator.php');

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function testPlus()
    {
        $plus = $this->calculator;
        $plus->setFirstValue(2);
        $plus->setSecondValue(2);
        $this->assertEquals(4,$plus->plus());

//        for($i=0;$i<100;$i++)
//        {
//        $plus->setFirstValue($i);
//        $plus->setSecondValue($i);
//        $this->assertEquals($i+$i,$plus->plus());
//        }
    }

    public function testMinus()
    {
        $minus = $this->calculator;

        $minus->setFirstValue(10);
        $minus->setSecondValue(5);
        $this->assertEquals(5,$minus->minus());
//        for($i=0;$i<100;$i++)
//        {
//            $first = rand(0,10000);
//            $second = rand(0,10000);
//            $plus->setFirstValue($first);
//            $plus->setSecondValue($second);
//            $this->assertEquals($first-$second,$plus->minus());
//        }
    }

//    public function testDivision()
//    {
//        $plus = new Calculator();
//
////        $first = rand(0,10000);
////        $second = rand(0,0);
////        $plus->setFirstValue($first);
////        $plus->setSecondValue($second);
////        $this->assertEquals($first/$second,$plus->division());
//        for($i=0;$i<100;$i++)
//        {
//            $first = rand(0,10000);
//            $second = rand(0,10000);
//            $plus->setFirstValue($first);
//            $plus->setSecondValue($second);
//            $this->assertEquals($first/$second,$plus->division());
//        }
//    }
    public function testMultiplication()
    {
        $mult = new $this->calculator;

        $mult->setFirstValue(2);
        $mult->setSecondValue(10);
        $this->assertEquals(20,$mult->multiplication());

//        for($i=0;$i<100;$i++)
//        {
//            $first = rand(0,10000);
//            $second = rand(0,10000);
//            $plus->setFirstValue($first);
//            $plus->setSecondValue($second);
//            $this->assertEquals($first*$second,$plus->multiplication());
//        }


    }

    public function testSquareRoot()
    {
        $sqrt= new $this->calculator;

        $sqrt->setFirstValue(9);
        $this->assertEquals(3,$sqrt->squareRoot());

//        for($i=0;$i<100;$i++)
//        {
//            $first = rand(0,1000);
//            $plus->setFirstValue($first);
//            $this->assertEquals(sqrt($first),$plus->squareRoot());
//        }
    }

    public function testAddToMemory()
    {
        $addToMem = new $this->calculator;

        $this->assertEquals($addToMem->getMemory(),$addToMem->addToMemory(5));

//        for($i=0;$i<100;$i++)
//        {
//            $first = rand(0,1000);
//            $plus->addToMemory($first);
//            $this->assertEquals(sqrt($first),$plus->squareRoot());
//        }
    }

    public function testGiveFromMemory()
    {
        $giveMem = $this->calculator;

        $giveMem->setMemory(5);
        $this->assertEquals($giveMem->getMemory(),$giveMem->giveFromMemory());
    }

    public function testClearmemory()
    {
        $clearMem = $this->calculator;
        $this->assertEquals($clearMem->getMemory(),$clearMem->clearmemory());
    }

    public function testMPlus()
    {

        $mPlus = $this->calculator;
//        $mPlus->getMethod()
        $this->assertEquals($mPlus->getMemory(),$mPlus->mPlus(10));
    }

    public function testMMinus()
    {
        $mMinus = $this->calculator;
//        $mPlus->getMethod()
        $this->assertEquals($mMinus->getMemory(),$mMinus->minus(10));
    }

    public function testPersent()
    {
        $percent = $this->calculator;

        $percent->setFirstValue(1);
        $percent->setSecondValue(10);
        $this->assertEquals(10,$percent->persent());
    }
}