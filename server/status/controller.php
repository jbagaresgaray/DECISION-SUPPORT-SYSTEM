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
		Status::printStatus('23');
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

	public static function printSevereUnderTotalRank(){
		Status::printRankStatus('23');
	}



	public static function printNormalLocation($locationID){
		Status::printStatusByLocation('1',$locationID);
	}

	public static function printSeverelyUnderLocation($locationID){
		Status::printStatusByLocation('2',$locationID);
	}

	public static function printUnderLocation($locationID){
		Status::printStatusByLocation('3',$locationID);
	}

	public static function printOverLocation($locationID){
		Status::printStatusByLocation('4',$locationID);
	}

	public static function printSevereUnderTotalLocation($locationID){
		Status::printStatusByLocation('23',$locationID);
	}



	

	public static function printNormalDSS($year){
		Status::printDSS('1',$year);
	}

	public static function printSeverelyUnderDSS($year){
		Status::printDSS('2',$year);
	}

	public static function printUnderDSS($year){
		Status::printDSS('3',$year);
	}

	public static function printSevereUnderTotalDSS($year){
		Status::printDSS('23',$year);
	}




	public static function printGenderNormalDSS($gender){
		Status::printGenderStatus('1',$gender);
	}

	public static function printGenderSeverelyUnderDSS($gender){
		Status::printGenderStatus('2',$gender);
	}

	public static function printGenderUnderDSS($gender){
		Status::printGenderStatus('3',$gender);
	}

	public static function printGenderOverDSS($gender){
		Status::printGenderStatus('4',$gender);
	}

	public static function printGenderSevereUnderTotalDSS($gender){
		Status::printGenderStatus('23',$gender);
	}



	public static function printBracketsNormalDSS($value){
		Status::printBracketsStatus('1',$value);
	}

	public static function printBracketsSeverelyUnderDSS($value){
		Status::printBracketsStatus('2',$value);
	}

	public static function printBracketsUnderDSS($value){
		Status::printBracketsStatus('3',$value);
	}

	public static function printBracketsOverDSS($value){
		Status::printBracketsStatus('4',$value);
	}

	public static function printBracketsSevereUnderTotalDSS($value){
		Status::printBracketsStatus('23',$value);
	}
}

?>