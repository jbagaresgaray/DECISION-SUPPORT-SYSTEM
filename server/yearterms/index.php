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
					'year'=> $_REQUEST['year'],
					'terms'=> $_REQUEST['terms']
				];
				YearTerms::update($id,$data);
		  	}else{
				YearTerms::update($_REQUEST);
		  	}
	    break;
	  case 'POST':
			$data = [
				'year'=> $_POST['year'],
				'terms'=> $_POST['terms']
			];
			YearTerms::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
			YearTerms::detail($id);
	  	}else{
			YearTerms::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
				YearTerms::delete($id);
	  	}
	    break;
	  default:
	    return print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();

?>
