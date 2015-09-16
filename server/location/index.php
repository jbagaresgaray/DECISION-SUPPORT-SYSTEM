<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
	//  globals
	$_DELETE = array ();
	$_PUT = array ();

	switch ($method) {
	  case 'PUT':
		$data=parse_str( file_get_contents( 'php://input' ), $_PUT );
		foreach ($_PUT as $key => $value){
	        unset($_PUT[$key]);
	        $_PUT[str_replace('amp;', '', $key)] = $value;
	    }
		$_REQUEST = array_merge($_REQUEST, $_PUT);

		if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				LocationController::update($id,$_REQUEST);
	  	}else{
				header('Route Not Found', true, 404);
	  	}
	    break;
	  case 'POST':
				LocationController::create($_POST);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
			LocationController::detail($id);
	  	}else{
			LocationController::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				LocationController::delete($id);
	  	}
	    break;
	  default:
	    return print json_encode('DECISION SUPPORT SYSTEM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
