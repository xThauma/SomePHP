
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['imie']) and 
			isset($_POST['naziwsko']) and 
				isset($_POST['pesel']) and 
					isset($_POST['haslo']) and 
						isset($_POST['email']) and 
							isset($_POST['numer_telefonu']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createUser( 	$_POST['imie'],
									$_POST['naziwsko'],
									$_POST['pesel'],
									$_POST['haslo'],
									$_POST['email'],
									$_POST['numer_telefonu']
									
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "User registered successfully";
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Some error occurred please try again";			
		}elseif($result == 0){
			$response['error'] = true; 
			$response['message'] = "It seems you are already registered, please choose a different pesel";						
		}

	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
