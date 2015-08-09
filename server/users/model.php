<?php
require_once '../../server/connection.php';

class Users {

	function __construct(){
    }

	public static function create($data){
		$config= new Config();

		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
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

			if ($stmt = $mysqli->prepare('INSERT INTO child(fname,mname,lname,address,locationID,dob,height,weight,months,gender,createddate) VALUES(\''.$fname.'\',\''.$mname.'\',\''.$lname.'\',\''.$address.'\',\''.$locationID.'\',\''.$dob.'\',\''.$height.'\',\''.$weight.'\',\''.$month.'\',\''.$gender.'\',NOW())')){
				$stmt->bind_param('ssssssssss', $fname,$mname,$lname,$address,$locationID,$dob,$height,$weight,$month,$gender);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}

			if ($stmt = $mysqli->prepare('INSERT INTO child(fname,mname,lname,address,locationID,dob,height,weight,months,gender,createddate) VALUES(?,?,?,?,?,?,?,?,?,?,NOW())')){
				$stmt->bind_param('ssssisssss', $fname,$mname,$lname,$address,$locationID,$dob,$height,$weight,$month,$gender);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function read($page,$search){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query1 ="SELECT * FROM child c;";
			$result1 = $mysqli->query($query1);
			$rows = $result1->num_rows;

			$query ="SELECT * FROM child c WHERE c.lname LIKE '%$search%' order by c.lname asc LIMIT $start,$limit;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			$data = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			$paging = $func->pagination($limit,$adjacent,$rows,$page);
			print json_encode(array('success' =>true,'child' =>$data,'pagination'=>$paging),JSON_PRETTY_PRINT);
		}
	}

	public static function detail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ='SELECT * FROM child c WHERE id=$id LIMIT 1;';
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'child' =>$row),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>'No record found!'),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function update($id,$data){
		$config= new Config();

		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$category_name = $mysqli->real_escape_string($data['category_name']);
			if ($stmt = $mysqli->prepare('UPDATE child SET name=? WHERE id=?')){
				$stmt->bind_param('ss', $category_name,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
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
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'),JSON_PRETTY_PRINT);
		}else{
			print json_encode(array('success' =>false,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
		}
	}
}
?>
