<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

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
				Users::update($id,$_REQUEST);
			}else{
				Users::update($_REQUEST);
			}
	    break;
	  case 'POST':
		  $data = [
				"fname" => $_POST['fname'],
				"lname" => $_POST['lname'],
				"mname" => $_POST['mname'],
				"address" => $_POST['address'],
				"location" => $_POST['location'],
				"date" => $_POST['date'],
				"height" => $_POST['height'],
				"weight" => $_POST['weight'],
				"month" => $_POST['month'],
				"gender" => $_POST['gender']
			];
			Users::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				Users::detail($id);
	  	}else{
				Users::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				Users:delete($id);
	  	}
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
