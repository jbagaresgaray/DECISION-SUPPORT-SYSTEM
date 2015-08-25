<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');


	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'PUT':
			$data=parse_str( file_get_contents( 'php://input' ), $_PUT );
			foreach ($_PUT as $key => $value){
					unset($_PUT[$key]);
					$_PUT[str_replace('amp;', '', $key)] = $value;
			}
			$_REQUEST = array_merge($_REQUEST, $_PUT);

			if(isset($request) && !empty($request) && $request[0] !== ''){
				if ($request[0] == 'account'){
					$id = $request[1];
					UsersController::updateAccount($id,$_REQUEST);
				}else if ($request[0] == 'profile'){
					$id = $request[1];
					UsersController::updateProfile($id,$_REQUEST);
				}else{
					$id = $request[0];
					UsersController::update($id,$_REQUEST);
				}
			}
	    break;
	  case 'POST':
			UsersController::create($_POST);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'auth'){
					UsersController::currentUser();
				}else{
			  		$id = $request[0];
					UsersController::detail($id);
				}
	  	}
	    break;
	  case 'DELETE':
	  	session_start();
		$headers = apache_request_headers();
		$token = $headers['X-Auth-Token'];

	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
			UsersController::delete($id);
	  	}
	    break;
	  default:
	    return print json_encode('DECISION SUPPORT SYSTEM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
