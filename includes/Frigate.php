<?php
require_once("ship.php");
class Frigate extends Ship{
	public function __construct($shipName)
	{
		
		parent::__construct($shipName . " (Frigate)" , 120, 10, 2);
	}
}