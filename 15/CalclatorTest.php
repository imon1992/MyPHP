<?php

include('libs/Calculator.php');

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    public function testPlus()
    {
        $plus = new Calculator();

        for($i=0;$i<100;$i++)
        {
        $plus->setFirstValue($i);
        $plus->setSecondValue($i);
        $this->assertEquals($i+$i,$plus->plus());
        }
    }

    public function testMinus()
    {
        $plus = new Calculator();

        for($i=0;$i<100;$i++)
        {
            $first = rand(0,10000);
            $second = rand(0,10000);
            $plus->setFirstValue($first);
            $plus->setSecondValue($second);
            $this->assertEquals($first-$second,$plus->minus());
        }
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
        $plus = new Calculator();

        for($i=0;$i<100;$i++)
        {
            $first = rand(0,10000);
            $second = rand(0,10000);
            $plus->setFirstValue($first);
            $plus->setSecondValue($second);
            $this->assertEquals($first*$second,$plus->multiplication());
        }
    }

    public function testSquareRoot()
    {
        $plus = new Calculator();

        for($i=0;$i<100;$i++)
        {
            $first = rand(0,1000);
            $plus->setFirstValue($first);
            $this->assertEquals(sqrt($first),$plus->squareRoot());
        }
    }

    public function addToMemory($value)
    {
        $plus = new Calculator();

        for($i=0;$i<100;$i++)
        {
            $first = rand(0,1000);
            $plus->addToMemory($first);
            $this->assertEquals(sqrt($first),$plus->squareRoot());
        }
    }

}