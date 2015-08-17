<?php
include( __DIR__.'/model.php');

class StatusController {

	public static function read(){
		Status::read();
	}

	public static function detail($age,$weight){
		Status::detail($age,$weight);
	}

	public static function printNormal(){
		Status::printNormal();
	}

	public static function printSeverelyUnder(){
		Status::printSeverelyUnder();
	}

	public static function printUnder(){
		Status::printUnder();
	}

	public static function printOver(){
		Status::printOver();
	}

	public static function printSeverelyUnderTotal(){
		Status::printSeverelyUnderTotal();
	}
}

?>