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
				$data = [
					"username" => $_REQUEST['username'],
					"password" => $_REQUEST['password'],
					"email" => $_REQUEST['email'],
					"mobileno" => $_REQUEST['mobileno'],
					"fname" => $_REQUEST['fname'],
					"lname" => $_REQUEST['lname'],
					"level" => $_REQUEST['level']
				];
				Users::update($id,$data);
			}else{
				Users::update($_REQUEST);
			}
	    break;
	  case 'POST':
		  	$data = [
				"username" => $_POST['username'],
				"password" => $_POST['password'],
				"email" => $_POST['email'],
				"mobileno" => $_POST['mobileno'],
				"fname" => $_POST['fname'],
				"lname" => $_POST['lname'],
				"level" => $_POST['level']
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
			Users::delete($id);
	  	}
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
