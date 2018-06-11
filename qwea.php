<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['pesel'], $_POST['haslo'])){
		$db = new DbOperations(); 

		if($db->userLogin($_POST['pesel'], $_POST['haslo'])){
			$user = $db->getUserByUsername($_POST['pesel']);
			$response['error'] = false; 
			$response['id'] = $user['id'];
			$response['haslo'] = $user['haslo'];
			$response['pesel'] = $user['pesel'];
		}else{
			$response['error'] = true; 
			$response['message'] = "Zly pesel lub haslo";			
		}

	}else{
		$response['error'] = true; 
		$response['message'] = $_POST['pesel'];
	}
}

echo json_encode($response);