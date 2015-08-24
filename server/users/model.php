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

			if ($stmt = $mysqli->prepare('INSERT INTO userdata(fname,lname,username,password,email,mobileno,level) VALUES(?,?,?,?,?,?,?)')){
				$stmt->bind_param('sssssss', $fname,$lname,$username,sha1($password),$email,$mobileno,$level);
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
			$query ="SELECT * FROM userdata c;";
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
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$id = $_SESSION['users']['id'];
			$query1 ="SELECT id,username,email,mobileno,fname,lname,level FROM userdata WHERE id = '$id' LIMIT 1;";
	        $result = $mysqli->query($query1);
	        if($result){
	            if($row = $result->fetch_assoc()){
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

			if ($stmt = $mysqli->prepare('UPDATE userdata SET username=?,password=? WHERE id=?')){
				$stmt->bind_param('sss',$username,sha1($password),$id);
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
}
?>
