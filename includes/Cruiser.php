<?php
require_once("ship.php");
class Cruiser extends Ship{
	public function __construct($shipName)
	{
		
		parent::__construct($shipName . " (Frigate)", 90, 15, 3);
	}
}