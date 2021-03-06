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
				$id = $request[0];
				ChildController::update($id,$_REQUEST);
			}else{
				ChildController::update(null,$_REQUEST);
			}
	    	break;
	  	case 'POST':
			ChildController::create($_POST);
	    	break;
	  	case 'GET':
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		if ($request[0] == 'filter'){
		  			$value = $request[1];
		  			ChildController::filter($value);
		  		}else{
		  			$id = $request[0];
					ChildController::detail($id);
		  		}
		  	}else{
				ChildController::read();
		  	}
		    break;
	  	case 'DELETE':
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
				ChildController::delete($id);
		  	}
	    	break;
	  default:
	    return print json_encode('DECISION SUPPORT SYSTEM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
