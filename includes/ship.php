<?php

abstract class Ship{
	

	//		A ship will be named when it's created and can't be renamed after. (Not creating setter for ship name.)

		

		private $health = 100;
		private $attack;
		private $defence;
		private $name;


		public function __construct($name, $health, $attack, $defence){

			$this->name = $name;
			$this->health = $health;
			$this->attack = $attack;
			$this->defence = $defence;

		}
		public function getInfo(){
			 
			return "
		Ship: {$this->name}	
		Health: {$this->health} Attack: {$this->attack} Defence: {$this->defence}
			";
		}
		// decrease health of ship.
		public function decreaseHealth($amount)
		{
			$this->health -= $amount;
			if($this->health < 0  ) $this->health = 0;
		}

		public function attackShip(Ship $targetShip)
		{	
			echo "Ship: {$this->name} is going to attack ".$targetShip->getName()."\n";
			echo "Guns loaded...\n";
			echo "Firing Shots...\n";

			// generating a random number between 1 and 100. if number is between 1 and 25, we'll consider a "miss" shot. otherwise a hit shot.
			

				

			$randomNumber = rand(1, 100);
			if($randomNumber <= 25)
			{
				echo "Warning! Guns malfunction! Miss Fire! Miss Fire.\n";
			}
			else
			{
				// calculate if target ship evades the shot.
				$evadeProbability = 25;
				if($targetShip->getDefence() == 2) $evadeProbability = 50;
				else if($targetShip->getDefence() == 3) $evadeProbability = 75; 
				$randomNumber = rand(1,100);
				if($randomNumber <= $evadeProbability)
				{
					echo "Target engaging evading maneuvers. Target missed.\n";
				}
				else
				{
					$randomNumber = rand(1, 100);
					$damage = $this->attack;
					if($randomNumber <= 10)
					{
						$damage = $this->attack * 3;

						echo "Lucky Shot!\n";
					}
					$targetShip->decreaseHealth($damage);
					echo "Attack ended. $this->name inflicted $damage damage on " . $targetShip->getName() . "\n";
				}
				
				 
			}
		}
	
  
		public function getName(){ return $this->name;}
		public function getHealth( ) { return $this->health;}
		public function getAttack(){return $this->attack;}
		public function getDefence(){return $this->defence;}
}