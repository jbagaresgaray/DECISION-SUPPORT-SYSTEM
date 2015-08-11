<?php
include( __DIR__.'/model.php');

class StatusController {

	public static function create($data){
		Status::create($data);
	}

	public static function read(){
		Status::read();
	}

	public static function detail($id){
		Status::detail($id);
	}

	public static function update($id,$data){
		Status::update($id,$data);
	}

	public static function delete($id){
		Status::delete($id);
	}
}

?>