<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

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
		  		$data = [
					'name'=> $_REQUEST['name'],
					'x'=> $_REQUEST['x_coord'],
					'y'=> $_REQUEST['y_coord'],
					'description'=> $_REQUEST['description'],
					'landarea'=> $_REQUEST['landarea'],
					'image_path'=> $_REQUEST['image_path']
				];
				Location::update($id,$data);
		  	}else{
				Location::update($_REQUEST);
		  	}
	    break;
	  case 'POST':
			$data = [
				'name'=> $_POST['name'],
				'x'=> $_POST['x_coord'],
				'y'=> $_POST['y_coord'],
				'description'=> $_POST['description'],
				'landarea'=> $_POST['landarea'],
				'image_path'=> $_POST['image_path']
			];
			Location::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
			Location::detail($id);
	  	}else{
			Location::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				Location::delete($id);
	  	}
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
