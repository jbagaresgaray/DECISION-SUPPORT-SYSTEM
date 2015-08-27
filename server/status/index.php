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

	  		}else if($request[0] == 'rank'){
	  			if ($request[1] == 'normal'){
		  			StatusController::printNormalRank();
		  		}else if($request[1] == 'under'){
		  			StatusController::printSeverelyUnderRank();
		  		}else if($request[1] == 'severe-under'){
		  			StatusController::printUnderRank();
		  		}else if($request[1] == 'over'){
		  			StatusController::printOverRank();
		  		}else if($request[1] == 'severe-under-total'){
		  			StatusController::printSevereUnderTotalRank();
		  		}
		  	}else if($request[0] == 'location'){
		  		$locationID = $request[2];
	  			if ($request[1] == 'normal'){
		  			StatusController::printNormalLocation($locationID);
		  		}else if($request[1] == 'under'){
		  			StatusController::printUnderLocation($locationID);
		  		}else if($request[1] == 'severe-under'){
		  			StatusController::printSeverelyUnderLocation($locationID);
		  		}else if($request[1] == 'over'){
		  			StatusController::printOverLocation($locationID);
		  		}else if($request[1] == 'severe-under-total'){
		  			StatusController::printSevereUnderTotalLocation($locationID);
		  		}
	  		}else if($request[0] == 'gender'){
		  		$gender = $request[2];
	  			if ($request[1] == 'normal'){
		  			StatusController::printNormalGender($gender);
		  		}else if($request[1] == 'under'){
		  			StatusController::printUnderGender($gender);
		  		}else if($request[1] == 'severe-under'){
		  			StatusController::printSeverelyUnderGender($gender);
		  		}else if($request[1] == 'over'){
		  			StatusController::printOverGender($gender);
		  		}else if($request[1] == 'severe-under-total'){
		  			StatusController::printSevereUnderTotalGender($gender);
		  		}
		  	}else if($request[0] == 'dss'){
		  		$year = $request[2];
	  			if($request[1] == 'severeunder'){
		  			StatusController::printNormalDSS($year);
		  		}else if($request[1] == 'under'){
		  			StatusController::printUnderDSS($year);
		  		}else if($request[1] == 'severe-under'){
		  			StatusController::printSeverelyUnderDSS($year);
		  		}else if($request[1] == 'severe-under-total'){
		  			StatusController::printSevereUnderTotalDSS($year);
		  		}
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
	    return print json_encode('DECISION SUPPORT SYSTEM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
