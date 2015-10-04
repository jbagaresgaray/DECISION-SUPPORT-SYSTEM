<?php
include( __DIR__.'/model.php');

class ChildController {

	public static function create($data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'First Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Last Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['mname']) && empty($data['mname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Middle Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['address']) && empty($data['address'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Address is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['location']) && empty($data['location'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Location is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['date']) && empty($data['date'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Date of Birth is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['height']) && empty($data['height'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Height is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['weight']) && empty($data['weight'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Weight is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['month']) && empty($data['month'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Month is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['gender']) && empty($data['gender'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Gender is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['status']) && empty($data['status'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Status is required'),JSON_PRETTY_PRINT);
		}else { 
			Child::create($data); 
		} 
	}


	public static function read(){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Child::read();
		}
	}

	public static function filter($value){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Child::filter($value);
		}
	}

	public static function detail($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Child::detail($id);
		}
	}

	public static function update($id,$data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'First Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Last Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['mname']) && empty($data['mname'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Middle Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['address']) && empty($data['address'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Address is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['location']) && empty($data['location'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Location is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['date']) && empty($data['date'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Date of Birth is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['height']) && empty($data['height'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Height is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['weight']) && empty($data['weight'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Weight is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['month']) && empty($data['month'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Month is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['gender']) && empty($data['gender'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Gender is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['status']) && empty($data['status'])){
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Status is required'),JSON_PRETTY_PRINT);
		}else {
			Child::update($id,$data);
		}
	}

	public static function delete($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else {
			Child::delete($id);
		}
	}
}

?>