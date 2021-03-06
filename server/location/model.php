<?php
require_once '../../server/connection.php';

class Location {

	function __construct(){
    }

	public static function create($data){
		

		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'status'=>400,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$name = $mysqli->real_escape_string($data['name']);
			$coords = $mysqli->real_escape_string($data['coords']);
			$description = $mysqli->real_escape_string($data['description']);
			$landarea = $mysqli->real_escape_string($data['landarea']);
			$image_path = $mysqli->real_escape_string($data['image_path']);

			if($stmt = $mysqli->prepare('INSERT INTO location(name,coords,description,landarea,image_path) VALUES (?,?,?,?,?)')){
				$stmt->bind_param('sssss',$name,$coords,$description,$landarea,$image_path);
				$stmt->execute();
				print json_encode(array('success' =>true,'status'=>200,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'status'=>200,'msg' =>'Error message: %s\n', $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public static function heatmap($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT A.id,A.name,A.description,A.landarea,A.diameter,
					IF(A.NW_Count > 0,A.nw_path,'') AS nw_path,A.NW_Count,
					IF(A.SUW_Count > 0,A.suw_path,'') AS suw_path,A.SUW_Count,
					IF(A.UW_Count > 0,A.uw_path,'') AS uw_path,A.UW_Count,
					IF(A.OW_Count > 0,A.ow_path,'') AS ow_path,A.OW_Count
					FROM ( SELECT l.id,l.name,l.description,l.landarea, l.nw_path,l.suw_path,l.uw_path,l.ow_path,l.diameter,
					(SELECT COUNT(c.id) FROM child c WHERE c.locationID = l.id AND c.status_id =1 AND c.year_id = $id) AS NW_Count,
					(SELECT COUNT(c.id) FROM child c WHERE c.locationID = l.id AND c.status_id =2 AND c.year_id = $id) AS SUW_Count,
					(SELECT COUNT(c.id) FROM child c WHERE c.locationID = l.id AND c.status_id =3 AND c.year_id = $id) AS UW_Count,
					(SELECT COUNT(c.id) FROM child c WHERE c.locationID = l.id AND c.status_id =4 AND c.year_id = $id) AS OW_Count
					FROM location l GROUP BY l.id ORDER BY l.name ASC) AS A;";

			$result = $mysqli->query($query);
			$data = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print_r(json_encode(array('success' =>true,'locations' =>$data),JSON_PRETTY_PRINT));
		}
	}

	public static function read(){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT id,name,description,landarea,coords,nw_path,uw_path,suw_path,ow_path,diameter FROM location;";
			$result = $mysqli->query($query);
			$data = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			print_r(json_encode(array('success' =>true,'locations' =>$data),JSON_PRETTY_PRINT));
		}
	}

	public static function detail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT * FROM location l WHERE id=$id LIMIT 1;";
			$mysqli->set_charset('utf8');
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'location' =>$row),JSON_PRETTY_PRINT);
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
			$name = $mysqli->real_escape_string($data['name']);
			$coords = $mysqli->real_escape_string($data['coords']);
			$description = $mysqli->real_escape_string($data['description']);
			$landarea = $mysqli->real_escape_string($data['landarea']);
			$image_path = $mysqli->real_escape_string($data['image_path']);

			if ($stmt = $mysqli->prepare('UPDATE location SET name=?,coords=?,description=?,landarea=?,image_path=? WHERE id=?')){
				$stmt->bind_param('ssssss',$name,$coords,$description,$landarea,$image_path,$id);
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
		if($stmt = $mysqli->prepare('DELETE FROM location WHERE id =?')){
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
