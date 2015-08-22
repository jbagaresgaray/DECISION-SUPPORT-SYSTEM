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
		Status::printStatus('1');
	}

	public static function printSeverelyUnder(){
		Status::printStatus('2');
	}

	public static function printUnder(){
		Status::printStatus('3');
	}

	public static function printOver(){
		Status::printStatus('4');
	}

	public static function printSeverelyUnderTotal(){
		Status::printSeverelyUnderTotal();
	}



	public static function printNormalRank(){
		Status::printRankStatus('1');
	}

	public static function printSeverelyUnderRank(){
		Status::printRankStatus('2');
	}

	public static function printUnderRank(){
		Status::printRankStatus('3');
	}

	public static function printOverRank(){
		Status::printRankStatus('4');
	}


	public static function printNormalLocation($locationID){
		Status::printStatusByLocation('1',$locationID);
	}

	public static function printSeverelyUnderLocation(){
		Status::printStatusByLocation('2',$locationID);
	}

	public static function printUnderLocation(){
		Status::printStatusByLocation('3',$locationID);
	}

	public static function printOverLocation(){
		Status::printStatusByLocation('4',$locationID);
	}
}

?>