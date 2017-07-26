<?php

include("libs/Calculator.php");
include ("config.php");

$calculator =  new calculator();
$calculator->setFirstValue(5);
$calculator->setSecondValue(5);
$sumResult = $calculator->plus();
$sumFirstValue = $calculator->getFirstValue();
$sumSecondValue = $calculator->getSecondValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);

$calculator->setFirstValue(10);
$calculator->setSecondValue(5);
$minusResult = $calculator->minus();
$minusFirstValue = $calculator->getFirstValue();
$minusSecondValue = $calculator->getSecondValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);


$calculator->setFirstValue(12);
$calculator->setSecondValue(0);
$divisionResult = $calculator->division();
$divisionFirstValue = $calculator->getFirstValue();
$divisionSecondValue = $calculator->getSecondValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);


$calculator->setFirstValue(11);
$calculator->setSecondValue(3);
$multResult = $calculator->multiplication();
$multFirstValue = $calculator->getFirstValue();
$multSecondValue = $calculator->getSecondValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);

$calculator->setFirstValue(9);
$sRootResult = $calculator->squareRoot();
$sRootFirstValue = $calculator->getFirstValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);

$calculator->addToMemory(5);
$numberInMemory = $calculator->getMemory();

$numverFromMemory = $calculator->giveFromMemory();

$calculator->clearmemory();
$numverFromMemoryAfterClear = $calculator->getMemory();

$calculator->mPlus(8);
$memofyAfterMPlus = $calculator->getMemory();

$calculator->mMinus(4);
$memofyAfterMMinus = $calculator->getMemory();

$calculator->setFirstValue(10);
$calculator->setSecondValue(100);
$persentResult = $calculator->persent();
$persentFirstValue = $calculator->getFirstValue();
$persentSecondValue = $calculator->getSecondValue();
$calculator->setFirstValue(0);
$calculator->setSecondValue(0);
include ("templates/index.php");

