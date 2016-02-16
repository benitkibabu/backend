<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers:        
		{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

exit(0);
}    

if (isset($_POST['tag']) && $_POST['tag'] != '') {
	require_once 'DbStudent.php';
	$db = new DbStudent();
	
	$tag  = $_POST['tag'];	
	$res  = array("tag" => $tag, "error" => FALSE);
	
	if($tag == "student"){
		$student_no = $_POST['student_no'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$device_id = $_POST['reg_id']; 
		$course = $_POST['course'];
		
		$res = $db->addStudent($student_no,$email,$password,$device_id,$course);
		if($res != false){
			if($db-> addDevices($student_no, $device_id)){	
			}
				$res["error"] = FALSE;		
				echo json_encode($res);			
		}else{
			$res = $db->getStudent($student_no,$password);		
			if($res != false){
				if($db-> addDevices($student_no, $device_id)){
				}
				$res["error"] = FALSE;					
				echo json_encode($res);				
			}
			else{
				$res["error"] = TRUE;
				$res["error_msg"] = "Student Not found";
				echo json_encode($res);
			}
		}		
	}
	else if($tag == "updateStatus"){
		$student_no = $_POST['student_no'];
		$status = $_POST['status'];
		$res = $db->addStudent($student_no,$status);
		if($res){
			$res["error"] = FALSE;
			$res["error_msg"] = "Student status updated";
			echo json_encode($res);
		}else{
			$res["error"] = TRUE;
			$res["error_msg"] = "Student status Not updated";
			echo json_encode($res);
		}
	}
	else{
		$response["error"] = TRUE;
		$response["error_msg"] = "Unknown tag. Use a proper tag";
		echo json_encode($response);
	}
    
} 
else if(isset($_GET['tag']) && $_GET['tag'] != ''){
	require_once 'DbStudent.php';
	$db = new DbStudent();
	
	$tag  = $_GET['tag'];	
	$res  = array("tag" => $tag, "error" => FALSE);
	
	if($tag == "student"){
		$student_no = $_GET['student_no'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$device_id = $_GET['reg_id']; 
		$course = $_GET['course'];
		
		$res = $db->addStudent($student_no,$email,$password,$device_id,$course);
		if($res != false){
			$res["error"] = FALSE;		
			echo json_encode($res);			
		}else{
			$res = $db->getStudent($student_no,$password);		
			if($res != false){			
				$res["error"] = FALSE;			
				echo json_encode($res);			
			}
			else{
				$res["error"] = TRUE;
				$res["error_msg"] = "Student Not found";
				echo json_encode($res);
			}
		}	
	}
	else if($tag == "getStudents"){
		$result = $db->getStudents();
		if($result != false){
			$res['error'] = false;
			$res['result'] = $result;
			echo json_encode($res);
		}
	}
	else{
		$response["error"] = TRUE;
		$response["error_msg"] = "Unknown tag. Use a proper tag";
		echo json_encode($response);
	}
}
else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}
?>