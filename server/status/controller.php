<?php
include( __DIR__.'/model.php');

class StatusController {

	public static function create($data){
		Status::create($data);
	}

	public static function read(){
		Status::read();
	}

	public static function detail($age,$weight){
		Status::detail($age,$weight);
	}

	public static function update($id,$data){
		Status::update($id,$data);
	}

	public static function delete($id){
		Status::delete($id);
	}
}

?>