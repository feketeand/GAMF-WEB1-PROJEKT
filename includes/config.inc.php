<?php
$ablakcim = array(
	'cim' => 'Panelprojekt',
);

$fejlec = array(
	'kepforras' => 'kep1.jpg',
	'kepalt' => 'lakás',
	'cim' => 'Panelprojekt',
);

$lablec = array(
	'copyright' => 'Copyright ' . date("Y") . '.',
	'oldal' => 'Panelprojekt'
);

$oldalak = array(	
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Kezdőlap', 'menun' => array(1, 1)),
	'panellakasokrol' => array('fajl' => 'panellakasokrol', 'szoveg' => 'Panellakásokról általában', 'menun' => array(1, 1)),
	'galeria' => array('fajl' => 'galeria', 'szoveg' => 'Galéria', 'menun' => array(1, 1)),
	'lakotelepek' => array('fajl' => 'lakotelepek', 'szoveg' => 'Lakótelepek Budapesten', 'menun' => array(1, 1)),
	'lakaskereso' => array('fajl' => 'lakaskereso', 'szoveg' => 'Lakáskereső', 'menun' => array(1, 1)),
	'otletfeltolto' => array('fajl' => 'otletfelto', 'szoveg' => 'Ötlet feltöltés', 'menun' => array(1, 1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1, 1)),
	'karbantarto'=> array('fajl' => 'karbantarto', 'szoveg' => 'Karbantartó', 'menun' => array(1, 1)),
	'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés/Regisztráció', 'menun' => array(1, 0)),
	'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0, 1)),
	'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0, 0)),
	'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0, 0)),
	'ltpmentes' => array('fajl' => 'ltpmentes', 'szoveg' => '', 'menun' => array(0, 0)),
	'tipmentes' => array('fajl' => 'tipmentes', 'szoveg' => '', 'menun' => array(0, 0)),
	'alaprajzok' => array('fajl' => 'tipmentes', 'szoveg' => '', 'menun' => array(0, 0))
);

$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

$MAPPA = 'images/';
$MAPPA2 = 'images/alaprajzok/';
$TIPUSOK = array('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
?>