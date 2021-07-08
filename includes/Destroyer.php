<?php
require_once("ship.php");
class Destroyer extends Ship
{
	public function __construct($shipName)
	{
		
		parent::__construct($shipName . " (Destroyer)", 100, 12, 3);
	}
}
?>