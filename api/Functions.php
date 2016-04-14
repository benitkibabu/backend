<?php
header('Access-Control-Allow-Origin: *');
require_once 'Config.php';

class DbUpdate{
	public function connect(){
		$conn = mysqli_connect(dbhost, dbuser,dbpass, dbname);		
		if(!$conn){
			return false;
		}else{
			return $conn;
		}	
	}
	
	public function close(){
		mysqli_close();
	}
	
	public function getUpdates(){
		$query = "SELECT * FROM news ORDER BY date DESC";
		$con  = $this->connect();
		$news = mysqli_query($con, $query);
		if(mysqli_num_rows($news) > 0){
			$rows = array();
			while($row = mysqli_fetch_array($news,MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return false;
		}
		/* $this->close(); */
	}
	
	public function getCourses(){
		$query = "SELECT * FROM course ORDER BY course_code";
		$con  = $this->connect();
		$course = mysqli_query($con, $query);
		if(mysqli_num_rows($course) > 0){
			$rows = array();
			while($row = mysqli_fetch_array($course,MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return false;
		}
		/* $this->close(); */
	}
	
	public function getUpdate($id){
		$query = "SELECT * FROM news WHERE id = $id";
		$con  = $this->connect();
		$news = mysqli_query($con, $query);
		if(mysqli_num_rows($news) > 0){
			$rows = array();
			while($row = mysqli_fetch_array($news, MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			return $rows;
		}
		else{
			return false;
		}
		/* $this->close(); */
	}
	
	public function addUpdate($title, $body, $target, $from){
		$query = "INSERT INTO news(title, body, target, date, from) VALUES('$title', '$body', '$target', NOW(), '$from')";
		$con  = $this->connect();
		$res = mysqli_query($con, $query);
		if($res){
			$id = mysqli_insert_id($con);
			$query = "SELECT * FROM news WHERE id = $id";
			$update = mysqli_query($con, $query);
			if(mysqli_num_rows($update) > 0){
				$rows = array();
				while($row = mysqli_fetch_array($update, MYSQLI_ASSOC)){
					$rows[] = $row;
				}
				return $rows;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		/* $this->close(); */
	}
}
?>