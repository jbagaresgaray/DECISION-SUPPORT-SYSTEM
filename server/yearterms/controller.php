<?php
include( __DIR__.'/model.php');

class YearsController {

	public static function create($data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['year']) && empty($data['year'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Year is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['terms']) && empty($data['terms'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Year Terms is required'),JSON_PRETTY_PRINT);
		}else{
			$data = [
				'year'=> $_POST['year'],
				'terms'=> $_POST['terms']
			];
			YearTerms::create($data);
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
			YearTerms::read();
		}
	}

	public static function dssYear(){
		YearTerms::read();
	}

	public static function detail($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			YearTerms::detail($id);
		}
	}

	public static function update($id,$data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['year']) && empty($data['year'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Year is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['terms']) && empty($data['terms'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Year Terms is required'),JSON_PRETTY_PRINT);
		}else {
			$data = [
				'year'=> $data['year'],
				'terms'=> $data['terms']
			];
			YearTerms::update($id,$data);
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
			YearTerms::delete($id);
		}
	}
}

?>