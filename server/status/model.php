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

	public function printStatus($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			if(strlen($id) == 2){
				$arr = str_split($id);
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE c.status_id IN ($arr[0],$arr[1]);";
			}else{
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE c.status_id=$id;";				
			}
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printGenderStatus($id,$gender){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			if(strlen($id) == 2){
				$arr = str_split($id);
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE (c.gender='$gender' AND c.status_id IN ($arr[0],$arr[1]));";
			}else{
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE (c.status_id=$id AND c.gender='$gender');";				
			}
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}


	public function printBracketsStatus($id,$value){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			$arr1 = explode('-',$value);
			if(strlen($id) == 2){
				$arr = str_split($id);
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE ((c.months BETWEEN $arr1[0] AND $arr1[1]) AND c.status_id IN ($arr[0],$arr[1]));";
			}else{
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status FROM child c WHERE (c.status_id=$id AND (c.months BETWEEN $arr1[0] AND $arr1[1]));";				
			}
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function printRankStatus($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			if(strlen($id) == 2){
				$arr1 = str_split($id);
				$query1 ="CALL printSevereUnder();";
			}else{
				$query1 ="CALL printLocationStatus($id);";
			}			
			$result1 = $mysqli->query($query1);
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
		}
	}


	public function printStatusByLocation($id,$locationID){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			if(strlen($id) == 2){
				$query1 ="CALL printSevereUnderLocation($locationID);";
			}else{
				$query1 ="SELECT c.id,CONCAT(c.lname,', ',c.fname) AS Fullname,c.address,c.dob,CONCAT(c.weight,' Kg.') AS weight,c.gender,c.months,
				(SELECT name FROM location WHERE id=c.locationID LIMIT 1) AS location,(SELECT description FROM status WHERE id=c.status_id LIMIT 1) AS status 
				FROM child c WHERE c.status_id=$id AND c.locationID=$locationID;";
			}

			$result1 = $mysqli->query($query1);			
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
			// return print_r(json_encode($query1));
		}
	}


	public function printDSS($id,$year){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			if(strlen($id) == 2){
				$var = str_split($id);
				$query1 = "SET @rank=0; SELECT A.* ,@rank:=@rank+1 AS rank FROM (SELECT l.id,l.name,l.description,l.landarea,(SELECT COUNT(c.id) FROM child c WHERE c.status_id IN ('$var[0]','$var[1]') AND c.locationID=l.id AND c.year_id=$year) AS Count FROM location l GROUP BY l.id ORDER BY Count DESC) AS A WHERE A.Count > 0 LIMIT 5;";
				if ($result1 = $mysqli->multi_query($query1)) {
					do {
						if ($result1 = $mysqli->store_result()) {
				            while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
				                array_push($data,$row);
				            }
				            $result1->free();
				        }
			        } while ($mysqli->next_result());
			    }
		        return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
			}else{
				$query1 ="CALL printDSS($id,$year)";
				$result1 = $mysqli->query($query1);
				while($row = $result1->fetch_array(MYSQLI_ASSOC)){
					array_push($data,$row);
				}
				return print json_encode(array('success' =>true,'status'=>200,'data' =>$data),JSON_PRETTY_PRINT);
			}			
			
			
		}
	}

}
?>
