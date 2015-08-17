<?php
require_once '../../server/connection.php';

class Status {

	function __construct(){
    }

	public static function read(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT * FROM status c;";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public static function detail($id,$weight){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    return print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		}else{
			$mysqli->set_charset('utf8');
			$query = "SELECT * FROM growth_standards c WHERE c.age=$id LIMIT 1;";
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){

				if ($weight <= floatval($row['su_3sd'])){
	                return print json_encode(array(
	                	'success' =>true,'status'=>200,
	                	'data' =>$row,
	                	'CNO'=>'SEVERELY UNDERWEIGHT',
	                	'CNO_id'=>'2'),JSON_PRETTY_PRINT);
	            }
	            
	            if (($weight >= floatval($row['uw_3sd_from'])) && ($weight <= floatval($row['uw_2sd_to']))) {
	                return print json_encode(array(
	                	'success' =>true,'status'=>200,
	                	'data' =>$row,
	                	'CNO'=>'UNDERWEIGHT',
	                	'CNO_id'=>'3'),JSON_PRETTY_PRINT);
	            }

	            if (($weight >= floatval($row['normal_2sd_from'])) && ($weight <= floatval($row['normal_2sd_to']))) {
	                return print json_encode(array(
	                	'success' =>true,'status'=>200,
	                	'data' =>$row,
	                	'CNO'=>'NORMAL',
	                	'CNO_id'=>'1'),JSON_PRETTY_PRINT);
	            }

	            if ($weight >= floatval($row['ow_2sd'])){
	                return print json_encode(array(
	                	'success' =>true,'status'=>200,
	                	'data' =>$row,
	                	'CNO'=>'OVERWEIGHT',
	                	'CNO_id'=>'4'),JSON_PRETTY_PRINT);
	            }
				
			}else{
				return print json_encode(array('success' =>false,'status'=>200,'msg' =>'No record found!'),JSON_PRETTY_PRINT);
			}
		}
	}

	public function printNormal(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
			(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE c.status_id='1';";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printSeverelyUnder(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
			(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status 
			FROM child c WHERE c.status_id='2';";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printUnder(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
			(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status 
			FROM child c WHERE c.status_id='3';";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printOver(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
			(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status 
			FROM child c WHERE c.status_id='4';";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printSeverelyUnderTotal(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
			(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status 
			FROM child c WHERE c.status_id='4';";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

}
?>
