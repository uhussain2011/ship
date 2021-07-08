<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1); 


require("includes/Destroyer.php");
require("includes/Frigate.php");
require("includes/Cruiser.php");

echo "Enter First Ship Type: \n 1 - Destroyer\n 2 - Frigate\n 3 - Cruiser";
$type1 = intval(readline());
while($type1 < 1 || $type1 > 3)
{

	echo "Invalid Selection. Enter Ship Type: \n 1 - Destroyer\n 2 - Frigate\n 3 - Cruiser";
	$type1 = intval(readline());
}



echo "Enter Second Ship Type: \n 1 - Destroyer\n 2 - Frigate\n 3 - Cruiser";
$type2 = intval(readline());
while($type2 < 1 || $type2 > 3)
{

	echo "Invalid Selection. Enter Ship Type: \n 1 - Destroyer\n 2 - Frigate\n 3 - Cruiser";
	$type2 = intval(readline());
}

echo "Enter Name for Ship # 1: ";
$name1=  readline(); 

echo "Enter Name for Ship # 2: ";
$name2=  readline(); 
if($type1 == 1)
	$myShip = new Destroyer($name1);
else if($type1 == 2)
	$myShip = new Frigate($name1);
else 
	$myShip = new Cruiser($name1);


if($type2 == 1)
	$enemyShip = new Destroyer($name1);
else if($type2 == 2)
	$enemyShip = new Frigate($name1);
else $enemyShip = new Cruiser($name1);



echo $myShip->getInfo();
echo $enemyShip->getInfo();
$round = 1;
echo "H1";
while($myShip->getHealth() > 0 && $enemyShip->getHealth() > 0)
{
	echo "******";
	echo "Round: $round";
	echo $myShip->getInfo();
	echo $enemyShip->getInfo();

	$myShip->attackShip($enemyShip);
	if($enemyShip->getHealth() > 0)
		$enemyShip->attackShip($myShip);
	echo "*******\n\n\n";
	$round ++;
 }
echo "End of Gam \n";
if($myShip->getHealth() > 0) echo $myShip->getName() . " Won!";
else $enemyShip->getName() . " Won!";