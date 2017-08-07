<?php

include ('libs/Band.php');
include ('libs/Instrument.php');
include ('libs/Musician.php');

$metallica = new Band('Metallica','rock');
$newGroup = new Band('Home Players','Pop');

$guitarPlayer = new Musician('James Alan Hetfield','solo');
$drummer = new Musician('Lars Ulrich','drummer');
$guitarPlayer2 = new Musician('Clifford Lee Burton','guitar player');
$guitarPlayer3 = new Musician('Kirk Lee Hammett','guitar player');

$guitar = new Instrument('guitar','stringed');
$busGuitar = new Instrument('bush guitar','stringed');
$drum = new Instrument('drum','drums');
$solo = new Instrument('Voice','human resources');

$guitarPlayer->addInstrument($guitar);
$guitarPlayer->addInstrument($solo);

$drummer->addInstrument($drum);

$guitarPlayer2->addInstrument($guitar);
$guitarPlayer2->addInstrument($busGuitar);

$guitarPlayer3->addInstrument($guitar);
$guitarPlayer3->addInstrument($busGuitar);

$guitarPlayer->assignToBand($metallica);
$drummer->assignToBand($metallica);
$guitarPlayer2->assignToBand($metallica);
$guitarPlayer3->assignToBand($metallica);

$bandName = $metallica->getName();
$genre = $metallica->getGenre();
$musicians = $metallica->getMusician();
$musiciansCount = sizeof($musicians);

include ('templates/index.php');
