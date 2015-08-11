<?php
include( __DIR__.'/model.php');

class ChildController {

	public static function create($data){

		if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'First Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Last Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['mname']) && empty($data['mname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Middle Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['address']) && empty($data['address'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Address is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['location']) && empty($data['location'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Location is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['date']) && empty($data['date'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Date of Birth is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['height']) && empty($data['height'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Height is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['weight']) && empty($data['weight'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Weight is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['month']) && empty($data['month'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Month is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['gender']) && empty($data['gender'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Gender is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['status']) && empty($data['status'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Status is required'),JSON_PRETTY_PRINT);
		}
		
		Child::create($data);
	}


	public static function read(){
		Child::read();
	}

	public static function detail($id){
		Child::detail($id);
	}

	public static function update($id,$data){
		if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'First Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Last Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['mname']) && empty($data['mname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Middle Name is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['address']) && empty($data['address'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Address is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['location']) && empty($data['location'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Location is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['date']) && empty($data['date'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Date of Birth is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['height']) && empty($data['height'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Height is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['weight']) && empty($data['weight'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Weight is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['month']) && empty($data['month'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Month is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['gender']) && empty($data['gender'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Gender is required'),JSON_PRETTY_PRINT);
		}

		if(isset($data['status']) && empty($data['status'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Status is required'),JSON_PRETTY_PRINT);
		}

		Child::update($id,$data);
	}

	public static function delete($id){
		Child::delete($id);
	}
}

?>