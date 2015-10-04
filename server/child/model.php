<?php
require_once '../../server/connection.php';

class Child {

	function __construct(){
    }

	public static function create($data){
		$config= new Config();

		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{

			$fname = $mysqli->real_escape_string($data['fname']);
			$mname = $mysqli->real_escape_string($data['mname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$address = $mysqli->real_escape_string($data['address']);
			$locationID = $mysqli->real_escape_string($data['location']);
			$dob = $mysqli->real_escape_string($data['date']);
			$height = $mysqli->real_escape_string($data['height']);
			$weight = $mysqli->real_escape_string($data['weight']);
			$month = $mysqli->real_escape_string($data['month']);
			$gender = $mysqli->real_escape_string($data['gender']);
			$status = $mysqli->real_escape_string($data['status']);
			$year = $mysqli->real_escape_string($data['year']);

			if ($stmt = $mysqli->prepare('INSERT INTO child(fname,mname,lname,address,locationID,dob,height,weight,months,gender,status_id,year_id,createddate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,NOW())')){
				$stmt->bind_param('ssssssssssss', $fname,$mname,$lname,$address,$locationID,$dob,$height,$weight,$month,$gender,$status,$year);
				$stmt->execute();
				return print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				return print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function read(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			if ($_SESSION['users']['level'] == 'User') {
				$locationID = $_SESSION['users']['locationID'];
				$query1 ="SELECT *,(SELECT description FROM status WHERE id = c.status_id LIMIT 1) AS status FROM child c WHERE c.locationID=$locationID;";
			}else{
				$query1 ="SELECT *,(SELECT description FROM status WHERE id = c.status_id LIMIT 1) AS status FROM child c;";
			}			
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print json_encode(array('success' =>true,'status'=>200,'childs' =>$data, 'query'=>$query1),JSON_PRETTY_PRINT);
		}
	}

	public static function filter($value){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$arr = explode('-',$value);
			if ($_SESSION['users']['level'] == 'User') {
				$locationID = $_SESSION['users']['locationID'];
				$query1 ="SELECT *,(SELECT description FROM status WHERE id = c.status_id LIMIT 1) AS status FROM child c WHERE (c.locationID=$locationID AND (c.months BETWEEN $arr[0] AND $arr[1]));";
			}else{
				$query1 ="SELECT *,(SELECT description FROM status WHERE id = c.status_id LIMIT 1) AS status FROM child c WHERE (c.months BETWEEN $arr[0] AND $arr[1]);";
			}
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print json_encode(array('success' =>true,'status'=>200,'childs' =>$data, 'query'=>$query1),JSON_PRETTY_PRINT);
		}
	}

	public static function detail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    return print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		}else{
			$mysqli->set_charset('utf8');
			$query = "SELECT *,(SELECT description FROM status WHERE id = c.status_id LIMIT 1) AS status FROM child c WHERE c.id=$id LIMIT 1;";
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'status'=>200,'child' =>$row),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'No record found!'),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function update($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$fname = $mysqli->real_escape_string($data['fname']);
			$mname = $mysqli->real_escape_string($data['mname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$address = $mysqli->real_escape_string($data['address']);
			$locationID = $mysqli->real_escape_string($data['location']);
			$dob = $mysqli->real_escape_string($data['date']);
			$height = $mysqli->real_escape_string($data['height']);
			$weight = $mysqli->real_escape_string($data['weight']);
			$month = $mysqli->real_escape_string($data['month']);
			$gender = $mysqli->real_escape_string($data['gender']);
			$status = $mysqli->real_escape_string($data['status']);
			$year = $mysqli->real_escape_string($data['year']);

			if($stmt = $mysqli->prepare('UPDATE child SET fname=?,mname=?,lname=?,address=?,locationID=?,dob=?,height=?,weight=?,months=?,gender=?,status_id=?,year_id=?,updateddate=NOW() WHERE id=?')){
				$stmt->bind_param('sssssssssssss', $fname,$mname,$lname,$address,$locationID,$dob,$height,$weight,$month,$gender,$status,$year,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function delete($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if($stmt = $mysqli->prepare('DELETE FROM child WHERE ID =?')){
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully deleted'),JSON_PRETTY_PRINT);
		}else{
			print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
		}
	}
}
?>
