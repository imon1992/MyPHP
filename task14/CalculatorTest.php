<?php

include('libs/Calculator.php');

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

   public function testGetFirstValue()
    {
        $firstValue = $this->calculator;
        $firstValue->setFirstValue(10);
        $this->assertEquals(10,$firstValue->getFirstValue());
        $firstValue->setFirstValue(null);
        $this->assertEquals('Wrong number Priravnivaem k 0',$firstValue->getFirstValue());
    }

   public function testGetSecondValue()
    {
        $secondValue = $this->calculator;
        $secondValue->setSecondValue(10);
        $this->assertEquals(10,$secondValue->getSecondValue());
        $secondValue->setSecondValue(null);
        $this->assertEquals('Wrong number Priravnivaem k 0',$secondValue->getSecondValue());
    }

   public function testSetFirstValue()
    {
        $firstValue = $this->calculator;
        $this->assertTrue($firstValue->setFirstValue(10));
        $this->assertFalse($firstValue->setFirstValue(null));
    }



   public function testSetSecondValue()
    {
        $secondValue = $this->calculator;
        $this->assertTrue($secondValue->setSecondValue(10));
        $this->assertFalse($secondValue->setSecondValue(null));
    }



     public  function testGetMemory()
    {
        $memory= $this->calculator;
        $memory->setMemory(10);
        $this->assertEquals(10,$memory->getMemory());
     }

   public function testSetMemory()
    {
        $memory = $this->calculator;
        $this->assertTrue($memory->setMemory(10));
        $this->assertFalse($memory->setMemory(null));
    }



    public function testPlus()
    {
        $plus = $this->calculator;
        $plus->setFirstValue(2);
        $plus->setSecondValue(2);
        $this->assertEquals(4,$plus->plus());

    }

    public function testMinus()
    {
        $minus = $this->calculator;

        $minus->setFirstValue(10);
        $minus->setSecondValue(5);
        $this->assertEquals(5,$minus->minus());

    }

    public function testDivision()
    {
        $division = new Calculator();

        $division->setFirstValue(20);
        $division->setSecondValue(4);
        $this->assertEquals(5,$division->division());
        $division->setFirstValue(20);
        $division->setSecondValue(0);
        $this->assertEquals('cannot divide by zero',$division->division());

    }
    public function testMultiplication()
    {
        $mult = new $this->calculator;

        $mult->setFirstValue(2);
        $mult->setSecondValue(10);
        $this->assertEquals(20,$mult->multiplication());


    }

    public function testSquareRoot()
    {
        $sqrt= new $this->calculator;

        $sqrt->setFirstValue(9);
        $this->assertEquals(3,$sqrt->squareRoot());

    }

    public function testAddToMemory()
    {
        $addToMem = new $this->calculator;

        $this->assertEquals(5,$addToMem->addToMemory(5));

    }

    public function testGiveFromMemory()
    {
        $giveMem = $this->calculator;

        $giveMem->setMemory(5);
        $this->assertEquals(5,$giveMem->giveFromMemory());
    }

    public function testClearMemory()
    {
        $clearMem = $this->calculator;
        $clearMem->addToMemory(10);
        $clearMem->clearmemory();
        $this->assertEquals(0,$clearMem->getMemory());
    }

    public function testMPlus()
    {

        $mPlus = $this->calculator;
        $mPlus->setFirstValue(5);
        $this->assertEquals($mPlus->getMemory(),$mPlus->mPlus(10));
    }

    public function testMMinus()
    {
        $mMinus = $this->calculator;
        $mMinus->setFirstValue(25);
        $this->assertEquals($mMinus->getMemory(),$mMinus->mMinus(10));
    }

    public function testPercent()
    {
        $percent = $this->calculator;

        $percent->setFirstValue(1);
        $percent->setSecondValue(10);
        $this->assertEquals(10,$percent->percent());
    }
}
