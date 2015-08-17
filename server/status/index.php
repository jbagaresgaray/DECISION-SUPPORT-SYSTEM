<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'normal'){
	  			StatusController::printNormal();

	  		}else if($request[0] == 'under'){
	  			StatusController::printUnder();

	  		}else if($request[0] == 'severe-under'){
	  			StatusController::printSeverelyUnder();

	  		}else if($request[0] == 'over'){
	  			StatusController::printOver();

	  		}else if($request[0] == 'severe-under-total'){
	  			StatusController::printSeverelyUnderTotal();
	  			
	  		}else{
	  			$age = $request[0];
		  		$weight = $request[1];
				StatusController::detail($age,$weight);
	  		}
	  	}else{
			StatusController::read();
	  	}
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
