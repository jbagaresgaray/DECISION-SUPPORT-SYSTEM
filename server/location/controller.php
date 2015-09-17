<?php
include( __DIR__.'/model.php');

class LocationController {

	public static function create($data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['name']) && empty($data['name'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Location Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['x_coord']) && empty($data['x_coord'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'X Coordinate is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['y_coord']) && empty($data['y_coord'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Y Coordinate is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
				'name'=> $data['name'],
				'x'=> $data['x_coord'],
				'y'=> $data['y_coord'],
				'description'=> $data['description'],
				'landarea'=> $data['landarea'],
				'image_path'=> $data['image_path']
			];
			Location::create($var);
		}
	}


	public static function read(){
		/*session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{*/
			Location::read();
		// }
	}

	public static function heatmap($id){
		Location::heatmap($id);
	}

	public static function detail($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Location::detail($id);
		}
	}

	public static function update($id,$data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['name']) && empty($data['name'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Location Name is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['x_coord']) && empty($data['x_coord'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'X Coordinate is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['y_coord']) && empty($data['y_coord'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Y Coordinate is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
				'name'=> $data['name'],
				'x'=> $data['x_coord'],
				'y'=> $data['y_coord'],
				'description'=> $data['description'],
				'landarea'=> $data['landarea'],
				'image_path'=> $data['image_path']
			];
			Location::update($id,$var);
		}
	}

	public static function delete($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Location::delete($id);
		}
	}
}

?>