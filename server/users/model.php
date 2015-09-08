<?php
require_once '../../server/connection.php';

class Users {

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
			$lname = $mysqli->real_escape_string($data['lname']);
			$username = $mysqli->real_escape_string($data['username']);
			$password = $mysqli->real_escape_string($data['password']);
			$email = $mysqli->real_escape_string($data['email']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);
			$level = $mysqli->real_escape_string($data['level']);

			if ($stmt = $mysqli->prepare('INSERT INTO userdata(fname,lname,username,password,str_password,email,mobileno,level) VALUES(?,?,?,?,?,?,?,?)')){
				$stmt->bind_param('ssssssss', $fname,$lname,$username,sha1($password),$password,$email,$mobileno,$level);
				$stmt->execute();
				print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
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
			$query ="SELECT * FROM userdata c LIMIT 1,1000000;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			$data = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print json_encode(array('success' =>true,'status'=>200,'userdata' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public static function detail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT * FROM userdata c WHERE id=$id LIMIT 1;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'status'=>200,'userdata' =>$row),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'No record found!'),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function currentUser(){
		session_start();

		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$id = $_SESSION['users']['id'];
			$data = array();

			$query1 ="SELECT id,username,email,mobileno,fname,lname,level FROM userdata WHERE id = '$id' LIMIT 1;";
	        $result = $mysqli->query($query1);
	        if($result){
	            if($row = $result->fetch_assoc()){
	            	$level = $row['level'];
					$query1 ="SELECT * FROM usergroup c WHERE c.level='$level';";
					$result1 = $mysqli->query($query1);			
					while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
						array_push($data,$row1);
					}
					$row['access'] = $data;
					$_SESSION['users'] = $row;
	                return print_r(json_encode($_SESSION['users']));
	            }
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
			$lname = $mysqli->real_escape_string($data['lname']);
			$username = $mysqli->real_escape_string($data['username']);
			$email = $mysqli->real_escape_string($data['email']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);
			$level = $mysqli->real_escape_string($data['level']);

			if ($stmt = $mysqli->prepare('UPDATE userdata SET fname=?,lname=?,username=?,email=?,mobileno=?,level=? WHERE id=?')){
				$stmt->bind_param('sssssss', $fname,$lname,$username,$email,$mobileno,$level,$id);
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
		if($stmt = $mysqli->prepare('DELETE FROM userdata WHERE id =?;')){
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully deleted'),JSON_PRETTY_PRINT);
		}else{
			print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
		}
	}

	public static function updateAccount($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$username = $mysqli->real_escape_string($data['username']);
			$password = $mysqli->real_escape_string($data['password']);

			if ($stmt = $mysqli->prepare('UPDATE userdata SET username=?,password=?,str_password=? WHERE id=?')){
				$stmt->bind_param('ssss',$username,sha1($password),$password,$id);
				$stmt->execute();

				print json_encode(array('success' =>true,'status'=>200,'msg' =>'User Account successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function updateProfile($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$fname = $mysqli->real_escape_string($data['fname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$email = $mysqli->real_escape_string($data['email']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);

			if ($stmt = $mysqli->prepare('UPDATE userdata SET fname=?,lname=?,email=?,mobileno=? WHERE id=?')){
				$stmt->bind_param('sssss', $fname,$lname,$email,$mobileno,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'status'=>200,'msg' =>'User Profile successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function getAccessList(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$data = array();
			$query ="SELECT * FROM usergroup c;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print json_encode(array('success' =>true,'status'=>200,'usergroup' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public static function getAccessDetails($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT * FROM usergroup c WHERE id=$id LIMIT 1;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'status'=>200,'access' =>$row),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'No record found!'),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function updateAccess($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$allow = $data['allow'];
			$query ="UPDATE usergroup SET `allow`=$allow WHERE id=$id";
			$result = $mysqli->query($query);
			if ($result){
				print json_encode(array('success' =>true,'status'=>200,'msg' =>'User Account successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
			// print_r(json_encode($query));
		}
	}

}
?>
